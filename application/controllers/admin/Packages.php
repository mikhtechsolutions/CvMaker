<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site
 * All operations are for Admin user to perform CRUD on overall site settings and data.
 */
class Packages extends MY_Controller {

    /**
     * Site constructor.
     */
    public function __construct()
    {
        parent::__construct();
        auth_check(false); // checks the authenticated user. True parameters ensures that user is Admin
        $this->load->library('datatable');
        $this->load->model('admin/package_model', 'package_model');
    }

    /**
     * Packages  listing. These are shown at landing page
     */
    public function index()
    {
        $data['packages'] = $this->package_model->get_packages();

        $data['title'] = trans('pricing_packages');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/packages');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Adding a new package in DB by Admin.
     */
    public function add_package()
    {
        if($this->input->post('submit')){
            $user_id = $this->session->userdata('user_id');
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            $this->form_validation->set_rules('name', trans('name'), 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/packages/add_package'),'refresh');
            } else {
                $pkg_type = $this->input->post('type');
                $num_days = 0;
                if ($pkg_type != 'F') {
                    $num_days = ($pkg_type == 'M')?30:365;
                }
                
                $data = array(
                    'name' => $this->input->post('name'),
                    'type' => $this->input->post('type'),
                    'price' => $this->input->post('price'),
                    'num_days' => $num_days,
                    'is_active' => $this->input->post('is_active')
                );

                $data = $this->security->xss_clean($data);


                if ($update_id) {
                    $insert_id = $this->package_model->edit_package($data, $update_id); // Updating in DB
                } else {
                    $insert_id = $this->package_model->save_package($data); // Adding in DB
                }

                /// Saving features to package_features
                if($insert_id) {
                    $pkg_features = [];
                    $features = $this->input->post('features[]');
                    $i = 0;
                    foreach ($features as $feature_id) {
                        $pkg_features[$i]['package_id']     = $insert_id;
                        $pkg_features[$i]['feature_id']     = $feature_id;
                        $i++;
                    }
                    $batch_insert = $this->package_model->save_package_features($pkg_features, $insert_id);
                }
                /// ./Saving features to package_features

                if($insert_id){
                    // Service Image uploading
                    if($_FILES['image']['name'] != ''){
                        // set image upload parameters
                        $img_config = array (
                            'user_id' => $user_id,
                            'record_id' => $insert_id,
                            'resize_width_limit' => 400,
                            'upload_path'  => "./uploads/images/",
                            'allowed_types'=> 'gif|jpg|png|jpeg',
                            'max_size'     => '2048', // The maximum size (in kilobytes)
                            'max_width'    => '2048',
                            'max_height'   => '1600',
                            'overwrite'    => true,
                            'form_field_name' => "image",
                            'upload_image_prefix' => "package_",
                            'redirect_on_error' => 'admin/packages'
                        );


                        $up_load = upload_image($img_config);
                        if(!$up_load) {
                            $this->session->set_flashdata('errors', trans('upload_image_error'));
                            redirect(base_url('admin/packages'));
                            exit;
                        }
                        $data = array(
                            'image' => $up_load['images'],
                            'thumb' => $up_load['thumb']
                        );
                    } else {
                        $this->session->set_flashdata('success', trans('save_success'));
                        redirect(base_url('admin/packages'), 'refresh');
                    }
                    // ./Service Image uploading //

                    $result = $this->package_model->edit_package($data, $insert_id); // Updating
                    if($result) {
                        if ($update_id){
                            $this->session->set_flashdata('success', trans('update_success'));
                        } else {
                            $this->session->set_flashdata('success', trans('save_success'));
                        }
                    } else {
                        $this->session->set_flashdata('errors', trans('save_image_error'));
                    }
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                }
                redirect(base_url('admin/packages'), 'refresh');
                exit;
            }
        } else {
            $data['features'] = get_features_list();
            $data['title'] = trans('add_new_package');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/package_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * Updating screen shot by Admin.
     * @param $id
     */
    public function edit_package($id)
    {
        $data = [];
        $data['update_id'] = $id;
        $data['package'] = $this->package_model->get_package_by_id($id);
        $package_features = [];
        $p_features = $this->package_model->get_package_features_by_id($id);
        foreach ($p_features as $pf) {
            $package_features[] =$pf->feature_id;
        }
        $data['package_features'] = $package_features;
        $data['features'] = get_features_list();

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/package_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Delete package by Admin.
     * @param $id
    */

    public function delete($id = '')
    {
        $this->db->where('id',$id);
        $package = $this->db->get('packages')->row_array();

        unlink($package['image']);
        unlink($package['thumb']);

        $this->db->where('id',$id);
        $this->db->delete('packages');

        $this->session->set_flashdata('success', trans('update_success'));
        redirect(base_url('admin/packages'), 'refresh');
    }

    /**
     * Packages  listing. These are shown at landing page
     */
    public function payments()
    {
        $data['title'] = trans('payments');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/payments');
        $this->load->view('admin/includes/_footer', $data);
    }

    public function payments_dt()
    {
        $user_id = null;
        if (!$this->session->userdata('is_admin')) {
            $user_id = $this->session->userdata('user_id');
        }
        $records = $this->package_model->get_all_payments_datatable($user_id, true);
        $data = array();

        $i=0;
        foreach ($records['data']  as $row)
        {

            $data[]= array(
                ++$i,
                $row['payment_method'],
                $row['txn_id'],
                $row['user_name'],
                $row['currency'],
                $row['payment_amount'],
                ($row['payment_status'] == 'Completed' || $row['payment_status'] == 'succeeded') ? 'Completed' : $row['payment_status'],
                date_time($row['payment_date']),
                $row['package_name'],
                '<a title="'.trans('delete').'" class="delete btn btn-sm btn-danger delete_item" data-link="'.base_url('admin/packages/delete_payments/'.html_escape($row['id'])).'" data-id="'.html_escape($row['id']).'" href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> <i class="fa fa-trash-o"></i></a>'
            );
        }
        $records['data']=$data;
        echo json_encode($records);
    }

    /**
     * Delete Payments by Admin and user.
     * @param $id
     */
    public function delete_payments($id = '')
    {
        $this->db->where('id',$id);
        $this->db->update('payments',array('admin_view' => 0));
        $this->session->set_flashdata('success', trans('update_success'));
        redirect(base_url('admin/payments'), 'refresh');
    }

}

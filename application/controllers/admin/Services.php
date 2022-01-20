<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site
 * All operations are for Admin user to perform CRUD on overall site settings and data.
 */
class Services extends MY_Controller {

    /**
     * Site constructor.
     */
    public function __construct()
    {
        parent::__construct();
        auth_check(true); // checks the authenticated user. True parameters ensures that user is Admin
        $this->load->model('user/service_model', 'service_model');
    }

    /**
     * Features (listing) offered by the site, these are added by Admin user as a Service same as another user do in his account.
     */
    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['services'] = $this->service_model->get_services_by_user_id($user_id);

        $data['title'] = trans('site_services');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/services');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Add / Update Services
     */
    public function add(){

        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
            $user_id = $this->session->userdata('user_id');
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            $this->form_validation->set_rules('service_name', trans('service_name'), 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/services/add'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'service_name' => $this->input->post('service_name'),
                    'fa_class' => $this->input->post('fa_class'),
                    'is_active' => $this->input->post('status'),
                    'details' => $this->input->post('details')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->service_model->edit($data, $update_id);
                } else {
                    $insert_id = $this->service_model->save($data);
                }


                if($insert_id){
                    // Service Image uploading
                    if($_FILES['service_image']['name'] != ''){
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
                            'form_field_name' => "service_image",
                            'upload_image_prefix' => "serv_",
                            'redirect_on_error' => 'user/services'
                        );

                        $up_load = upload_image($img_config);
                        if(!$up_load) {
                            $this->session->set_flashdata('errors', trans('upload_image_error'));
                            redirect(base_url('user/services'));
                            exit;
                        }
                        $data = array(
                            'image' => $up_load['images'],
                            'thumb' => $up_load['thumb']
                        );
                    }
                    // ./Service Image uploading //

                    $result = $this->service_model->edit($data, $insert_id);
                    
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
                if ($update_id && !$insert_id) {
                    redirect(base_url('admin/services/edit/'.$update_id),'refresh');
                    exit;
                } else if ($insert_id){
                    redirect(base_url('admin/services'), 'refresh');
                    exit;
                }
                redirect(base_url('admin/services/add/'),'refresh');
                exit;
            }
        } else {

            $data['title'] = trans('add_new_service');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/service_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * Edit mode of service form
     * @param $id
     */
    public function edit($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $data['service'] = $this->service_model->get_service_by_id($id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/service_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $result = $this->service_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('admin/services'), 'refresh');
        exit;
    }

}

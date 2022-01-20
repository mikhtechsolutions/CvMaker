<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site
 * All operations are for Admin user to perform CRUD on overall site settings and data.
 */
class Screen_shots extends MY_Controller {

    /**
     * Site constructor.
     */
    public function __construct()
    {
        parent::__construct();
        auth_check(true); // checks the authenticated user. True parameters ensures that user is Admin
        $this->load->model('site_model', 'site_model');
    }

    /**
     * Screen shots listing. These are shown at landing page
     */
    public function index()
    {
        $data['shots'] = $this->site_model->get_screen_shots();

        $data['title'] = trans('site_screen_shots');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/shots');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Adding a new screen shot in DB by Admin.
     */
    public function add_shot()
    {
        if($this->input->post('submit')){
            $user_id = $this->session->userdata('user_id');
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            $this->form_validation->set_rules('title', trans('title'), 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('admin/screen_shots/add_shot'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'title' => $this->input->post('title'),
                    'is_active' => $this->input->post('status')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->site_model->edit_shot($data, $update_id); // Updating in DB
                } else {
                    $insert_id = $this->site_model->save_shot($data); // Adding in DB
                }

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
                            'upload_image_prefix' => "sshot_",
                            'redirect_on_error' => 'admin/screen_shots'
                        );


                        $up_load = upload_image($img_config);
                        if(!$up_load) {
                            $this->session->set_flashdata('errors', trans('upload_image_error'));
                            redirect(base_url('admin/screen_shots'));
                            exit;
                        }
                        $data = array(
                            'image' => $up_load['images'],
                            'thumb' => $up_load['thumb']
                        );
                    } else {
                        $this->session->set_flashdata('success', trans('save_success'));
                        redirect(base_url('admin/screen_shots'), 'refresh');
                    }
                    // ./Service Image uploading //

                    $result = $this->site_model->edit_shot($data, $insert_id); // Updating
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
                redirect(base_url('admin/screen_shots'), 'refresh');
                exit;
            }
        } else {
            $data['title'] = trans('add_shot');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/shot_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * Updating screen shot by Admin.
     * @param $id
     */
    public function edit_shot($id)
    {
        $data = [];
        $data['update_id'] = $id;
        $data['shot'] = $this->site_model->get_shot_by_id($id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/shot_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Deleting screen shot by Admin.
     * @param $id
     */
    public function delete_shot($id)
    {
        $result = $this->site_model->delete_shot($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }
        redirect(base_url('admin/screen_shots'), 'refresh');
        exit;
    }

}

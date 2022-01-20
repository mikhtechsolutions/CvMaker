<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Testimonials
 */
class Testimonials extends MY_Controller
{
    /**
     * Testimonials constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/testimonial_model', 'testimonial_model');
    }

    /**
     * Default method displaying testimonials list
     * @param string $type
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        $data['testimonials'] = $this->testimonial_model->get_testimonials_by_user_id($user_id);

        $data['title'] = trans('testimonials');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/testimonials');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Add/ Update Testimonial
     */
    public function add(){

        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
            $user_id = $this->session->userdata('user_id');
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            $this->form_validation->set_rules('client_name', trans('client_name'), 'trim|required');
            $this->form_validation->set_rules('feedback_title', trans('feedback_title'), 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/testimonials/add'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'client_name' => $this->input->post('client_name'),
                    'feedback_title' => $this->input->post('feedback_title', true),
                    'status' => $this->input->post('status'),
                    'feedback' => $this->input->post('feedback')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->testimonial_model->edit($data, $update_id);
                } else {
                    $insert_id = $this->testimonial_model->save($data);
                }

                if($insert_id){
                    // Testimonial Image uploading
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
                            'upload_image_prefix' => "test_",
                            'redirect_on_error' => 'user/testimonials'
                        );

                        $up_load = upload_image($img_config);
                        if(!$up_load) {
                            $this->session->set_flashdata('errors', trans('upload_image_error'));
                            redirect(base_url('user/testimonials'));
                            exit;
                        }
                        $data = array(
                            'image' => $up_load['images'],
                            'thumb' => $up_load['thumb']
                        );
                    }
                    // ./Testimonial Image uploading //

                    $result = $this->testimonial_model->edit($data, $insert_id);
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
                    redirect(base_url('user/testimonials/edit/'.$update_id),'refresh');
                    exit;
                } else if ($insert_id){
                    redirect(base_url('user/testimonials'), 'refresh');
                    exit;
                }
                redirect(base_url('user/testimonials/add/'),'refresh');
                exit;
            }
        }
        else{

            $data['title'] = trans('add_testimonial');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/testimonial_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * Edit mode of Testimonial form
     * @param $id
     */
    public function edit($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $data['testimonial'] = $this->testimonial_model->get_testimonial_by_id($id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/testimonial_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $result = $this->testimonial_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }
        
        redirect(base_url('user/testimonials'), 'refresh');
        exit;
    }
    

}
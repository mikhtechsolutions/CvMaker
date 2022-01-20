<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Clients
 */
class Clients extends MY_Controller
{
    /**
     * Clients constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/client_model', 'client_model');
    }

    /**
     * Default method displaying clients list
     * @param string $type
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        $data['clients'] = $this->client_model->get_clients_by_user_id($user_id);

        $data['title'] = trans('clients');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/clients');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Add/ Update Client
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
            $this->form_validation->set_rules('url', 'URL', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/clients/add'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'client_name' => $this->input->post('client_name'),
                    'url' => $this->input->post('url', true),
                    'status' => $this->input->post('status')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->client_model->edit($data, $update_id);
                } else {
                    $insert_id = $this->client_model->save($data);
                }

                if($insert_id){
                    // Client Image uploading
                    if($_FILES['image']['name'] != ''){
                        // set image upload parameters
                        $img_config = array (
                            'user_id' => $user_id,
                            'record_id' => $insert_id,
                            'resize_width_limit' => 400,
                            'upload_path'  => "./uploads/images/",
                            'allowed_types'=> 'gif|jpg|png|jpeg',
                            'max_size'     => '2048', // The maximum size (in kilobytes)
                            'max_width'    => DEFAULT_UPLOAD_IMG_WIDTH,
                            'max_height'   => DEFAULT_UPLOAD_IMG_HEIGHT,
                            'overwrite'    => true,
                            'form_field_name' => "image",
                            'upload_image_prefix' => "client_",
                            'redirect_on_error' => 'user/clients'
                        );

                        $up_load = upload_image($img_config);
                        if(!$up_load) {
                            $this->session->set_flashdata('errors', trans('upload_image_error'));
                            redirect(base_url('user/clients'));
                            exit;
                        }
                        $data = array(
                            'image' => $up_load['images'],
                            'thumb' => $up_load['thumb']
                        );
                    }
                    // ./Client Image uploading //

                    $result = $this->client_model->edit($data, $insert_id);
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
                    redirect(base_url('user/clients/edit/'.$update_id),'refresh');
                    exit;
                } else if ($insert_id){
                    redirect(base_url('user/clients'), 'refresh');
                    exit;
                }
                redirect(base_url('user/clients/add/'),'refresh');
                exit;
            }
        }
        else{

            $data['title'] = trans('add_client');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/client_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * Edit mode of Client form
     * @param $id
     */
    public function edit($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $data['client'] = $this->client_model->get_client_by_id($id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/client_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $result = $this->client_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }
        
        redirect(base_url('user/clients'), 'refresh');
        exit;
    }
    

}
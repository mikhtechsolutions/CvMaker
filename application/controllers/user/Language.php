<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Language
 */
class Language extends MY_Controller
{
    /**
     * Education constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/language_model', 'language_model');
    }

    /**
     * Default method for education listing
     * @param string $type
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        $data['languages'] = $this->language_model->get_language_by_user_id($user_id);

        $data['title'] = trans('user_languages');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/language');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Add / Update education
     */
    public function add()
    {

        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
            $user_id = $this->session->userdata('user_id');
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            $this->form_validation->set_rules('title', trans('title'), 'trim|required');
            $this->form_validation->set_rules('level', trans('level'), 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/language/add'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'title' => $this->input->post('title'),
                    'level' => $this->input->post('level'),
                    'order' => $this->input->post('order', true),
                    'status' => $this->input->post('status')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->language_model->edit($data, $update_id); // Update record
                } else {
                    $insert_id = $this->language_model->save($data); // Add record
                }

                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                    if ($update_id) { // record is in Update mode
                        redirect(base_url('user/language/edit/'.$update_id),'refresh');
                        exit;
                    }
                    redirect(base_url('user/language/add'),'refresh');
                    exit;
                }
                redirect(base_url('user/language'),'refresh');
                exit;
            }
        } else {


            $data['language_levels'] = skill_levels();
            $data['title'] = trans('add_language');
            
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/language_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    public function edit($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $data['language_levels'] = skill_levels();
        $data['language'] = $this->language_model->get_language_by_id($id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/language_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    public function delete($id)
    {
        $result = $this->language_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('user/language'), 'refresh');
        exit;

    }

}

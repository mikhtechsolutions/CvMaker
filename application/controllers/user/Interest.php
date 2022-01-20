<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Education
 */
class Interest extends MY_Controller
{
    /**
     * Education constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/interest_model', 'interest_model');
    }

    /**
     * Default method for education listing
     * @param string $type
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        $data['interests'] = $this->interest_model->get_interest_by_user_id($user_id);

        $data['title'] = trans('user_interests');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/interest');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Add / Update education
     */
    public function add(){

        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
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
                redirect(base_url('user/interest/add'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'title' => $this->input->post('title'),
                    'fa_class' => $this->input->post('fa_class'),
                    'details' => $this->input->post('details'),
                    'order' => $this->input->post('order', true),
                    'status' => $this->input->post('status')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->interest_model->edit($data, $update_id); // Update record
                } else {
                    $insert_id = $this->interest_model->save($data); // Add record
                }

                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                    if ($update_id) { // record is in Update mode
                        redirect(base_url('user/interest/edit/'.$update_id),'refresh');
                        exit;
                    }
                    redirect(base_url('user/interest/add'),'refresh');
                    exit;
                }
                redirect(base_url('user/interest'),'refresh');
                exit;
            }
        } else {

            $data['title'] = trans('add_interest');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/interest_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    public function edit($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $data['interest'] = $this->interest_model->get_interest_by_id($id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/interest_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    public function delete($id)
    {
        $result = $this->interest_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('user/interest'), 'refresh');
        exit;

    }

}

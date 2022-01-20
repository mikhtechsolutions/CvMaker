<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Experience
 */
class Experience extends MY_Controller
{
    /**
     * Experience constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/experience_model', 'experience_model');
    }

    /**
     * @param string $type
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        $data['experiences'] = $this->experience_model->get_experience_by_user_id($user_id, 'from_date');

        $data['title'] = trans('user_experience');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/experience');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Add / Update Experience
     */
    public function add(){

        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
            $user_id = $this->session->userdata('user_id');
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            $this->form_validation->set_rules('job_title', trans('job_title'), 'trim|required');
            $this->form_validation->set_rules('company_name', trans('company'), 'trim|required');
            $this->form_validation->set_rules('from_date', trans('from_date'), 'required');

            if ($this->input->post('to_date')) {
                $this->form_validation->set_rules('to_date', trans('to_date'), 'required');
            }

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/experience/add'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'job_title' => $this->input->post('job_title'),
                    'company_name' => $this->input->post('company_name'),
                    'from_date' => $this->input->post('from_date'),
                    'details' => $this->input->post('details'),
                    'order' => $this->input->post('order', true),
                    'status' => $this->input->post('status'),
                    'to_date' => ($this->input->post('is_present'))?'0000-00-00':$this->input->post('to_date')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->experience_model->edit($data, $update_id);
                } else {
                    $insert_id = $this->experience_model->save($data);
                }


                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                    if ($update_id) { // record is in Update mode
                        redirect(base_url('user/experience/edit/'.$update_id),'refresh');
                        exit;
                    }
                    redirect(base_url('user/experience/add'),'refresh');
                    exit;
                }
                redirect(base_url('user/experience'),'refresh');
                exit;
            }
        } else {

            $data['title'] = trans('add_experience');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/experience_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $data['experience'] = $this->experience_model->get_experience_by_id($id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/experience_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $result = $this->experience_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('user/experience'), 'refresh');
        exit;

    }

}

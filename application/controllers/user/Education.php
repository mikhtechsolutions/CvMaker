<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Education
 */
class Education extends MY_Controller
{
    /**
     * Education constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/education_model', 'education_model');
    }

    /**
     * Default method for education listing
     * @param string $type
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        $data['educations'] = $this->education_model->get_education_by_user_id($user_id);

        $data['title'] = trans('user_education');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/education');
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

            $this->form_validation->set_rules('degree_name', trans('degree_title'), 'trim|required');
            $this->form_validation->set_rules('institution_name', trans('institute'), 'trim|required');
            $this->form_validation->set_rules('from_date', trans('from_date'), 'required');

            if ($this->input->post('to_date')) {
                $this->form_validation->set_rules('to_date', trans('to_date'), 'required');
            }

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/education/add'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'degree_name' => $this->input->post('degree_name'),
                    'institution_name' => $this->input->post('institution_name'),
                    'from_date' => $this->input->post('from_date'),
                    'details' => $this->input->post('details'),
                    'order' => $this->input->post('order', true),
                    'status' => $this->input->post('status'),
                    'to_date' => ($this->input->post('is_present'))?'0000-00-00':$this->input->post('to_date')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->education_model->edit($data, $update_id); // Update record
                } else {
                    $insert_id = $this->education_model->save($data); // Add record
                }

                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                    if ($update_id) { // record is in Update mode
                        redirect(base_url('user/education/edit/'.$update_id),'refresh');
                        exit;
                    }
                    redirect(base_url('user/education/add'),'refresh');
                    exit;
                }
                redirect(base_url('user/education'),'refresh');
                exit;
            }
        } else {

            $data['title'] = trans('add_degree');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/education_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    public function edit($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $data['education'] = $this->education_model->get_education_by_id($id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/education_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    public function delete($id)
    {
        $result = $this->education_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('user/education'), 'refresh');
        exit;

    }

}

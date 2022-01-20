<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Layouts
 */
class Layouts extends MY_Controller
{
    /**
     * Education constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/layout_model', 'layout_model');
    }

    /**
     * Default method for layouts selection
     * @param string $type
     */
    function index()
    {
        $user_id = $this->session->userdata('user_id');
        if($this->input->post('submit')){
            $this->form_validation->set_rules('layout_id', trans('select_layout'), 'required');
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/layouts'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'layout_id' => $this->input->post('layout_id')
                );
                $data = $this->security->xss_clean($data);
                $insert_id = $this->layout_model->save_user_layout($data); // Add record

                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                }
                redirect(base_url('user/layouts'),'refresh');
                exit;
            }
        }
        $package_type = $this->session->userdata('package_type');
        $data['user_layout_id'] = $this->layout_model->get_layout_by_user_id($user_id);
        $data['layouts'] = $this->layout_model->get_layouts($package_type); // passing pacakge type to load Free layouts, if package type is Free
       // print_array($data['layouts'], true);
        if ($data['user_layout_id'] == 0) {
            $data['user_layout_id'] = DEFAULT_LAYOUT_ID;
        }

        $data['title'] = trans('profile_layout');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/layout_add');
        $this->load->view('admin/includes/_footer', $data);
    }
}

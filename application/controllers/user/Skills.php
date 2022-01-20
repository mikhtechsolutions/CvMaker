<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Skills
 */
class Skills extends MY_Controller
{
    /**
     * Skills constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/skill_model', 'skill_model');
    }

    /**
     * Default method showing subskills form and subskills listing
     * @param string $type
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        $data['subskill_levels'] = skill_levels();
        $data['skills'] = $this->skill_model->get_skills_by_user_id($user_id);
        $data['subskills'] = $this->skill_model->get_subskills_by_user_id($user_id);

        $data['title'] = trans('user_skills');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/skills');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     *
     */
    public function add_skill(){

        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
            $user_id = $this->session->userdata('user_id');
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            $this->form_validation->set_rules('skill', trans('skill_name'), 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/skills/add_skill'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'name' => $this->input->post('skill'),
                    'slug' => str_slug(trim($this->input->post('skill', true))),
                    'order' => $this->input->post('order', true),
                    'status' => $this->input->post('status')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->skill_model->edit($data, $update_id);
                } else {
                    $insert_id = $this->skill_model->save($data);
                }


                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                    $this->session->set_flashdata('form_data', null);
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                    if ($update_id) {
                        redirect(base_url('user/skills/edit_skill/'.$update_id),'refresh');
                        exit;
                    }
                }

                redirect(base_url('user/skills/add_skill'),'refresh');
                exit;
            }
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['skills'] = $this->skill_model->get_skills_by_user_id($user_id);

            $data['title'] = trans('add_skill');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/skill_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * @param $id
     */
    public function edit_skill($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $data['skill'] = $this->skill_model->get_skill_by_id($id);
        $data['skills'] = $this->skill_model->get_skills_by_user_id($id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/skill_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete_skill($id)
    {
        $sub_skills = $this->skill_model->get_sub_skills_by_parent_id($id);
        if ($sub_skills) {
            $this->session->set_flashdata('errors', trans('subskills_exist_error'));
        } else {
            $result = $this->skill_model->delete($id);
            if($result) {
                $this->session->set_flashdata('success', trans('delete_success'));
            } else {
                $this->session->set_flashdata('success', trans('delete_error'));
            }

        }
        redirect(base_url('user/skills/add_skill'), 'refresh');
        exit;
    }

    /**
     * Add / Update subskill
     */
    public function add_subskill()
    {

        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
            $user_id = $this->session->userdata('user_id');// A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id');
            }
            $this->form_validation->set_rules('parent_id', trans('skill'), 'required');
            $this->form_validation->set_rules('subskill', trans('subskill_name'), 'trim|required');
            $this->form_validation->set_rules('level', trans('subskill_level'), 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/skills'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'name' => $this->input->post('subskill'),
                    'slug' => str_slug(trim($this->input->post('subskill', true))),
                    'parent_id' => $this->input->post('parent_id', true),
                    'skill_level' => $this->input->post('level', true),
                    'order' => $this->input->post('order', true),
                    'status' => $this->input->post('status')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->skill_model->edit($data, $update_id);
                } else {
                    $insert_id = $this->skill_model->save($data);
                }

                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                    $this->session->set_flashdata('form_data', null);
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                    if ($update_id) { // record is in Update mode
                        redirect(base_url('user/skills/edit_subskill/'.$update_id),'refresh');
                        exit;
                    }
                }
                redirect(base_url('user/skills'),'refresh');
                exit;
            }
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['skills'] = $this->skill_model->get_skills_by_user_id($user_id);

            $data['title'] = trans('user_skills');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/skills');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * Edit mode of subskill
     * @param $id
     */
    public function edit_subskill($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $user_id = $this->session->userdata('user_id');
        $data['subskill_levels'] = skill_levels();
        $data['subskill'] = $this->skill_model->get_sub_skill_by_id($id);
        $data['skills'] = $this->skill_model->get_skills_by_user_id($user_id);
        $data['subskills'] = $this->skill_model->get_subskills_by_user_id($user_id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/skills');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete_subskill($id)
    {
        $result = $this->skill_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('user/skills'), 'refresh');
        exit;

    }

}

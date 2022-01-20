<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Portfolio
 */
class Portfolio extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/portfolio_model', 'portfolio_model');
    }

    /**
     * Default method displaying list of projects
     * @param string $type
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        $data['portfolios'] = $this->portfolio_model->get_portfolios_by_user_id($user_id);

        $data['title'] = trans('user_portfolio');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/portfolio');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Add / Update Portfolio
     */
    public function add(){

        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
            $user_id = $this->session->userdata('user_id');
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            $this->form_validation->set_rules('project_name', trans('project_name'), 'trim|required');
            $this->form_validation->set_rules('cat_id', trans('category'), 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/portfolio/add'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'project_name' => $this->input->post('project_name'),
                    'project_url' => $this->input->post('project_url', true),
                    'from_date' => $this->input->post('from_date', true),
                    'cat_id' => $this->input->post('cat_id', true),
                    'details' => $this->input->post('details', true),
                    'order' => $this->input->post('order', true),
                    'status' => $this->input->post('status', true),
                    'to_date' => ($this->input->post('is_present'))?'0000-00-00':$this->input->post('to_date')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->portfolio_model->edit($data, $update_id);
                } else {
                    $insert_id = $this->portfolio_model->save($data);
                }


                if($insert_id){
                    // Project Image uploading
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
                            'upload_image_prefix' => "port_",
                            'redirect_on_error' => 'user/portfolio'
                        );

                        $up_load = upload_image($img_config);
                        if(!$up_load) {
                            $this->session->set_flashdata('errors', trans('upload_image_error'));
                            redirect(base_url('user/portfolio'));
                            exit;
                        }
                        $data = array(
                            'image' => $up_load['images'],
                            'thumb' => $up_load['thumb']
                        );
                    } else {
                        $this->session->set_flashdata('success', trans('save_success'));
                        redirect(base_url('user/portfolio'), 'refresh');
                    }
                    // ./Project Image uploading //

                    $result = $this->portfolio_model->edit($data, $insert_id);
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
                    redirect(base_url('user/portfolio/edit/'.$update_id),'refresh');
                    exit;
                } else if ($insert_id){
                    redirect(base_url('user/portfolio'), 'refresh');
                    exit;
                }
                redirect(base_url('user/portfolio/add/'),'refresh');
                exit;
            }
        } else {

            $data['cats']  = get_cats_list("portfolio_categories");

            $data['title'] = trans('add_portfolio');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/portfolio_add');
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
        $data['portfolio'] = $this->portfolio_model->get_portfolio_by_id($id);
        $data['cats']      = get_cats_list("portfolio_categories");

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/portfolio_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $result = $this->portfolio_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('user/portfolio'), 'refresh');
        exit;
    }

    /**
     * Add / Update portfolio categories
     */
    public function add_cat(){

        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
            $user_id = $this->session->userdata('user_id');
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            $this->form_validation->set_rules('name', trans('category_name'), 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/portfolio/add_cat'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'name' => $this->input->post('name'),
                    'status' => $this->input->post('status')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->portfolio_model->edit_cat($data, $update_id);
                } else {
                    $insert_id = $this->portfolio_model->save_cat($data);
                }


                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                    $this->session->set_flashdata('form_data', null);
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                }

                redirect(base_url('user/portfolio/add_cat'),'refresh');
                exit;
            }
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['cats'] = $this->portfolio_model->get_pf_cats_by_user_id($user_id);

            $data['title'] = trans('add_new_cat');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/add_pf_cat');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * Edit mode of portfolio category
     * @param $id
     */
    public function edit_cat($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $user_id = $this->session->userdata('user_id');
        $data['cat'] = $this->portfolio_model->get_cat_by_id($id);
        $data['cats'] = $this->portfolio_model->get_pf_cats_by_user_id($user_id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/add_pf_cat');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Delete portfolio category
     * @param $id
     */
    public function delete_cat($id)
    {
        $result = $this->portfolio_model->delete_cat($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('user/portfolio/add_cat'), 'refresh');
        exit;

    }
    

}

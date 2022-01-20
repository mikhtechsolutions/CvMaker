<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Blog
 */
class Blog extends MY_Controller
{
    /**
     * Blog constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/blog_model', 'blog_model');
    }

    /**
     * @param string $type
     * Default method of controller, listing all blogs in user's backend.
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        $data['posts'] = $this->blog_model->get_posts_by_user_id($user_id);

        $data['title'] = trans('user_blog');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/blog');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Add / Update blog post
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
            $this->form_validation->set_rules('cat_id', trans('category'), 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );

                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/blog/add'),'refresh');
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'slug' => $this->input->post('slug', true),
                    'tags' => $this->input->post('tags', true),
                    'description' => $this->input->post('description', true),
                    'cat_id' => $this->input->post('cat_id', true),
                    'status' => $this->input->post('status', true)
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->blog_model->edit($data, $update_id);
                } else {
                    $insert_id = $this->blog_model->save($data);
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
                            'upload_image_prefix' => "post_",
                            'redirect_on_error' => 'user/blog'
                        );

                        $up_load = upload_image($img_config);
                        if(!$up_load) {
                            $this->session->set_flashdata('errors', trans('upload_image_error'));
                            redirect(base_url('user/blog'));
                            exit;
                        }
                        $data = array(
                            'image' => $up_load['images'],
                            'thumb' => $up_load['thumb']
                        );
                    } else {
                        $this->session->set_flashdata('success', trans('save_success'));
                        redirect(base_url('user/blog'), 'refresh');
                    }
                    // ./Service Image uploading //

                    $result = $this->blog_model->edit($data, $insert_id);
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
                    redirect(base_url('user/blog/edit/'.$update_id),'refresh');
                    exit;
                } else if ($insert_id){
                    redirect(base_url('user/blog'), 'refresh');
                    exit;
                }

                redirect(base_url('user/blog/add'), 'refresh');
                exit;
            }
        } else {
            $data['cats']         = get_cats_list();

            $data['title']        = trans('add_blog');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/blog_add');
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
        $data['post'] = $this->blog_model->get_post_by_id($id);
        $data['cats']         = get_cats_list();

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/blog_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $result = $this->blog_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('user/blog'), 'refresh');
        exit;
    }

    /**
     * Add / Update new blog category
     */
    public function add_cat()
    {

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
                redirect(base_url('user/blog/add_cat'),'refresh');

            } else {
                $data = array(
                    'user_id' => $user_id,
                    'name' => $this->input->post('name'),
                    'status' => $this->input->post('status')
                );

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->blog_model->edit_cat($data, $update_id); // Update record
                } else {
                    $insert_id = $this->blog_model->save_cat($data); // Add new record
                }

                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                    $this->session->set_flashdata('form_data', null);
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                }

                redirect(base_url('user/blog/add_cat'),'refresh');
                exit;
            }
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['cats'] = $this->blog_model->get_cats_by_user_id($user_id);

            $data['title'] = trans('add_new_cat');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/cat_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * Edit blog category
     * @param $id
     */
    public function edit_cat($id)
    {
        $data = array();
        $data['update_id'] = $id;
        $user_id = $this->session->userdata('user_id');
        $data['cat'] = $this->blog_model->get_cat_by_id($id);
        $data['cats'] = $this->blog_model->get_cats_by_user_id($user_id);

        $data['title'] = trans('update');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/cat_add');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Delete blog category
     * @param $id
     */
    public function delete_cat($id)
    {
        $result = $this->blog_model->delete_cat($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }
        
        redirect(base_url('user/blog/add_cat'), 'refresh');
        exit;

    }

}

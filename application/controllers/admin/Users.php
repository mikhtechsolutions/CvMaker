<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site
 * All operations are for Admin user to perform CRUD on overall site settings and data.
 */
class Users extends MY_Controller {

    /**
     * Site constructor.
     */
    public function __construct()
    {
        parent::__construct();
        auth_check(true); // checks the authenticated user. True parameters ensures that user is Admin
        $this->load->library('datatable');
        $this->load->model('site_model', 'site_model');
        $this->load->model('auth_model', 'auth_model');
        $this->load->model('admin/package_model', 'package_model');
    }

    /**
     * Users listing for Admin user.
     */
    public function index()
    {
        //$data['users'] = $this->site_model->get_all_users();

        $data['title'] = trans('site_users');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/users');
        $this->load->view('admin/includes/_footer');
    }

    public function recent()
    {
        $data['users'] = $this->site_model->get_all_users('recent');

        $data['title'] = trans('recent_users');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/users');
        $this->load->view('admin/includes/_footer');
    }

    public function active()
    {
        $data['users'] = $this->site_model->get_all_users('active');

        $data['title'] = trans('active_users');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/users');
        $this->load->view('admin/includes/_footer');
    }

    public function inactive()
    {
        $data['users'] = $this->site_model->get_all_users('inactive');

        $data['title'] = trans('inactive_users');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/users');
        $this->load->view('admin/includes/_footer');
    }

    /**
     * Add / Update user info by the Admin
     * @param null $id
     */
    public function add_user($id = null)
    {
        if($this->input->post('submit')){
            $update_id = 0;
            if($this->input->post('update_id')) {
                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update
            }

            if (!$update_id) {
                $this->form_validation->set_rules('username', trans('username'), 'trim|is_unique[users.username]|required');
                $this->form_validation->set_rules('email', trans('email'), 'trim|valid_email|is_unique[users.email]|required');
            }

            $this->form_validation->set_rules('firstname', trans('first_name'), 'trim|required');
            $this->form_validation->set_rules('lastname', trans('last_name'), 'trim|required');
            $this->form_validation->set_rules('password', trans('password'), 'trim|required|min_length[8]');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                if ($update_id) {
                    $this->session->set_flashdata('user_edit_id', $update_id);
                }
                redirect(base_url('admin/users/add_user'),'refresh');
            } else {

                $data = [];

                if (!$update_id) { // first time user data entry
                    $data = array(
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'is_active' => 0,
                        'is_verify' => 0,
                        'token' => md5(rand(0,1000))
                    );
                }

                $data['firstname'] 		= $this->input->post('firstname');
                $data['lastname']	 	= $this->input->post('lastname');
                $data['password'] 		=  password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $data['phone'] 			= $this->input->post('phone');
                $data['address'] 		= $this->input->post('address');

                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                if ($update_id) {
                    $insert_id = $this->auth_model->update_user($data, $update_id);
                } else {
                    $insert_id = $this->auth_model->register($data);
                }

                if($insert_id){
                    if ($update_id){
                        $this->session->set_flashdata('success', trans('update_success'));
                    } else {
                        // enter package details for new user
                        $usr_pkg = array(
                            'user_id' => $insert_id,
                            'package_id' => 1,
                            'expiry_date' => '0000-00-00'
                        );
                        $pkg_insert_id = $this->package_model->assign_package($usr_pkg); // Adding in DB
                        if (!$pkg_insert_id) {
                            $this->session->set_flashdata('errors', trans('package_save_error'));
                            redirect(base_url('admin/users'));
                        }
                        $this->session->set_flashdata('success', trans('save_success'));
                    }
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                }
                redirect(base_url('admin/users'), 'refresh');
                exit;
            }
        } else {
            $data['update_id'] = isset($id)?$id:null;

            if ($this->session->flashdata('user_edit_id')) {
                $data['update_id'] = $this->session->flashdata('user_edit_id');
            }

            $data['user'] = $this->auth_model->get_user_by_id($data['update_id']);

            $data['title'] = trans('add_new_user');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('admin/user_add');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * Active / Inactive a user from user listing by Admin (Ajax call)
     * @return bool
     */
    public function change_status()
    {
        if($this->input->post()){
            $post = $this->input->post('data');
            $data = array(
                'is_active' => $post['status']
            );
            if ($post['status']) {
                $data['is_verify'] = 1;
            }
            $id = $post['id'];
            $res = $this->site_model->change_user_status($data, $id);
            if ($res){
                echo json_encode(array('success' => 1));
                exit;
            }
            return false;
        }
    }

    public function user_datatable()
    {
        $records = $this->site_model->get_all_users_datatable();
        $data = array();

        $i=0;
        foreach ($records['data']  as $row)
        {
            $status = ($row['is_active'] == 1)? 'checked': '';
            $data[]= array(
                ++$i,
               // "<img width='100px' src='".($row['thumb'] != '')?base_url($row['thumb']):base_url('/assets/dist/img/no-image.jpg').">",
                ($row['thumb'] != '')?base_url($row['thumb']):base_url('/assets/dist/img/no-image.jpg'),
                $row['username'],
                $row['email'],
                $row['phone'],
                date_time($row['created_date']),
                "<a target='_blank' class='btn btn-info btn-sm text-white' href='".base_url($row['username'])."'><i
                            class='fa fa-eye'></i>".trans('view_profile')."</a>",
                "<input class='tgl_checkbox tgl-ios' value='".$row['id']."' id='user_status_".$row['id']."' type='checkbox'".$status." /> 
                <label for='user_status_".$row['id']."'></label>",

                '<a title="'.trans('edit').'" class="update btn btn-sm btn-warning" href="'.base_url('admin/users/add_user/'.html_escape($row['id'])).'">
                <i class="fa fa-pencil-square-o"></i></a>
                <a title="'.trans('delete').'" class="delete btn btn-sm btn-danger delete_item" data-link="'.base_url('admin/users/delete/'.html_escape($row['id'])).'" data-id="'.html_escape($row['id']).'" href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> <i class="fa fa-trash-o"></i></a>'
            );
        }
        $records['data']=$data;
        echo json_encode($records);
    }

    public function delete($id= '')
    {
        $result = $this->db->select('image,thumb')->where('id' , $id)->get('users')->row_array();
        unlink($result['image']);
        unlink($result['thumb']);

        $this->db->where('id' , $id)->delete('users');

        $this->session->set_flashdata('success',trans('update_success'));
        redirect(base_url('admin/users'));

    }

}

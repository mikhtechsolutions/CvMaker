<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site
 * All operations are for Admin user to perform CRUD on overall site settings and data.
 */
class Contact extends MY_Controller {

    /**
     * Site constructor.
     */
    public function __construct()
    {
        parent::__construct();
        auth_check(false); // checks the authenticated user. True parameters ensures that user is Admin
        $this->load->library('datatable');
        $this->load->model('site_model', 'site_model');
        $this->load->model('user/contact_model', 'contact_model');
    }

    /**
     *
     */
    function index()
    {
        //$user_id = $this->session->userdata('user_id');
        //$data['contacts'] = $this->contact_model->get_contacts_by_user_id($user_id);

        $data['title'] = trans('admin_contact_msg');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/contact');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete_contact_message($id)
    {
        $result = $this->contact_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('admin/contact'), 'refresh');
        exit;

    }

    public function contacts_dt()
    {
        $user_id = $this->session->userdata('user_id');
        $records = $this->contact_model->get_all_contacts_datatable($user_id, true);
        $data = array();

        $i=0;
        $del_url = base_url('admin/contact/delete_contact_message/');
        foreach ($records['data']  as $row)
        {

            $data[]= array(
                ++$i,
                $row['name'],
                $row['subject'],
                $row['email'],
                $row['message'],
                date_time($row['created_date']),
                '<a title="Delete" class="delete btn btn-sm btn-danger delete_item" data-link="'.$del_url.html_escape($row["id"]).'" data-id="'.html_escape($row["id"]).'"  
                    href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> 
                    <i class="fa fa-trash-o"></i></a>'
            );
        }
        $records['data']=$data;
        echo json_encode($records);
    }

}

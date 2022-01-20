<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Contact
 */
class Contact extends MY_Controller
{
    /**
     * Contact constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/contact_model', 'contact_model');
    }

    /**
     * Default method listing contact message for user.
     * @param string $type
     */
    function index($type='')
    {
        //$user_id = $this->session->userdata('user_id');
        //$data['contacts'] = $this->contact_model->get_contacts_by_user_id($user_id);

        $data['title'] = trans('user_messages');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/contact');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $result = $this->contact_model->delete($id);
        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }
        
        redirect(base_url('user/contact'), 'refresh');
        exit;

    }

}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site
 * All operations are for Admin user to perform CRUD on overall site settings and data.
 */
class Dashboard extends MY_Controller {

    /**
     * Site constructor.
     */
    public function __construct()
    {
        parent::__construct();
        auth_check(true); // checks the authenticated user. True parameters ensures that user is Admin
        $this->load->model('site_model', 'site_model');
    }

    /**
     * Default method of controller, displaying Dashboard of Admin
     */
    public function index()
    {
        $data['total_users'] = $this->site_model->count_all_users();
        $data['active_users'] = $this->site_model->get_active_users();
        $data['inactive_users'] = $this->site_model->get_deactive_users();
        $data['recent_users'] = $this->site_model->get_recent_users();

        $data['title'] = trans('label_dashboard');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/includes/_footer');
    }

}

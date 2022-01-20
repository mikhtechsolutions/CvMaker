<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Profile
 * This class display all information at Public profile view page of user
 */
class Home extends MY_Controller
{
    /**
     * Profile constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('mailer');
        $this->load->helper('email_helper');
        $this->load->model('site_model', 'site_model');
        $this->load->model('user/profile_model', 'profile_model');
        $this->load->model('user/service_model', 'service_model');
        $this->load->model('user/appoint_model', 'appoint_model');
        $this->load->model('user/contact_model', 'contact_model');
        $this->load->model('admin/package_model', 'package_model');

    }

    /**
     * Default method, which display site home page
     */
    function index()
    {
        $data['shots'] = $this->site_model->get_screen_shots(1);
        $admin = $this->site_model->get_admin_user_id();
        $data['features'] = $this->service_model->get_services_by_user_id($admin->id, 1);
        $data['feature_count'] = count($data['features']);
        $pf = $this->package_model->get_packages_features(null, true);
        $pkgs_array = [];
        $i=0;
        foreach ($pf as $pkg) {
            $pkgs_array[$pkg->id]['features'][] = $pkg;
            $pkgs_array[$pkg->id]['package_id'] = $pkg->id;
            $pkgs_array[$pkg->id]['package_name'] = $pkg->name;
            $pkgs_array[$pkg->id]['package_thumb'] = $pkg->thumb;
            $pkgs_array[$pkg->id]['package_num_days'] = $pkg->num_days;
            $pkgs_array[$pkg->id]['package_price'] = $pkg->price;
            $pkgs_array[$pkg->id]['package_type'] = package_type_label($pkg->type);
        }

        // print_array($pkgs_array, true);
        $data['packages'] = $pkgs_array;

        $this->load->view('themes/main_header', $data);
        $this->load->view('themes/main');
        $this->load->view('themes/main_footer');
    }

    /**
     * Sending contact message from site landing page or user's profile page: Ajax call
     */
    public function send_contact_message()
    {
        if($this->input->post()){
            $user_id        = $this->input->post('user_id');
            $username       = $this->input->post('username');
            $mail_to_admin  = $this->input->post('mail_to_admin');
            $email          = $this->input->post('email');
            $name           = $this->input->post('name');
            $subject        = $this->input->post('subject');
            $message        = $this->input->post('message');


            $this->form_validation->set_rules('name', trans('name'), 'trim|required');
            $this->form_validation->set_rules('email', trans('Email'), 'trim|valid_email|required');
            $this->form_validation->set_rules('subject', trans('subject'), 'trim|required');
            $this->form_validation->set_rules('message', trans('message'), 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                echo json_encode(array('msg' => $data['errors']));
                exit;
            } else {

                $admin = '';
                if ($mail_to_admin) { //  set User ID  differently, i.e., ADMIN's id and email
                    $admin  = $this->profile_model->get_admin();
                    $user_id = $admin->id;
                }

                $data = array(
                    'user_id' => $user_id,
                    'name' => $name,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message
                );
                $data = $this->security->xss_clean($data);
                $insert_id = 0;

                $insert_id = $this->contact_model->send_contact_message($data);

                if($insert_id){
                    $to_email = '';
                    $name     = '';

                    if($mail_to_admin) {
                        $to_email   = $this->general_settings['admin_email']; // or $admin->email?
                        $name       = $admin->firstname . ' ' . $admin->lastname;
                    } else {
                        $user = $this->profile_model->user_by_id($user_id);
                        $to_email = $user->email;
                        $name = $user->firstname . ' ' . $user->lastname;
                    }

                    $body = $this->mailer->Tpl_Contact_Message($name, $email, $data['message']);
                    $this->load->helper('email_helper');
                    $to = $to_email;
                    $subject = $data['subject'];
                    $message =  $body ;
                    //$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
                    $email = true;
                    if ($email) {
                        echo json_encode(array('success' => 1));
                        exit;
                    } else {
                        echo json_encode(array('msg' => trans('send_mail_error')));
                        exit;
                    }
                } else {
                    echo json_encode(array('msg' => trans('save_error')));
                    exit;
                }
            }
        } else {
            echo trans('no_msg_error'); exit;
        }
    }

    public function site_lang($site_lang) {
        $language_data = array(
            'site_lang' => $site_lang
        );

        $this->session->set_userdata($language_data);
        if ($this->session->userdata('site_lang')) {
            //echo 'user session language is = '.$this->session->userdata('site_lang');
        }
        redirect($_SERVER['HTTP_REFERER']);

        exit;
    }

    //  Dynamic Pages
    public function page($slug = '')
    {
        $data['show_login_menu_only'] = true;

        $data['body'] = $this->site_model->get_page_by_slug($slug);

        if($data['body']){

            $data['title'] = $data['body']['title'];
            $data['meta_description'] = $data['body']['description'];
            $data['keywords'] = $data['body']['keywords'];
            $this->load->view('themes/main_header', $data);
            $this->load->view('themes/blank_page', $data);
            $this->load->view('themes/main_footer');
        }
        else{
            echo "page not found";
        }
    }
}

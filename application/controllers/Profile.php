<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Profile
 * This class display all information at Public profile view page of user
 */
class Profile extends MY_Controller
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
        $this->load->model('user/experience_model', 'experience_model');
        $this->load->model('user/skill_model', 'skill_model');
        $this->load->model('user/service_model', 'service_model');
        $this->load->model('user/education_model', 'education_model');
        $this->load->model('user/portfolio_model', 'portfolio_model');
        $this->load->model('user/testimonial_model', 'testimonial_model');
        $this->load->model('user/appoint_model', 'appoint_model');
        $this->load->model('user/contact_model', 'contact_model');
        $this->load->model('user/blog_model', 'blog_model');
        $this->load->model('user/layout_model', 'layout_model');
        $this->load->model('user/language_model', 'language_model');
        $this->load->model('user/reference_model', 'reference_model');
        $this->load->model('user/client_model', 'client_model');
        $this->load->model('user/interest_model', 'interest_model');
        $this->load->model('user/award_model', 'award_model');
        $this->load->model('admin/package_model', 'package_model');

    }

    /**
     * Default method, which display all the information of user at public profile page
     * @param null $username
     */
    function index($username=null)
    {
        if (!$this->general_settings['is_show_user_profile']) { // User must be logged in to view another user's public profile page
            $ci =& get_instance();
            if(!$ci->session->has_userdata('user_id')){
                $this->session->set_flashdata('errors', trans('must_login_msg'));
                redirect(base_url('auth/login'));
            }
        }

        if ($username) {
            $data = [];
            $user_id = 0;
            $user = $this->profile_model->get_user_by_username($username);
            if ($user) {
                $data['user_id'] = $user_id = $user->id;
            } else {
                echo 'Invalid user name';
                exit;
            }
            /*$package = $this->package_model->get_package_by_user_id($user_id); // checking package expiry
            if ($package && $package->type != 'F') {
                if ($package->expiry == -1) { // user package has expired, you can't see his/her public profile

                }
            } else if (!$package){
                $this->session->set_flashdata('errors', trans('package_not_sub'));
                redirect(base_url('auth/login'));
            }*/

            $data['username'] = $username;
            $data['about'] = $user;
            $data['experiences'] = $this->experience_model->get_experience_by_user_id($user_id, 'from_date', 'DESC', 1);
            $subskills = $this->skill_model->get_subskills_by_user_id($user_id, 1);
            // grouping skills
            $skills = [];
            foreach ($subskills as $subskill) {
                $skills[$subskill->parent_skill][] = $subskill;
            }
            $data['skills'] = $skills;
            // ./grouping skills
            $data['services'] = $this->service_model->get_services_by_user_id($user_id, 1);
            $data['educations'] = $this->education_model->get_education_by_user_id($user_id, 'from_date', 'DESC', 1);
            $data['languages'] = $this->language_model->get_language_by_user_id($user_id, 'order', 'asc', 1);
            $data['references'] = $this->reference_model->get_reference_by_user_id($user_id, 'order', 'asc', 1);
            $data['clients'] = $this->client_model->get_clients_by_user_id($user_id, 1);
            $data['interests'] = $this->interest_model->get_interest_by_user_id($user_id, 'order', 'asc', 1);
            $data['awards'] = $this->award_model->get_award_by_user_id($user_id, 'order', 'asc', 1);

            // creating data for portfolio
            $pfs = $this->portfolio_model->get_portfolios_by_user_id($user_id, 1);
            // ./creating data for portfolio
            $pf_arr = [];
            foreach ($pfs as $pf) {
                $pf_arr[$pf->cat_name][] = $pf;
            }
            $data['portfolios'] = $pf_arr;
            // creating data for Blog posts
            $posts = $this->blog_model->get_posts_by_user_id($user_id, 1);

            $post_arr = [];

            foreach ($posts as $post) {
                $post_arr[$post->cat_name][] = $post;
            }

            $data['blogs'] = $post_arr;
            // ./creating data for Blog posts

            $data['testimonials'] = $this->testimonial_model->get_testimonials_by_user_id($user_id, 1);
            $data['app_days'] = $this->appoint_model->get_app_days_by_user_id($user_id);
            $data['week_days'] = get_days();
            $data['colors_array'] = array_color_codes();
            $data['char_limit'] = 100;

            $user_layout_id = $this->layout_model->get_layout_by_user_id($user_id);
            if (!$user_layout_id) { // user layout is not set in DB, so set to Default
                $user_layout_id = DEFAULT_LAYOUT_ID;
            }
            $data['user_layout_id'] = $user_layout_id;

            $data['show_users_link'] = false;
            $ci =& get_instance();
            if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
                $data['show_users_link'] = true;
            }

            $this->load->view('themes/layouts/'.$user_layout_id.'/_site_header', $data);
            $this->load->view('themes/layouts/'.$user_layout_id.'/main', $data);
            $this->load->view('themes/layouts/'.$user_layout_id.'/_site_footer');

        } 

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
            $this->form_validation->set_rules('email', trans('email'), 'trim|valid_email|required');
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

    /**
     * Setting an appointment with user from public profile page.
     */
    public function set_appointment()
    {

        if($this->input->post()){
            $user_id = $this->input->post('user_id'); // to whom email has to be sent
            $username = $this->input->post('username');

            $this->form_validation->set_rules('title', trans('title'), 'trim|required');
            $this->form_validation->set_rules('book_date', trans('booking_date'), 'trim|required');
            $this->form_validation->set_rules('book_time_start', trans('booking_start_time'), 'required');
            $this->form_validation->set_rules('book_time_end', trans('booking_end_time'), 'required');
            $this->form_validation->set_rules('email', trans('email'), 'trim|valid_email|required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                echo json_encode(array('msg' => $data['errors']));
                exit;
            } else {
                $data = array(
                    'user_id' => $user_id,
                    'title' => $this->input->post('title'),
                    'book_date' => $this->input->post('book_date'),
                    'book_time_start' => $this->input->post('book_time_start'),
                    'book_time_end' => $this->input->post('book_time_end'),
                    'email' => $this->input->post('email')
                );
                $data = $this->security->xss_clean($data);
                $insert_id = 0;
                $insert_id = $this->appoint_model->save($data);

                if($insert_id){
                    echo json_encode(array('success' => 1));
                    exit;
                } else {
                    echo json_encode(array('msg' => trans('save_error')));
                    exit;
                }
            }
        } else {
            echo trans('nothing_to_save');
            exit;
        }
    }

}

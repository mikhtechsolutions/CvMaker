<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**

 * Class Site

 * All operations are for Admin user to perform CRUD on overall site settings and data.

 */

class Settings extends MY_Controller {

    /**

     * Site constructor.

     */

    public function __construct()

    {

        parent::__construct();

        auth_check(true); // checks the authenticated user. True parameters ensures that user is Admin

        $this->load->model('site_model', 'site_model');

        $this->load->model('user/profile_model', 'profile_model');

    }



    /**

     * Site setting

     */

    public function index()

    {

        $user_id = $this->session->userdata('user_id');

        if(!($this->session->flashdata('contact_tab'))  && !($this->session->flashdata('social_tab')) && !($this->session->flashdata('general_tab'))

            && !($this->session->flashdata('payment_tab')) && !($this->session->flashdata('profile_tab'))) {

            $this->session->set_flashdata('update_tab', 'active');

        }

        $data['site_data']  = $this->site_model->get_site_settings();

        $data['user_data']  = $this->site_model->get_user_by_id($user_id);

        $data['countries'] = countries_list();



        $data['title'] = trans('site_settings');

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/settings');

        $this->load->view('admin/includes/_footer');

    }



    /**

     * Update site settings by Admin user.

     */

    public function update()

    {

        if($this->input->post('submit')){

            $this->session->set_flashdata('form_data', $this->input->post());

            $update_tab = $this->input->post('update_tab');

            $update_id    = $this->input->post('update_id');

            $user_id      = $this->session->userdata('user_id');



            $data = '';

            if ($update_tab === 'info') { // General Settings Tab

                $this->form_validation->set_rules('site_name', trans('site_name'), 'trim|required');

                $this->form_validation->set_rules('site_title', trans('site_title'), 'trim|required');

                $this->form_validation->set_rules('admin_email', trans('admin_email'), 'trim|valid_email[users.email]|required');



                if ($this->form_validation->run() == FALSE) {

                    $data = array(

                        'errors' => validation_errors()

                    );

                    $this->session->set_flashdata('errors', $data['errors']);

                    redirect(base_url('admin/settings'),'refresh');

                } else {

                    $data = array(

                        'site_name' => $this->input->post('site_name', true),

                        'site_title' => $this->input->post('site_title', true),

                        'admin_email' => $this->input->post('admin_email', true),

                        'copyright' => $this->input->post('copyright', true),

                        'description' => $this->input->post('description', true),

                        'footer_about' => $this->input->post('footer_about', true)

                    );



                    $this->session->set_flashdata('update_tab','active');



                    // Photo uploading //

                    // insert photos

                    if($_FILES['favicon']['name'] != ''){

                        // set image upload parameters

                        $img_config = array (

                            'user_id' => $user_id,

                            'record_id' => $update_id,

                            'resize_width_limit' => 400,

                            'upload_path'  => "./uploads/images/",

                            'allowed_types'=> 'gif|jpg|png|jpeg',

                            'max_size'     => '2048', // The maximum size (in kilobytes)

                            'max_width'    => '2048',

                            'max_height'   => '1600',

                            'overwrite'    => true,

                            'form_field_name' => "favicon",

                            'upload_image_prefix' => "favicon_",

                            'redirect_on_error' => 'admin/settings'

                        );



                        $up_load = upload_image($img_config);

                        if(!$up_load) {

                            $this->session->set_flashdata('errors', trans('upload_image_error'));

                            redirect(base_url('admin/settings'));

                            exit;

                        }

                        $data['favicon'] = $up_load['thumb'];

                    }



                    if($_FILES['logo']['name'] != ''){

                        // set image upload parameters

                        $img_config = array (

                            'user_id' => $user_id,

                            'record_id' => $update_id,

                            'resize_width_limit' => 400,

                            'upload_path'  => "./uploads/images/",

                            'allowed_types'=> 'gif|jpg|png|jpeg',

                            'max_size'     => '2048', // The maximum size (in kilobytes)

                            'max_width'    => '2048',

                            'max_height'   => '1600',

                            'overwrite'    => true,

                            'form_field_name' => "logo",

                            'upload_image_prefix' => "logo_",

                            'redirect_on_error' => 'admin/settings'

                        );



                        $up_load = upload_image($img_config);

                        if(!$up_load) {

                            $this->session->set_flashdata('errors', trans('upload_image_error'));

                            redirect(base_url('admin/settings'));

                            exit;

                        }

                        $data['logo'] = $up_load['images'];

                    }

                    // ./Photo uploading //

                }



            } else if($update_tab === 'contact'){ // Email Settings Tab

                $data = array(

                    'email_from' => $this->input->post('email_from', true),

                    'smtp_host' => $this->input->post('smtp_host', true),

                    'smtp_port' => $this->input->post('smtp_port', true),

                    'smtp_user' => $this->input->post('smtp_user', true),

                    'smtp_pass' => $this->input->post('smtp_pass', true)

                );



                $this->session->set_flashdata('contact_tab','active');



            } else if($update_tab === 'social') {

                $data = array(

                    'facebook' => $this->input->post('facebook', true),

                    'twitter' => $this->input->post('twitter', true),

                    'linkedin' => $this->input->post('linkedin', true),

                    'instagram' => $this->input->post('instagram', true)

                );



                $this->session->set_flashdata('social_tab','active');



            } else if($update_tab === 'general') { // Configuration Tab

                $data = array(

                    'enable_registration' => $this->input->post('enable_registration', true),

                    'enable_captcha' => $this->input->post('enable_captcha', true),

                    'is_show_user_profile' => $this->input->post('is_show_user_profile', true),

                    'recaptcha_site_key' => $this->input->post('recaptcha_site_key', true),

                    'recaptcha_secret_key' => $this->input->post('recaptcha_secret_key', true),

                    'recaptcha_lang' => $this->input->post('recaptcha_lang', true)

                );



                $this->session->set_flashdata('general_tab','active');

            } else if($update_tab === 'payment') {

                $data = array(

                    'paypal_is_sandbox' => $this->input->post('paypal_is_sandbox', true),

                    'paypal_sandbox_url' => $this->input->post('paypal_sandbox_url', true),

                    'paypal_live_url' => $this->input->post('paypal_live_url', true),

                    'paypal_email' => $this->input->post('paypal_email', true),

                    'paypal_cur_code' => $this->input->post('paypal_cur_code', true),

                    'stripe_secret_key' => $this->input->post('stripe_secret_key', true),

                    'stripe_publish_key' => $this->input->post('stripe_publish_key', true)

                );

                $this->session->set_flashdata('payment_tab','active');

            } else if ($update_tab === 'profile') {

                $password = $this->input->post('password');

                $this->form_validation->set_rules('firstname', trans('first_name'), 'trim|required');

                $this->form_validation->set_rules('lastname', trans('last_name'), 'trim|required');

                if (isset($password) && !empty($password)) {

                    $this->form_validation->set_rules('password', trans('password'), 'trim|required|min_length[8]');

                    $this->form_validation->set_rules('confirm_password', trans('confirm_pass'), 'trim|required|matches[password]');

                }

                $this->form_validation->set_rules('email', trans('email'), 'trim|valid_email[users.email]|required');



                $this->session->set_flashdata('profile_tab','active');



                if ($this->form_validation->run() == FALSE) {

                    $data = array(

                        'errors' => validation_errors()

                    );

                    $this->session->set_flashdata('errors', $data['errors']);

                    redirect(base_url('admin/settings'),'refresh');

                } else {

                    $data = array(

                        'firstname' => $this->input->post('firstname'),

                        'lastname' => $this->input->post('lastname'),

                        //'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),

                        'email' => $this->input->post('email'),

                        'country' => $this->input->post('country'),

                        'city' => $this->input->post('city'),

                        'phone' => $this->input->post('phone'),

                        'skype' => $this->input->post('skype'),

                        'whatsapp' => $this->input->post('whatsapp')

                    );

                    if (isset($password) && !empty($password)) {

                        $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

                    }



                    // insert photos

                    if($_FILES['photo']['name'] != ''){

                        // set image upload parameters

                        $img_config = array (

                            'user_id' => $user_id,

                            'record_id' => $update_id,

                            'resize_width_limit' => 400,

                            'upload_path'  => "./uploads/images/",

                            'allowed_types'=> 'gif|jpg|png|jpeg',

                            'max_size'     => '2048', // The maximum size (in kilobytes)

                            'max_width'    => '2048',

                            'max_height'   => '1600',

                            'overwrite'    => true,

                            'form_field_name' => "photo",

                            'upload_image_prefix' => "photo_",

                            'redirect_on_error' => 'admin/settings'

                        );



                        $up_load = upload_image($img_config);

                        if(!$up_load) {

                            $this->session->set_flashdata('errors', trans('upload_image_error'));

                            redirect(base_url('admin/settings'));

                            exit;

                        }

                        $data['image'] = $up_load['images'];

                        $data['thumb'] = $up_load['thumb'];

                    }

                    // ./Photo uploading //



                    $result = $this->profile_model->edit($data, $user_id);

                    if($result) {

                        $this->session->set_flashdata('success', trans('update_success'));

                        redirect(base_url('admin/settings'));

                        exit;

                    }



                }

            }


            $data = $this->security->xss_clean($data);

            $result = $this->site_model->edit_site_settings($data, $update_id);

            if($result) {

                $this->session->set_flashdata('success', trans('update_success'));

            } else {

                $this->session->set_flashdata('errors', trans('update_error'));

            }

            redirect(base_url('admin/settings'));

            exit;


        } else {

            $this->session->set_flashdata('errors', trans('invalid_user'));

            redirect(base_url('auth/login'),'refresh');

        }

    }

}


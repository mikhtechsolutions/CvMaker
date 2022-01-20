<?php defined('BASEPATH') OR exit('No direct script access allowed');

/***
 * Class Auth
 * Controller for authentication related tasks e.g, login, register, forgot password, etc.
 */
class Auth extends MY_Controller {

	/**
	 * Auth constructor.
	 */
	public function __construct()
	{

		parent::__construct();
		$this->load->library('mailer');
		$this->load->helper('email_helper');
		$this->load->model('auth_model', 'auth_model');
		$this->load->model('admin/package_model', 'package_model');
		$this->load->model('site_model', 'site_model');
		$this->load->model('user/layout_model', 'layout_model');
		$settings['general_settings'] = $this->site_model->get_site_settings();
		$this->general_settings = $settings['general_settings'];
	}

	/**
	 * Default method
	 */
	public function index(){

		if($this->session->has_userdata('user_id')){
			redirect('user/profile');
		}
		else{
			redirect('auth/login');
		}
	}

	/**
	 * Login a user into the system.
	 */
	public function login()
	{
		if($this->input->post('submit')){
			$this->session->set_flashdata('form_data', $this->input->post());
			$this->form_validation->set_rules('username', trans('username'), 'trim|required');
			$this->form_validation->set_rules('password', trans('password'), 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('auth/login'));
			} else {
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				$result = $this->auth_model->login($data);
				if($result){
					$user_data = [];
					$user_data = array(
						'user_id' => $result['id'],
						'username' => $result['username'],
						'firstname' => $result['firstname'],
						'lastname' => $result['lastname'],
						'thumb' => $result['thumb']
					);

					if($result['is_verify'] == 0){
						$this->session->set_flashdata('error', trans('verify_email'));
						redirect(base_url('auth/login'));
						exit();
					}
					if($result['is_active'] == 0){
						$this->session->set_flashdata('error', trans('account_disabled_msg'));
						redirect(base_url('auth/login'));
						exit();
					}

					if($result['is_admin'] == 1){
						$user_data['is_admin'] = 1;
						$this->session->set_userdata($user_data);
						redirect(base_url('admin/dashboard'), 'refresh');
					} else {
						$user_data['is_admin'] = 0;
						// Check package info here
						$package = $this->package_model->get_package_by_user_id($result['id']); // checking
						if ($package && $package->type != 'F') {
							if ($package->expiry == 0) { // Last day of expiry
								$this->session->set_flashdata('errors', trans('package_last_day_msg'));
								redirect(base_url('user/profile'), 'refresh');
							} else if ($package->expiry == -1) {
								$this->session->set_flashdata('errors', trans('package_expired_msg'));
								$usr_pkg = array(
									'user_id' => $result['id'],
									'package_id' => DEFAULT_PACKAGE_ID,
									'expiry_date' => ''
								);
								$insert_id = $this->package_model->assign_package($usr_pkg); // Adding in DB for Free package
								if (!$insert_id) {
									$this->session->set_flashdata('errors', trans('package_save_error'));
									redirect(base_url('auth/login'));
								}
								$layout_data = array(
									'user_id' => $result['id'],
									'layout_id' => DEFAULT_LAYOUT_ID
								);
                                $insert_id = $this->layout_model->save_user_layout($layout_data); // Setting default layout
                                if (!$insert_id) {
                                	$this->session->set_flashdata('errors', trans('layout_set_error'));
                                	redirect(base_url('auth/login'));
                                }

                                $data = array(
                                	'is_premium' =>  0	);
                                $update = $this->auth_model->update_user($data, $result['id']);
                                if (!$update) {
                                	$this->session->set_flashdata('errors', trans('free_user_error'));
                                	redirect(base_url('auth/login'));
                                }
								//redirect(base_url('user/profile'));
                            }
                        } else if (!$package){
                        	$this->session->set_flashdata('errors', trans('package_not_sub'));
                        	redirect(base_url('auth/login'));
                        }
						$package = $this->package_model->get_package_by_user_id($result['id']); // getting latest package info to put in Session data
						if ($package){
							$user_data['package_id'] 			= $package-> id;
							$user_data['package_name'] 			= $package-> name;
							$user_data['package_type'] 			= $package-> type;
							$user_data['package_price'] 		= $package-> price;
							$user_data['package_num_days'] 		= $package-> num_days;
							$user_data['package_is_active'] 	= $package-> is_active;
							$user_data['package_package_id'] 	= $package-> package_id;
							$user_data['package_expiry_date'] 	= $package-> expiry_date;
							$user_data['package_remaining_days'] = $package-> remaining_days;
							$user_data['package_expiry'] 		= $package-> expiry;
						} else {
							$this->session->set_flashdata('errors', trans('package_info_error'));
							redirect(base_url('auth/login'));
						}
						$this->session->set_userdata($user_data); // setting session data
						// ./
						redirect(base_url('user/profile'), 'refresh');
					}

				}
				else{
					$this->session->set_flashdata('errors', trans('invalid_user_pass'));
					redirect(base_url('auth/login'));
				}
			}
		} else {
			$data['navbar'] = false;
			$data['sidebar'] = true;
			$data['footer'] = false;

			$data['title'] = trans('login');
			$this->load->view('themes/main_header', $data);
			$this->load->view('auth/login');
			$this->load->view('themes/main_footer', $data);
		}
	}

	/**
	 * Register a new user into the system.
	 */
	public function register()
	{
		// check Registration option site wise
		if (!$this->general_settings['enable_registration']) {
			$this->session->set_flashdata('error', trans('registration_disabled_msg'));
			redirect(base_url('auth/login'));
			exit();
		}
		if($this->input->post('submit')){
			if($this->general_settings['enable_captcha']){
				if (!$this->recaptcha_verify_request()) {
					$this->session->set_flashdata('form_data', $this->input->post());
					$this->session->set_flashdata('error', 'reCaptcha Error');
					redirect(base_url('auth/register'));
					exit();
				}
			}
			$this->form_validation->set_rules('username', trans('username'), 'trim|is_unique[users.username]|alpha_numeric_spaces|required');
			$this->form_validation->set_rules('firstname', trans('first_name'), 'trim|required');
			$this->form_validation->set_rules('lastname', trans('last_name'), 'trim|required');
			$this->form_validation->set_rules('email', trans('email'), 'trim|valid_email|is_unique[users.email]|required');
			$this->form_validation->set_rules('password', trans('password'), 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', trans('confirm_pass'), 'trim|required|matches[password]');
			$this->form_validation->set_rules('package_id', trans('package'), 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('auth/register'));
			} else {
				$ip = $this->input->ip_address();
				$data = array(
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'is_active' => 1,
					'is_verify' => 0,
					'token' => md5(rand(0,1000)),
					'last_ip' => $ip
				);

				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->register($data);
				// setting user package //
				if ($result) {
					$usr_pkg = array(
						'user_id' => $result,
						'package_id' => 1,
						'expiry_date' => '0000-00-00'
					);
					$insert_id = $this->package_model->assign_package($usr_pkg); // Adding in DB
					if (!$insert_id) {
						$this->session->set_flashdata('errors', trans('package_save_error'));
						redirect(base_url('auth/login'));
					}
				}
				// ./setting user package //
				if($result){
					//sending welcome email to user
					$name = $data['firstname'].' '.$data['lastname'];
					$email_verification_link = base_url('auth/verify/').'/'.$data['token'];
					$body = $this->mailer->Tpl_Registration($name, $email_verification_link);
					$this->load->helper('email_helper');
					$to = $data['email'];
					$subject = 'Activate your account';
					$message =  $body ;
					$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
					$email = true;
					if($email){
						$this->session->set_flashdata('success', trans('account_created_msg'));
						redirect(base_url('auth/login'));
					} else {
						$this->session->set_flashdata('errors', trans('verify_email_error'));
						redirect(base_url('auth/login'));
					}
				} else {
					$this->session->set_flashdata('errors', trans('registration_error'));
					redirect(base_url('auth/login'));
				}
			}
		} else {

			$data['navbar'] = false;
			$data['sidebar'] = true;
			$data['footer'] = false;
			$data['packages'] = $this->package_model->get_packages('F');

			$data['title'] = trans('create_account');
			$this->load->view('themes/main_header', $data);
			$this->load->view('auth/register');
			$this->load->view('themes/main_footer', $data);
		}
	}

	/**
	 * Verify a newly registered user by verification code sent to him/her right after new registration.
	 */
	public function verify()
	{
		$verification_id = $this->uri->segment(3);
		$result = $this->auth_model->email_verification($verification_id);
		if($result){
			$this->session->set_flashdata('success', trans('email_is_verified'));
			redirect(base_url('auth/login'));
		} else {
			$this->session->set_flashdata('success', trans('invalid_verification_url'));
			redirect(base_url('auth/login'));
		}
	}

	/**
	 * Forget password use case.
	 */
	public function forgot_password(){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('email', trans('email'), 'valid_email|trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);
				redirect(base_url('auth/forget_password'));
			}
			$email = $this->input->post('email');
			$response = $this->auth_model->check_user_mail($email);
			if($response){ // email exists
				$rand_no = rand(0,1000);
				$pwd_reset_code = md5($rand_no.$response['id']);
				$this->auth_model->update_reset_code($pwd_reset_code, $response['id']);
				// --- sending email
				$name = $response['firstname'].' '.$response['lastname'];
				$email = $response['email'];
				$reset_link = base_url('auth/reset_password/'.$pwd_reset_code);
				$body = $this->mailer->Tpl_PwdResetLink($name,$reset_link);

				$this->load->helper('email_helper');
				$to = $email;
				$subject = trans('reset_your_pass');
				$message =  $body ;
				$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
				if($email){
					$this->session->set_flashdata('success', trans('pass_instruction_email'));

					redirect(base_url('auth/login'));
				} else {
					$this->session->set_flashdata('error', trans('problem_in_email'));
					redirect(base_url('auth/forgot_password'));
				}
			} else {
				$this->session->set_flashdata('error', trans('email_invalid'));
				redirect(base_url('auth/forgot_password'));
			}
		} else {

			$data['navbar'] = false;
			$data['sidebar'] = true;
			$data['footer'] = false;

			$data['title'] = trans('forgot_pass');
			$this->load->view('themes/main_header', $data);
			$this->load->view('auth/forget_password');
			$this->load->view('themes/main_footer', $data);
		}
	}

	/**
	 * Set a new password
	 * @param int $id
	 */
	public function reset_password($id=0){
		// check the activation code in database
		if($this->input->post('submit')){
			$id = $this->input->post('reset_code');

			$this->form_validation->set_rules('password', trans('password'), 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', trans('confirm_pass'), 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$result = false;

				$data = array(
					'errors' => validation_errors()
				);
				$data['reset_code'] = $id;
				$this->session->set_flashdata('errors', $data['errors']);
				$data['navbar'] = false;
				$data['sidebar'] = true;
				$data['footer'] = false;

				$data['title'] = trans('reset_pass');
				$this->load->view('themes/main_header', $data);
				$this->load->view('auth/reset_password');
				$this->load->view('themes/main_footer', $data);
			} else {
				$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$this->auth_model->reset_password($id, $new_password);
				$this->session->set_flashdata('success',trans('new_pass_updated'));
				redirect(base_url('auth/login'));
			}
		} else {
			$result = $this->auth_model->check_password_reset_code($id);

			if($result){
				$data['reset_code'] = $id;
				$data['navbar'] = false;
				$data['sidebar'] = true;
				$data['footer'] = false;

				$data['title'] = trans('reset_pass');
				$this->load->view('themes/main_header', $data);
				$this->load->view('auth/reset_password');
				$this->load->view('themes/main_footer', $data);


			} else {
				$this->session->set_flashdata('error',trans('invalid_pass_reset_code'));
				redirect(base_url('auth/forgot_password'));
			}
		}
	}

	/**
	 * Destroying session information upon logout from the system
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth/login'), 'refresh');
	}

	/**
	 * Change password for user from his/her profile
	 */
	public function change_password()
	{
		auth_check();

		if ($this->input->post('submit')) {

			$user_id = $this->session->userdata('user_id');

			$this->form_validation->set_rules('old_password', trans('old_pass'), 'trim|required|min_length[8]');
			$this->form_validation->set_rules('new_password', trans('new_pass'), 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_new_password', trans('confirm_new_pass'), 'trim|required|matches[new_password]');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$this->session->set_flashdata('errors', $data['errors']);

				redirect(base_url('auth/change_password'));


			} else {
				$user = $this->auth_model->user_by_id($user_id);
				$validPassword = password_verify($this->input->post('old_password'), $user->password);
				
				if ($validPassword) {

					$data = array(
						'password' =>  password_hash($this->input->post('new_password'), PASSWORD_BCRYPT)
					);
					$data = $this->security->xss_clean($data);

					$update = $this->auth_model->update_user($data, $user_id);

					if ($update) {
						$this->session->set_flashdata('success', trans('pass_change_success'));
						redirect(base_url('auth/change_password'));
						exit;
					} else {
						$this->session->set_flashdata('error', trans('update_pass_error'));
						redirect(base_url('auth/change_password'));
						exit;
					}
				} 
				else {
					$data = array(
						'errors' => trans('old_pass_wrong')
					);
					$this->session->set_flashdata('errors', $data['errors']);
					redirect(base_url('auth/change_password'));
					exit;
				}

				$data['title'] = trans('label_change_pass');
				$this->load->view('admin/includes/_header', $data);
				$this->load->view('auth/change_password');
				$this->load->view('admin/includes/_footer', $data);
			}
		} else {

			$data['title'] = trans('label_change_pass');
			$this->load->view('admin/includes/_header', $data);
			$this->load->view('auth/change_password');
			$this->load->view('admin/includes/_footer', $data);
		}
	}

}

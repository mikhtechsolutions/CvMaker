<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class MY_Controller
 * Every controller must extends this controller
 */
class  MY_Controller extends CI_Controller
{
	//var $general_settings = '';
	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model', 'site_model');
		$settings['general_settings'] = $this->site_model->get_site_settings();
		$this->general_settings = $settings['general_settings'];

		$ci =& get_instance();
		if($ci->session->has_userdata('user_id') && !$ci->session->userdata('is_admin')) { // a normal user is Logged in
			$user_id = $ci->session->userdata('user_id');
			$features_list = get_features_by_user($user_id);
			foreach ($features_list as $feature) {
				$this->features_list[$feature->id] = $feature;
			}
		}
		//$user_language = $this->session->userdata('language');
		$site_language = ($this->general_settings['default_language'] != "")?$this->general_settings['default_language'] : "english";
		$language = ($this->session->userdata('site_lang') != "") ? $this->session->userdata('site_lang') : $site_language;

		$this->config->set_item('language', $language);
		$this->lang->load(array('common'), $language);

	}

	public function recaptcha_verify_request()
	{
		if (!$this->general_settings['enable_captcha']) {
			return true;
		}

		$this->load->library('recaptcha');
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) && $response['success'] === true) {
				return true;
			}
		}
		return false;
	}

}

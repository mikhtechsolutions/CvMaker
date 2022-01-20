<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends MY_Controller
{

	public function  __construct()
	{

		parent::__construct();

		$this->load->helper('email_helper');

		$this->load->library('paypal_lib');

		$this->load->model('admin/package_model');

		$this->load->model('auth_model', 'auth_model');

	}

	//--------------------------------------------------------------------

	public function success()
	{
		$user_id = $this->session->userdata('user_id');


		$payment_data = array(

			'payment_method' => 'paypal',

			'txn_id' => $_POST['txn_id'],

			'user_id' => $user_id,

			'currency' => $_POST['mc_currency'],

			'payment_amount' => $_POST['payment_gross'],

			'payer_email' => $_POST['payer_email'],

			'payment_status' => $_POST['payment_status'],

			'package_id' => $_POST['item_number']

			//'payment_date' => $_POST["payment_date"],

		);

		$payment_id = $this->package_model->insert_payment($payment_data);

		$package_id = $_POST['item_number'];
		$expiry_date = calculate_expiry_date($package_id);
		$data = array(
			'user_id' => $user_id,
			'package_id' => $package_id,
			'expiry_date' => $expiry_date
		);

		if (!$payment_id) {
			$this->session->set_flashdata('errors', trans('payment_db_error'));
			redirect(base_url('user/packages'), 'refresh');
		}



		$insert_id = $this->package_model->assign_package($data);

		$data = array(
			'is_premium' =>  1	);
		$update = $this->auth_model->update_user($data, $user_id);

		if ($insert_id) {
			$this->session->set_flashdata('success', trans('payment_paid_success'));
			redirect(base_url('user/packages'), 'refresh');
		} else {
			$this->session->set_flashdata('errors', trans('payment_db_error'));
			redirect(base_url('user/packages'), 'refresh');
		}


	}

	//--------------------------------------------------------------------
	public function cancel()
	{
		$this->session->set_flashdata('errors', trans('payment_declined'));
		redirect(base_url('user/profile'), 'refresh');
	}

	//--------------------------------------------------------------------
	public function ipn()
	{
		/* CHECK THESE 4 THINGS BEFORE PROCESSING THE TRANSACTION, HANDLE THEM AS YOU WISH

         1. Make sure that business email returned is your business email

         2. Make sure that the transaction�s payment status is �completed�

         3. Make sure there are no duplicate txn_id

         4. Make sure the payment amount matches what you charge for items. (Defeat Price-Jacking) */

		// Paypal posts the transaction data
		$paypal_info = $this->input->post();
		//print_array($paypal_info, true);

		if(!empty($paypal_info)){
			// Validate and get the ipn response
			$ipn_check = $this->paypal_lib->validate_ipn($paypal_info);

			// Check whether the transaction is valid
			if($ipn_check){

				// Save payment data into DB
				$payment_data = array(

					'payment_method' => 'paypal',

					'txn_id' => $paypal_info['txn_id'],

					'user_id' => $paypal_info['payer_id'],

					'currency' => $paypal_info['mc_currency'],

					'payment_amount' => $paypal_info['payment_gross'],

					'payer_email' => $paypal_info['payer_email'],

					'payment_status' => $paypal_info['payment_status'],

					'package_id' => $paypal_info['item_number']//,

					//'payment_date' => $paypal_info["payment_date"],

				);

				$payment_id = $this->package_model->insert_payment($payment_data);
				// ./

				// Saving package data into DB
				$package_id = $paypal_info['item_number'];
				$expiry_date = calculate_expiry_date($package_id);
				$data = array(
					'user_id' => $paypal_info['payer_id'],
					'package_id' => $package_id,
					'expiry_date' => $expiry_date
				);

				$insert_id = $this->package_model->assign_package($data);

				$data = array(
					'is_premium' =>  1	);
				$update = $this->auth_model->update_user($data, $paypal_info['payer_id']);

				//

				$controller =& get_instance();

				$to = $controller->general_settings['email_from'];
				$subject = 'Paypal Notification | '.$controller->general_settings['site_name'];
				$message = print_r($_POST, true);

				$email = sendEmail($to, $subject, $message , $file = '' , $cc = '');

				if($email == true){
					echo 'success';
				}
				else{
					echo $email;
				}
			}
		}
	}

}

?>


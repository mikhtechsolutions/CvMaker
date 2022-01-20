<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Site
 * All operations are for User and Packages
 */
class Packages extends MY_Controller {

    /**
     * Site constructor.
     */
    public function __construct()
    {
        parent::__construct();
        auth_check(); // checks the authenticated user. True parameters ensures that user is Admin
        $this->load->library('datatable');
        $this->load->model('admin/package_model', 'package_model');
        $this->load->library('paypal_lib');
        $this->load->model('auth_model', 'auth_model');
    }

    /**
     * Screen shots listing. These are shown at landing page
     */
    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['package'] = $this->package_model->get_package_by_user_id($user_id);

        $data['title'] = trans('cur_package_info');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/package');
        $this->load->view('admin/includes/_footer', $data);
    }

    public function initiate_purchase($package_id)
    {
        $user_id = $this->session->userdata('user_id');
        $expiry_date = calculate_expiry_date($package_id); // should check here if user has already purchased a package
        $data['package'] = $this->package_model->get_package_by_id($package_id);
        $data['package_features'] = $this->package_model->get_packages_features($package_id);
        $data['expiry_date'] = $expiry_date;

        if ($data['package']->type == 'F') {
            redirect(base_url(''), 'refresh');
            exit;
        }

        $data['show_login_menu_only'] = true;

        $this->load->view('themes/main_header', $data);
        $this->load->view('themes/purchase');
        $this->load->view('themes/main_footer');

    }

    public function buy()
    {
        if($this->input->post('submit')){
            $user_id = $this->session->userdata('user_id');
            $package_id = $this->input->post('package_id');
            $package_detail = $this->package_model->get_package_by_id($package_id);

            //print_array($package_detail, true);

            // Set variables for paypal form
            $returnURL = base_url().'user/paypal/success';
            $cancelURL = base_url().'user/paypal/cancel';
            $notifyURL = base_url().'user/paypal/ipn';

            // Add fields to paypal form
            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('cancel_return', $cancelURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('item_name', $package_detail->name);
            $this->paypal_lib->add_field('item_number',  $package_detail->id);
            $this->paypal_lib->add_field('amount',  $package_detail->price);
            $this->paypal_lib->add_field('payer_id',  $user_id);
            $this->paypal_lib->add_field('rm',  2);
            $this->paypal_lib->add_field('handling',  0);

            // Render paypal form
            $this->paypal_lib->paypal_auto_form();

        } else {
            echo trans('invalid_request');
            exit;
        }

    }

    /**
     * Stripe payment method
     */
    public function pay_with_stripe()
    {
        /*
        4242424242424242 – Visa
        4000056655665556 – Visa (debit)
        5555555555554444 – Mastercard
        5200828282828210 – Mastercard (debit)
        378282246310005 – American Express
        6011111111111117 – Discover
        */
        //check whether stripe token is not empty
        $item_num = $this->input->post('item_number');
        if(!empty($this->input->post('stripeToken')))
        {
            //get token, card and user info from the form
            $user_id = $this->session->userdata('user_id');
            $token  = $this->input->post('stripeToken');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $card_num = $this->input->post('card-number');
            $card_cvc = $this->input->post('card-cvc');
            $card_exp_month = $this->input->post('card-expiry-month');
            $card_exp_year = $this->input->post('card-expiry-year');

            //include Stripe PHP library
            require_once APPPATH."third_party/stripe/init.php";

            //set api key
            $this->CI =& get_instance();
            $stripe_secret_key = $this->CI->general_settings['stripe_secret_key'];
            $stripe_publish_key = $this->CI->general_settings['stripe_publish_key'];
            $stripe = array(
                "secret_key"      => $stripe_secret_key,
                "publishable_key" => $stripe_publish_key
            );

            \Stripe\Stripe::setApiKey($stripe['secret_key']);

            //add customer to stripe
            $customer = \Stripe\Customer::create(array(
                'email' => $email,
                'source'  => $token
            ));

            //item information
            $item_name = "";
            $item_number = $this->input->post('item_number');
            $item_price = $this->input->post('item_price');
            $item_num = $item_number;
           // $domain_list = $this->input->post('domain_list');
            $currency = "USD";
            $order_id = "SKA92712382139";

            //charge a credit or a debit card
            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount'   => $item_price,
                'currency' => $currency,
                'description' => $item_number,
                'metadata' => array(
                    'item_id' => $item_number
                )
            ));

            //retrieve charge details
            $chargeJson = $charge->jsonSerialize();

            //check whether the charge is successful
            if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
            {
                //order details 
                $amount = $chargeJson['amount'];
                $balance_transaction = $chargeJson['balance_transaction'];
                $currency = $chargeJson['currency'];
                $status = $chargeJson['status'];
                $date = date("Y-m-d H:i:s");

                // Save payment data into DB
                $payment_data = array(

                    'payment_method' => 'stripe',

                    'txn_id' => $balance_transaction,

                    'user_id' => $user_id,

                    'currency' =>strtoupper($currency),

                    'payment_amount' => $amount,

                    'payer_email' => $email,

                    'payment_status' => ($status == 'succeeded')?'Completed':$status,

                    'package_id' => $item_number

                );

                $payment_id = $this->package_model->insert_payment($payment_data);

                // Saving package data into DB
                $package_id = $item_number;
                $expiry_date = calculate_expiry_date($package_id);
                $data = array(
                    'user_id' => $user_id,
                    'package_id' => $package_id,
                    'expiry_date' => $expiry_date
                );

                $insert_id = $this->package_model->assign_package($data);

                $data = array(
                    'is_premium' =>  1	);
                $update = $this->auth_model->update_user($data, $user_id);

                if(($insert_id) && $status == 'succeeded'){
                    $this->session->set_flashdata('success', trans('payment_paid_success'));
                    redirect(base_url('user/packages'), 'refresh');
                } else {
                    $this->session->set_flashdata('errors', trans('payment_db_error'));
                    redirect(base_url('user/packages'), 'refresh');
                }


            }
            else
            {
                $package_id = $this->input->post('item_number');
                $this->session->set_flashdata('errors', 'Invalid Token');
                redirect(base_url('user/packages/initiate_purchase/'.$package_id), 'refresh');
            }
        } else {
            $this->session->set_flashdata('errors', 'Invalid Token');
            redirect(base_url('user/packages/initiate_purchase/'.$item_num), 'refresh');
        }
    }

    /**
     * Packages  listing. These are shown at landing page
     */
    public function payments()
    {
        $data['title'] = trans('payments');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/payments');
        $this->load->view('admin/includes/_footer', $data);
    }

}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Users
 * Controller for user listing at landing page
 */
class Users extends MY_Controller
{
    /**
     * Users constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination'); // loaded codeigniter pagination liberary
        $this->load->model('user/user_model', 'user_model');

    }

    /**
     * Default method displaying users listing
     */
    public function index()
    {
        $search_params = [];
        if($this->input->post()){
            $this->session->set_flashdata('form_data', $this->input->post());
            $search_params = array(
                'username' => $this->input->post('username'),
                'designation' => $this->input->post('designation'),
                'country' => $this->input->post('country'),
                'is_premium' => $this->input->post('is_premium'),
                'city' => $this->input->post('city')
            );
        }
        
        $per_page_record = $data['per_page_record'] = 16;
        $count = $this->user_model->count_all_users();

        if (!empty($search_params['username']) || !empty($search_params['designation']) || 
            (!empty($search_params['country']) && $search_params['country'] != 0) || !empty($search_params['city'])
            || (!empty($search_params['is_premium']) && $search_params['is_premium'] != '')) { // a search param is set

            $user_in_search = $this->user_model->get_all_users(-1, -1, $search_params);
            $count = sizeof($user_in_search);
            $per_page_record = $count;
        }

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $url= base_url('user/index');
        //print_array($search_params);

        $data['users'] = $this->user_model->get_all_users($per_page_record, $page, $search_params);
        $config = $this->functions->pagination_config($url,$count,$per_page_record);
        $config['uri_segment'] = 3;     
        $this->pagination->initialize($config);


        $data['num_records'] = sizeof($data['users']);
        $data['countries'] = countries_list();

        $data['show_login_menu_only'] = true;

    	$this->load->view('themes/main_header', $data);
        $this->load->view('themes/users');
        $this->load->view('themes/main_footer');

    }
}
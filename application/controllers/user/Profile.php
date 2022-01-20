<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Profile
 */
class Profile extends MY_Controller
{
    /**
     * Profile constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/profile_model', 'profile_model');
        $this->load->model('user/education_model', 'education_model');
        $this->load->model('user/skill_model', 'skill_model');
    }

    /**
     * Showing backend of User profile
     * @param string $type
     */
    function index($type='')
    {
        $user_id = $this->session->userdata('user_id');
        if(!($this->session->flashdata('social_tab')) && !($this->session->flashdata('general_tab'))) {
            $this->session->set_flashdata('update_tab', 'active');
        }
        $data['user_data']  = $this->profile_model->get_user_by_id($user_id);
        $data['educations'] = $this->education_model->get_education_by_user_id($user_id,'to_date', 'DESC');
        $data['subskills'] = $this->skill_model->get_subskills_by_user_id($user_id);

        $data['countries'] = countries_list();
        $public_features = get_features_list(1,1);
        $user_allowed_features = get_features_by_user($user_id, 1);
        $arr = [];
        foreach ($user_allowed_features as $feature) {
            $arr[$feature->id] = $feature;
        }
        $user_allowed_features = $arr;
        $i = 0;
        foreach ($public_features as $pf) {
            if (array_key_exists($pf->id, $user_allowed_features)){
                $public_features[$i]->allowed_feature = 1;
            } else {
                $public_features[$i]->allowed_feature = 0;
            }
            $i++;
        }
        $data['public_features'] = $public_features;
        $data['package_type'] = $this->session->userdata('package_type');

        $data['title'] = trans('user_profile');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/profile');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Update user's profile
     */
    public function update(){
        if($this->input->post('submit')){
            $update_tab   = $this->input->post('update_tab');
            $update_id    = $this->input->post('update_id');
            $user_id      = $this->session->userdata('user_id');
            $this->session->set_flashdata('form_data', $this->input->post());

            $data = '';
            if ($update_tab === 'info') { // if the Infor tab is selected at user's profile form
                $this->form_validation->set_rules('firstname', trans('first_name'), 'trim|required');
                $this->form_validation->set_rules('lastname', trans('last_name'), 'trim|required');
                $this->form_validation->set_rules('email', trans('email'), 'trim|valid_email[users.email]|required');

                if ($this->form_validation->run() == FALSE) {
                    $data = array(
                        'errors' => validation_errors()
                    );
                    $this->session->set_flashdata('errors', $data['errors']);
                    redirect(base_url('user/profile'),'refresh');
                } else {
                    $data = array(
                        'firstname' => $this->input->post('firstname'),
                        'lastname' => $this->input->post('lastname'),
                        'designation' => $this->input->post('designation'),
                        'email' => $this->input->post('email'),
                        'country' => $this->input->post('country'),
                        'address' => $this->input->post('address'),
                        'city' => $this->input->post('city'),
                        'phone' => $this->input->post('phone'),
                        'skype' => $this->input->post('skype'),
                        'whatsapp' => $this->input->post('whatsapp'),
                        'about_me' => $this->input->post('about_me')
                    );

                    $this->session->set_flashdata('update_tab','active');
                    // Resume uploading //
                    if(!empty($_FILES['resume']['name'])) {
                        $upload_file_name = $_FILES['resume']['name'];
                        $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
                        $ext = pathinfo($upload_file_name, PATHINFO_EXTENSION);
                        $upload_file_name = 'resume_' . $user_id . '.' . $ext;

                        $data = array(
                            'resume' => 'uploads/resume/' . $upload_file_name
                        );
                        $config['file_name'] = $upload_file_name;
                        $config['upload_path'] = './uploads/resume'; //file save path
                        $config['allowed_types'] = 'pdf|doc';
                        $config['max_size'] = 10000;
                        $config['overwrite'] = true;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('resume')) {
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('errors', $error);
                            redirect(base_url('user/profile'));
                        } else {
                            // resume uploaded successfully
                        }
                    }
                    // ./ Resume uploading //

                    // Photo uploading //
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
                            'redirect_on_error' => 'user/profile'
                        );
                                                
                        $up_load = upload_image($img_config);
                        if(!$up_load) {
                            $this->session->set_flashdata('errors', trans('upload_image_error'));
                            redirect(base_url('user/profile'));
                            exit;
                        }
                        $data = array(
                            'image' => $up_load['images'],
                            'thumb' => $up_load['thumb']
                        );
                    }
                    // ./Photo uploading //
                }

            } else if($update_tab === 'social') { // if the Social tab is selected at user's profile form
                $data = array(
                    'facebook' => $this->input->post('facebook'),
                    'twitter' => $this->input->post('twitter'),
                    'linkedin' => $this->input->post('linkedin'),
                    'instagram' => $this->input->post('instagram')
                );

                $this->session->set_flashdata('social_tab','active');
            } else if($update_tab === 'general') { // if the Profile settings tab is selected at user's profile form
                $data = array(
                    'is_portfolio' => $this->input->post('is_portfolio'),
                    'is_blog' => $this->input->post('is_blog'),
                    'is_testimonial' => $this->input->post('is_testimonial'),
                    'is_app' => $this->input->post('is_app'),
                    'is_service' => $this->input->post('is_service'),
                    'is_experience' => $this->input->post('is_experience'),
                    'is_education' => $this->input->post('is_education'),
                    'is_skill' => $this->input->post('is_skill'),
                    'is_interest' => $this->input->post('is_interest'),
                    'is_award' => $this->input->post('is_award'),
                    'is_language' => $this->input->post('is_language'),
                    'is_client' => $this->input->post('is_client'),
                    'is_reference' => $this->input->post('is_reference')
                );

                $this->session->set_flashdata('general_tab','active');
            }

            $data = $this->security->xss_clean($data);
            $result = $this->profile_model->edit($data, $user_id);
            if($result) {
                $this->session->set_flashdata('success', trans('update_success'));
            } else {
                $this->session->set_flashdata('errors', trans('update_error'));
            }
            redirect(base_url('user/profile'));
            exit;



        } else {
            $this->session->set_flashdata('errors', trans('invalid_user'));
            redirect(base_url('auth/login'),'refresh');
        }

    }

}

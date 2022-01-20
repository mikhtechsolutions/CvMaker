<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**

 * Class Site

 * All operations are for Admin user to perform CRUD on overall site settings and data.

 */

class Languages extends MY_Controller {



    /**

     * Site constructor.

     */

    public function __construct()

    {

        parent::__construct();

        auth_check(true); // checks the authenticated user. True parameters ensures that user is Admin

        $this->load->model('admin/languages_model', 'languages_model');

    }



    /**

     * Features (listing) offered by the site, these are added by Admin user as a Service same as another user do in his account.

     */

    public function index()

    {

        $data['languages'] = $this->languages_model->get_all_languages();



        $data['title'] = trans('site_languages');

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/languages');

        $this->load->view('admin/includes/_footer', $data);

    }



    /**

     * Add / Update Services

     */

    public function add(){



        if($this->input->post('submit')){

            $this->session->set_flashdata('form_data', $this->input->post());

            $user_id = $this->session->userdata('user_id');

            $update_id = 0;

            if($this->input->post('update_id')) {

                $update_id = $this->input->post('update_id'); // A hidden variable set in view(form) file, ensures that either posted data is for Add or Update

            }



            $this->form_validation->set_rules('display_name', trans('display_name'), 'trim|required');

            $this->form_validation->set_rules('directory_name', trans('dir_name'), 'trim|required');



            if ($this->form_validation->run() == FALSE) {

                $data = array(

                    'errors' => validation_errors()

                );

                $this->session->set_flashdata('errors', $data['errors']);

                redirect(base_url('admin/languages/add'),'refresh');

            } else {

                $data = array(

                    'user_id' => $user_id,

                    'display_name' => $this->input->post('display_name'),

                    'directory_name' => $this->input->post('directory_name')

                );



                $data = $this->security->xss_clean($data);

                $insert_id = 0;

                if ($update_id) {

                    $insert_id = $this->languages_model->edit($data, $update_id);

                } else {

                    $insert_id = $this->languages_model->save($data);

                }





                if($insert_id){

                    if ($update_id){

                        $this->session->set_flashdata('success', trans('update_success'));

                    } else {

                        $this->session->set_flashdata('success', trans('save_success'));

                    }

                } else {

                    $this->session->set_flashdata('errors', trans('save_error'));

                }

                if ($update_id && !$insert_id) {

                    redirect(base_url('admin/languages/edit/'.$update_id),'refresh');

                    exit;

                } else if ($insert_id){

                    redirect(base_url('admin/languages'), 'refresh');

                    exit;

                }

                redirect(base_url('admin/languages/add/'),'refresh');

                exit;

            }

        } else {



            $data['title'] = trans('add_language');

            $this->load->view('admin/includes/_header', $data);

            $this->load->view('admin/language_add');

            $this->load->view('admin/includes/_footer', $data);

        }

    }



    /**

     * Edit mode of service form

     * @param $id

     */

    public function edit($id)

    {

        $data = array();

        $data['update_id'] = $id;

        $data['language'] = $this->languages_model->get_language_by_id($id);


        $data['title'] = trans('update');

        $this->load->view('admin/includes/_header', $data);

        $this->load->view('admin/language_add');

        $this->load->view('admin/includes/_footer', $data);

    }

    /**

     * @param $id

     */

    public function delete($id)
    {

        $result = $this->languages_model->delete($id);

        if($result) {

            $this->session->set_flashdata('success', trans('delete_success'));

        } else {

            $this->session->set_flashdata('errors', trans('delete_error'));

        }



        redirect(base_url('admin/languages'), 'refresh');

        exit;

    }



    public function set_default()

    {

        if($this->input->post('submit')){

            $id = $this->input->post('default_lang_id');

            $result = $this->languages_model->set_default_language($id);

            if($result){

                $this->session->set_flashdata('success', 'Disabled in Demo');

                redirect(base_url('admin/languages'));

            } else {

                $this->session->set_flashdata('errors', trans('setting_language_error'));

                redirect(base_url('admin/languages'));

            }

        } else {

            $this->session->set_flashdata('errors', trans('invalid_input_for_language'));

            redirect(base_url('admin/languages'));

        }

    }



}


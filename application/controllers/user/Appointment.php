<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Appointment
 */
class Appointment extends MY_Controller
{
    /**
     * Appointment constructor.
     */
    function __construct()
    {
        parent::__construct();
        auth_check();
        check_feature_access();
        $this->load->model('user/appoint_model', 'appoint_model');
    }

    /**
     * Default method listing all appointments
     */
    function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['appoints'] = $this->appoint_model->get_appointments_by_user_id($user_id);

        $data['title'] = trans('user_appointments');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('user/appointment');
        $this->load->view('admin/includes/_footer', $data);
    }

    /**
     * Setting available days for appointment
     */
    public function add()
    {
        if($this->input->post('submit')){
            $this->session->set_flashdata('form_data', $this->input->post());
            $user_id = $this->session->userdata('user_id');
            $this->form_validation->set_rules('days[]', 'Days', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('errors', $data['errors']);
                redirect(base_url('user/appointment/add'),'refresh');
            } else {
                $data = [];
                $days = $this->input->post('days[]');
                $i = 0;

                foreach ($days as $day) {
                    $data[$i]['user_id'] = $user_id;
                    $data[$i]['book_time_start'] = $this->input->post('book_time_start_'.$day);
                    $data[$i]['book_time_end']   = $this->input->post('book_time_end_'.$day);
                    $data[$i]['day']     = $day;
                    $i++;
                }

                $data = $this->security->xss_clean($data);
                $insert_id = $this->appoint_model->save_app_days($data);

                if($insert_id){
                    $this->session->set_flashdata('success', trans('save_success'));
                } else {
                    $this->session->set_flashdata('errors', trans('save_error'));
                    redirect(base_url('user/appointment/add'),'refresh');
                    exit;
                }

                redirect(base_url('user/appointment'),'refresh');
                exit;
            }
        } else {

            $user_id = $this->session->userdata('user_id');
            $data['days'] = $this->appoint_model->get_app_days_by_user_id($user_id);

            if($data['days']) {
                foreach ($data['days'] as $day) {
                    $data['app_days'][$day->day]['flag']            = true;
                    $data['app_days'][$day->day]['book_time_start'] = $day->book_time_start;
                    $data['app_days'][$day->day]['book_time_end']   = $day->book_time_end;
                }
            }

            $data['title'] = trans('select_available_days');
            $this->load->view('admin/includes/_header', $data);
            $this->load->view('user/appointment_days');
            $this->load->view('admin/includes/_footer', $data);
        }
    }

    /**
     * @param $id
     */
    public function delete_appointment($id)
    {
        $result = $this->appoint_model->delete($id);

        if($result) {
            $this->session->set_flashdata('success', trans('delete_success'));
        } else {
            $this->session->set_flashdata('success', trans('delete_error'));
        }

        redirect(base_url('user/appointment'), 'refresh');
        exit;
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/page_model', 'page_model');
    }

    //---------------------------------------------------------------
    // All Pages
    public function index()
    {
        $data['pages'] = $this->page_model->get_all_pages();

        $data['title'] = trans('pages');
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('admin/pages/page_list', $data);
        $this->load->view('admin/includes/_footer');
    }

    //---------------------------------------------------------------
    // Add Page
    public function add()
    {
        if($this->input->post()){
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('description', 'description', 'trim|required');
            $this->form_validation->set_rules('keywords', 'keywords', 'trim|required');
            $this->form_validation->set_rules('content', 'content', 'trim|required');
            $this->form_validation->set_rules('sort_order', 'sort order', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );

                $this->session->set_flashdata('error', $data['errors']);
                redirect(base_url('admin/pages/add'),'refresh');
            }

            $slug = make_slug($this->input->post('title'));
            $data = array(
                'title' => ucfirst($this->input->post('title')),
                'slug' => $slug,
                'description' => $this->input->post('description'),
                'keywords' => $this->input->post('keywords'),
                'content' => $this->input->post('content'),
                'sort_order' => $this->input->post('sort_order'),
                'created_date' => date('Y-m-d : h:m:s')

            );
            $data = $this->security->xss_clean($data);
            $result = $this->page_model->add_page($data);
            $this->session->set_flashdata('success',trans('save_success'));
            redirect(base_url('admin/pages'));
        }
        else{
            $data['title'] = trans('add_page');
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/pages/page_add', $data);
            $this->load->view('admin/includes/_footer');
        }
    }

    //---------------------------------------------------------------
    // Edit Page
    public function edit($id)
    {

        if($this->input->post()){
            $this->form_validation->set_rules('title', 'title', 'trim|required');
            $this->form_validation->set_rules('description', 'description', 'trim|required');
            $this->form_validation->set_rules('keywords', 'keywords', 'trim|required');
            $this->form_validation->set_rules('content', 'content', 'trim|required');
            $this->form_validation->set_rules('sort_order', 'sort order', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $data = array(
                    'errors' => validation_errors()
                );
                $this->session->set_flashdata('error', $data['errors']);
                redirect(base_url('admin/pages/edit/'.$edit),'refresh');
            }

            $slug = make_slug($this->input->post('title'));
            $data = array(
                'title' => ucfirst($this->input->post('title')),
                'slug' => $slug,
                'description' => $this->input->post('description'),
                'keywords' => $this->input->post('keywords'),
                'content' => $this->input->post('content'),
                'sort_order' => $this->input->post('sort_order'),
                'is_active' => $this->input->post('status'),
                'created_date' => date('Y-m-d : h:m:s')

            );
            $data = $this->security->xss_clean($data);
            $result = $this->page_model->update_page($id, $data);
            $this->session->set_flashdata('success',trans('update_success'));
            redirect(base_url('admin/pages'));
        }
        else{
            $data['page'] = $this->page_model->get_page_by_id($id);

            $data['title'] = trans('edit_page');
            $this->load->view('admin/includes/_header');
            $this->load->view('admin/pages/page_edit', $data);
            $this->load->view('admin/includes/_footer');
        }
    }


    //---------------------------------------------------------------
    // Delete Page
    public function del($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('pages');
        
        $this->session->set_flashdata('success', trans('delete_success'));
        redirect('admin/pages','refresh');
    }


}
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subdomain extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {//cek login ga?
            redirect('login','refresh');
        }else{
            if (!$this->ion_auth->in_group('admin')) {//cek admin ga?
                redirect('login','refresh');
            }
        }
        $this->load->model('users/modeluser');
        $this->load->model('Subdomain_model');
        $this->load->model('users/Modeluser');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'administrator/subdomain/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'administrator/subdomain/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'administrator/subdomain/index.html';
            $config['first_url'] = base_url() . 'administrator/subdomain/index.html';
        }

        $config['per_page'] = 25;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Subdomain_model->total_rows($q);
        $subdomain = $this->Subdomain_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'subdomain_data' => $subdomain,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('subdomain/subdomain_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Subdomain_model->get_by_id($id);
        if ($row) {
            $data = array(
        'idsubdomain' => $row->idsubdomain,
        'subdomain' => $row->subdomain,
        'username' => $row->username,
        );
            $this->load->view('subdomain/subdomain_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subdomain'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('subdomain/create_action'),
        'idsubdomain' => set_value('idsubdomain'),
        'subdomain' => set_value('subdomain'),
        'username' => set_value('username'),
    );
        $data['users'] = $this->Modeluser->get();
        $this->load->view('subdomain/subdomain_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'subdomain' => $this->input->post('subdomain',TRUE),
        'username' => $this->input->post('username',TRUE),
        );

            $this->Subdomain_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('subdomain'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Subdomain_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('subdomain/update_action'),
        'idsubdomain' => set_value('idsubdomain', $row->idsubdomain),
        'subdomain' => set_value('subdomain', $row->subdomain),
        'username' => set_value('username', $row->username),
        );
            $data['users'] = $this->Modeluser->get();
            $this->load->view('subdomain/subdomain_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subdomain'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idsubdomain', TRUE));
        } else {
            $data = array(
        'subdomain' => $this->input->post('subdomain',TRUE),
        'username' => $this->input->post('username',TRUE),
        );

            $this->Subdomain_model->update($this->input->post('idsubdomain', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('subdomain'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Subdomain_model->get_by_id($id);

        if ($row) {
            $this->Subdomain_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('subdomain'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subdomain'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('subdomain', 'subdomain', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required');

    $this->form_validation->set_rules('idsubdomain', 'idsubdomain', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Subdomain.php */
/* Location: ./application/controllers/Subdomain.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-07 05:52:18 */
/* http://harviacode.com */
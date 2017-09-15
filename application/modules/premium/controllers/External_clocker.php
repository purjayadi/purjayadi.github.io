<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class External_clocker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {//cek login ga?
            redirect('login','refresh');
        }else{
            if (!$this->ion_auth->in_group('members')) {//cek admin ga?
                redirect('login','refresh');
            }
        }
        $this->load->model('External_clocker_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'premium/external_clocker/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'premium/external_clocker/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'premium/external_clocker/index.html';
            $config['first_url'] = base_url() . 'premium/external_clocker/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->External_clocker_model->total_rows($q);
        $external_clocker = $this->External_clocker_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'external_clocker_data' => $external_clocker,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('external_clocker/external_clocker_list', $data);
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('premium/external_clocker/create_action'),
	    'idexternal_clocker' => set_value('idexternal_clocker'),
	    'url_external' => set_value('url_external'),
	    'url_redirect' => set_value('url_redirect'),
	    'url_tujuan' => set_value('url_tujuan'),
	    'username' => set_value('username'),
	);
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('external_clocker/external_clocker_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'url_external' => $this->input->post('url_external',TRUE),
		'url_redirect' => $this->input->post('url_redirect',TRUE),
		'url_tujuan' => $this->input->post('url_tujuan',TRUE),
		'username' => $this->input->post('username',TRUE),
	    );

            $this->External_clocker_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('external_clocker'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->External_clocker_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('premium/external_clocker/update_action'),
		'idexternal_clocker' => set_value('idexternal_clocker', $row->idexternal_clocker),
		'url_external' => set_value('url_external', $row->url_external),
		'url_redirect' => set_value('url_redirect', $row->url_redirect),
		'url_tujuan' => set_value('url_tujuan', $row->url_tujuan),
		'username' => set_value('username', $row->username),
	    );
            $data['aktif']      ='Premium';
            $data['title']       ='Admin Panel';
            $data['judul_menu']  ='Braja Marketindo';
            $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
            $this->load->view('external_clocker/external_clocker_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('external_clocker'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idexternal_clocker', TRUE));
        } else {
            $data = array(
		'url_external' => $this->input->post('url_external',TRUE),
		'url_redirect' => $this->input->post('url_redirect',TRUE),
		'url_tujuan' => $this->input->post('url_tujuan',TRUE),
		'username' => $this->input->post('username',TRUE),
	    );

            $this->External_clocker_model->update($this->input->post('idexternal_clocker', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('external_clocker'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->External_clocker_model->get_by_id($id);

        if ($row) {
            $this->External_clocker_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('external_clocker'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('external_clocker'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('url_external', 'url external', 'trim|required');
	$this->form_validation->set_rules('url_redirect', 'url redirect', 'trim|required');
	$this->form_validation->set_rules('url_tujuan', 'url tujuan', 'trim|required');

	$this->form_validation->set_rules('idexternal_clocker', 'idexternal_clocker', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file External_clocker.php */
/* Location: ./application/controllers/External_clocker.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-15 08:15:39 */
/* http://harviacode.com */
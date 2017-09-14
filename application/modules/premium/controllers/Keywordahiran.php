<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keywordahiran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Key_ahiran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'premium/keywordahiran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'premium/keywordahiran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'premium/keywordahiran/index.html';
            $config['first_url'] = base_url() . 'premium/keywordahiran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Key_ahiran_model->total_rows($q);
        $keywordahiran = $this->Key_ahiran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'keywordahiran_data' => $keywordahiran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('keywordahiran/key_ahiran_list', $data);
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('premium/keywordahiran/create_action'),
	    'idkey_ahiran' => set_value('idkey_ahiran'),
	    'keyword' => set_value('keyword'),
	    'username' => set_value('username'),
	);
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('keywordahiran/key_ahiran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'keyword' => $this->input->post('keyword',TRUE),
		'username' => $this->session->identity,
	    );

            $this->Key_ahiran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('premium/keywordahiran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Key_ahiran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('premium/keywordahiran/update_action'),
		'idkey_ahiran' => set_value('idkey_ahiran', $row->idkey_ahiran),
		'keyword' => set_value('keyword', $row->keyword),
		'username' => set_value('username', $row->username),
	    );
            $data['aktif']      ='Premium';
            $data['title']       ='Admin Panel';
            $data['judul_menu']  ='Braja Marketindo';
            $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
            $this->load->view('keywordahiran/key_ahiran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('premium/keywordahiran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkey_ahiran', TRUE));
        } else {
            $data = array(
		'keyword' => $this->input->post('keyword',TRUE),
		'username' => $this->session->identity,
	    );

            $this->Key_ahiran_model->update($this->input->post('idkey_ahiran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('keywordahiran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Key_ahiran_model->get_by_id($id);

        if ($row) {
            $this->Key_ahiran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('premium/keywordahiran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('premium/keywordahiran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

	$this->form_validation->set_rules('idkey_ahiran', 'idkey_ahiran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Keywordahiran.php */
/* Location: ./application/controllers/Keywordahiran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-13 03:47:39 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keywordkota extends CI_Controller
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
        $this->load->model('Key_kota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'premium/keywordkota/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'premium/keywordkota/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'premium/keywordkota/index.html';
            $config['first_url'] = base_url() . 'premium/keywordkota/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Key_kota_model->total_rows($q);
        $keywordkota = $this->Key_kota_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'keywordkota_data' => $keywordkota,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('keywordkota/key_kota_list', $data);
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('premium/keywordkota/create_action'),
	    'idkey_kota' => set_value('idkey_kota'),
	    'keyword' => set_value('keyword'),
	    'username' => set_value('username'),
	);
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('keywordkota/key_kota_form', $data);
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

            $this->Key_kota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('premium/keywordkota'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Key_kota_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('premium/keywordkota/update_action'),
        		'idkey_kota' => set_value('idkey_kota', $row->idkey_kota),
        		'keyword' => set_value('keyword', $row->keyword),
        		'username' => set_value('username', $row->username),
        	    );
            $data['aktif']      ='Premium';
            $data['title']       ='Admin Panel';
            $data['judul_menu']  ='Braja Marketindo';
            $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
            $this->load->view('keywordkota/key_kota_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('premium/keywordkota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkey_kota', TRUE));
        } else {
            $data = array(
    		'keyword' => $this->input->post('keyword',TRUE),
    		'username' => $this->session->identity,
    	    );

            $this->Key_kota_model->update($this->input->post('idkey_kota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('premium/keywordkota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Key_kota_model->get_by_id($id);

        if ($row) {
            $this->Key_kota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('premium/keywordkota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('premium/keywordkota'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');

	$this->form_validation->set_rules('idkey_kota', 'idkey_kota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Keywordkota.php */
/* Location: ./application/controllers/Keywordkota.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-13 03:47:50 */
/* http://harviacode.com */
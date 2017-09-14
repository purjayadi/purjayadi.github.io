<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Keywordawalan extends CI_Controller
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
        $this->load->model('Key_awalan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'premium/keywordawalan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'premium/keywordawalan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'premium/keywordawalan/index.html';
            $config['first_url'] = base_url() . 'premium/keywordawalan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Key_awalan_model->total_rows($q);
        $keywordawalan = $this->Key_awalan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'keywordawalan_data' => $keywordawalan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('keywordawalan/key_awalan_list', $data);
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('premium/keywordawalan/create_action'),
	    'idkey_awalan' => set_value('idkey_awalan'),
	    'keyword' => set_value('keyword'),
	    'username' => set_value('username'),
	);
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('keywordawalan/key_awalan_form', $data);
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

            $this->Key_awalan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('premium/keywordawalan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Key_awalan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('keywordawalan/update_action'),
		'idkey_awalan' => set_value('idkey_awalan', $row->idkey_awalan),
		'keyword' => set_value('keyword', $row->keyword),
		'username' => set_value('username', $row->username),
	    );
            $data['aktif']      ='Premium';
            $data['title']       ='Admin Panel';
            $data['judul_menu']  ='Braja Marketindo';
            $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
            $this->load->view('keywordawalan/key_awalan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('premium/keywordawalan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkey_awalan', TRUE));
        } else {
            $data = array(
		'keyword' => $this->input->post('keyword',TRUE),
		'username' => $this->session->identity,
	    );

            $this->Key_awalan_model->update($this->input->post('idkey_awalan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('premium/keywordawalan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Key_awalan_model->get_by_id($id);

        if ($row) {
            $this->Key_awalan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('premium/keywordawalan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('premium/keywordawalan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('keyword', 'keyword', 'trim|required');
	$this->form_validation->set_rules('idkey_awalan', 'idkey_awalan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Keywordawalan.php */
/* Location: ./application/controllers/Keywordawalan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-13 03:47:13 */
/* http://harviacode.com */
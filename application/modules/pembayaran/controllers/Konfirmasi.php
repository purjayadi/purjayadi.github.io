<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran/konfirmasi/submit'),
	    'idpembayaran' => set_value('idpembayaran'),
	    'kode_user' => set_value('kode_user'),
	    'nama_pengirim' => set_value('nama_pengirim'),
	    'tgl_transfer' => set_value('tgl_transfer'),
	    'photo' => set_value('photo'),
	    'jmlh_transfer' => set_value('jmlh_transfer'),
	    'status' => set_value('status'),
	);
        $this->load->view('pembayaran_form', $data);
    }
    
    public function submit() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|gif|bmp';
        $config['max_size'] = '2000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('photo');
        $this->upload->set_xss_clean(TRUE);
        $hasil = $this->upload->data();
        if ($hasil['file_name']==''){
         $data = array('kode_user'=>$this->db->escape_str($this->input->post('kode_user', TRUE)),
                    'nama_pengirim'=>$this->db->escape_str($this->input->post('nama_pengirim', TRUE)),
                    'tgl_transfer'=>$this->db->escape_str($this->input->post('tgl_transfer', TRUE)),
                    'jmlh_transfer'=>$this->db->escape_str($this->input->post('jmlh_transfer', TRUE)),
                    'photo'=>$hasil['file_name'],
             );
            }else{
            $data = array('kode_user'=>$this->db->escape_str($this->input->post('kode_user', TRUE)),
                    'nama_pengirim'=>$this->db->escape_str($this->input->post('nama_pengirim', TRUE)),
                    'tgl_transfer'=>$this->db->escape_str($this->input->post('tgl_transfer', TRUE)),
                    'jmlh_transfer'=>$this->db->escape_str($this->input->post('jmlh_transfer', TRUE)),
                    'photo'=>$hasil['file_name'],
                    );
            }

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata("message", "<div class=\"alert alert-success alert-styled-left alert-arrow-left alert-component\" id=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>×</span><span class=\"sr-only\">Close</span></button>Berhasil tambah data</div>");
            redirect(site_url('pembayaran'));
        }

    }
    

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_user', 'kode user', 'trim|required');
	$this->form_validation->set_rules('nama_pengirim', 'nama pengirim', 'trim|required');
	$this->form_validation->set_rules('tgl_transfer', 'tgl transfer', 'trim|required');
	$this->form_validation->set_rules('jmlh_transfer', 'jmlh transfer', 'trim|required');

	$this->form_validation->set_rules('idpembayaran', 'idpembayaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
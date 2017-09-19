<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Info extends CI_Controller
{
	
	function __construct() {
       parent::__construct();
       $this->load->model('administrator/Mainmodel');
    }

    public function index() {
        $this->load->view('info');
    	
    }

    public function detail($id)
    {
        # code...
        $this->load->model('clocker_model');
        $row = $this->clocker_model->get_by_id($id);
        if ($row) {
            $data = array(
                        'idexternal_clocker' => $row->idexternal_clocker,
                        'url_external' => $row->url_external,
                        'url_redirect' => $row->url_redirect,
                        'url_tujuan' => $row->url_tujuan,
                        'username' => $row->username,
                        ); 
            $this->load->view('detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panelIMS/kategori'));
        }
    }

    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class News extends CI_Controller
{
	
	function __construct() {
       parent::__construct();
       $this->load->model('administrator/Mainmodel');
    }

    public function index() {
        $this->load->view('news');
    	
    }

    public function detail($id)
    {
        # code...
        $this->load->model('clocker_model');
        $row = $this->clocker_model->get_by_id($id);
        if ($row) {
            $data = array(
                        'idclocker' => $row->idclocker,
                        'title' => $row->title,
                        'deskripsi' => $row->deskripsi,
                        'url_redirect' => $row->url_redirect,
                        'url_tujuan' => $row->url_tujuan,
                        'photo' => $row->photo,
                        'username' => $row->username,
                        ); 
            $this->load->view('detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panelIMS/kategori'));
        }
    }

    
}

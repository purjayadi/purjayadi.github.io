<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Orderwa extends CI_Controller
{
	
	function __construct() {
       parent::__construct();
       $this->load->model('administrator/Mainmodel');
    }

    public function index() {
        $this->load->view('orderwa');
    	
    }

    public function detail($id)
    {
        # code...
        $this->load->model('Wa_order_model');
        $row = $this->Wa_order_model->get_by_id($id);
        if ($row) {
            $data = array(
                        'idwa_order' => $row->idwa_order,
                        'no_wa' => $row->no_wa,
                        'text_wa' => $row->text_wa,
                        'url_redirect' => $row->url_redirect,
                        'url_wa' => $row->url_wa,
                        'username' => $row->username,
                        ); 
            $this->load->view('detail', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panelIMS/kategori'));
        }
    }

    
}

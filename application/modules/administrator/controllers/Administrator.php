<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Administrator extends CI_Controller
{
	
	function __construct() {
       parent::__construct();
        if (!$this->ion_auth->logged_in()) {//cek login ga?
            redirect('login','refresh');
        }else{
            if (!$this->ion_auth->in_group('admin')) {//cek admin ga?
                redirect('login','refresh');
            }
        }
        $this->load->model('Mainmodel');
    }

    public function index() {
    	$this->load->view('dashboard');
    }

    
}

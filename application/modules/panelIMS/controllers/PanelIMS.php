<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanelIMS extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->ion_auth->logged_in()) {//cek login ga?
            redirect('login','refresh');
        }else{
            if (!$this->ion_auth->in_group('members')) {//cek admin ga?
                redirect('login','refresh');
            }
        }
	}

	public function index()
	{	
		$isi['aktif']		='Dashboard';
		$isi['title']		='Admin Panel';
		$isi['judul_menu']	='Braja Marketindo';
		$isi['nama_jln']	='Jl.Lotus Timur, Jakasetia, Jawa Barat';
		$isi['content']		='content';
		$this->load->view('dashboard',$isi);
	}
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pwarna extends CI_Controller {

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
        //$this->load->model('Model_Pwarna');
    }

	public function index()
	{	
		$data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Warna';
        $data['sub_judul']   ='Pengaturan Warna';
        //$data['table_title'] ='BrajaMarketindo BH';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'warna/warna_form';
        //$data['record']      = $this->Model_Pdasar->getpdasar();
        $this->load->view('dashboard', $data);
		
	}

	public function simpan(){
    }
}

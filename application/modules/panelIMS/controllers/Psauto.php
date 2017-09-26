<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psauto extends CI_Controller {

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
        $this->load->model('Model_Psauto');
    }

	public function index()
	{	
		$data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Autopost';
        $data['sub_judul']   ='Pengaturan Autopost';
        //$data['table_title'] ='BrajaMarketindo BH';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'psauto/psauto_form';
        //$data['record']      = $this->Model_Pdasar->getpdasar();
        $this->load->view('dashboard', $data);
		
	}

	public function simpan(){
        $jml_data  = $this->input->post('jml_data');
        $autopost_m    = $this->input->post('autopost_m');
        $waktu_mulai  = $this->input->post('waktu_mulai');
        $post_terakhir   = $this->input->post('post_terakhir');

        $data = array('jml_data' => $jml_data, 
                      'waktu_mulai' => $waktu_mulai,
                       'autopost_m' => $autopost_m,
                       'post_terakhir' => $post_terakhir,
                       'username' => $this->session->identity
                        );

        $simpan = $this->Model_Psauto->insert($data);
        if ($simpan) {
            $this->session->set_flashdata('info','Data Berhasil Disimpan!');
            redirect('panelIMS/psauto');
        } else {
            $this->session->set_flashdata('info','Gagal Menyimpan Data!');
            redirect('panelIMS/psauto');
        } 

    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmseo extends CI_Controller {

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
        $this->load->model('Model_Pmseo');
        $this->load->library('form_validation');
    }

	public function index()
	{	
		$data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Meta Seo';
        $data['table_title'] ='BrajaMarketindo MetaSeo';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'pmseo/pmseo_list';
        $data['record']      = $this->Model_Pmseo->getpmseo();
        $this->load->view('dashboard', $data);
		
	}

	public function edit($id){
        $data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Edit MetaSeo';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='pmseo/pmseo_edit';
        $data['record']      = $this->Model_Pmseo->edit($id);
        $this->load->view('dashboard', $data);
    }

	public function update(){

		$id_meta_seo = $this->input->post('id_meta_seo');
		$judul 		 = $this->input->post('judul');
		$deskripsi   = $this->input->post('deskripsi');
		$keyword     = $this->input->post('keyword');
		$google_ver  = $this->input->post('google_ver');

		$data = array('judul' => $judul, 
					  'deskripsi' => $deskripsi,
					   'keyword' => $keyword,
					   'google_ver' => $google_ver,
					   'tgl_entry' => date('Y-m-d H:i:s'),
                       'username' => $this->session->identity
					    );

		$update = $this->Model_Pmseo->update($id_meta_seo,$data);
		if ($update) {
            $this->session->set_flashdata('info','Data Berhasil Diubah!');
            redirect('panelIMS/pmseo');
        } else {
            $this->session->set_flashdata('info','Gagal Menghapus Data!');
            redirect('panelIMS/pmseo');
        }

	}
}

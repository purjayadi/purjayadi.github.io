<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdasar extends CI_Controller {

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
        $this->load->model('Model_Pdasar');
        $this->load->library('form_validation');
    }

	public function index()
	{	
		$data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Pengaturan Dasar';
        //$data['table_title'] ='BrajaMarketindo BH';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'pdasar/pdasar_form';
        //$data['record']      = $this->Model_Pdasar->getpdasar();
        $this->load->view('dashboard', $data);
		
	}

	public function simpan(){
		$jenis_web	= $this->input->post('jenis_web');
		$m_desktop	= $this->input->post('m_desktop');
		$m_phone	= $this->input->post('m_phone');
		$jml_kdesktop	= $this->input->post('jml_kdesktop');
		$tamp_kproduk	= $this->input->post('tamp_kproduk');
		$m_produk_h		= $this->input->post('m_produk_h');
		$m_artikel_h	= $this->input->post('m_artikel_h');
		$m_pro_kategori	= $this->input->post('m_pro_kategori');
		$m_art_artikel	= $this->input->post('m_art_artikel');
		$m_art_h		= $this->input->post('m_art_h');
		$m_tag			= $this->input->post('m_tag');
		$m_produk_pop	= $this->input->post('m_produk_pop');
		$m_footer		= $this->input->post('m_footer');
		$m_data			= $this->input->post('m_data');

		$data = array('jenis_web' => $jenis_web, 
					  'm_desktop' => $m_desktop,
					   'm_phone' => $m_phone,
					   'jml_kdesktop' => $jml_kdesktop,
					   'tamp_kproduk' => $tamp_kproduk,
					   'm_produk_h'	=> $m_produk_h,
					   'm_artikel_h' => $m_artikel_h,
					   'm_pro_kategori' => $m_pro_kategori,
					   'm_art_artikel' => $m_art_artikel,
					   'm_art_h' => $m_art_h,
					   'm_tag' => $m_tag,
					   'm_produk_pop' => $m_produk_pop,
					   'm_footer' => $m_footer,
					    'm_data' => $m_data,
					    'username' => $this->session->identity
					     );

		$simpan = $this->Model_Pdasar->insert($data);
		if ($simpan) {
                $this->session->set_flashdata('info','Data Berhasil Disimpan!');
                redirect('panelIMS/pdasar');
            } else {
                $this->session->set_flashdata('info','Gagal Menyimpan Data!');
                redirect('panelIMS/pdasar');
            }
	}
}

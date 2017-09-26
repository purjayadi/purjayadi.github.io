<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_artikel extends CI_Controller {

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
        $this->load->model('Model_Partikel');
        $this->load->library('form_validation');
    }

	public function index()
	{	
		$data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='1000 Artikel';
        $data['table_title'] ='BrajaMarketindo 1000 Artikel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='p_artikel/p_artikel_list';
        $data['record']      = $this->Model_Partikel->getp_artikel();
        $this->load->view('dashboard', $data);
	}

    public function addartikel(){
        $data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Add 1000 Artikel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='p_artikel/p_artikel_form';
        $this->load->view('dashboard', $data);
    }

    public function addcsv(){
        $data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Add CSV';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='p_artikel/p_csv_form';
        $this->load->view('dashboard', $data);
    }

    public function s_artikel(){

        $posisi         = $this->input->post('posisi');
        $id_produk      = $this->input->post('id_produk');
        $judul_artikel  = $this->input->post('judul_artikel');
        $ringkasan_artikel   = $this->input->post('ringkasan_artikel');
        $konteks_artikel     = $this->input->post('konteks_artikel');
        
        $data = array('posisi' => $posisi, 
                      'id_produk' => $id_produk,
                       'judul_artikel' => $judul_artikel,
                       'ringkasan_artikel' => $ringkasan_artikel,
                       'konteks_artikel' => $konteks_artikel,
                       'tgl_entry' => date('Y-m-d H:i:s'),
                       'username' => $this->session->identity
                        );

        $cek = $this->Model_Partikel->cek_id_produk($data['id_produk']);
        if($cek) 
        {
            $this->session->set_flashdata('info','Maaf Data Sudah Ada');
            redirect('panelIMS/p_artikel');
        } else {

        $simpan = $this->Model_Partikel->insert($data);
        if ($simpan) {
            $this->session->set_flashdata('info','Data Berhasil Disimpan!');
            redirect('panelIMS/p_artikel');
        } else {
            $this->session->set_flashdata('info','Gagal Menyimpan Data!');
            redirect('panelIMS/p_artikel');
        }
      }
    }

	public function edit($id){
        $data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Edit 1000 Artikel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='p_artikel/p_artikel_edit';
        $data['record']      = $this->Model_Partikel->edit($id);
        $this->load->view('dashboard', $data);
    }

	public function update(){

		$id_p_artikel   = $this->input->post('id_p_artikel');
        $posisi         = $this->input->post('posisi');
        $id_produk      = $this->input->post('id_produk');
        $judul_artikel  = $this->input->post('judul_artikel');
        $ringkasan_artikel   = $this->input->post('ringkasan_artikel');
        $konteks_artikel     = $this->input->post('konteks_artikel');
        
        $data = array('posisi' => $posisi, 
                      'id_produk' => $id_produk,
                       'judul_artikel' => $judul_artikel,
                       'ringkasan_artikel' => $ringkasan_artikel,
                       'konteks_artikel' => $konteks_artikel,
                       'tgl_entry' => date('Y-m-d H:i:s'),
                       'username' => $this->session->identity
                        );

		$ubah = $this->Model_Partikel->update($id_p_artikel,$data);
		if ($ubah) {
            $this->session->set_flashdata('info','Data Berhasil Diubah!');
            redirect('panelIMS/p_artikel');
        } else {
            $this->session->set_flashdata('info','Gagal Mengubah Data!');
            redirect('panelIMS/p_artikel');
        }
	}

    public function delete($id){
        $hapus = $this->Model_Partikel->delete($id);
        if ($hapus) {
            $this->session->set_flashdata('info','Data Berhasil Dihapus!');
            redirect('panelIMS/p_artikel');
        } else {
            $this->session->set_flashdata('info','Gagal Menghapus Data!');
            redirect('panelIMS/p_artikel');
        }
    }

    public function read($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='1000 Artikel';
        $data['read_title']  ='1000 Artikel Detail';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='p_artikel/p_artikel_read';
        $data['record']      = $this->Model_Partikel->getartikelbyid($id);
        $this->load->view('dashboard', $data);
    }
}

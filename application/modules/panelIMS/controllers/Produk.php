<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {//cek login ga?
            redirect('login','refresh');
        }else{
            if (!$this->ion_auth->in_group('members')) {//cek admin ga?
                redirect('login','refresh');
            }
        }
		$this->load->model('Model_produk');

	}

	public function index()
	{	
		$isi['aktif']		='Master';
		$isi['title']		='Admin Panel';
		$isi['judul']       ='Master';
        $isi['sub_judul']   ='Produk';
		$isi['table_title'] ='BrajaMarketindo Produk';
		$isi['judul_menu']	='Braja Marketindo';
		$isi['nama_jln']	='Jl.Lotus Timur, Jakasetia, Jawa Barat';
		$isi['content']		='produk/produk_list';
		$isi['nama_table']	='Data Produk';
		//$isi['datax']		= $this->Model_produk->getlistkategori();
		$isi['record']		= $this->Model_produk->getproduk();
		$this->load->view('dashboard',$isi);
	}

	public function add(){
		$isi['aktif']		='Master';
		$isi['title']		='Admin Panel';
		$isi['judul']       ='Master';
        $isi['sub_judul']   ='Add Produk';
		$isi['judul_menu']	='Braja Marketindo';
		$isi['nama_jln']	='Jl.Lotus Timur, Jakasetia, Jawa Barat';
		$isi['content']		='produk/produk_form';
		//$isi['nama_table']	='Data Produk';
		//$isi['key_awal']	= $this->Model_produk->getkeyawalan();
		$this->load->view('dashboard',$isi);
	}

	public function simpan(){

		$config['upload_path']      = "./assets/imgproduk/";
        $config['allowed_types']    = 'jpg|jpeg|png|gif|bmp';
        $config['max_size']         = 500000;
        $config['max_width']        = 5000;
        $config['max_height']       = 5000;

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile')) {
            $file_data      = $this->upload->data();

            $gambar         = $file_data['file_name'];
            $id_kategori	= $this->input->post('id_kategori');
           	$nama_produk	= $this->input->post('nama_produk');
			$ket_gambar		= $this->input->post('ket_gambar');
			$harga			= $this->input->post('harga');
			$deskripsi		= $this->input->post('deskripsi');
			$keyword		= $this->input->post('keyword');
			$no_urut		= $this->input->post('no_urut');
			$key_awal		= $this->input->post('key_awal');
			$key_akhir		= $this->input->post('key_akhir');
			$key_kota		= implode(',', $this->input->post('key_kota'));
			$nama_judul		= $this->input->post('nama_judul');

			$data = array('id_produk'=>$this->Model_produk->buat_kode(),
						   'gambar' => $gambar,
						   'kategori_id_kategori' => $id_kategori,
						   'nama_produk' => $nama_produk,
						   'ket_gambar' => $ket_gambar,
						   'harga' => $harga,
						   'deskripsi' => $deskripsi,
						   'keyword' => $keyword,
						   'no_urut' => $no_urut,
						   'key_awal' => $key_awal,
						   'key_akhir' => $key_akhir,
						   'key_kota' => $key_kota,
						   'nama_judul' => $nama_judul,
						   'tgl_entry' => date('Y-m-d H:i:s'),
						   'username' => $this->session->identity
							 );
		
           $this->Model_produk->insertdata($data);
            $this->session->set_flashdata('info','Data Berhasil Disimpan!');
            redirect('panelIMS/produk');
            
        } else {
            $this->session->set_flashdata('info','Gagal Menyimpan Data!');
            redirect('panelIMS/produk');
        } 	
    
	}

	public function edit($id){
		$isi['aktif']		='Master';
		$isi['title']		='Admin Panel';
		$isi['judul']       ='Master';
        $isi['sub_judul']   ='Edit Produk';
		$isi['judul_menu']	='Braja Marketindo';
		$isi['nama_jln']	='Jl.Lotus Timur, Jakasetia, Jawa Barat';
		$isi['content']		='produk/produk_edit';
		$isi['nama_table']	='Data Produk';
		$isi['record']		= $this->Model_produk->dataedit($id);
		//$isi['key_awal']	= $this->Model_produk->getkeyawalan();
		$this->load->view('dashboard',$isi);

	}

	public function update(){

		$config['upload_path']      = "./assets/imgproduk/";
        $config['allowed_types']    = 'jpg|jpeg|png|gif|bmp';
        $config['max_size']         = 500000;
        $config['max_width']        = 5000;
        $config['max_height']       = 5000;

        //unlink("./assets/imgproduk/".$gambar);
        //$config['file_name']        = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
        //$config['overwrite'] 		= TRUE;
       /* $oldfile   = $config['upload_path'].$hasil['file_name'];
				if( file_exists( $oldfile ) ){
				    unlink( $oldfile );
				}*/
        
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $this->upload->do_upload('userfile');
        $hasil = $this->upload->data();

        if ($hasil['file_name'] == '') {
        	$id_kategori	= $this->input->post('id_kategori');
           	$nama_produk	= $this->input->post('nama_produk');
			$ket_gambar		= $this->input->post('ket_gambar');
			$harga			= $this->input->post('harga');
			$deskripsi		= $this->input->post('deskripsi');
			$keyword		= $this->input->post('keyword');
			$no_urut		= $this->input->post('no_urut');
			$key_awal		= $this->input->post('key_awal');
			$key_akhir		= $this->input->post('key_akhir');
			$key_kota		= implode(',', $this->input->post('key_kota'));
			$nama_judul		= $this->input->post('nama_judul');
			$tampil 		= $this->input->post('tampil');
			$id_produk		= $this->input->post('id_produk');

			$data = array( 'kategori_id_kategori' => $id_kategori,
						   'nama_produk' => $nama_produk,
						   'ket_gambar' => $ket_gambar,
						   'harga' => $harga,
						   'deskripsi' => $deskripsi,
						   'keyword' => $keyword,
						   'no_urut' => $no_urut,
						   'key_awal' => $key_awal,
						   'key_akhir' => $key_akhir,
						   'key_kota' => $key_kota,
						   'nama_judul' => $nama_judul,
						   'tampil' => $tampil,
						   'tgl_entry' => date('Y-m-d H:i:s'),
						   'username' => $this->session->identity
							 );
        } elseif ($hasil['file_name'] != '') {

        	$gambar         = $hasil['file_name'];
        	$id_kategori	= $this->input->post('id_kategori');
           	$nama_produk	= $this->input->post('nama_produk');
			$ket_gambar		= $this->input->post('ket_gambar');
			$harga			= $this->input->post('harga');
			$deskripsi		= $this->input->post('deskripsi');
			$keyword		= $this->input->post('keyword');
			$no_urut		= $this->input->post('no_urut');
			$key_awal		= $this->input->post('key_awal');
			$key_akhir		= $this->input->post('key_akhir');
			$key_kota		= implode(',', $this->input->post('key_kota'));
			$nama_judul		= $this->input->post('nama_judul');
			$tampil 		= $this->input->post('tampil');
			$id_produk		= $this->input->post('id_produk');

			$query = $this->db->query("select * from produk where id_produk= '{$id_produk}'");
			foreach ($query->result() as $key) {
				unlink('./assets/imgproduk/'.$key->gambar);
			}

			$data = array( 'gambar' => $gambar,
						   'kategori_id_kategori' => $id_kategori,
						   'nama_produk' => $nama_produk,
						   'ket_gambar' => $ket_gambar,
						   'harga' => $harga,
						   'deskripsi' => $deskripsi,
						   'keyword' => $keyword,
						   'no_urut' => $no_urut,
						   'key_awal' => $key_awal,
						   'key_akhir' => $key_akhir,
						   'key_kota' => $key_kota,
						   'nama_judul' => $nama_judul,
						   'tampil' => $tampil,
						   'tgl_entry' => date('Y-m-d H:i:s'),
						   'username' => $this->session->identity
							 );
        } 
        $ubah = $this->Model_produk->updatedata($id_produk,$data);
            if ($ubah) {
            	$this->session->set_flashdata('info','Data Berhasil Diubah!');
            	redirect('panelIMS/produk');
            } else {
            $this->session->set_flashdata('info','Gagal Mengubah Data!');
            redirect('panelIMS/produk');
        	}  
	}

	public function delete($id){

        $delete = $this->Model_produk->deletedata($id);
        if ($delete) {
            $this->session->set_flashdata('info','Data Berhasi Dihapus!');
            redirect('panelIMS/produk');
        } else {
            $this->session->set_flashdata('info','Gagal Menghapus Data');
            redirect('panelIMS/produk');
        }
    }

    public function read($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Produk Detail';
        $data['read_title']  ='Produk Detail';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='produk/produk_read';
        $data['record']      = $this->Model_produk->getprodukbyid($id);
        $this->load->view('dashboard', $data);
    }
}


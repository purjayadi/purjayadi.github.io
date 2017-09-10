<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_produk');

	}

	public function index()
	{	
		$isi['aktif']		='Master';
		$isi['title']		='Admin Panel';
		$isi['judul_menu']	='Braja Marketindo';
		$isi['nama_jln']	='Jl.Lotus Timur, Jakasetia, Jawa Barat';
		$isi['content']		='produk/produk_list';
		$isi['nama_table']	='Data Produk';
		$isi['data']		= $this->Model_produk->getproduk();
		$this->load->view('dashboard',$isi);
	}

	public function addproduk(){
		$isi['aktif']		='Master';
		$isi['title']		='Admin Panel';
		$isi['judul_menu']	='Braja Marketindo';
		$isi['nama_jln']	='Jl.Lotus Timur, Jakasetia, Jawa Barat';
		$isi['content']		='produk/produk_form';
		//$isi['nama_table']	='Data Produk';
		//$isi['data']		= $this->Model_produk->getproduk();
		$this->load->view('dashboard',$isi);
	}
}


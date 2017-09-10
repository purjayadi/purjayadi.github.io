<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

	public function getproduk()
	{	

	    $query = "SELECT 
				`produk`.`tgl_entry`,
				`produk`.`nama_produk`,
				`produk`.`harga`,
				`produk`.`no_urut`,
				`produk`.`tampil`,
				`kategori`.`nama_kategori`
				 FROM `produk`, `kategori`
				WHERE `produk`.`kategori_id_kategori` = `kategori`.`id_kategori`";

		$data = $this->db->query($query);
		return $data;
	}
}


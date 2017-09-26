<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

	public function getlistkategori(){
		return $this->db->get('kategori')->result();
	}

	public function getproduk()
	{	
	 $this->db->select("produk.id_produk, produk.tgl_entry, produk.nama_produk, produk.gambar, produk. harga, produk.no_urut, produk.tampil, produk.username, kategori.nama_kategori");
	  $this->db->from('produk');
	  $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id_kategori');
	  $this->db->where(array('produk.username' => $this->session->identity));
	  $query = $this->db->get();
	  return $query;

		/*
		$ses =$this->session->identity;
	    $query = "SELECT 
	    		`produk`.`id_produk`,
				`produk`.`tgl_entry`,
				`produk`.`nama_produk`,
				`produk`.`gambar`,
				`produk`.`harga`,
				`produk`.`no_urut`,
				`produk`.`tampil`,
				`kategori`.`nama_kategori`
				 FROM `produk`, `kategori`
				join `produk`.`kategori_id_kategori` = `kategori`.`id_kategori` WHERE username='$ses'";
		$data = $this->db->query($query);
		return $data;
		*/
	}

	public function insertdata($data){
		$data = $this->db->insert('produk',$data);
		return $data;
	}

	public function dataedit($id){				
		$this->db->where('id_produk',$id);
		$this->db->where('username', $this->session->identity);
		$data = $this->db->get('produk');
		return $data;
	}

	public function updatedata($id,$data){
		$this->db->where('id_produk',$id);
		$this->db->where('username', $this->session->identity);
		$update = $this->db->update('produk',$data);
		return $update;
	}

	public function deletedata($id){
	    $this->db->where('id_produk',$id);
	    $this->db->where('username', $this->session->identity);
	    $delete = $this->db->get('produk');
	    $row = $delete->row();
	    unlink("./assets/imgproduk/$row->gambar");
	    $hapus = $this->db->delete('produk', array('id_produk' => $id));
	    return $hapus;
	}

	public function getprodukbyid($id){
    $this->db->where('id_produk',$id);
    $this->db->where('username', $this->session->identity);
    $produk_byid = $this->db->get('produk');
    return $produk_byid;
  }

   public function buat_kode()   {
          $this->db->select('RIGHT(produk.id_produk, 4) as kode', FALSE);
          $this->db->order_by('id_produk','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('produk');      //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
          }
          else {      
           //jika kode belum ada      
           $kode = 1;    
          }
          $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
          $kodejadi = "1000".$kodemax;    // hasilnya ODJ-9921-0001 dst.
          return $kodejadi;   
    }

}


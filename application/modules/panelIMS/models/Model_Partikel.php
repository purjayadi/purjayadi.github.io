<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_partikel extends CI_Model {

	public function getp_artikel(){
        $this->db->where('username', $this->session->identity);
        $artikel = $this->db->get('p_artikel');
        return $artikel->result();
    }

    public function insert($data){
    	$simpan = $this->db->insert('p_artikel',$data);
    	return $simpan;
    }

    public function edit($id){
    	$this->db->where('id_p_artikel',$id);
        $this->db->where('username', $this->session->identity);
    	$ubah = $this->db->get('p_artikel');
    	return $ubah->result();
    }

    public function update($id,$data){
    	$this->db->where('id_p_artikel',$id);
        $this->db->where('username', $this->session->identity);
    	$ubah_data = $this->db->update('p_artikel',$data);
    	return $ubah_data;
    }

    public function delete($id){
    	$this->db->where('id_p_artikel',$id);
        $this->db->where('username', $this->session->identity);
    	$hapus = $this->db->delete('p_artikel');
    	return $hapus;
    }

    public function getartikelbyid($id){
    $this->db->where('id_p_artikel',$id);
    $this->db->where('username', $this->session->identity);
    $artikel_byid = $this->db->get('p_artikel');
    return $artikel_byid;
  	}

    public function cek_id_produk($id){
 		$this->db->where('id_produk', $id);
        $this->db->where('username', $this->session->identity);
		$cek = $this->db->get('p_artikel');
		if($cek->num_rows() > 0) {
			return TRUE;
		} else return FALSE;
 	}
}

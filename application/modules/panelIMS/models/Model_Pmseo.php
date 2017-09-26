<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Pmseo extends CI_Model {


	public function getpmseo(){
		$this->db->where('username', $this->session->identity);
		$data = $this->db->get('meta_seo');
		return $data->result();
	}

	public function edit($id){
		$this->db->where('id_meta_seo',$id);
		$this->db->where('username', $this->session->identity);
		$ubah = $this->db->get('meta_seo');
		return $ubah;
	}

	public function update($id,$data){
		$this->db->where('id_meta_seo',$id);
		$this->db->where('username', $this->session->identity);
		$ubah = $this->db->update('meta_seo',$data);
		return $ubah;
	}
	
}

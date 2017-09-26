<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Pdeteks extends CI_Model
{

  public function getpdeteks(){
    $this->db->where('username', $this->session->identity);
    $get_pdeteks = $this->db->get('p_dekorteks');
    return $get_pdeteks->result();
  }

  public function insert($data){
    $simpan = $this->db->insert('p_dekorteks',$data);
    return $simpan;
  }

  public function edit($id){
  	$this->db->where('id_dekorteks',$id);
    $this->db->where('username', $this->session->identity);
  	$ubah = $this->db->get('p_dekorteks');
  	return $ubah;
  }

  public function update($id,$data){
  	$this->db->where('id_dekorteks',$id);
    $this->db->where('username', $this->session->identity);
  	$ubah_data = $this->db->update('p_dekorteks',$data);
  	return $ubah_data;
  }

  public function hapusdata($id){
  	$this->db->where('id_dekorteks',$id);
    $this->db->where('username', $this->session->identity);
  	$hapus_data = $this->db->delete('p_dekorteks');
  	return $hapus_data;
  }

 }

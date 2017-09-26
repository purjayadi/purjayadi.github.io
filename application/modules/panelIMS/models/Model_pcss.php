<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Pcss extends CI_Model
{

  public function getpcss(){
    $this->db->where('username', $this->session->identity);
    $get_pcss = $this->db->get('p_css');
    return $get_pcss->result();
  }

  public function edit($id){
  	$this->db->where('id_css',$id);
    $this->db->where('username', $this->session->identity);
  	$ubah = $this->db->get('p_css');
  	return $ubah;
  }

  public function update($id,$data){
  	$this->db->where('id_css',$id);
    $this->db->where('username', $this->session->identity);
  	$ubah_data = $this->db->update('p_css',$data);
  	return $ubah_data;
  }

  public function hapusdata($id){
  	$this->db->where('id_css',$id);
    $this->db->where('username', $this->session->identity);
  	$hapus_data = $this->db->delete('p_css');
  	return $hapus_data;
  }

 }

<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Pwarna extends CI_Model
{

  public function getpwarna(){
  	$this->db->where('username', $this->session->identity);
    $get_pwarna = $this->db->get('p_warna');
    return $get_pwarna->result();
  }

  public function insert($data){
    $simpan = $this->db->insert('p_warna',$data);
    return $simpan;
  }

 }

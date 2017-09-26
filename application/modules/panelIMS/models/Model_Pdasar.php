<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Pdasar extends CI_Model
{

  public function getpdasar(){
  	$this->db->where('username', $this->session->identity);
    $get_pdasar = $this->db->get('p_setdasar');
    return $get_pdasar->result();
  }

  public function insert($data){
  	$this->db->where('username', $this->session->identity);
    $simpan = $this->db->insert('p_setdasar',$data);
    return $simpan;
  }

 }

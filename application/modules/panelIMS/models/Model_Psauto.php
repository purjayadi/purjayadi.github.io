<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Psauto extends CI_Model
{

  public function getpsauto(){
  	$this->db->where('username', $this->session->identity);
    $get_psauto = $this->db->get('p_set_autopost');
    return $get_psauto->result();
  }

  public function insert($data){
  	$this->db->where('username', $this->session->identity);
    $simpan = $this->db->insert('p_set_autopost',$data);
    return $simpan;
  }

 }

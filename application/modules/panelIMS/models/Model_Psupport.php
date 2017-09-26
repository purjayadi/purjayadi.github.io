<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Psupport extends CI_Model {

	public function getpsupport(){
        $this->db->where('username', $this->session->identity);
        $data = $this->db->get('p_support');
        return $data->result();
    }

    public function insert($data){
        $this->db->where('username', $this->session->identity);
        $tambah = $this->db->insert('p_support',$data);
        return $tambah;
    }

    public function edit($id){
        $this->db->where('id_support',$id);
        $this->db->where('username', $this->session->identity);
        $ubah = $this->db->get('p_support');
        return $ubah;
    }

    public function update($id,$data){
        $this->db->where('id_support',$id);
        $this->db->where('username', $this->session->identity);
        $ubah_data = $this->db->update('p_support',$data);
        return $ubah_data;
    }

    public function hapusdata($id){
        $this->db->where('id_support',$id);
        $this->db->where('username', $this->session->identity);
        $delete = $this->db->delete('p_support');
        return $delete;
    }

    public function getsupportbyid($id){
    $this->db->where('id_support',$id);
    $this->db->where('username', $this->session->identity);
    $support_byid = $this->db->get('p_support');
    return $support_byid;
  }
}

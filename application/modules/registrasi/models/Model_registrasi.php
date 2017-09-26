<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_registrasi extends CI_Model
{

    public $table = 'pendaftaran';
    public $id = 'id_pendaftaran';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    public function buat_kode()   {
          $this->db->select('RIGHT(pendaftaran.id_pendaftaran,4) as kode', FALSE);
          $this->db->order_by('id_pendaftaran','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('pendaftaran');      //cek dulu apakah ada sudah ada kode di tabel.    
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
          $kodejadi = "PNDFTN-01-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
          return $kodejadi;   
    }
}
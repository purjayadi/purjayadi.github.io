<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mainmodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function produk(){
        $this->db->order_by('id_produk', 'DESC');
        return $this->db->get('produk');
    }

}
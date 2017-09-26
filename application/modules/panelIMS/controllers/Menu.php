<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {//cek login ga?
            redirect('login','refresh');
        }else{
            if (!$this->ion_auth->in_group('members')) {//cek admin ga?
                redirect('login','refresh');
            }
        }
        $this->load->model('Model_menu');
        $this->load->library('form_validation');
    }

    public function index()
    {  
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Menu';
        $data['table_title'] ='BrajaMarketindo Menu';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='menu/menu_list';
        $data['record']      = $this->Model_menu->getmenu();
        $this->load->view('dashboard', $data);
    }

    public function add(){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Add Menu';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='menu/menu_form';
        $this->load->view('dashboard', $data);
    }

    public function simpan(){

        $config['upload_path']      = "./assets/imgmenu/";
        $config['allowed_types']    = 'jpg|jpeg|png|gif|bmp';
        $config['max_size']         = 500000;
        $config['max_width']        = 5000;
        $config['max_height']       = 5000;

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile')) {
            $file_data      = $this->upload->data();

            $gambar         = $file_data['file_name'];
            $nama_menu      = $this->input->post('nama_menu');
            $posisi         = $this->input->post('posisi');
            $ket_gambar     = $this->input->post('ket_gambar');
            $kontent        = $this->input->post('kontent');
            $no_urut        = $this->input->post('no_urut');

            $data = array('nama_menu' => $nama_menu,
                           'gambar' => $gambar,
                           'posisi' => $posisi,
                           'ket_gambar' => $ket_gambar,
                           'kontent' => $kontent,
                           'no_urut' => $no_urut,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'username' => $this->session->identity
                           );
            $this->Model_menu->insertdata($data);
            $this->session->set_flashdata('info','Data Berhasil Disimpan!');
            redirect('panelIMS/menu');
            
        } else {
            $this->session->set_flashdata('info','Gagal Menyimpan Data!');
            redirect('panelIMS/menu');
        } 
        
    }

    public function edit($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Edit Menu';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='menu/menu_edit';
        $data['record']      = $this->Model_menu->editmenu($id);
        $row = $this->Model_menu->editmenu($id);
        if ($row) {
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panelIMS/menu'));
        }
    }

    public function update(){

        $config['upload_path']    = "./assets/imgmenu/";
        $config['allowed_types']  = 'jpg|jpeg|png|gif|bmp';
        $config['max_size']       = 500000;
        $config['max_width']      = 5000;
        $config['max_height']     = 5000;
        //$config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));

        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $this->upload->do_upload('userfile');
        $hasil = $this->upload->data();

        if ($hasil['file_name'] == '') {
            //$gambar         = $file_data['file_name'];
            $nama_menu      = $this->input->post('nama_menu');
            $posisi         = $this->input->post('posisi');
            $ket_gambar     = $this->input->post('ket_gambar');
            $kontent        = $this->input->post('kontent');
            $no_urut        = $this->input->post('no_urut');
            $tampil         = $this->input->post('tampil');
            $id_menu        = $this->input->post('id_menu');
            $data = array('nama_menu' => $nama_menu,
                           //'gambar' => $gambar,
                           'posisi' => $posisi,
                           'ket_gambar' => $ket_gambar,
                           'kontent' => $kontent,
                           'no_urut' => $no_urut,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'tampil'    => $tampil,
                           'username' => $this->session->identity
                           );
        } elseif ($hasil['file_name'] != '') {

            $gambar         = $hasil['file_name'];
            $nama_menu      = $this->input->post('nama_menu');
            $posisi         = $this->input->post('posisi');
            $ket_gambar     = $this->input->post('ket_gambar');
            $kontent        = $this->input->post('kontent');
            $no_urut        = $this->input->post('no_urut');
            $tampil         = $this->input->post('tampil');
            $id_menu        = $this->input->post('id_menu');

            $query = $this->db->query("select * from menu where id_menu= '{$id_menu}'");
            foreach ($query->result() as $key) {
                unlink('./assets/imgmenu/'.$key->gambar);
            }

            $data = array('nama_menu' => $nama_menu,
                           'gambar' => $gambar,
                           'posisi' => $posisi,
                           'ket_gambar' => $ket_gambar,
                           'kontent' => $kontent,
                           'no_urut' => $no_urut,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'tampil'    => $tampil,
                           'username' => $this->session->identity
                           );
        } 
         $ubah = $this->Model_menu->updatedata($id_menu,$data);
         if ($ubah) {
             $this->session->set_flashdata('info','Data Berhasil Diubah!');
             redirect('panelIMS/menu');
         } else {
            $this->session->set_flashdata('info','Gagal Mengubah Data!');
            redirect('panelIMS/menu');
        }
    }

    public function delete($id){
        $delete = $this->Model_menu->deletedata($id);
        if ($delete) {
            $this->session->set_flashdata('info','Data Berhasil Dihapus!');
            redirect('panelIMS/menu');
        } else {
            $this->session->set_flashdata('info','Gagal Mengahpus Data!');
            redirect('panelIMS/menu');
        }
    }

    public function read($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Menu Detail';
        $data['read_title']  ='Menu Detail';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='menu/menu_read';
        $data['record']      = $this->Model_menu->getmenubyid($id);
        $this->load->view('dashboard', $data);
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "menu.xls";
        $judul = "menu";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Menu");
	xlsWriteLabel($tablehead, $kolomhead++, "Posisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Kontent");
	xlsWriteLabel($tablehead, $kolomhead++, "No Urut");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Entry");
	xlsWriteLabel($tablehead, $kolomhead++, "Tampil");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");

	foreach ($this->Menu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_menu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->posisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket_gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kontent);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_urut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_entry);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tampil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=menu.doc");

        $data = array(
            'menu_data' => $this->Menu_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('menu/menu_doc',$data);
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-07 03:56:07 */
/* http://harviacode.com */
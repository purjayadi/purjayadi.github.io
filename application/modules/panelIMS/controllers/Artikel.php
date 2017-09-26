<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {//cek login ga?
            redirect('login','refresh');
        }else{
            if (!$this->ion_auth->in_group('members')) {//cek admin ga?
                redirect('login','refresh');
            }
        }
        $this->load->model('Model_artikel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Artikel';
        $data['table_title'] ='BrajaMarketindo Artikel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'artikel/artikel_list';
        $data['record']      = $this->Model_artikel->getartikel();
        $this->load->view('dashboard', $data);
    }

    public function add(){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Add Artikel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='artikel/artikel_form';
        $this->load->view('dashboard', $data);
    }

    public function simpan(){

        $config['upload_path']      = "./assets/imgartikel/";
        $config['allowed_types']    = 'jpg|jpeg|png|gif|bmp';
        $config['max_size']         = 500000;
        $config['max_width']        = 5000;
        $config['max_height']       = 5000;

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile')) {
            $file_data      = $this->upload->data();

            $gambar         = $file_data['file_name'];
            $judul_artikel  = $this->input->post('judul_artikel');
            //$posisi         = $this->input->post('posisi');
            $ket_gambar     = $this->input->post('ket_gambar');
            $kontent        = $this->input->post('kontent');
            $no_urut        = $this->input->post('no_urut');

            $data = array('judul_artikel' => $judul_artikel,
                           'gambar' => $gambar,
                           //'posisi' => $posisi,
                           'ket_gambar' => $ket_gambar,
                           'kontent' => $kontent,
                           'no_urut' => $no_urut,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'username' => $this->session->identity
                           );
            $this->Model_artikel->insertdata($data);
            $this->session->set_flashdata('info','Data Berhasil Disimpan!');
            redirect('panelIMS/artikel');
            
        } else {
            $this->session->set_flashdata('info','Gagal Menyimpan Data!');
            redirect('panelIMS/artikel');
        } 
    }

    public function edit($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Edit Artikel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='artikel/artikel_edit';
        $data['record']      = $this->Model_artikel->editartikel($id);
        $this->load->view('dashboard', $data);
    }

    public function update(){

        $config['upload_path']    = "./assets/imgartikel/";
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
            $judul_artikel  = $this->input->post('judul_artikel');
            //$posisi         = $this->input->post('posisi');
            $ket_gambar     = $this->input->post('ket_gambar');
            $kontent        = $this->input->post('kontent');
            $no_urut        = $this->input->post('no_urut');
            $tampil         = $this->input->post('tampil');
            $id_artikel     = $this->input->post('id_artikel');
            
            $data = array('judul_artikel' => $judul_artikel,
                           //'gambar' => $gambar,
                           //'posisi' => $posisi,
                           'ket_gambar' => $ket_gambar,
                           'kontent' => $kontent,
                           'no_urut' => $no_urut,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'tampil'    => $tampil,
                           'username' => $this->session->identity
                           );
        } elseif ($hasil['file_name'] != '') {

            $gambar         = $hasil['file_name'];
            $judul_artikel  = $this->input->post('judul_artikel');
            //$posisi         = $this->input->post('posisi');
            $ket_gambar     = $this->input->post('ket_gambar');
            $kontent        = $this->input->post('kontent');
            $no_urut        = $this->input->post('no_urut');
            $tampil         = $this->input->post('tampil');
            $id_artikel     = $this->input->post('id_artikel');

            $query = $this->db->query("select * from artikel where id_artikel= '{$id_artikel}'");
            foreach ($query->result() as $key) {
                unlink('./assets/imgartikel/'.$key->gambar);
            }

            $data = array('judul_artikel' => $judul_artikel,
                           'gambar' => $gambar,
                           //'posisi' => $posisi,
                           'ket_gambar' => $ket_gambar,
                           'kontent' => $kontent,
                           'no_urut' => $no_urut,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'tampil'    => $tampil,
                           'username' => $this->session->identity
                           );
        }
        $ubah = $this->Model_artikel->updatedata($id_artikel,$data);
            if ($ubah) {
                $this->session->set_flashdata('info','Data Berhasil Diubah!');
                redirect('panelIMS/artikel');
            } else {
            $this->session->set_flashdata('info','Gagal Mengubah Data!');
            redirect('panelIMS/artikel');
        }

    }

    public function delete($id){
        $delete = $this->Model_artikel->deletedata($id);
        if ($delete) {
            $this->session->set_flashdata('info','Data Berhasil Dihapus!');
            redirect('panelIMS/artikel');
        } else {
            $this->session->set_flashdata('info','Gagal Menghapus Data!');
            redirect('panelIMS/artikel');
        }
    }

    public function read($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Artikel Detail';
        $data['read_title']  ='Artikel Detail';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='artikel/artikel_read';
        $data['record']      = $this->Model_artikel->get_byid($id);
        $this->load->view('dashboard', $data);
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kategori.xls";
        $judul = "kategori";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket Gambar");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "No Urut");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Entry");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Tampil");

	foreach ($this->Kategori_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket_gambar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_urut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_entry);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tampil);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kategori.doc");

        $data = array(
            'kategori_data' => $this->Kategori_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kategori/kategori_doc',$data);
    }

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-07 08:52:36 */
/* http://harviacode.com */
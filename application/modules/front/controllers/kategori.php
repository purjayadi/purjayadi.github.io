<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_front');
        $this->load->library('form_validation');
    }

    public function index()
    {
        //$data['aktif']       ='Master';
        $data['title']       ='Kategori';
        //$data['judul']       ='Master';
        //$data['sub_judul']   ='Kategori';
        //$data['table_title'] ='BrajaMarketindo Kategori';
        //$data['judul_menu']  ='Braja Marketindo';
        //$data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        //$data['content']     = 'kategori/kategori_list';
        $data['record']      = $this->Model_front->getfront();
        $this->load->view('v_front', $data);
    }

    public function add(){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Add Kategori';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='kategori/kategori_form';
        $this->load->view('dashboard', $data);
    }

    public function simpan(){

        $config['upload_path']      = "./assets/imgkategori/";
        $config['allowed_types']    = 'jpg|jpeg|png|gif|bmp';
        $config['max_size']         = 500000;
        $config['max_width']        = 5000;
        $config['max_height']       = 5000;

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('userfile')) {
            $file_data      = $this->upload->data();

            $gambar         = $file_data['file_name'];
            $nama_kategori  = $this->input->post('nama_kategori');
            //$posisi         = $this->input->post('posisi');
            $ket_gambar     = $this->input->post('ket_gambar');
            $deskripsi      = $this->input->post('deskripsi');
            $no_urut        = $this->input->post('no_urut');

            $data = array('nama_kategori' => $nama_kategori,
                           'gambar' => $gambar,
                           //'posisi' => $posisi,
                           'ket_gambar' => $ket_gambar,
                           'deskripsi' => $deskripsi,
                           'no_urut' => $no_urut,
                           'tgl_entry' => date('Y-m-d H:i:s')
                           );
            $this->Model_kategori->insertdata($data);
            $this->session->set_flashdata('info','Well Done, Data is Save!');
            redirect('panelIMS/kategori');
            
        } else {
            $this->session->set_flashdata('info','Failed Data Save!');
            redirect('panelIMS/kategori');
        } 
    }

    public function edit($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Edit Artikel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='kategori/kategori_edit';
        $data['record']      = $this->Model_kategori->editkategori($id);
        $this->load->view('dashboard', $data);
    }

    public function update(){

        $config['upload_path']    = "./assets/imgkategori/";
        $config['allowed_types']  = 'jpg|jpeg|png|gif|bmp';
        $config['max_size']       = 500000;
        $config['max_width']      = 5000;
        $config['max_height']     = 5000;
        $config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));

        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('userfile')) {
            $file_data      = $this->upload->data();

            $gambar         = $file_data['file_name'];
            $nama_kategori  = $this->input->post('nama_kategori');
            //$posisi         = $this->input->post('posisi');
            $ket_gambar     = $this->input->post('ket_gambar');
            $deskripsi      = $this->input->post('deskripsi');
            $no_urut        = $this->input->post('no_urut');
            $tampil         = $this->input->post('tampil');
            $id_kategori    = $this->input->post('id_kategori');
            
            $data = array('nama_kategori' => $nama_kategori,
                           'gambar' => $gambar,
                           //'posisi' => $posisi,
                           'ket_gambar' => $ket_gambar,
                           'deskripsi' => $deskripsi,
                           'no_urut' => $no_urut,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'tampil'    => $tampil,
                           );
            $this->Model_kategori->updatedata($id_kategori,$data);
            $this->session->set_flashdata('info','Well Done, Data is Change!');
            redirect('panelIMS/kategori');
            
        } else {
            $this->session->set_flashdata('info','Failed Data Change!');
            redirect('panelIMS/kategori');
        } 
    }

    public function read($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Kategori Detail';
        $data['read_title']  ='Kategori Detail';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='kategori/kategori_read';
        $data['record']      = $this->Model_kategori->get_byid($id);
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
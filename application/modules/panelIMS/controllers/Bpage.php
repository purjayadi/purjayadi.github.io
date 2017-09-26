<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bpage extends CI_Controller
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
        $this->load->model('Model_bpage');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='BodyPerPage';
        $data['table_title'] ='BrajaMarketindo BodyPerPage';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'bpage/bpage_list';
        $data['record']      = $this->Model_bpage->getbpage();
        $this->load->view('dashboard', $data);
    }

    public function add(){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Add BodyPerPage';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='bpage/bpage_form';
        $this->load->view('dashboard', $data);
    }

    public function simpan(){

            $hal_web        = $this->input->post('hal_web');
            $kontent_link   = $this->input->post('kontent_link');
                            
            $data = array('hal_web' => $hal_web,
                           'kontent_link' => $kontent_link,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'username' => $this->session->identity
                           );
            $simpan = $this->Model_bpage->insertdata($data);
            if ($simpan) {
                $this->session->set_flashdata('info','Data Berhasil Disimpan!');
                redirect('panelIMS/bpage');
            } else {
                $this->session->set_flashdata('info','Gagal Menyimpan Data!');
                redirect('panelIMS/bpage');
            }  
    }

    public function edit($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='Edit BodyPerPage';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='bpage/bpage_edit';
        $data['record']      = $this->Model_bpage->editbpage($id);
        $this->load->view('dashboard', $data);
    }

    public function update(){

            $kontent_link   = $this->input->post('kontent_link');
            $hal_web        = $this->input->post('hal_web');
            $id_bpage     = $this->input->post('id_bpage');
    
            $data = array('hal_web' => $hal_web,
                           'kontent_link' => $kontent_link,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'username' => $this->session->identity
                           );
            $update = $this->Model_bpage->updatedata($id_bpage,$data);
            if ($update) {
                $this->session->set_flashdata('info','Data Berhasil Diubah!');
                redirect('panelIMS/bpage');
            } else {
                $this->session->set_flashdata('info','Gagal Mengubah Data!');
                redirect('panelIMS/bpage');
            } 
    }

    public function delete($id){
        $delete = $this->Model_bpage->deletedata($id);
        if ($delete) {
            $this->session->set_flashdata('info','Data Berhasil Dihapus!');
            redirect('panelIMS/bpage');
        } else {
            $this->session->set_flashdata('info','Gagal Menghapus Data!');
            redirect('panelIMS/bpage');
        }
    }

    public function read($id){
        $data['aktif']       ='Master';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Master';
        $data['sub_judul']   ='BodyPerPage Detail';
        $data['read_title']  ='BodyPerPage Detail';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='bpage/bpage_read';
        $data['record']      = $this->Model_bpage->get_byid($id);
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
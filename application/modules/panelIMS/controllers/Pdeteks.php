<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdeteks extends CI_Controller {

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
        $this->load->model('Model_Pdeteks');
        $this->load->library('form_validation');
    }
	
	public function index()
	{
		$data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Dekorasi Teks';
        $data['table_title'] ='BrajaMarketindo Dekorasi Teks';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'pdeteks/pdeteks_list';
        $data['record']      = $this->Model_Pdeteks->getpdeteks();
        $this->load->view('dashboard', $data);
	}

	public function add(){
        $data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Add Dekorasi Teks';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='pdeteks/pdeteks_form';
        $this->load->view('dashboard', $data);
    }

    public function simpan(){
    	$teks        = $this->input->post('teks');
        $dekorasi    = $this->input->post('dekorasi');
                
            $data = array('teks' => $teks,
                           'dekorasi' => $dekorasi,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'username' => $this->session->identity
                           );
            $simpan = $this->Model_Pdeteks->insert($data);
            if ($simpan) {
                $this->session->set_flashdata('info','Data Berhasil Disimpan!');
                redirect('panelIMS/pdeteks');
            } else {
                $this->session->set_flashdata('info','Gagal Menyimpan Data!');
                redirect('panelIMS/pdeteks');
            } 
    }

    public function edit($id){
        $data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Edit Dekorasi Teks';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='pdeteks/pdeteks_edit';
        $data['record']      = $this->Model_Pdeteks->edit($id);
        $this->load->view('dashboard', $data);
    }

    public function update(){

       $teks        = $this->input->post('teks');
       $dekorasi    = $this->input->post('dekorasi');
       $id_dekorteks	= $this->input->post('id_dekorteks');  

        $data = array('teks' => $teks,
                       'dekorasi' => $dekorasi,
                       'tgl_entry' => date('Y-m-d H:i:s')
                       );
        $update = $this->Model_Pdeteks->update($id_dekorteks,$data);
        if ($update) {
            $this->session->set_flashdata('info','Data Berhasil Diubah!');
            redirect('panelIMS/pdeteks');
        } else {
            $this->session->set_flashdata('info','Gagal Mengubah Data!');
            redirect('panelIMS/pdeteks');
        }  
    }

    public function delete($id){
    	$hapus = $this->Model_Pdeteks->hapusdata($id);
    	if ($hapus) {
            $this->session->set_flashdata('info','Data Berhasil Dihapus!');
            redirect('panelIMS/pdeteks');
        } else {
            $this->session->set_flashdata('info','Gagal Menghapus Data!');
            redirect('panelIMS/pdeteks');
        } 
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

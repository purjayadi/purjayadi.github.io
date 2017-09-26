<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psupport extends CI_Controller {

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
        $this->load->model('Model_Psupport');
        $this->load->library('form_validation');
    }
	
	public function index()
	{
		$data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Support';
        $data['table_title']  ='BrajaMarketindo Support';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'psupport/psupport_list';
        $data['record']      = $this->Model_Psupport->getpsupport();
        $this->load->view('dashboard', $data);
	}

	public function add(){
        $data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Add Support';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='psupport/psupport_form';
        $this->load->view('dashboard', $data);
    }

    public function simpan(){

    	$posisi         = $this->input->post('posisi');
        $no_urut        = $this->input->post('no_urut');
        $ints_perushaan = $this->input->post('ints_perushaan');
        $nama           = $this->input->post('nama');
        $email_utama    = $this->input->post('email_utama');
        $email_alternatif1 = $this->input->post('email_alternatif1');
        $email_alternatif2 = $this->input->post('email_alternatif2');
        $email_alternatif3 = $this->input->post('email_alternatif3');
        $email_alternatif4 = $this->input->post('email_alternatif4');
        $no_telp_utama       = $this->input->post('no_telp_utama');
        $no_telp_alternatif1 = $this->input->post('no_telp_alternatif1');
        $no_telp_alternatif2 = $this->input->post('no_telp_alternatif2');
        $no_telp_alternatif3 = $this->input->post('no_telp_alternatif3');
        $no_telp_alternatif4 = $this->input->post('no_telp_alternatif4');
        $no_fax_utama        = $this->input->post('ints_perushaan');
        $no_fax_alternatif1  = $this->input->post('no_fax_alternatif1');
        $no_fax_alternatif2  = $this->input->post('no_fax_alternatif2');
        $no_fax_alternatif3  = $this->input->post('no_fax_alternatif3');
        $no_fax_alternatif4  = $this->input->post('no_fax_alternatif4');
        $no_hp_utama       = $this->input->post('no_hp_utama');
        $no_hp_alternatif1 = $this->input->post('no_hp_alternatif1');
        $no_hp_alternatif2 = $this->input->post('no_hp_alternatif2');
        $no_hp_alternatif3 = $this->input->post('no_hp_alternatif3');
        $no_hp_alternatif4 = $this->input->post('no_hp_alternatif4');
        $pin_bb_utama       = $this->input->post('pin_bb_utama');
        $pin_bb_alternatif1 = $this->input->post('pin_bb_alternatif1');
        $pin_bb_alternatif2 = $this->input->post('pin_bb_alternatif2');
        $pin_bb_alternatif3 = $this->input->post('pin_bb_alternatif3');
        $pin_bb_alternatif4 = $this->input->post('pin_bb_alternatif4');
        $no_wa_utama       = $this->input->post('no_wa_utama');
        $no_wa_alternatif1 = $this->input->post('no_wa_alternatif1');
        $no_wa_alternatif2 = $this->input->post('no_wa_alternatif2');
        $no_wa_alternatif3 = $this->input->post('no_wa_alternatif3');
        $no_wa_alternatif4 = $this->input->post('no_wa_alternatif4');
        $url_fb         = $this->input->post('url_fb');
        $url_twitter    = $this->input->post('url_twitter');
        $url_gplus      = $this->input->post('url_gplus');
        $akun_skype     = $this->input->post('akun_skype');
        $alamat         = $this->input->post('alamat');
        $kode_pos       = $this->input->post('kode_pos');
        $kota           = $this->input->post('kota');
        $provinsi       = $this->input->post('provinsi');
        $negara         = $this->input->post('negara');
        $url_web_utama      = $this->input->post('url_web_utama');
        $url_web_alternatif1     = $this->input->post('url_web_alternatif1');
        $url_web_alternatif2     = $this->input->post('url_web_alternatif2');
        $url_web_alternatif3     = $this->input->post('url_web_alternatif3');
        $url_web_alternatif4     = $this->input->post('url_web_alternatif4');
        //$tampil                  = $this->input->post('tampil');
                
            $data = array('posisi' => $posisi,
                           'ints_perushaan' => $ints_perushaan,
                           'nama' => $nama,
                           'no_urut' => $no_urut,
                           'email_utama' => $email_utama,
                           'email_alternatif1' => $email_alternatif1,
                           'email_alternatif2' => $email_alternatif2,
                           'email_alternatif3' => $email_alternatif3,
                           'email_alternatif4' => $email_alternatif4,
                           'no_telp_utama' => $no_telp_utama,
                           'no_telp_alternatif1' => $no_telp_alternatif1,
                           'no_telp_alternatif2' => $no_telp_alternatif2,
                           'no_telp_alternatif3' => $no_telp_alternatif3,
                           'no_telp_alternatif4' => $no_telp_alternatif4,
                           'no_fax_utama' => $no_fax_utama,
                           'no_fax_alternatif1' => $no_fax_alternatif1,
                           'no_fax_alternatif2' => $no_fax_alternatif2,
                           'no_fax_alternatif3' => $no_fax_alternatif3,
                           'no_fax_alternatif4' => $no_fax_alternatif4,
                           'no_hp_utama' => $no_hp_utama,
                           'no_hp_alternatif1' => $no_hp_alternatif1,
                           'no_hp_alternatif2' => $no_hp_alternatif2,
                           'no_hp_alternatif3' => $no_hp_alternatif3,
                           'no_hp_alternatif4' => $no_hp_alternatif4,
                           'pin_bb_utama' => $pin_bb_utama,
                           'pin_bb_alternatif1' => $pin_bb_alternatif1,
                           'pin_bb_alternatif2' => $pin_bb_alternatif2,
                           'pin_bb_alternatif3' => $pin_bb_alternatif3,
                           'pin_bb_alternatif4' => $pin_bb_alternatif4,
                           'no_wa_utama' => $no_wa_utama,
                           'no_wa_alternatif1' => $no_wa_alternatif1,
                           'no_wa_alternatif2' => $no_wa_alternatif2,
                           'no_wa_alternatif3' => $no_wa_alternatif3,
                           'no_wa_alternatif4' => $no_wa_alternatif4,
                           'url_fb' => $url_fb,
                           'url_twitter' => $url_twitter,
                           'url_gplus' => $url_gplus,
                           'akun_skype' => $akun_skype,
                           'alamat' => $alamat,
                           'kode_pos' => $kode_pos,
                           'kota' => $kota,
                           'provinsi' => $provinsi,
                           'negara' => $negara,
                           'url_web_utama' =>$url_web_utama,
                            'url_web_alternatif1' =>$url_web_alternatif1,
                            'url_web_alternatif1' =>$url_web_alternatif2,
                            'url_web_alternatif3' =>$url_web_alternatif3,
                            'url_web_alternatif4' =>$url_web_alternatif4,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'username' => $this->session->identity
                           );
            $simpan = $this->Model_Psupport->insert($data);
            if ($simpan) {
                $this->session->set_flashdata('info','Data Berhasil Disimpan!');
                redirect('panelIMS/psupport');
            } else {
                $this->session->set_flashdata('info','Gagal Menyimpan Data!');
                redirect('panelIMS/psupport');
            } 
    }

    public function edit($id){
        $data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Edit Support';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='psupport/psupport_edit';
        $data['record']      = $this->Model_Psupport->edit($id);
        $this->load->view('dashboard', $data);
    }

    public function update(){

        $id_support         = $this->input->post('id_support');
        $posisi         = $this->input->post('posisi');
        $no_urut        = $this->input->post('no_urut');
        $ints_perushaan = $this->input->post('ints_perushaan');
        $nama           = $this->input->post('nama');
        $email_utama    = $this->input->post('email_utama');
        $email_alternatif1 = $this->input->post('email_alternatif1');
        $email_alternatif2 = $this->input->post('email_alternatif2');
        $email_alternatif3 = $this->input->post('email_alternatif3');
        $email_alternatif4 = $this->input->post('email_alternatif4');
        $no_telp_utama       = $this->input->post('no_telp_utama');
        $no_telp_alternatif1 = $this->input->post('no_telp_alternatif1');
        $no_telp_alternatif2 = $this->input->post('no_telp_alternatif2');
        $no_telp_alternatif3 = $this->input->post('no_telp_alternatif3');
        $no_telp_alternatif4 = $this->input->post('no_telp_alternatif4');
        $no_fax_utama        = $this->input->post('ints_perushaan');
        $no_fax_alternatif1  = $this->input->post('no_fax_alternatif1');
        $no_fax_alternatif2  = $this->input->post('no_fax_alternatif2');
        $no_fax_alternatif3  = $this->input->post('no_fax_alternatif3');
        $no_fax_alternatif4  = $this->input->post('no_fax_alternatif4');
        $no_hp_utama       = $this->input->post('no_hp_utama');
        $no_hp_alternatif1 = $this->input->post('no_hp_alternatif1');
        $no_hp_alternatif2 = $this->input->post('no_hp_alternatif2');
        $no_hp_alternatif3 = $this->input->post('no_hp_alternatif3');
        $no_hp_alternatif4 = $this->input->post('no_hp_alternatif4');
        $pin_bb_utama       = $this->input->post('pin_bb_utama');
        $pin_bb_alternatif1 = $this->input->post('pin_bb_alternatif1');
        $pin_bb_alternatif2 = $this->input->post('pin_bb_alternatif2');
        $pin_bb_alternatif3 = $this->input->post('pin_bb_alternatif3');
        $pin_bb_alternatif4 = $this->input->post('pin_bb_alternatif4');
        $no_wa_utama       = $this->input->post('no_wa_utama');
        $no_wa_alternatif1 = $this->input->post('no_wa_alternatif1');
        $no_wa_alternatif2 = $this->input->post('no_wa_alternatif2');
        $no_wa_alternatif3 = $this->input->post('no_wa_alternatif3');
        $no_wa_alternatif4 = $this->input->post('no_wa_alternatif4');
        $url_fb         = $this->input->post('url_fb');
        $url_twitter    = $this->input->post('url_twitter');
        $url_gplus      = $this->input->post('url_gplus');
        $akun_skype     = $this->input->post('akun_skype');
        $alamat         = $this->input->post('alamat');
        $kode_pos       = $this->input->post('kode_pos');
        $kota           = $this->input->post('kota');
        $provinsi       = $this->input->post('provinsi');
        $negara         = $this->input->post('negara');
        $url_web_utama      = $this->input->post('url_web_utama');
        $url_web_alternatif1     = $this->input->post('url_web_alternatif1');
        $url_web_alternatif2     = $this->input->post('url_web_alternatif2');
        $url_web_alternatif3     = $this->input->post('url_web_alternatif3');
        $url_web_alternatif4     = $this->input->post('url_web_alternatif4');
        $tampil                  = $this->input->post('tampil');
                
            $data = array('posisi' => $posisi,
                           'ints_perushaan' => $ints_perushaan,
                           'nama' => $nama,
                           'no_urut' => $no_urut,
                           'tampil' => $tampil,
                           'email_utama' => $email_utama,
                           'email_alternatif1' => $email_alternatif1,
                           'email_alternatif2' => $email_alternatif2,
                           'email_alternatif3' => $email_alternatif3,
                           'email_alternatif4' => $email_alternatif4,
                           'no_telp_utama' => $no_telp_utama,
                           'no_telp_alternatif1' => $no_telp_alternatif1,
                           'no_telp_alternatif2' => $no_telp_alternatif2,
                           'no_telp_alternatif3' => $no_telp_alternatif3,
                           'no_telp_alternatif4' => $no_telp_alternatif4,
                           'no_fax_utama' => $no_fax_utama,
                           'no_fax_alternatif1' => $no_fax_alternatif1,
                           'no_fax_alternatif2' => $no_fax_alternatif2,
                           'no_fax_alternatif3' => $no_fax_alternatif3,
                           'no_fax_alternatif4' => $no_fax_alternatif4,
                           'no_hp_utama' => $no_hp_utama,
                           'no_hp_alternatif1' => $no_hp_alternatif1,
                           'no_hp_alternatif2' => $no_hp_alternatif2,
                           'no_hp_alternatif3' => $no_hp_alternatif3,
                           'no_hp_alternatif4' => $no_hp_alternatif4,
                           'pin_bb_utama' => $pin_bb_utama,
                           'pin_bb_alternatif1' => $pin_bb_alternatif1,
                           'pin_bb_alternatif2' => $pin_bb_alternatif2,
                           'pin_bb_alternatif3' => $pin_bb_alternatif3,
                           'pin_bb_alternatif4' => $pin_bb_alternatif4,
                           'no_wa_utama' => $no_wa_utama,
                           'no_wa_alternatif1' => $no_wa_alternatif1,
                           'no_wa_alternatif2' => $no_wa_alternatif2,
                           'no_wa_alternatif3' => $no_wa_alternatif3,
                           'no_wa_alternatif4' => $no_wa_alternatif4,
                           'url_fb' => $url_fb,
                           'url_twitter' => $url_twitter,
                           'url_gplus' => $url_gplus,
                           'akun_skype' => $akun_skype,
                           'alamat' => $alamat,
                           'kode_pos' => $kode_pos,
                           'kota' => $kota,
                           'provinsi' => $provinsi,
                           'negara' => $negara,
                           'url_web_utama' =>$url_web_utama,
                            'url_web_alternatif1' =>$url_web_alternatif1,
                            'url_web_alternatif1' =>$url_web_alternatif2,
                            'url_web_alternatif3' =>$url_web_alternatif3,
                            'url_web_alternatif4' =>$url_web_alternatif4,
                           'tgl_entry' => date('Y-m-d H:i:s'),
                           'username' => $this->session->identity
                           );
            $ubah = $this->Model_Psupport->update($id_support,$data);
            if ($ubah) {
                $this->session->set_flashdata('info','Data Berhasil Diubah!');
                redirect('panelIMS/psupport');
            } else {
                $this->session->set_flashdata('info','Gagal Mengubah Data!');
                redirect('panelIMS/psupport');
            }   
    }

    public function delete($id){
    	$hapus = $this->Model_Psupport->hapusdata($id);
    	if ($hapus) {
            $this->session->set_flashdata('info','Data Berhasil Dihapus!');
            redirect('panelIMS/psupport');
        } else {
            $this->session->set_flashdata('info','Gagal Menghapus Data!');
            redirect('panelIMS/psupport');
        } 
    }

    public function read($id){
        $data['aktif']       ='Pengaturan';
        $data['title']       ='Admin Panel';
        $data['judul']       ='Pengaturan';
        $data['sub_judul']   ='Support Detail';
        $data['read_title']  ='Support Detail';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     ='psupport/psupport_read';
        $data['record']      = $this->Model_Psupport->getsupportbyid($id);
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

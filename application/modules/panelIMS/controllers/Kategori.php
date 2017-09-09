<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kategori/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kategori/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kategori/index.html';
            $config['first_url'] = base_url() . 'kategori/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategori_model->total_rows($q);
        $kategori = $this->Kategori_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategori_data' => $kategori,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['aktif']      ='Master';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'kategori/kategori_list';
        $this->load->view('dashboard', $data);
    }

    public function read($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
        'nama_kategori' => $row->nama_kategori,
		'gambar' => $row->gambar,
		'ket_gambar' => $row->ket_gambar,
		'deskripsi' => $row->deskripsi,
		'no_urut' => $row->no_urut,
		'tgl_entry' => $row->tgl_entry,
		'username' => $row->username,
		'tampil' => $row->tampil,
	    ); 
            $data['aktif']      ='Master';
            $data['title']       ='Admin Panel';
            $data['judul_menu']  ='Braja Marketindo';
            $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
            $data['content']     = 'kategori/kategori_read';
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panelIMS/kategori'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('panelIMS/kategori/create_action'),
	    'id_kategori' => set_value('id_kategori'),
        'nama_kategori' => set_value('nama_kategori'),
	    'gambar' => set_value('gambar'),
	    'ket_gambar' => set_value('ket_gambar'),
	    'deskripsi' => set_value('deskripsi'),
	    'no_urut' => set_value('no_urut'),
	    'tgl_entry' => set_value('tgl_entry'),
	    'username' => set_value('username'),
	    'tampil' => set_value('tampil'),
	);
        $data['aktif']      ='Master';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['content']     = 'kategori/kategori_form';
        $this->load->view('dashboard', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'ket_gambar' => $this->input->post('ket_gambar',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'no_urut' => $this->input->post('no_urut',TRUE),
		'tgl_entry' => $this->input->post('tgl_entry',TRUE),
		'username' => $this->input->post('username',TRUE),
		'tampil' => $this->input->post('tampil',TRUE),
	    );

            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('panelIMS/kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('panelIMS/kategori/update_action'),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
        'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
		'gambar' => set_value('gambar', $row->gambar),
		'ket_gambar' => set_value('ket_gambar', $row->ket_gambar),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'no_urut' => set_value('no_urut', $row->no_urut),
		'tgl_entry' => set_value('tgl_entry', $row->tgl_entry),
		'username' => set_value('username', $row->username),
		'tampil' => set_value('tampil', $row->tampil),
	    );  
            $data['aktif']      ='Master';
            $data['title']       ='Admin Panel';
            $data['judul_menu']  ='Braja Marketindo';
            $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
            $data['content']     ='kategori/kategori_form';
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panelIMS/kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
        'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'ket_gambar' => $this->input->post('ket_gambar',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'no_urut' => $this->input->post('no_urut',TRUE),
		'tgl_entry' => $this->input->post('tgl_entry',TRUE),
		'username' => $this->input->post('username',TRUE),
		'tampil' => $this->input->post('tampil',TRUE),
	    );

            $this->Kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('panelIMS/kategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);

        if ($row) {
            $this->Kategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('panelIMS/kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panelIMS/kategori'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('ket_gambar', 'ket gambar', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('no_urut', 'no urut', 'trim|required');
	$this->form_validation->set_rules('tgl_entry', 'tgl entry', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('tampil', 'tampil', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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
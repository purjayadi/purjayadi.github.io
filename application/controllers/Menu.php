<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q      = urldecode($this->input->get('q', TRUE));
        $start  = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu/index.html';
            $config['first_url'] = base_url() . 'menu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_model->total_rows($q);
        $menu = $this->Menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu_data' => $menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('menu/menu_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_menu' => $row->id_menu,
		'nama_menu' => $row->nama_menu,
		'posisi' => $row->posisi,
		'gambar' => $row->gambar,
		'ket_gambar' => $row->ket_gambar,
		'kontent' => $row->kontent,
		'no_urut' => $row->no_urut,
		'tgl_entry' => $row->tgl_entry,
		'tampil' => $row->tampil,
		'username' => $row->username,
	    );
            $this->load->view('menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
	    'id_menu' => set_value('id_menu'),
	    'nama_menu' => set_value('nama_menu'),
	    'posisi' => set_value('posisi'),
	    'gambar' => set_value('gambar'),
	    'ket_gambar' => set_value('ket_gambar'),
	    'kontent' => set_value('kontent'),
	    'no_urut' => set_value('no_urut'),
	    'tgl_entry' => set_value('tgl_entry'),
	    'tampil' => set_value('tampil'),
	    'username' => set_value('username'),
	);
        $this->load->view('menu/menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_menu' => $this->input->post('nama_menu',TRUE),
		'posisi' => $this->input->post('posisi',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'ket_gambar' => $this->input->post('ket_gambar',TRUE),
		'kontent' => $this->input->post('kontent',TRUE),
		'no_urut' => $this->input->post('no_urut',TRUE),
		'tgl_entry' => $this->input->post('tgl_entry',TRUE),
		'tampil' => $this->input->post('tampil',TRUE),
		'username' => $this->input->post('username',TRUE),
	    );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
		'id_menu' => set_value('id_menu', $row->id_menu),
		'nama_menu' => set_value('nama_menu', $row->nama_menu),
		'posisi' => set_value('posisi', $row->posisi),
		'gambar' => set_value('gambar', $row->gambar),
		'ket_gambar' => set_value('ket_gambar', $row->ket_gambar),
		'kontent' => set_value('kontent', $row->kontent),
		'no_urut' => set_value('no_urut', $row->no_urut),
		'tgl_entry' => set_value('tgl_entry', $row->tgl_entry),
		'tampil' => set_value('tampil', $row->tampil),
		'username' => set_value('username', $row->username),
	    );
            $this->load->view('menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_menu', TRUE));
        } else {
            $data = array(
		'nama_menu' => $this->input->post('nama_menu',TRUE),
		'posisi' => $this->input->post('posisi',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
		'ket_gambar' => $this->input->post('ket_gambar',TRUE),
		'kontent' => $this->input->post('kontent',TRUE),
		'no_urut' => $this->input->post('no_urut',TRUE),
		'tgl_entry' => $this->input->post('tgl_entry',TRUE),
		'tampil' => $this->input->post('tampil',TRUE),
		'username' => $this->input->post('username',TRUE),
	    );

            $this->Menu_model->update($this->input->post('id_menu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_menu', 'nama menu', 'trim|required');
	$this->form_validation->set_rules('posisi', 'posisi', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
	$this->form_validation->set_rules('ket_gambar', 'ket gambar', 'trim|required');
	$this->form_validation->set_rules('kontent', 'kontent', 'trim|required');
	$this->form_validation->set_rules('no_urut', 'no urut', 'trim|required');
	$this->form_validation->set_rules('tgl_entry', 'tgl entry', 'trim|required');
	$this->form_validation->set_rules('tampil', 'tampil', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');

	$this->form_validation->set_rules('id_menu', 'id_menu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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
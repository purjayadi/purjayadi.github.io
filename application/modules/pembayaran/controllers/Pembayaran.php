<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembayaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembayaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembayaran/index.html';
            $config['first_url'] = base_url() . 'pembayaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembayaran_model->total_rows($q);
        $pembayaran = $this->Pembayaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembayaran_data' => $pembayaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pembayaran/pembayaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idpembayaran' => $row->idpembayaran,
		'kode_user' => $row->kode_user,
		'nama_pengirim' => $row->nama_pengirim,
		'tgl_transfer' => $row->tgl_transfer,
		'photo' => $row->photo,
		'jmlh_transfer' => $row->jmlh_transfer,
		'status' => $row->status,
	    );
            $this->load->view('pembayaran/pembayaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran/create_action'),
	    'idpembayaran' => set_value('idpembayaran'),
	    'kode_user' => set_value('kode_user'),
	    'nama_pengirim' => set_value('nama_pengirim'),
	    'tgl_transfer' => set_value('tgl_transfer'),
	    'photo' => set_value('photo'),
	    'jmlh_transfer' => set_value('jmlh_transfer'),
	    'status' => set_value('status'),
	);
        $this->load->view('pembayaran/pembayaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_user' => $this->input->post('kode_user',TRUE),
		'nama_pengirim' => $this->input->post('nama_pengirim',TRUE),
		'tgl_transfer' => $this->input->post('tgl_transfer',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'jmlh_transfer' => $this->input->post('jmlh_transfer',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran/update_action'),
		'idpembayaran' => set_value('idpembayaran', $row->idpembayaran),
		'kode_user' => set_value('kode_user', $row->kode_user),
		'nama_pengirim' => set_value('nama_pengirim', $row->nama_pengirim),
		'tgl_transfer' => set_value('tgl_transfer', $row->tgl_transfer),
		'photo' => set_value('photo', $row->photo),
		'jmlh_transfer' => set_value('jmlh_transfer', $row->jmlh_transfer),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('pembayaran/pembayaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idpembayaran', TRUE));
        } else {
            $data = array(
		'kode_user' => $this->input->post('kode_user',TRUE),
		'nama_pengirim' => $this->input->post('nama_pengirim',TRUE),
		'tgl_transfer' => $this->input->post('tgl_transfer',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'jmlh_transfer' => $this->input->post('jmlh_transfer',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pembayaran_model->update($this->input->post('idpembayaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_user', 'kode user', 'trim|required');
	$this->form_validation->set_rules('nama_pengirim', 'nama pengirim', 'trim|required');
	$this->form_validation->set_rules('tgl_transfer', 'tgl transfer', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('jmlh_transfer', 'jmlh transfer', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('idpembayaran', 'idpembayaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pembayaran.xls";
        $judul = "pembayaran";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode User");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pengirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Transfer");
	xlsWriteLabel($tablehead, $kolomhead++, "Photo");
	xlsWriteLabel($tablehead, $kolomhead++, "Jmlh Transfer");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Pembayaran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pengirim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_transfer);
	    xlsWriteLabel($tablebody, $kolombody++, $data->photo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jmlh_transfer);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-11 04:59:41 */
/* http://harviacode.com */
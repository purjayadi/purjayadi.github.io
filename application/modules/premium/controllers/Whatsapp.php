<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Whatsapp extends CI_Controller
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
        $this->load->model('Wa_order_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'premium/whatsapp/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'premium/whatsapp/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'premium/whatsapp/index.html';
            $config['first_url'] = base_url() . 'premium/whatsapp/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wa_order_model->total_rows($q);
        $whatsapp = $this->Wa_order_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'whatsapp_data' => $whatsapp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['kodeunik'] = $this->Wa_order_model->buat_kode(); 
        $this->load->view('whatsapp/wa_order_list', $data);
    }

   

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('premium/whatsapp/create_action'),
	    'idwa_order' => set_value('idwa_order'),
	    'no_wa' => set_value('no_wa'),
	    'text_wa' => set_value('text_wa'),
	    'url_redirect' => set_value('url_redirect'),
	    'url_wa' => set_value('url_wa'),
	    'username' => set_value('username'),
	);
         $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $data['kodeunik'] = $this->Wa_order_model->buat_kode(); 
        $this->load->view('whatsapp/wa_order_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $url = base_url();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'idwa_order' => $this->input->post('idwa_order',TRUE),
		'no_wa' => $this->input->post('no_wa',TRUE),
		'text_wa' => $this->input->post('text_wa',TRUE),
		'url_redirect' => base_url('orderwa/detail/') .$this->input->post('url_redirect',TRUE).'',
		'url_wa' => 'https://api.whatsapp.com/send?text='.$this->input->post('text_wa', TRUE).'&phone='.$this->input->post('no_wa', TRUE).'',
		'username' => $this->session->identity,
	    );

            $this->Wa_order_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('premium/whatsapp'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Wa_order_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('premium/whatsapp/update_action'),
		'idwa_order' => set_value('idwa_order', $row->idwa_order),
		'no_wa' => set_value('no_wa', $row->no_wa),
		'text_wa' => set_value('text_wa', $row->text_wa),
		'url_redirect' => set_value('url_redirect', $row->url_redirect),
		'url_wa' => set_value('url_wa', $row->url_wa),
		'username' => set_value('username', $row->username),
	    );
             $data['aktif']      ='Premium';
            $data['title']       ='Admin Panel';
            $data['judul_menu']  ='Braja Marketindo';
            $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
            $data['kodeunik'] = set_value('idwa_order', $row->idwa_order);
            $this->load->view('whatsapp/wa_order_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('premium/whatsapp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idwa_order', TRUE));
        } else {
            $data = array(
		'no_wa' => $this->input->post('no_wa',TRUE),
		'text_wa' => $this->input->post('text_wa',TRUE),
        'url_wa' => 'https://api.whatsapp.com/send?text='.$this->input->post('text_wa', TRUE).'&phone='.$this->input->post('no_wa', TRUE).'',
		'username' => $this->session->identity,
	    );

            $this->Wa_order_model->update($this->input->post('idwa_order', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('premium/whatsapp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wa_order_model->get_by_id($id);

        if ($row) {
            $this->Wa_order_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('premium/whatsapp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('premium/whatsapp'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_wa', 'no wa', 'trim|required');
	$this->form_validation->set_rules('text_wa', 'text wa', 'trim|required');

	$this->form_validation->set_rules('idwa_order', 'idwa_order', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Whatsapp.php */
/* Location: ./application/controllers/Whatsapp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-14 08:05:41 */
/* http://harviacode.com */
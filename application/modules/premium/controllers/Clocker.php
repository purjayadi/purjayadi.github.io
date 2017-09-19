<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clocker extends CI_Controller
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
        $this->load->model('Clocker_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'premium/clocker/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'premium/clocker/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'premium/clocker/index.html';
            $config['first_url'] = base_url() . 'premium/clocker/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Clocker_model->total_rows($q);
        $clocker = $this->Clocker_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'clocker_data' => $clocker,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('clocker/clocker_list', $data);
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('premium/clocker/create_action'),
	    'idclocker' => set_value('idclocker'),
	    'title' => set_value('title'),
        'deskripsi' => set_value('deskripsi'),
	    'url_redirect' => set_value('url_redirect'),
	    'url_tujuan' => set_value('url_tujuan'),
        'photo' => set_value('photo'),
	    'username' => set_value('username'),
	);
        $data['aktif']      ='Premium';
        $data['judul_menu']  ='Braja Marketindo';
        $data['kodeunik'] = $this->Clocker_model->buat_kode();
        $this->load->view('clocker/clocker_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $config['upload_path'] = './assets/images/clocker/';
        $config['allowed_types'] = 'jpg|png|gif|bmp';
        $config['max_size'] = '2000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('photo');
        $this->upload->set_xss_clean(TRUE);
        $hasil = $this->upload->data();
        if ($hasil['file_name']==''){
         $data = array('idclocker'=>$this->Clocker_model->buat_kode(),
                    'title'=>$this->input->post('title', TRUE),
                    'deskripsi'=>$this->input->post('deskripsi', TRUE),
                    'url_redirect'=>base_url('news/detail/') .$this->Clocker_model->buat_kode().'',
                    'url_tujuan'=>$this->input->post('url_tujuan', TRUE),
                    'photo'=>$hasil['file_name'],
                    'username' => $this->session->identity,
             );
            }else{
            $data = array('idclocker'=>$this->Clocker_model->buat_kode(),
                    'title'=>$this->input->post('title', TRUE),
                    'deskripsi'=>$this->input->post('deskripsi', TRUE),
                    'url_redirect'=>base_url('news/detail/') .$this->Clocker_model->buat_kode().'',
                    'url_tujuan'=>$this->input->post('url_tujuan', TRUE),
                    'photo'=>$hasil['file_name'],
                    'username' => $this->session->identity,
                    );
            }

            $this->Clocker_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('premium/clocker'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Clocker_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('premium/clocker/update_action'),
		'idclocker' => set_value('idclocker', $row->idclocker),
		'title' => set_value('title', $row->title),
        'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'url_redirect' => set_value('url_redirect', $row->url_redirect),
		'url_tujuan' => set_value('url_tujuan', $row->url_tujuan),
        'photo' => set_value('photo', $row->photo),
		'username' => set_value('username', $row->username),
	    );
            $data['aktif']      ='Premium';
            $data['judul_menu']  ='Braja Marketindo';
            $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
            $data['kodeunik'] = set_value('idclocker', $row->idclocker);
            $this->load->view('clocker/clocker_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('clocker'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idclocker', TRUE));
        } else {
        $config['upload_path'] = './assets/images/clocker/';
        $config['allowed_types'] = 'jpg|png|gif|bmp';
        $config['max_size'] = '2000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('photo');
        $this->upload->set_xss_clean(TRUE);
        $hasil = $this->upload->data();
        if ($hasil['file_name']==''){
         $data = array( 'title' => $this->input->post('title',TRUE),
                        'deskripsi' => $this->input->post('deskripsi',TRUE),
                        'url_tujuan' => $this->input->post('url_tujuan',TRUE),
                        'username' => $this->session->identity,
                      );
            }else{
            $data = array( 'title' => $this->input->post('title',TRUE),
                           'deskripsi' => $this->input->post('deskripsi',TRUE),
                           'url_tujuan' => $this->input->post('url_tujuan',TRUE),
                           'username' => $this->session->identity,
                           'photo'=>$hasil['file_name'],
                         );
            }
            $this->Clocker_model->update($this->input->post('idclocker', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('premium/clocker'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Clocker_model->get_by_id($id);

        if ($row) {
            $this->Clocker_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('premium/clocker'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('premium/clocker'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('url_tujuan', 'url tujuan', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Clocker.php */
/* Location: ./application/controllers/Clocker.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-15 08:15:33 */
/* http://harviacode.com */
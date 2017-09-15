<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insta extends CI_Controller
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
        $this->load->model('Template_insta_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'premium/insta/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'premium/insta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'premium/insta/index.html';
            $config['first_url'] = base_url() . 'premium/insta/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Template_insta_model->total_rows($q);
        $insta = $this->Template_insta_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'insta_data' => $insta,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('insta/template_insta_list', $data);
    }

   
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('premium/insta/create_action'),
	    'idtemplate_insta' => set_value('idtemplate_insta'),
	    'profile_insta' => set_value('profile_insta'),
	);
        $data['aktif']      ='Premium';
        $data['title']       ='Admin Panel';
        $data['judul_menu']  ='Braja Marketindo';
        $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
        $this->load->view('insta/template_insta_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'profile_insta' => $this->input->post('profile_insta',TRUE),
	    );

            $this->Template_insta_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('insta'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Template_insta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('premium/insta/update_action'),
		'idtemplate_insta' => set_value('idtemplate_insta', $row->idtemplate_insta),
		'profile_insta' => set_value('profile_insta', $row->profile_insta),
	    );
            $data['aktif']      ='Premium';
            $data['title']       ='Admin Panel';
            $data['judul_menu']  ='Braja Marketindo';
            $data['nama_jln']    ='Jl.Lotus Timur, Jakasetia, Jawa Barat';
            $this->load->view('insta/template_insta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('insta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtemplate_insta', TRUE));
        } else {
            $data = array(
		'profile_insta' => $this->input->post('profile_insta',TRUE),
	    );

            $this->Template_insta_model->update($this->input->post('idtemplate_insta', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('insta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Template_insta_model->get_by_id($id);

        if ($row) {
            $this->Template_insta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('insta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('insta'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('profile_insta', 'profile insta', 'trim|required');

	$this->form_validation->set_rules('idtemplate_insta', 'idtemplate_insta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Insta.php */
/* Location: ./application/controllers/Insta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-15 08:17:06 */
/* http://harviacode.com */
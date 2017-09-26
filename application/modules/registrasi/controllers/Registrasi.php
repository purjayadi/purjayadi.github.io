<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Registrasi extends CI_Controller
{
	
	function __construct() {
       parent::__construct();
        $this->load->model('Model_registrasi');
        $this->load->library('form_validation');
    }

    public function index() {	
    	$data = array(
            'button' => 'Create',
            'action' => site_url('registrasi/registrasi_action'),
	    'id_pendaftaran' => set_value('id_pendaftaran'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'email' => set_value('email'),
	    'no_telp' => set_value('no_telp'),
	    'nama_subdomain' => set_value('nama_subdomain'),
	    'paket_layanan' => set_value('paket_layanan'),
	    'kota' => set_value('kota'),
	    'tgl_entry' => set_value('tgl_entry'),
	    'widget' => $this->recaptcha->getWidget(),
        'script' => $this->recaptcha->getScriptTag(),
	);
		$this->load->view('registrasi', $data);	
    }
    public function registrasi_action() 
    {
        $this->_rules();
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
            	'id_pendaftaran' => $this->Model_registrasi->buat_kode(),
				'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
				'email' => $this->input->post('email',TRUE),
				'no_telp' => $this->input->post('no_telp',TRUE),
				'nama_subdomain' => $this->input->post('nama_subdomain',TRUE),
				'paket_layanan' => $this->input->post('paket_layanan',TRUE),
				'kota' => $this->input->post('kota',TRUE),
				'tgl_entry' => Date('Y-m-d H:i:s'),
	    );
            $this->sendMail();
            $this->mailadmin();
            $this->Model_registrasi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');

            redirect(site_url('registrasi'));
        }
    }

    public function sendMail() {

	   $this->load->library('email');
       $config = array();
	   $config['charset'] = 'utf-8';
	   $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
	   $config['protocol']= "tls";
	   $config['mailtype']= "html";
	   $config['smtp_host']= "tls://smtp.gmail.com";
	   $config['smtp_port']= "587";
	   $config['smtp_timeout']= "5";
	   $config['smtp_user']= "purjayadi@gmail.com";              //isi dengan email anda
	   $config['smtp_pass']= "l2017Fh@ilm";            // isi dengan password dari email anda
	   $config['crlf']="\r\n";
	   $config['newline']="\r\n";
	  
	   $config['wordwrap'] = TRUE;

 //memanggil library email dan set konfigurasi untuk pengiriman email
  
   		$this->email->initialize($config);;
		$this->email->from('admin@kutamedica.com');
		$this->email->to(''.$this->input->post('email',TRUE).'');
		$this->email->subject('Detail pendaftaran Braja Link');
		$this->email->message('Detail pendaftaran anda : Nomer pendaftaran : '.$this->Model_registrasi->buat_kode().' email : '.$this->input->post('email',TRUE).' silahkan melakukan pembayaran sebesar Rp. X.XXX.XXX');
		$this->email->send();	
		 
    }

    public function mailadmin() {

	   $this->load->library('email');
       $config = array();
	   $config['charset'] = 'utf-8';
	   $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
	   $config['protocol']= "tls";
	   $config['mailtype']= "html";
	   $config['smtp_host']= "tls://smtp.gmail.com";
	   $config['smtp_port']= "587";
	   $config['smtp_timeout']= "5";
	   $config['smtp_user']= "purjayadi@gmail.com";              //isi dengan email anda
	   $config['smtp_pass']= "l2017Fh@ilm";            // isi dengan password dari email anda
	   $config['crlf']="\r\n";
	   $config['newline']="\r\n";
	  
	   $config['wordwrap'] = TRUE;

 //memanggil library email dan set konfigurasi untuk pengiriman email
  
   		$this->email->initialize($config);;
		$this->email->from('admin@kutamedica.com');
		$this->email->to('purjayadi@gmail.com');
		$this->email->subject('User baru bisnislink');
		$this->email->message('Silahkan periksa dara pendaftaran baru pada halaman admin anda '.$this->input->post('email',TRUE).'');
		$this->email->send();	 
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('nama_subdomain', 'nama subdomain', 'trim|required');
	$this->form_validation->set_rules('paket_layanan', 'paket layanan', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('g-recaptcha-response', str_replace(':', '', $this->lang->line('g-recaptcha-response')), 'required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

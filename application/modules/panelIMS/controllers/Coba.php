<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Do your magic here
		
	}

	public function index()
	{	
		$this->load->view('coba');
	}
}


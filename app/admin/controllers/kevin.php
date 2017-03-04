<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->checkLogin();
	}

	public function index()
	{
		$this->load->view('kevin');
	}

	public function singout(){
		$this->session->unset_userdata('admin_account');
		$this->session->sess_destroy();
		redirect('Publics/login');
	}

}

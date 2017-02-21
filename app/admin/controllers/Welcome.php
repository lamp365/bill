<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{
		$this->load->view('welcome');
	}

	public function singout(){
		$this->session->unset_userdata('admin_account');
		$this->session->sess_destroy();
		redirect('Publics/login');
	}

}

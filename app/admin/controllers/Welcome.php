<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{
		$this->load->view('public/welcome');
	}

	public function singout(){
		$this->session->unset_userdata('admin_account');
		$this->session->sess_destroy();
		redirect('Publics/login');
	}

	public function top(){
		$this->load->view('public/top');
	}
	public function left_menu(){
		$this->load->view('public/left_menu');
	}
	public function main(){
		$this->load->view('public/main');
	}
}

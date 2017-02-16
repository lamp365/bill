<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Home_Controller {

	public function index()
	{
		$this->output->enable_profiler(true);
		$this->load->view('welcome');
	}
}

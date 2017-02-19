<?php
/**
 * Created by PhpStorm.
 * User: 刘建凡
 * Date: 2017/2/16
 * Time: 17:34
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->showDebug();
        //has login ?
        if(!$this->session->has_userdata('admin_account')){
            redirect('Publics/login');
        }
    }

    public function showDebug(){
        $this->output->enable_profiler(true);
    }
}

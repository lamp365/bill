<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 17-2-17
 * Time: 上午12:19
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Publics extends MY_Controller{
    public function login(){
        $this->load->view('login');
    }
}
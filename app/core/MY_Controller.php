<?php
/**
 * Created by PhpStorm.
 * User: 刘建凡
 * Date: 2017/2/16
 * Time: 17:34
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->change_view_pos();
    }
}


class Admin_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
}
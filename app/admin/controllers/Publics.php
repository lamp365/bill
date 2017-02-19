<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 17-2-17
 * Time: 上午12:19
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Publics extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('admin_account')){
            redirect('welcome/index');
        }
    }

    public function login(){
        $this->load->view('login');
    }

    public function code(){
        $this->load->helper('captcha');
        #调用函数生成验证码
        $vals = array(
            'word_length' => 6,
            'img_width'   => 100
        );
        $code = create_captcha($vals);
        #将验证码字符串保存到session中
        $this->session->set_userdata('code',$code);
    }

    public function dologin(){
        $this->session->set_userdata('admin_account','1');
        redirect('welcome/index');
    }
}
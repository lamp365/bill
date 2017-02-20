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
        //引入模型
        $this->load->model('Admin_model');
        //引入service
        $this->load->service('Admin_service');

        if($this->session->has_userdata('admin_account')){
            redirect('welcome/index');
        }
    }

    public function login(){
        /*echo $this->router->fetch_method();
        echo $this->router->fetch_class();*/
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

    public function ceshi(){
        $this->load->helper(array('form'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'yonghuming', 'required');
        $this->form_validation->set_rules('password', 'mima', 'required',
            array('required' => '你必须输入一个%s.')
        );
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('ceshi');
        }
        else
        {
            $data  = $this->Admin_service->addadmin();
            $res = $this->Admin_model->addUser($data);
            ppd($res);
            if($res){
                $this->load->view('ceshi2');
            }else{
                die('失败了');
            }

        }
    }

    /**
     *
    CREATE TABLE `admin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(32) NOT NULL COMMENT '用户名',
    `password` varchar(32) NOT NULL COMMENT 'mima',
    `email` varchar(11) NOT NULL DEFAULT '' COMMENT 'email',
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
     *
     */
    public function form(){

    }
}
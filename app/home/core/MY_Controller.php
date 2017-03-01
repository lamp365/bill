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
        $this->load->change_view_pos();
    }

    public function showDebug(){
        $this->output->enable_profiler(true);
    }

    public function show404Error($msg,$url='',$time=2){
        $data['res']['msg']  = $msg;
        $data['res']['url']  = $url;
        $data['res']['time'] = $time;
        $content = $this->load->view('common/404error',$data,true);
        die($content);
    }
    public function showError($msg,$url='',$time=2){
        $data['res']['msg']  = $msg;
        $data['res']['url']  = $url;
        $data['res']['time'] = $time;
        $content = $this->load->view('common/error',$data,true);
        die($content);
    }
    public function showSuccess($msg,$url='',$time=2){
        $data['res']['msg']  = $msg;
        $data['res']['url']  = $url;
        $data['res']['time'] = $time;
        $content = $this->load->view('common/success',$data,true);
        die($content);
    }
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hellow extends Home_Controller{
    public function index(){
        echo 'sss';
    }

    public function add(){
        echo 'add';
    }

    public function edit(){
        echo 'edit';
    }
    public function getlist(){
        echo 'getlist';
    }
}
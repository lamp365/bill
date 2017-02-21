<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 17-2-21
 * Time: 上午12:03
 */
class Admin_service extends MY_Service{
    function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function addadmin(){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'email'    => $this->input->post('email'),
        );
        $res = $this->Admin_model->addUser($data);
        return $res;
    }
}
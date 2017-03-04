<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2017/3/1
 * Time: 16:45
 */
class Cat_service extends MY_Service{
    function __construct(){
        parent::__construct();
    }

    function getAllCat(){
        $res = $this->Cat_model->getAllCat();
        if(!empty($res)){
            $res = catTree($res);
        }
        return $res;
    }
}
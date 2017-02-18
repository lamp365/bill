<?php
/**
 * Created by PhpStorm.
 * User: 刘建凡
 * Date: 2017/2/16
 * Time: 17:39
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Loader extends CI_Loader{

    //开启皮肤功能
    public function change_view_pos($theme = 'default'){
        $this->_ci_view_paths = array(FCPATH . "themes/".$theme.'/'	=> TRUE);
    }
}
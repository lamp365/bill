<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 17-2-20
 * Time: 下午11:50
 */
class MY_Service
{
    public function __construct()
    {
        log_message('debug', "Service Class Initialized");
    }

    function __get($key)
    {
        $CI = & get_instance();
        return $CI->$key;
    }
}
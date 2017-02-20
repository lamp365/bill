<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 17-2-20
 * Time: 下午11:36
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model{
   const TABLE = 'admin';

    public function addUser($data){
        return $this->db->insert(self::TABLE,$data);
    }
}
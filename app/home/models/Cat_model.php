<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 17-3-1
 * Time: 上午12:17
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cat_model extends CI_Model{

    const TABLE = 'cat1';

    public function getOneCatBy($where){
        $query = $this->db->where($where)->get(self::TABLE);
        return $query->row_array();
    }
    public function getAllCat(){
        $query = $this->db->get(self::TABLE);
        return $query->result_array();
    }

    public function addCat($data){
        return $this->db->insert(self::TABLE,$data);
    }

    public function updateCat($where,$data){
        return $this->db->where($where)->update(self::TABLE,$data);
    }
}
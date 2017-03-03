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

    const PAYBILL = 'paybill';

    public function getOneCat($where){
        $query = $this->db->where($where)->get(self::TABLE);
        return $query->row_array();
    }
    public function getAllCat($where=array()){
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get(self::TABLE);
        return $query->result_array();
    }

    public function addCat($data){
        return $this->db->insert(self::TABLE,$data);
    }

    public function updateCat($where,$data){
        return $this->db->where($where)->update(self::TABLE,$data);
    }

    public function addBill($data){
       return $this->db->insert(self::PAYBILL,$data);
    }

    public function getBIllList(){
        $this->db->where(array('uid'=>1));
        $query = $this->db->get(self::PAYBILL);
        return $query->result_array();
    }
}
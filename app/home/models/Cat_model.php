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

    public function getBIllList($where = array(),$limit=''){
        $where['uid'] = 1;
        $this->db->where($where);
        if(!empty($limit)){
            $this->db->limit($limit['length'],$limit['offset']);
        }
        $this->db->order_by("id","desc");
        $query = $this->db->get(self::PAYBILL);
//        ppd($limit,$this->db->last_query());

        return $query->result_array();
    }

    public  function  count_allBill($where=array()){
        $where['uid'] = 1;
        if(empty($where)){
            return $this->db->count_all(self::PAYBILL);
        }else{
            $this->db->where($where);
            return $this->db->count_all_results(self::PAYBILL);
        }
    }

    public function count_allmoney($where='',$field='jine'){
        $where['uid'] = 1;
        $this->db->where($where);
        $this->db->select_sum($field,'total_money');
        $query = $this->db->get(self::PAYBILL);
        return $query->row_array();
    }
}
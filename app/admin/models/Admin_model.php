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

    //单条记录
    public function getOneUser($where){
        $query = $this->db->where($where)->get(self::TABLE);
//        return $query->num_rows() > 0 ? true : false;
        return $query->row_array();
    }

    public function getAllUser($condition = array()){
        if(!empty($condition['where'])){
            $this->db->where($condition['where']);
        }
        if(!empty($condition['limit'])){
            $this->db->limit($condition['limit']['limit'],$condition['limit']['offset']);
        }
        $query = $this->db->get(self::TABLE);
        return $query->result_array();
    }
    //更新
    public function editUser($data,$where){
        return $this->db->where($where)->update(self::TABLE,$data);
    }
    #获取总的记录数 带条件
    public function count_allUser1($where){

        $this->db->where($where);
        return $this->db->count_all_results(self::TABLE);
    }
    #获取总的记录数
    public function count_allUser2(){
        return $this->db->count_all(self::TABLE);
    }


    #获取属性  关联查询
    public function list_attribute($limit,$offset,$type=''){
        $this->db->select('*');
        $this->db->from(self::TBL_ATTR);
        $this->db->join(self::TBL_TYPE,'attribute.type_id = goods_type.type_id','left');
        if ($type > 0){
            $this->db->where('attribute.type_id',$type);
        }
        $query = $this->db->limit($limit,$offset)->get();
        return $query->result_array();
    }


    #分页查询
    public function page_brand($limit,$offset){
        $query = $this->db->limit($limit,$offset)->get(self::TBL_BRAND);
        return $query->result_array();
    }
}
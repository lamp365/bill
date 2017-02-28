<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function  __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$css = "style1.css";
		if(is_mobile_request()){
			$css = 'style.css';
		}
		$res['data']['css'] = $css;
		$this->load->view('welcome/index',$res);
	}

	public function catList()
	{
		$css = "style1.css";
		if(is_mobile_request()){
			$css = 'style.css';
		}
		$res['data']['css'] = $css;
		$this->load->view('welcome/catList',$res);
	}

	public function getCat($id='')
	{
		$res['data'] = array();
		if($id){
			//获取分类
		}
		$this->load->view('welcome/ajax/getCat',$res);
	}
	public function addCat()
	{
		$data['name'] = $this->input->post('cat_name');
		$data['pid']  = $this->input->post('cat_id');

	}

	/*
 CREATE TABLE `paybill`(
`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`p_id` INT(10) NOT NULL COMMENT '分类pid',
`c_id` INT(10) NOT NULL COMMENT '分类id',
`pay_type` TINYINT(1) NOT NULL DEFAULT 1 COMMENT "1表示支出 2表示收入",
`jine` DECIMAL(11,2) NOT NULL DEFAULT '0.00' COMMENT "金额",
`remark` VARCHAR(255) DEFAULT '' COMMENT '备注',
`createtime` INT(10) NOT NULL DEFAULT 0 COMMENT '时间'
)ENGINE=MYISAM DEFAULT CHARSET=utf8;

CREATE TABLE `cat`(
`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`pid` INT(10) UNSIGNED NULL NULL ,
`name` VARCHAR(32) DEFAULT '',
`sort` INT(10) DEFAULT 0,
`createtime` INT(10) DEFAULT 0,
PRIMARY KEY (`id`)
)ENGINE=MYISAM DEFAULT CHARSET=utf8;

	 */
}

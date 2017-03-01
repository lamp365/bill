<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->model('Cat_model');
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
		$this->load->service('Cat_service');
		$res['all'] = $this->Cat_service->getAllCat();
		$res['one'] = array();
		if($id){
			//获取分类
			$res['one'] = $this->Cat_model->getOneCat(array('id'=>$id));
		}
		$this->load->view('welcome/ajax/getCat',$res);
	}

	public function addCat()
	{
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cat_name', '分类名称', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			//提示错误并跳转
			$msg = validation_errors();
			$this->showError($msg);
		}else{
			$data['name'] = $this->input->post('cat_name');
			$data['pid']  = $this->input->post('cat_id');
			if($this->Cat_model->addCat($data)){
				//提示成功并跳转
				die('成功过');
			}else{
				//提示失败并跳转
				die('失败过');
			}
		}
	}

	/*
 CREATE TABLE `paybill`(
`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
`uid` int(10) unsigned not null comment '1她的2我的',
`p_id` INT(10) NOT NULL COMMENT '分类pid',
`c_id` INT(10) NOT NULL COMMENT '分类id',
`pay_type` TINYINT(1) NOT NULL DEFAULT 1 COMMENT "1表示支出 2表示收入",
`jine` DECIMAL(11,2) NOT NULL DEFAULT '0.00' COMMENT "金额",
`remark` VARCHAR(255) DEFAULT '' COMMENT '备注',
`createtime` INT(10) NOT NULL DEFAULT 0 COMMENT '时间'
)ENGINE=MYISAM DEFAULT CHARSET=utf8;

CREATE TABLE `cat2`(
`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`pid` INT(10) UNSIGNED NULL NULL ,
`name` VARCHAR(32) DEFAULT '',
`sort` INT(10) DEFAULT 0,
`createtime` INT(10) DEFAULT 0,
PRIMARY KEY (`id`)
)ENGINE=MYISAM DEFAULT CHARSET=utf8;

CREATE TABLE `cat1`(
`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`pid` INT(10) UNSIGNED NULL NULL ,
`name` VARCHAR(32) DEFAULT '',
`sort` INT(10) DEFAULT 0,
`createtime` INT(10) DEFAULT 0,
PRIMARY KEY (`id`)
)ENGINE=MYISAM DEFAULT CHARSET=utf8;
	 */
}

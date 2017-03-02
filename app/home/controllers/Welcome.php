<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->model('Cat_model');
		$this->load->service('Cat_service');
	}

	public function index()
	{
		$css = "style1.css";
		if(is_mobile_request()){
			$css = 'style.css';
		}
		$res['data']['css'] = $css;
		$res['data']['parent'] = $this->Cat_model->getAllCat(array('pid'=>0));
		$this->load->view('welcome/index',$res);
	}

	public function catList()
	{
		$css = "style1.css";
		if(is_mobile_request()){
			$css = 'style.css';
		}
		$res['data']['css'] = $css;
		$res['data']['cat'] = $this->Cat_service->getAllCat();
		$this->load->view('welcome/catList',$res);
	}

	public function getCat()
	{
		$id = $this->uri->segment(4);
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
			$msg = "分类名称不能为空";
			$this->showError($msg);
		}else{
			$data['name'] = $this->input->post('cat_name');
			$data['pid']  = $this->input->post('cat_id');
			$data['createtime'] = time();
			if($this->Cat_model->addCat($data)){
				//提示成功并跳转
				$this->showSuccess("添加成功！");
			}else{
				//提示失败并跳转
				$this->showError('添加失败！');
			}
		}
	}

	public function ajaxcat(){
		$pid = $this->uri->segment(4);
		if($pid){
			$res = $this->Cat_model->getAllCat(array('pid'=>$pid));
			if($res){
				die(showAjax(200,$res));
			}else{
				die(showAjax(1002,'查无分类'));
			}
		}else{
			die(showAjax(1002,'查无分类'));
		}
	}

	public function addbill(){
		$this->load->view('welcome/ajax/addbill');
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

<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 17-2-17
 * Time: 上午12:19
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Publics extends CI_Controller{
    public function __construct(){
        parent::__construct();
        //引入模型
        $this->load->model('Admin_model');
        //引入service
        $this->load->service('Admin_service');

        if($this->session->has_userdata('admin_account')){
            redirect('kevin/index');
        }
    }

    public function login(){
        /*echo $this->router->fetch_method();
        echo $this->router->fetch_class();*/
        $this->load->view('login');
    }

    public function code(){
        $this->load->helper('captcha');
        #调用函数生成验证码
        $vals = array(
            'word_length' => 6,
            'img_width'   => 100
        );
        $code = create_captcha($vals);
        #将验证码字符串保存到session中
        $this->session->set_userdata('code',$code);
    }

    public function dologin(){
        $this->session->set_userdata('admin_account','1');
        redirect('kevin/index');
    }

    public function add(){
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'yonghuming', 'required');
        $this->form_validation->set_rules('password', 'mima', 'required',
            array('required' => '你必须输入一个%s.')
        );
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('public/add');
        }
        else
        {
            $res  = $this->Admin_service->addadmin();
            if($res){
                $this->load->view('public/addStatus',array('status'=>1));
            }else{
                $this->load->view('public/addStatus',array('status'=>0));
            }

        }
    }

    public function edit(){
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'yonghuming', 'required');
        $this->form_validation->set_rules('password', 'mima', 'required',
            array('required' => '你必须输入一个%s.')
        );

        if($this->form_validation->run() == false){
            $username = $this->uri->segment(3);
            $userdata = $this->Admin_model->getOneUser(array('username'=>$username));
            if(empty($userdata)){
                die('查无此人');
            }else{
                $this->load->view('public/edit',array('userdata'=>$userdata));
            }
        }else{
            $res = $this->Admin_service->editadmin();
            if($res){
                die('修改成功');
            }else{
                die('修改失败');
            }
        }
    }

    public function cout_user1(){
        $res = $this->Admin_model->count_allUser1(array('password'=>123456));
        ppd($res);
    }

    public function cout_user2(){
        $res = $this->Admin_model->count_allUser2();
        ppd($res);
    }

    public function listuser(){
        $this->output->enable_profiler(true);
        $page = $this->uri->segment(3);
        if(empty($page)){
            $page = 1;
        }
        $this->load->library('pagination');
        $config['base_url']    = site_url('publics/listuser');
        $config['total_rows']  = $this->Admin_model->count_allUser2();
        $config['per_page']    = 6;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['first_link']  = '首页';
        $config['last_link']   = '尾页';
        $config['prev_link']   = '上一页';
        $config['next_link']   = '下一页';

        $this->pagination->initialize($config);

        $condition['limit']['limit']  = $config['per_page'];
        $condition['limit']['offset'] = ($page-1)*$config['per_page'];

        $userlist = $this->Admin_model->getAllUser($condition);
        $pageinfo = $this->pagination->create_links();

        $this->load->view('public/list',compact('userlist','pageinfo'));
    }

    public function img_mange(){
        #完成上传图片
        $config['upload_path'] = './public/uploads/';
        $config['allowed_types'] = 'jpg|gif|png';
        $config['max_size'] = 200;
        $this->load->library('upload',$config);

        if ($this->upload->do_upload('goods_img')) {
            # 上传成功，缩略处理
            $res = $this->upload->data(); //获取上传图片信息
            $data['goods_img'] = $res['file_name'];
            $config_img['source_image'] = "./public/uploads/" . $res['file_name'];
            $config_img['create_thumb'] = true;
            $config_img['maintain_ratio'] = true;
            $config_img['width'] = 160;
            $config_img['height'] = 160;

            #载入并初始化图像处理类
            $this->load->library('image_lib',$config_img);

            if ($this->image_lib->resize()) {
                # 缩略ok,得到缩略图的名称
                $data['goods_thumb'] = $res['raw_name'] . $this->image_lib->thumb_marker. $res['file_ext'];

            } else {
                # 缩略失败

            }


        }
    }
    /**
     *
    compact
     CREATE TABLE `admin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(32) NOT NULL COMMENT '用户名',
    `password` varchar(32) NOT NULL COMMENT 'mima',
    `email` varchar(11) NOT NULL DEFAULT '' COMMENT 'email',
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
     *
     */

}
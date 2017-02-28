<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>账单出入</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="<?php echo get_css('bootstrap.min.css','common');?>">
    <link rel="stylesheet" href="<?php echo get_css($data['css'],'common');?>">
    <link rel="stylesheet" href="<?php echo get_libs('beAlert/css/beAlert.css');?>">

</head>
<body>
<div class="main_box">
    <div class="top_header">
        <div class="header_title" style="">
            <a href="index.php">账单出入</a>
            <a href="<?php echo site_url('welcome/catList')?>" class='art_active'>分类列表</a>
            <div class="head_right">
                <span class="btn btn-xs btn-info addCat" data-url="<?php echo site_url('welcome/getCat');?>">添加分类</span>
            </div>
        </div>
    </div>
    <br/>
    <div class="user_list">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>分类名称</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <volist name="info" id="row">
                <tr class="one_row">
                    <td class="name_sty">{$row['name']}<br/><a href="tel:{$row['mobile']}" class="mobile_sty">{$row['mobile']}</a></td>
                    <!--<td>{$tongxue_type[$row['type']]}</td>-->
                    <td class="comming" data-status="{$row['cancomming']}" style="padding-top: 20px;"><span class="show_comming">{$can_comming[$row['cancomming']]}</span></td>
                    <td>
                        <span class="btn btn-xs btn-info edit_user" data-id="{$row['id']}" data-url="__CONTROLLER__/getUser">修&nbsp;&nbsp;改</span><br/>
                        <span class="btn btn-xs btn-danger del_user" data-id="{$row['id']}" data-url="__CONTROLLER__/delUser">移&nbsp;&nbsp;除</span>
                    </td>
                </tr>
            </volist>
            </tbody>
        </table>
        <p class="total">共：<span>{$total_num}</span> 位宾客</p>
    </div>
</div>

<div class="foot_fix_top" >
    <img src="<?php echo get_images('scroll-to-top.png','common');?>" width="37" height="37">
</div>
<div id="alterModal" class="alertModalBox"></div>

<script src="<?php echo get_js('jquery-1.10.2.min.js','common');?>"></script>
<script src="<?php echo get_js('bootstrap.min.js','common');?>"></script>
<script src="<?php echo get_libs('beAlert/js/beAlert.js');?>"></script>
<script src="<?php echo get_js('style.js','common');?>"></script>
</body>
</html>

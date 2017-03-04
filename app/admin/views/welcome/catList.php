<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类管理</title>
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
            <a href="<?php echo site_url('welcome/index')?>">账单出入</a>
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
                <th style="text-align: center">创建时间</th>
                <th style="text-align: center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($data['cat'] as $one){ ?>
                <tr class="one_row">
                    <td style="text-align: left;padding-left: 20px;">
                        <?php if($one['level'] != 0){ echo "|".$one['html'].$one['name']; }else{ echo "<b>". $one['name']."</b>";} ?>
                    </td>
                    <td class=""  style="padding-top: 20px;"><?php echo date("Y-m-d",$one['createtime']); ?></td>
                    <td>
                        <a class="btn btn-xs btn-info" data-id="<?php echo $one['id']; ?>" data-toggle="modal" href='<?php echo site_url("welcome/getCat/id/{$one['id']}"); ?>'>修&nbsp;&nbsp;改</a><br/>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
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

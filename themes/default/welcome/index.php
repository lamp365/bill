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
            <a href="<?php echo site_url('welcome/index')?>" class='art_active'>账单出入</a>
            <a href="<?php echo site_url('welcome/catList')?>" >分类列表</a>
            <div class="head_right">
                <span class="btn btn-xs btn-info" data-toggle="modal" data-target="#addBill">添加账单</span>
            </div>
        </div>
    </div>
    <div class="container action">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="hidden" id="hide_get_url" value="<?php echo site_url('welcome/index');?>">
                    <input type="hidden" id="hide_cat_url" value="<?php echo site_url('welcome/ajaxCat');?>">
                    <select name="parent_cat" id="sel_parent_cat" class="form-control">
                        <option value="0">查看所有分类</option>
                        <?php
                        foreach($data['parent'] as $one) {
                            echo "<option value='{$one['id']}'>{$one['name']}</option>";
                        }
                        ?>

                    </select>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <select name="son_cat" id="sel_son_cat" class="form-control">
                        <option value="-1">请选选择父分类</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="clo-md-10 col-xs-10">
                <div class="form-group">
                    <input type="text" id="starttime" class="form-control s_time" placeholder="起始日期" >
                    <input type="text" id="endtime" class="form-control e_time" placeholder="终止日期" >
                </div>
            </div>
            <div class="clo-md-2 col-xs-2">
                <div class="form-group">
                    <input type="hidden" value="<?php echo site_url('welcome/index');?>" class="hide_search_url">;
                    <button type="button" class="btn btn-default search_btn" style="float: right;">查询记录</button>
                </div>
            </div>
        </div>
    </div>
    <div class="user_list">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>分类</th>
                <th>金额</th>
                <th>时间</th>
                <th>备注</th>
            </tr>
            </thead>
            <tbody>
            <volist name="info" id="row">
                <tr class="one_row">
                    <td class="name_sty">{$row['name']}<br/><a href="tel:{$row['mobile']}" class="mobile_sty">{$row['mobile']}</a></td>
                    <!--<td>{$tongxue_type[$row['type']]}</td>-->
                    <td class="comming" data-status="{$row['cancomming']}" style="padding-top: 20px;"><span class="show_comming">{$can_comming[$row['cancomming']]}</span></td>
                    <td class="need_hotal" style="padding-top: 18px;">
                        <if condition="$row['is_hotal'] == 1">
                            <span class="btn btn-xs btn-default show_hotal" data-id="{$row['id']}" data-hotal="{$row['is_hotal']}" data-url="__CONTROLLER__/hotal">无需住宿</span>
                            <else/>
                            <span class="btn btn-xs btn-info show_hotal" data-id="{$row['id']}"  data-hotal="{$row['is_hotal']}" data-url="__CONTROLLER__/hotal">需要住宿</span>
                        </if>

                    </td>
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


<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="__CONTROLLER__/addUser" id="add_user_form" data-reurl="__CONTROLLER__/index">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">添加宾客</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name_put" placeholder="请输入名字">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobile" id="mobile_put" placeholder="请输入电话">
                    </div>
                    <div class="row" style="margin-bottom: 15px;overflow: hidden">
                        <div class="col-xs-6">
                            <select name="type" id="type_put" class="form-control">
                                <option value="-1">选择关系</option>
                                <volist name="tongxue_type" id="item">
                                    <option value="{$key}">{$item}</option>
                                </volist>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <select name="cancomming" id="comming_put" class="form-control">
                                <option value="-1">选择状态</option>
                                <volist name="can_comming" id="item">
                                    <option value="{$key}">{$item}</option>
                                </volist>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary sure_add">确认添加</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal -->
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="__CONTROLLER__/editUser" id="edit_user_form" data-reurl="__CONTROLLER__/index">
        <input type="hidden" name="id" value="" id="hide_edit_user_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">编辑宾客</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary sure_edit_user">确定修改</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </form>
</div>

<div id="alterModal" class="alertModalBox"></div>

<script src="<?php echo get_js('jquery-1.10.2.min.js','common');?>"></script>
<script src="<?php echo get_js('bootstrap.min.js','common');?>"></script>
<script src="<?php echo get_libs('laydate/laydate.js');?>"></script>
<script src="<?php echo get_libs('beAlert/js/beAlert.js');?>"></script>
<script src="<?php echo get_js('style.js','common');?>"></script>
<script>
    laydate({
        elem: '#starttime',
        istime: false,
        event: 'click',
        format: 'YYYY-MM-DD',
        istoday: true, //是否显示今天
        start: laydate.now(0, 'YYYY-MM-DD')
    });
    laydate({
        elem: '#endtime',
        istime: false,
        event: 'click',
        format: 'YYYY-MM-DD',
        istoday: true, //是否显示今天
        start: laydate.now(0, 'YYYY-MM-DD')
    });
    laydate.skin("molv");
</script>
</body>
</html>
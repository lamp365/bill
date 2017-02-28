<?php if(is_mobile_request()){ ?>
<div class="alertModal-dialog-mobile">
<?php }else{ ?>
<div class="alertModal-dialog-pc">
<?php } ?>
    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('welcome/addCat');?>">
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-10">
                <input type="text" name="cat_name" class="form-control" id="firstname" placeholder="请输入分类名称">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">选择分类</label>
            <div class="col-sm-10">
                <select class="form-control" name="cat_id">
                    <option value="0">顶级分类</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">确认添加</button>
            </div>
        </div>
    </form>
</div>
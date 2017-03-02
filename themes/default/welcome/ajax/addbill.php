<?php if(is_mobile_request()){ ?>
<div class="alertModal-dialog-mobile">
<?php }else{ ?>
<div class="alertModal-dialog-pc">
<?php } ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
        </button>
        <h4 class="modal-title" id="myModalLabel">
            添加账单
        </h4>
    </div>
    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('welcome/addbill');?>">
        <div class="modal-body">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">分类名称</label>
                <div class="col-sm-10">
                    <input type="text" name="cat_name" class="form-control" id="firstname" placeholder="请输入分类名称" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">选择分类</label>
                <div class="col-sm-10">
                    <select class="form-control" name="cat_id">

                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary">确认添加</button>
        </div>
    </form>
</div>
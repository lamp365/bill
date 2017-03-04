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
    <form class="form-horizontal total_sel" role="form" method="post" action="<?php echo site_url('welcome/postBill');?>">
        <div class="modal-body">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">所属分类</label>
                <div class="col-sm-10">
                    <select class="form-control sel_parent_cat" name="p_cat_id" onchange="sel_parent_cat(this)" >
                        <option value="0">请选择分类</option>
                        <?php foreach($parent as $one) {

                                echo "<option value='{$one['id']}'>{$one['name']}</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">所属子类</label>
                <div class="col-sm-10">
                    <select class="form-control sel_son_cat" data-mark='0' name="s_cat_id" onchange="sel_son_cat(this)" >
                        <option value="-1">请选择父分类</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">支出类型</label>
                <div class="col-sm-10">
                    <select class="form-control"  name="pay_type" >
                        <option value="1">支出金额</option>
                        <option value="1">收入金额</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">消费金额</label>
                <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" placeholder="请输入消费金额">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">备注信息</label>
                <div class="col-sm-10">
                    <input type="text" name="remark" class="form-control" placeholder="请输入备注信息">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="submit" class="btn btn-primary">确认添加</button>
        </div>
    </form>
</div>
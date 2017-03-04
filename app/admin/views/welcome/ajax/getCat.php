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
           <?php if($one){ echo "编辑分类";}else{ echo "添加分类"; }?>
        </h4>
    </div>
    <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('welcome/addCat');?>">
    <div class="modal-body">
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-10">
                <input type="text" name="cat_name" class="form-control" id="firstname" placeholder="请输入分类名称" value="<?php if($one) echo $one['name'];?>">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">选择分类</label>
            <div class="col-sm-10">
                <select class="form-control" name="cat_id">
                    <?php
                    if($one){
                        if($one['pid'] == 0){
                            echo "<option value='0' >顶级分类</option>";
                        }else{
                            $c_name = getCatName($one['pid']);
                            echo "<option value='{$one['pid']}' >{$c_name}</option>";
                        }
                    }else{
                        echo '<option value="0">顶级分类</option>';
                        foreach($all as $item){
                            if($item['level'] != 0){
                                echo "<option value='{$item['id']}' >|{$item['html']}{$item['name']}</option>";
                            }else{
                                echo "<option value='{$item['id']}' >{$item['name']}</option>";
                            }

                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="submit" class="btn btn-primary">确认添加</button>
        <input type="hidden" name="hide_id" value="<?php if($one){ echo $one['id'];} ?>">
    </div>
    </form>
</div>
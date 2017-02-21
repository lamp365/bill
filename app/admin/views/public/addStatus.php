<html>
<head>
    <title>My Form</title>
</head>
<body>

<h3>Your form was successfully submitted!</h3>
<?php if($status == 1){ ?>
<p>添加成功</p>
<p><?php echo anchor('publics/add', '再次添加!'); ?></p>
<?php }else{ ?>
<p>添加失败</p>
<p><?php echo anchor('publics/add', '再次添加!'); ?></p>
<?php } ?>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>列表</title>
</head>
<body>
    <?php foreach($userlist as $item){
        echo "id:{$item['id']}------用户名：{$item['username']}----密码：{$item['password']}-----邮箱：{$item['email']}<br/><br/>";
    } ?>
<?php echo $pageinfo;?>
</body>
</html>
<html>
<head>
    <title>错误提示</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="<?php echo get_libs('beAlert/css/beAlert.css');?>">
    <script src="<?php echo get_js('jquery-1.10.2.min.js','common');?>"></script>
    <script src="<?php echo get_libs('beAlert/js/beAlert.js');?>"></script>
</head>
<body>

<script>
    var msg  = "<?php echo $res['msg']; ?>";
    var time = "<?php echo $res['time']; ?>";
    var url  = "<?php echo $res['url']; ?>";
    var tit  = "即将跳转:<span>"+time+"</span> s";
    function goUrl(url){
        if(url){
            window.location.href = url;
        }else{
            window.history.back();
        }
    }
    $(function(){
        alert(msg,tit,function(){
            goUrl(url);
        },{type: 'success'});

        var interval = setInterval(function(){
            var obj = $(".BeAlert_box");
            if(obj.length < 1){
                goUrl(url);
            }
            time = parseInt(time) -1;
            $(".BeAlert_message span").html(time);
            if(time <= 0) {
                goUrl(url);
                clearInterval(interval);
            }
        }, 1000);
    });

</script>
</body>
</html>


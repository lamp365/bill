<html>
<head>
    <title>错误提示</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <script src="<?php echo get_js('jquery-1.10.2.min.js','common');?>"></script>
    <style>
        <?php if(is_mobile_request()){  ?>
        .err_img{
            width: 100%;
        }
        <?php }else{  ?>
        .err_img{
            width: 50%;
        }
        <?php } ?>
        h2{
            margin-top:40px;
        }
        .tip{
            font-weight: bold;
            line-height: 24px;
        }
        .tip a{
            text-decoration: none;
        }
        #wait_time{
            color: red;
        }
    </style>
</head>
<body>
<center>
    <h2><?php echo $res['msg']; ?></h2>
    <img src="<?php echo get_images('404.jpg') ?>" class="err_img">
    <?php if(is_mobile_request()){ ?>
        <p class="tip">
            即将跳转：<span id="wait_time"><?php echo $res['time']; ?></span> S<br/>
            如果无法跳转请
            <?php if($res['url']){ echo "<a href='{$res['url']}'>点击这里</a>"; }else{ echo "<a href='javascript:;' id='jump'>点击这里</a>";} ?>
            跳转
        </p>
    <?php }else{ ?>
        <p class="tip">
            即将跳转：<span id="wait_time"><?php echo $res['time']; ?></span> S，如果无法跳转请
            <?php if($res['url']){ echo "<a href='{$res['url']}'>点击这里</a>"; }else{ echo "<a href='javascript:;' id='jump'>点击这里</a>";} ?>
            跳转
        </p>
    <?php } ?>

</center>
<script>
    var time = "<?php echo $res['time']; ?>";
    var url = "<?php echo $res['url']; ?>";
    $(function(){
        var interval = setInterval(function(){
            time = parseInt(time) -1;
            $("#wait_time").html(time);
            if(time <= 0) {
                if(url){
                    window.location.href = url;
                }else{
                    window.history.back();
                }
                clearInterval(interval);
            }
        }, 1000);

        $("#jump").click(function(){
            window.history.back();
        })
    });

</script>
</body>
</html>


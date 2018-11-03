<!DOCTYPE html>
<html lang="zh-CN" style="height:300%;">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>第4话</title>
    <script>
        var deviceWidth = parseInt(window.screen.width);  //获取当前设备的屏幕宽度
        var deviceScale = deviceWidth / 750;  //得到当前设备屏幕与720之间的比例，之后我们就可以将网页宽度固定为720px
        var ua = navigator.userAgent;
        //获取当前设备类型（安卓或苹果）
        if (/Android (\d+\.\d+)/.test(ua)) {
            var version = parseFloat(RegExp.$1);
            if (version > 2.3) {
                document.write('<meta name="viewport" content="width=750,initial-scale=' + deviceScale + ', minimum-scale = ' + deviceScale + ', maximum-scale = ' + deviceScale + '">');
            } else {
                document.write('<meta name="viewport" content="width=750,initial-scale=0.75,maximum-scale=0.75,minimum-scale=0.75" />');
            }
        } else {
            document.write('<meta name="viewport" content="width=750, user-scalable=no">');
        }

    </script>
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery-1.10.1.min.js") ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/comm.css") ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/item_pay_cue.css") ?>" />
</head>
<body style="margin: 0px; height:100%;">
<div class="main" style="height:100%; overflow:hidden;">
    <!-- 顶部标题 -->
    <div class="fixed-top-title">
        <div class="title-main">
            <div class="fixed-top-title-icon">
                <a href="javascript:history.go(-1);">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fixed-prev.png") ?>" />
                </a>
            </div>
            <div class="fixed-top-title-text">第4话</div>
        </div>
    </div>

    <!-- 顶部分割线 -->
    <div class="interval" style="position: fixed; width:750px; z-index:3;"></div>
    <!-- 内容 -->
    <div class="content-main">
        <img src="http://img.18manhua.com/image/18/33a169a3be3ade7d0473d59299f47dfa.jpg" />
        <img src="http://img.18manhua.com/image/18/406d4575fbf2ea509c96acfcef0ebae3.jpg" />
        <img src="http://img.18manhua.com/image/18/791a7feaa2908ae11c0ab24402233a1e.jpg" />
        <img src="http://img.18manhua.com/image/18/440cd51739ff8f0e2b6c4190c7b7e2f3.jpg" />
    </div>
    <div class="shade" style="height:300%;">
        <div class="show-content">
            <div class="msg">
                很抱歉，您的金币不足，无法继续查看<br />请充值后继续阅读
            </div>
            <div class="button">
                <a href="/pay/index">前往充值</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
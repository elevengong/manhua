
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <link href="<?php echo asset( "/resources/views/frontend/pc/images/favicon.ico") ?>" rel="shortcut icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>注册</title>
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
    <script src="http://img.18manhua.com/static/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/comm.css") ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/center.css") ?>" />
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery-1.10.1.min.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/layer/layer.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/baseCheck.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/login.js") ?>"></script>
</head>
<body style="margin: 0px;">
<div class="main">
    <div class="interval"></div>
    <div class="main-title">
        <div class="go-back">
            <a href="javascript:history.go(-1);">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/back.png") ?>" />
            </a>
        </div>
        <div class="title">
            返回
        </div>
        <div class="go-home">
            <a href="/m">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/home.png") ?>" />
            </a>
        </div>
        <div class="icon-search">
            <a href="/m/search">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/search_ico.png") ?>" />
            </a>
        </div>
    </div>
    <!-- </div> -->
    <div style="clear:both;"></div>

    <div class="loginform" style="background-color: white;">
        <form class="form form-horizontal" action="#" method="post">
            {{csrf_field()}}
            <input id="recommend" name="recommend" type="hidden" value="{{$daili_id}}">

            <div class="input_field">
                <span class="input_fieldTitle">用户帐号</span>
                <input type="text" name="name" id="name" placeholder="请输入你的用户帐号" tabindex="1">
            </div>
            <div class="input_field">
                <span class="input_fieldTitle">密码</span>
                <input type="password" name="pwd" id="pwd" autocomplete="off" placeholder="请输入7-12字符" tabindex="2">
            </div>
            <div class="input_field">
                <span class="input_fieldTitle">重复密码</span>
                <input type="password" name="repwd" id="repwd" autocomplete="off" placeholder="请输入7-12字符" tabindex="2">
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3" style="text-align: center;padding-bottom: 20px;">
                    <input id="btn_registered" name="btn_registered" type="button" class="btn btn-success radius size-L" value="&nbsp;注&nbsp;&nbsp;&nbsp;&nbsp;册&nbsp;">
                    <input id="btn_clear" name="btn_clear" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                </div>
            </div>
        </form>

    </div>


    <div class="interval"></div>
    <a href="/m/login">
        <div class="item-line border-bottom">
            <div class="item-line-icon">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/back.png") ?>" />
            </div>
            <div class="item-line-title">登陆</div>
            <div class="item-line-explain"></div>
        </div>
    </a>
</div>
</body>
</html>
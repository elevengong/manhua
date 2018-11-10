
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>个人中心</title>
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


    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/comm.css") ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/center.css") ?>" />
</head>
<body style="margin: 0px;">
<div class="main">
    <!-- <div style="width:100%;height:100px;position:fixed;top:0;left:0; z-index:2;">增加顶部固定 -->
    <div class="interval"></div>
    <div class="main-title">
        <div class="go-back">
            <a href="javascript:history.go(-1);">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/back.png") ?>" />
            </a>
        </div>
        <div class="title">
            个人中心
        </div>
        <div class="go-home">
            <a href="/m">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/home.png") ?>" />
            </a>
        </div>
    </div>
    <!-- </div> -->
    <div class="head-uname">
        <div class="head-img">
            <img src="<?php echo asset( "/resources/views/frontend/mobile/images/default-head.png") ?>" />
        </div>
        <div class="uname-item">
            <div class="nickname">账号：{{$user}}@if($userInfo['vip']==1)(<font style="color: #ff7e20;">VIP</font>) @else (普通用户)@endif</div>
            <div class="uname-password">
                金币余额<span class="light">{{$userInfo['coin']}}</span>个
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
    <!-- <div class="interval"></div> -->
    <div class="user-center-msg">
        <div class="user-center-msg-content">请截图保存网址： <span class="light">{{$attribute[0]['value']}}</span></div>
    </div>
    <a href="/m/user/deposit">
        <div class="item-line">
            <div class="item-line-icon">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/gold.png") ?>" />
            </div>
            <div class="item-line-title">充值</div>
            <div class="item-line-explain"><span class="gray">金币余额</span>{{$userInfo['coin']}}<span class="gray">个</span></div>
            <div class="item-line-direction">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/next1.png") ?>" />
            </div>
        </div>
    </a>
    <div class="interval"></div>
    @if($vip==1)
    <a href="#">
        <div class="item-line border-bottom">
            <div class="item-line-icon">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/browse-record.png") ?>" />
            </div>
            <div class="item-line-title">VIP到期时间</div>
            <div class="item-line-explain">{{$userInfo['vip_end_time']}}</div>
            <div class="item-line-direction">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/next1.png") ?>" />
            </div>
        </div>
    </a>
    @endif
    {{--<a href="/user/set_pwd">--}}
        {{--<div class="item-line border-bottom">--}}
            {{--<div class="item-line-icon">--}}
                {{--<img src="http://img.18manhua.com/static/img/user/center/set-uname-password.png" />--}}
            {{--</div>--}}
            {{--<div class="item-line-title">修改账号密码</div>--}}
            {{--<div class="item-line-explain"></div>--}}
            {{--<div class="item-line-direction">--}}
                {{--<img src="" />--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</a>--}}
    <div class="interval"></div>
    <a href="/user/logout">
        <div class="item-line border-bottom">
            <div class="item-line-icon">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/logout.png") ?>" />
            </div>
            <div class="item-line-title">退出</div>
            <div class="item-line-explain"></div>
            <div class="item-line-direction">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/next1.png") ?>" />
            </div>
        </div>
    </a>
</div>
</body>
</html>
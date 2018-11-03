
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

        var site_url_static = 'http://img.18manhua.com/static/';
    </script>
    <script src="http://img.18manhua.com/static/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="http://img.18manhua.com/static/css/comm.css" />
    <link rel="stylesheet" type="text/css" href="http://img.18manhua.com/static/css/user/center.css" />
    <script src="http://img.18manhua.com/static/js/user/center.js"></script>
</head>
<body style="margin: 0px;">
<div class="main">
    <!-- <div style="width:100%;height:100px;position:fixed;top:0;left:0; z-index:2;">增加顶部固定 -->
    <div class="interval"></div>
    <div class="main-title">
        <div class="go-back">
            <a href="javascript:history.go(-1);">
                <img src="http://img.18manhua.com/static/img/back.png" />
            </a>
        </div>
        <div class="title">
            个人中心
        </div>
        <div class="go-home">
            <a href="/">
                <img src="http://img.18manhua.com/static/img/home.png" />
            </a>
        </div>
    </div>
    <!-- </div> -->
    <div class="head-uname">
        <div class="head-img">
            <img src="http://img.18manhua.com/static/img/default-head.png" />
        </div>
        <div class="uname-item">
            <div class="nickname">账号：dbfx3rb  密码：kg361yc</div>
            <div class="uname-password">
                金币余额<span class="light">0</span>个
                VIP剩余<span class="light">00:00</span>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
    <!-- <div class="interval"></div> -->
    <div class="user-center-msg">
        <div class="user-center-msg-content">请截图保存网址： <span class="light">http://www.18manhua.com</span></div>
    </div>
    <a href="/pay/index">
        <div class="item-line">
            <div class="item-line-icon">
                <img src="http://img.18manhua.com/static/img/user/center/gold.png" />
            </div>
            <div class="item-line-title">金币充值</div>
            <div class="item-line-explain"><span class="gray">金币余额</span>0<span class="gray">个</span><span class="gray">VIP剩余</span>00:00</div>
            <div class="item-line-direction">
                <img src="http://img.18manhua.com/static/img/user/center/next.png" />
            </div>
        </div>
    </a>
    <div class="interval"></div>
    <a href="/caricature_read_detail/list">
        <div class="item-line border-bottom">
            <div class="item-line-icon">
                <img src="http://img.18manhua.com/static/img/user/center/browse-record.png" />
            </div>
            <div class="item-line-title">浏览记录</div>
            <div class="item-line-explain"></div>
            <div class="item-line-direction">
                <img src="http://img.18manhua.com/static/img/user/center/next.png" />
            </div>
        </div>
    </a>
    <a href="/user/set_phone">
        <div class="item-line border-bottom">
            <div class="item-line-icon">
                <img src="http://img.18manhua.com/static/img/user/center/phone.png" />
            </div>
            <div class="item-line-title">绑定手机号</div>
            <div class="item-line-explain">绑定送200金币</div>
            <div class="item-line-direction">
                <img src="http://img.18manhua.com/static/img/user/center/next.png" />
            </div>
        </div>
    </a>
    <a href="/user/set_pwd">
        <div class="item-line border-bottom">
            <div class="item-line-icon">
                <img src="http://img.18manhua.com/static/img/user/center/set-uname-password.png" />
            </div>
            <div class="item-line-title">修改账号密码</div>
            <div class="item-line-explain"></div>
            <div class="item-line-direction">
                <img src="http://img.18manhua.com/static/img/user/center/next.png" />
            </div>
        </div>
    </a>
    <div class="interval"></div>
    <a href="/login/logout">
        <div class="item-line border-bottom">
            <div class="item-line-icon">
                <img src="http://img.18manhua.com/static/img/user/center/logout.png" />
            </div>
            <div class="item-line-title">退出</div>
            <div class="item-line-explain"></div>
            <div class="item-line-direction">
                <img src="http://img.18manhua.com/static/img/user/center/next.png" />
            </div>
        </div>
    </a>
</div>
</body>
</html>
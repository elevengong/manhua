
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>充值中心</title>
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
    <link rel="stylesheet" type="text/css" href="http://img.18manhua.com/static/css/pay/index_001.css" />
    <script src="http://img.18manhua.com/static/js/comm.js"></script>
    <script type="text/javascript">
        var orderJson = [];
    </script>
    <script src="http://img.18manhua.com/static/js/pay/index.js"></script>
</head>
<body style="margin: 0px; background-color: #f3f3f3">
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
            充值中心
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
    <div class="clear:both;"></div>
    <!-- <div class="user-balance">
        <div class="user-balance-left">账户</div>
        <div class="user-balance-right">
            金币余额<span class="light">0</span>个
            VIP剩余<span class="light">00:00</span>
        </div>
    </div> -->

    <div class="goods-main">
        <div class="goods-item " data-id="1">
            <div class="goods-item-left">
                <div class="goods-item-money">58元</div>
                <div class="goods-item-name">5800+200金币</div>
                <div class="goods-item-explain">多送2元</div>
            </div>

            <div class="goods-item-right">
                <img src="http://img.18manhua.com/static/img/pay/index/49.png">
            </div>
        </div>
        <div class="goods-item hot2" data-id="2">
            <div class="goods-item-left">
                <div class="goods-item-money">98元</div>
                <div class="goods-item-name">9800+1000金币</div>
                <div class="goods-item-explain">多送10元</div>
            </div>

            <div class="goods-item-right">
                <img src="http://img.18manhua.com/static/img/pay/index/69.png">
            </div>
        </div>
        <div class="goods-item " data-id="3">
            <div class="goods-item-left">
                <div class="goods-item-money">198元</div>
                <div class="goods-item-name">19800+3000金币</div>
                <div class="goods-item-explain">多送30元</div>
            </div>

            <div class="goods-item-right">
                <img src="http://img.18manhua.com/static/img/pay/index/99.png">
            </div>
        </div>
        <div class="goods-item " data-id="4">
            <div class="goods-item-left">
                <div class="goods-item-money">298元</div>
                <div class="goods-item-name">29800+5000金币</div>
                <div class="goods-item-explain">多送50元</div>
            </div>

            <div class="goods-item-right">
                <img src="http://img.18manhua.com/static/img/pay/index/99.png">
            </div>
        </div>
        <div class="goods-item " data-id="5">
            <div class="goods-item-left">
                <div class="goods-item-money">39元<img class="hot" src="http://img.18manhua.com/static/img/pay/index/hot.png" /></div>
                <div class="goods-item-name">VIP日卡</div>
                <div class="goods-item-explain">24小时免费看</div>
            </div>

            <div class="goods-item-right">
                <img src="http://img.18manhua.com/static/img/pay/index/7.png">
            </div>
        </div>
        <div class="goods-item " data-id="6">
            <div class="goods-item-left">
                <div class="goods-item-money">99元</div>
                <div class="goods-item-name">VIP月卡</div>
                <div class="goods-item-explain">30天免费看</div>
            </div>

            <div class="goods-item-right">
                <img src="http://img.18manhua.com/static/img/pay/index/30.png">
            </div>
        </div>
        <div class="goods-item " data-id="7">
            <div class="goods-item-left">
                <div class="goods-item-money">199元</div>
                <div class="goods-item-name">VIP季卡</div>
                <div class="goods-item-explain">90天免费看</div>
            </div>

            <div class="goods-item-right">
                <img src="http://img.18manhua.com/static/img/pay/index/90.png">
            </div>
        </div>
        <div class="goods-item " data-id="8">
            <div class="goods-item-left">
                <div class="goods-item-money">365元</div>
                <div class="goods-item-name">VIP年卡</div>
                <div class="goods-item-explain">365天免费看</div>
            </div>

            <div class="goods-item-right">
                <img src="http://img.18manhua.com/static/img/pay/index/90.png">
            </div>
        </div>
        <div class="goods-item " data-id="9">
            <div class="goods-item-left">
                <div class="goods-item-money">0.01元</div>
                <div class="goods-item-name">1金币</div>
                <div class="goods-item-explain">1元=10金币</div>
            </div>

            <div class="goods-item-right">
                <img src="http://img.18manhua.com/static/img/pay/index/49.png">
            </div>
        </div>


        <input type="hidden" name="id" value="2" />
        <div style="clear:both;"></div>

        <div style='height:30px;'>选择支付方式</div>

        <div class='alipay pitch' data-key="pay" data-pay="alipay"><img src='http://img.18manhua.com/static/img/pay/index/ali_01.png' /></div>
        <div class='wxpay' data-key="pay" data-pay="wxpay"><img src='http://img.18manhua.com/static/img/pay/index/wx_01.png' /></div>
        <input type="hidden" name="pay_type" value="alipay" />
        <div style="clear:both;"></div>
    </div>

    <div class="button">
        <a href="javascript:void(0);" onclick="onSubmit('/pay3/create')">充值</a>
    </div>
</div>
</body>
</html>
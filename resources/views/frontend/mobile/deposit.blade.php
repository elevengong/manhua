
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

    </script>
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery-1.10.1.min.js") ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/comm.css") ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/index_001.css") ?>" />
    <script src="<?php echo asset( "/resources/views/frontend/js/comm.js") ?>"></script>
    <script type="text/javascript">
        var orderJson = [];
    </script>
    <script src="<?php echo asset( "/resources/views/frontend/js/index.js") ?>"></script>
</head>
<body style="margin: 0px; background-color: #f3f3f3">
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
            充值中心
        </div>
        <div class="go-home">
            <a href="/m/">
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
            <div class="nickname">账号：{{$user}}@if($userInfo['vip']==1)(<font style="color: #ff7e20;">VIP</font>) @else (普通用户)@endif  </div>
            <div class="uname-password">
                金币余额<span class="light">{{$userInfo['coin']}}</span>个
                @if($userInfo['vip'] == 1)
                VIP到期时间<span class="light">{{date('Y-m-d',strtotime($userInfo['vip_end_time']))}}</span>
                 @endif
            </div>
        </div>
    </div>
    <div class="clear:both;"></div>


    <div class="goods-main">
        <div class="goods-item " data-id="1">
            <div class="goods-item-left">
                <div class="goods-item-money">3.9元</div>
                <div class="goods-item-name">VIP日卡</div>
                <div class="goods-item-explain">1天免费看</div>
            </div>

            <div class="goods-item-right">
                <img src="<?php echo asset( "/resources/views/frontend/pc/images/1day.png") ?>">
            </div>
        </div>
        <div class="goods-item " data-id="2">
            <div class="goods-item-left">
                <div class="goods-item-money">29.9元</div>
                <div class="goods-item-name">VIP月卡</div>
                <div class="goods-item-explain">30天免费看</div>
            </div>

            <div class="goods-item-right">
                <img src="<?php echo asset( "/resources/views/frontend/pc/images/30.png") ?>">
            </div>
        </div>
        <div class="goods-item " data-id="3">
            <div class="goods-item-left">
                <div class="goods-item-money">69.9元</div>
                <div class="goods-item-name">VIP季卡</div>
                <div class="goods-item-explain">90天免费看</div>
            </div>

            <div class="goods-item-right">
                <img src="<?php echo asset( "/resources/views/frontend/pc/images/90.png") ?>">
            </div>
        </div>
        <div class="goods-item " data-id="4">
            <div class="goods-item-left">
                <div class="goods-item-money">199.9元</div>
                <div class="goods-item-name">VIP年卡</div>
                <div class="goods-item-explain">365天免费看</div>
            </div>

            <div class="goods-item-right">
                <img src="<?php echo asset( "/resources/views/frontend/pc/images/1year.png") ?>">
            </div>
        </div>
        <div class="goods-item " data-id="5">
            <div class="goods-item-left">
                <div class="goods-item-money">0.01元</div>
                <div class="goods-item-name">1金币</div>
                <div class="goods-item-explain">1元=100金币</div>
            </div>

            <div class="goods-item-right">
                <img src="<?php echo asset( "/resources/views/frontend/pc/images/49.png") ?>">
            </div>
        </div>


        <input type="hidden" name="id" value="2" />
        <div style="clear:both;"></div>

        <div style='height:30px;'>选择支付方式</div>

        <div class='alipay pitch' data-key="pay" data-pay="alipay"><img src="<?php echo asset( "/resources/views/frontend/pc/images/ali_01.png") ?>" /></div>
        <div class='wxpay' data-key="pay" data-pay="wxpay"><img src="<?php echo asset( "/resources/views/frontend/pc/images/wx_01.png") ?>" /></div>
        <input type="hidden" name="pay_type" value="alipay" />
        <div style="clear:both;"></div>
    </div>

    <div class="button">
        <a href="javascript:void(0);" onclick="onSubmit('/pay3/create')">充值</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".goods-main .goods-item").click(function(){
            $(".goods-main .goods-item").removeClass("pitch");
            $(this).addClass("pitch");
            $("input[name='id']").val($(this).attr("data-id"));
        });

        var default_id = $("input[name='id']").val();
        $(".goods-main .goods-item[data-id='"+default_id+"']").click();//默认选中

        $(".goods-main div[data-key='pay']").click(function(){
            $(".goods-main div[data-key='pay']").removeClass("pitch");
            $(this).addClass("pitch");
            $("input[name='pay_type']").val($(this).attr("data-pay"));
        });
        var default_pay = $("input[name='pay_type']").val();
        $(".goods-main div[data-key='pay'][data-pay='"+default_pay+"']").click();//默认选中
    })
</script>
</body>
</html>
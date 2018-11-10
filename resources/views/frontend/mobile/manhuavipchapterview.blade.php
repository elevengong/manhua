<!DOCTYPE html>
<html lang="zh-CN" style="height:300%;">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>{{$manhua[0]['name']}}-第{{$manhuaChapter[0]['chapter_name']}}话</title>
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
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery-1.10.1.min.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/layer/layer.js") ?>"></script>
</head>
<body style="margin: 0px; height:100%;">
{{csrf_field()}}
<div class="main" style="height:100%; overflow:hidden;">
    <!-- 顶部标题 -->
    <div class="fixed-top-title">
        <div class="title-main">
            <div class="fixed-top-title-icon">
                <a href="javascript:history.go(-1);">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fixed-prev.png") ?>" />
                </a>
            </div>
            <div class="fixed-top-title-text">第{{$manhuaChapter[0]['chapter_name']}}话</div>
        </div>
    </div>

    <!-- 顶部分割线 -->
    <div class="interval" style="position: fixed; width:750px; z-index:3;"></div>
    <!-- 内容 -->
    <div class="content-main">
        <img src="{{$attribute[1]['value']}}/public/manhua{{$manhuaPhotos[0]['photo']}}" />
        <img src="{{$attribute[1]['value']}}/public/manhua{{$manhuaPhotos[1]['photo']}}" />
    </div>
    <div class="shade" style="height:300%;">
        @if(isset($user))
        <div class="show-content">
            <div class="msg">
                很抱歉，您的还不是VIP会员，无法继续查看<br>请充值VIP或用金币购买后继续阅读，谢谢
            </div>
            <div class="button">
                <a href="/m/user/deposit">前往充值</a> <a href="javascript:" onclick="paychapter({{$manhuaChapter[0]['chapter_id']}});">购买本章节</a>
            </div>
        </div>
            @else
            <div class="show-content">
                <div class="msg">
                    很抱歉，您的还没有登陆，无法继续查看<br>请登陆后继续阅读
                </div>
                <div class="button">
                    <a href="/m/login">登陆</a> <a href="/m/registered">注册</a>
                </div>
            </div>
            @endif
    </div>
</div>
<script>
    function paychapter(chapter_id) {
        if(chapter_id == ''){
            layer.msg( data.msg );
            return false;
        }
        $.ajax({
            type:"post",
            url:"/user/paycoin/" + chapter_id,
            dataType:'json',
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
            data:$("#form1").serialize(),
            success:function(data){
                if(data.status == 0)
                {
                    layer.msg( data.msg );
                }else{
                    layer.msg( data.msg ,function () {
                        window.location.reload();
                    });
                }
            },
            error:function (data) {
                layer.msg(data.msg);
            }
        });
    }

</script>
</body>
</html>
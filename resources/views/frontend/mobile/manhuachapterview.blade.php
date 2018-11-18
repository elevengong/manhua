<!DOCTYPE html>
<html lang="zh-CN">
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
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/item.css") ?>" />
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery.lazyload.min.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/item.js?ver=1.0") ?>"></script>
</head>
<body style="margin: 0px;">
<div class="main">
    <!-- 顶部标题 -->
    <div class="fixed-top-title">
        <div class="title-main">
            <div class="fixed-top-title-icon">
                <a href="/m/manhuaview/{{$manhua_id}}/asc">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fixed-prev.png") ?>" />
                </a>
            </div>
            <div class="fixed-top-title-text">第{{$manhuaChapter[0]['chapter_name']}}话</div>
        </div>
    </div>
    <!-- 底部菜单 -->
    <div class="fixed-footer">
        <a href="javascript:location.reload();">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fiexd-refresh.png") ?>" />
            </div>
        </a>
        <a href="/m/manhuaview/{{$manhua_id}}/asc">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fixed-list.png") ?>" />
            </div>
        </a>
        @if($manhuaChapter[0]['pre_chapter_id']==0)
        <a href="/m/manhuaview/{{$manhua_id}}/asc">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fixed-prev.png") ?>" />
            </div>
        </a>
        @else
        <a href="/m/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['pre_chapter_id']}}">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fixed-prev.png") ?>" />
            </div>
        </a>
        @endif
        @if($manhuaChapter[0]['next_chapter_id']==0)
        <a href="/m/manhuaview/{{$manhua_id}}/asc">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fiexd-next.png") ?>" />
            </div>
        </a>
        @else
        <a href="/m/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['next_chapter_id']}}">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fiexd-next.png") ?>" />
            </div>
        </a>
        @endif
    </div>
    <!-- 上一章 -->
    <!-- 顶部分割线 -->
    <div class="interval" style="position: fixed; width:750px;"></div>
    <!-- 内容 -->
    <div class="content-main" style="font-size:0;">
        @foreach($manhuaPhotos as $photo)
        <img data-original="{{$attribute[1]['value']}}/public/manhua{{$photo['photo']}}" class="lazy" src="<?php echo asset( "/resources/views/frontend/mobile/images/load.gif") ?>">
        @endforeach
    </div>
    <!-- 底部按钮 -->
    <div class="bottom-menu">
        <div class="menu-1">
            <div class="menu-1-item">
                <a href="javascript:location.reload();">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/refresh.png") ?>" />
                    <span>刷新</span>
                </a>
            </div>
            <div class="menu-1-item">
                <a href="/m/user/deposit">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/pay.png") ?>" />
                    充值
                </a>
            </div>
        </div>
        <div class="menu-2">
            <div class="menu-2-item">
                @if($manhuaChapter[0]['pre_chapter_id']==0)
                <a href="/m/manhuaview/{{$manhua_id}}/asc">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/prev.png") ?>" />
                    上一页
                </a>
                @else
                <a href="/m/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['pre_chapter_id']}}">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/prev.png") ?>" />
                    上一页
                </a>
                @endif
            </div>
            <div class="menu-2-item">
                <a href="/m/manhuaview/{{$manhua_id}}/asc">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/list.png") ?>" />
                    返回目录
                </a>
            </div>
            <div class="menu-2-item">
                @if($manhuaChapter[0]['next_chapter_id']==0)
                <a href="/m/manhuaview/{{$manhua_id}}/asc">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/next.png") ?>" />
                    下一页
                </a>
                @else
                <a href="/m/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['next_chapter_id']}}">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/next.png") ?>" />
                    下一页
                </a>
                @endif
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>
<script>
    $(function() {
        $("img.lazy").lazyload({effect: "fadeIn"});
    });
</script>
</body>
</html>
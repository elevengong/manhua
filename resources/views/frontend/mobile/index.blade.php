<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <link href="<?php echo asset( "/resources/views/frontend/pc/images/favicon.ico") ?>" rel="shortcut icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>18韩漫</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/swipeslider.css") ?>" />
    <script src="<?php echo asset( "/resources/views/frontend/js/swipeslider.min.js") ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/comm.css") ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/index.css?ver=1.0") ?>" />
    <script src="<?php echo asset( "/resources/views/frontend/js/index.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery.lazyload.min.js") ?>"></script>
</head>
<body style="margin: 0px;">
<div class="main">
    <div class="interval"></div>
    <div class="main-title">
        <div class="logo"><img height="100px" src="<?php echo asset( "/resources/views/frontend/mobile/images/logo.png") ?>" /></div>
        <div class="icon-user-center">
            <a href="/m/user/center">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/icon_user_center.png") ?>" />
            </a>
        </div>
        <div class="icon-search">
            <a href="/m/search">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/search_ico.png") ?>" />
            </a>
        </div>
    </div>
    <div class="rotation-block">
        <figure id="full_feature" class="swipslider">
            <ul class="sw-slides">
                <li class="sw-slide">
                    <a href="/m/manhuaview/269">
                        <img src="<?php echo asset( "/resources/views/frontend/mobile/images/recommend_001.jpg") ?>" alt="">
                    </a>
                </li>
                <li class="sw-slide">
                    <a href="/m/manhuaview/262">
                        <img src="<?php echo asset( "/resources/views/frontend/mobile/images/recommend_002.jpg") ?>" alt="">
                    </a>
                </li>
                <li class="sw-slide">
                    <a href="/m/manhuaview/256">
                        <img src="<?php echo asset( "/resources/views/frontend/mobile/images/recommend_003.jpg") ?>" alt="">
                    </a>
                </li>
                <li class="sw-slide">
                    <a href="/m/manhuaview/53">
                        <img src="<?php echo asset( "/resources/views/frontend/mobile/images/recommend_004.jpg") ?>" alt="">
                    </a>
                </li>
                <li class="sw-slide">
                    <a href="/m/manhuaview/38">
                        <img src="<?php echo asset( "/resources/views/frontend/mobile/images/recommend_005.jpg") ?>" alt="">
                    </a>
                </li>

            </ul>
        </figure>
    </div>

    <div class="menu">
        <div class="menu-item">
            <a href="/m/hanman/hot/">
                <div class="menu-icon"><img src="<?php echo asset( "/resources/views/frontend/mobile/images/icon-ranking.png") ?>"></div>
                <div class="menu-text">韩漫排行</div>
            </a>
        </div>
        <div class="menu-item">
            <a href="/m/hanman/0">
                <div class="menu-icon"><img src="<?php echo asset( "/resources/views/frontend/mobile/images/icon-update.png") ?>"></div>
                <div class="menu-text">连载中</div>
            </a>
        </div>
        <div class="menu-item">
            <a href="/m/hanman/1">
                <div class="menu-icon"><img src="<?php echo asset( "/resources/views/frontend/mobile/images/icon-finish.png") ?>"></div>
                <div class="menu-text">已完结</div>
            </a>
        </div>
        <div class="menu-item">
            <a href="/m/hanman/2">
                <div class="menu-icon"><img src="<?php echo asset( "/resources/views/frontend/mobile/images/icon-read.png") ?>"></div>
                <div class="menu-text">全彩漫画</div>
            </a>
        </div>
    </div>
    <div class="interval"></div>
    <div class="hot-recommend">
        <div class="recommend-title">
            <span class="recommend-title-left"><hr></span>
            <span class="recommend-title-text">最新更新</span>
            <span class="recommend-title-right"><hr></span>
        </div>
        @foreach($lastUpdateManhua as $manhua)
        <a href="/m/manhuaview/{{$manhua['manhua_id']}}/asc">
            <div class="recommend-item">
                <div class="item-img"><img data-original="{{$attribute[1]['value'].$manhua['cover']}}" class="lazy" src="<?php echo asset( "/resources/views/frontend/mobile/images/timg.gif") ?>"/></div>
                <div class="item-name">{{$manhua['name']}}</div>
                <div class="item-short-explain"></div>
            </div>
        </a>
        @endforeach

        <div style="clear:both;"></div>
    </div>
    <!-- <div class="interval"></div> -->

    <div class="banner-recommend">
        <a href="/m/user/deposit">
            <img src="<?php echo asset( "/resources/views/frontend/mobile/images/ad_img.png") ?>" />
        </a>
    </div>

    <!-- <div class="interval"></div> -->

    <div class="sales-volume-recommend">
        <div class="recommend-title">
            <span class="recommend-title-left"><hr></span>
            <span class="recommend-title-text">热门推荐</span>
            <span class="recommend-title-right"><hr></span>
        </div>
        @foreach($hotManhua as $manhua)
            <a href="/m/manhuaview/{{$manhua['manhua_id']}}/asc">
            <div class="recommend-item">
                <div class="item-img"><img data-original="{{$attribute[1]['value'].$manhua['cover']}}" class="lazy" src="<?php echo asset( "/resources/views/frontend/mobile/images/timg.gif") ?>"/></div>
                <div class="item-name">{{$manhua['name']}}</div>
                <div class="item-short-explain"></div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<script>
    $(function() {
        $("img.lazy").lazyload({effect: "fadeIn"});
    });
</script>
</body>
</html>
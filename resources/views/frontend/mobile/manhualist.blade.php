<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <link href="<?php echo asset( "/resources/views/frontend/pc/images/favicon.ico") ?>" rel="shortcut icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>排行</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/list.css") ?>" />
    <script src="<?php echo asset( "/resources/views/frontend/js/comm.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/ranking.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery.lazyload.min.js") ?>"></script>
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
            排行
        </div>
        <div class="go-home">
            <a href="/m">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/home.png") ?>" />
            </a>
        </div>
        <div class="icon-user-center">
            <a href="/m/user/center">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/icon_user_center.png") ?>" />
            </a>
        </div>
        <div class="icon-search-list">
            <a href="/m/search">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/search_ico.png") ?>" />
            </a>
        </div>
    </div>
    <!-- </div> -->
    <div style="height:15px;width:100%;background-color:#FFF;"></div>
    @foreach($manhuaList as $manhua)
    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/m/manhuaview/{{$manhua['manhua_id']}}/asc"><img data-original="{{$attribute[1]['value'].$manhua['cover']}}" class="lazy" src="<?php echo asset( "/resources/views/frontend/mobile/images/timg.gif") ?>"/></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/m/manhuaview/{{$manhua['manhua_id']}}/asc">{{$manhua['name']}}</a></div>
                <div class="caricature-item-status">@if($manhua['finish'] == 0)连载中@else完结@endif</div>
                <div class="caricature-item-label">韩漫</div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/m/manhuaview/{{$manhua['manhua_id']}}/asc">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    @endforeach

</div>
<div id="loadding" style="display: none;">正在加载中...</div>
{{csrf_field()}}
<input type="hidden" name="page" value="1" />
<input type="hidden" name="type" value="{{$type}}" />
<input type="hidden" name="totalPage" value="{{$manhuaList->lastPage()}}" />
<script>
    $(function() {
        $("img.lazy").lazyload({effect: "fadeIn"});
    });
</script>
</body>
</html>
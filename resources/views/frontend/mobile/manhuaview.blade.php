
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <link href="<?php echo asset( "/resources/views/frontend/pc/images/favicon.ico") ?>" rel="shortcut icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>{{$manhua[0]['name']}}</title>
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
    <script src="<?php echo asset( "/resources/views/frontend/js/comm.js") ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/mobile/css/chapter.css") ?>" />
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery.lazyload.min.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/chapter.js") ?>"></script>
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
            {{$manhua[0]['name']}}
        </div>
        <div class="go-home">
            <a href="/m">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/home.png") ?>" />
            </a>
        </div>
        <div class="icon-user-center" style="right: 80px !important;">
            <a href="/m/user/center">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/icon_user_center.png") ?>" />
            </a>
        </div>
        <div class="icon-search-view">
            <a href="/m/search">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/search_ico.png") ?>" />
            </a>
        </div>
    </div>
    <!-- </div> -->
    <div class="caricature-content">
        <div class="content-left">
            <div class="caricature-img">
                <a href="/m/manhuaview/{{$manhua[0]['manhua_id']}}">
                    <img src="{{$attribute[1]['value'].$manhua[0]['cover']}}" />
                </a>
            </div>
        </div>
        <div class="content-right">
            <div class="content-title">
                <a href="/m/manhuaview/{{$manhua[0]['manhua_id']}}">{{$manhua[0]['name']}}</a>
            </div>
            <div class="content-author">
                <a href="/m/manhuaview/{{$manhua[0]['manhua_id']}}">&nbsp;{{$manhua[0]['author']}}</a>
            </div>
            <div class="content-status">
                @if($manhua[0]['finish'] == 1)完结 @else 连载中 @endif
            </div>
            <div class="read-button">
                <a href="/m/manhuachapter/{{$chapterList[0]['manhua_id']}}/{{$chapterList[0]['chapter_id']}}">阅读漫画</a>
            </div>
        </div>
    </div>

    <div class="content-long-explain">
        作品介绍：{{$manhua[0]['intro']}}
    </div>

    <div class="chapter-title">
        <div class="chapter-title-icon">
            <img src="<?php echo asset( "/resources/views/frontend/mobile/images/chapter_title_icon.png") ?>" />
        </div>
        <div class="chapter-title-text">
            章节目录
        </div>
        <div class="chapter-title-sort">
            @if($order == 'asc')
            <a href="/m/manhuaview/{{$manhua[0]['manhua_id']}}/desc">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/sort_down.png") ?>" />
                <span class="sort-text">倒序</span>
            </a>
                @else
                <a href="/m/manhuaview/{{$manhua[0]['manhua_id']}}/asc">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/sort_up.png") ?>" />
                    <span class="sort-text">正序</span>
                </a>
                @endif
        </div>
    </div>
    @foreach($chapterList as $chapter)
    <a href="/m/manhuachapter/{{$chapter['manhua_id']}}/{{$chapter['chapter_id']}}">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                @if(!empty($chapter['chapter_cover']))
                    <img class="lazy" src="<?php echo asset( "/resources/views/frontend/mobile/images/timg.gif") ?>" data-original="{{$attribute[1]['value'].$chapter['chapter_cover']}}"/>
                @else
                    <img src="<?php echo asset( "/resources/views/frontend/pc/images/nopicture.jpg") ?>">
                @endif

            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第{{$chapter['chapter_name']}}话@if($chapter['coin'] ==0)<span class="free">免费</span>@endif</div>
                <div class="chapter-item-ctime">{{date('Y-m-d',strtotime($chapter['created_at']))}}</div>
            </div>
            <div class="chapter-item-gold">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/gold.png") ?>" />
                <span>{{$chapter['coin']}}金币</span>
            </div>
        </div>
    </a>
    @endforeach
</div>
<script>
    $(function() {
        $("img.lazy").lazyload({effect: "fadeIn"});
    });
</script>
</body>
</html>
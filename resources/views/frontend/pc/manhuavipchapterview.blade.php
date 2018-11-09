<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="applicable-device" content="pc">
    <meta name="renderer" content="webkit">
    <title>{{$manhua[0]['name']}}</title>
    <meta name="keywords" content="" />
    <meta name="description" content="{{$manhua[0]['intro']}}" />
    {{--<link rel="alternate" media="only screen and (max-width: 640px)" href="http://m.gumua.com/manhua/535.html" />--}}
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{$attribute[1]['value'].$manhua[0]['cover']}}" />
    <meta property="og:release_date" content="2017/1/3" />
    <meta property="og:title" content="{{$manhua[0]['name']}}">
    <meta property="og:description" content="{{$manhua[0]['intro']}}" />

    <link href="<?php echo asset( "/resources/views/frontend/pc/images/favicon.ico") ?>" rel="shortcut icon" />
    <link href="<?php echo asset( "/resources/views/frontend/pc/css/manhua.css") ?>" rel="stylesheet" />
    <link href="<?php echo asset( "/resources/views/frontend/pc/css/reset.css") ?>" rel="stylesheet" />
    <link href="<?php echo asset( "/resources/views/frontend/pc/css/swiper-3.4.2.min.css") ?>" rel="stylesheet" />


</head>
<body class="r_body">


<div class="fi_foot">
    <div class="fi_top_l">
        <a class="fi_logo" href="/"></a>
        <a class="fi_quanping" id="fi_quanping">全屏</a>
    </div>
    <div class="fi_foot_r">
        <div class="fi_top_r">{{$manhua[0]['name']}}<span>{{$manhuaChapter[0]['chapter_name']}}话</span></div>
        @if($manhuaChapter[0]['pre_chapter_id']==0)
            <a href="/manhuaview/{{$manhua_id}}" class="fi_foot_up"></a>
        @else
            <a href="/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['pre_chapter_id']}}" class="fi_foot_up"></a>
        @endif

        @if($manhuaChapter[0]['next_chapter_id']==0)
            <a href="/manhuaview/{{$manhua_id}}" class="fi_foot_down"></a>
        @else
            <a href="/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['next_chapter_id']}}" class="fi_foot_down"></a>
        @endif


        <div class="fi_foot_classify">
            <div class="fi_classify_r">
                <div class="fi_classify_after" style="display: none;"></div>
                <i class="fi_classify_img"></i>
                <div class="fi_classify">
                    <div class="fi_classify_tab">
                        <span>目录</span>
                        <i>共{{count($chapterList)}}话</i>
                    </div>
                    <ul class="fi_classify_ul" style="">
                        @foreach($chapterList as $list)
                            <li><a class="@if($list['chapter_id'] == $manhuaChapter[0]['chapter_id']) selected @endif" href="/manhuachapter/1/{{$list['chapter_id']}}">第{{$list['chapter_name']}}话</a></li>@endforeach
                    </ul>
                </div>
            </div>
            <div class="fi_classify_after"></div>
        </div>
    </div>
</div>

<!--返回顶部-->
<div class="fi_go">
    <a href="/manhuaview/{{$manhua_id}}" class="fi_go_menu"></a>
    <a href="javascript:;" class="fi_go_back"></a>
</div>

<!--弹窗-->
<div class="fi_mask"></div>
<div class="fi_dialog">
    <div class="fi_dialog_r">
        <p></p>
        <a href="/manhuaview/{{$manhua_id}}">返回详情页</a>
        <span>关闭</span>
    </div>
</div>

<div class="r_header">
    <div class="m1100 header">
        <div class="fl r_exit_read"><a href="/manhuaview/{{$manhua_id}}"><i></i><span>退出阅读</span></a></div>
        <a class="m_logo" href="/"><img src="<?php echo asset( "/resources/views/frontend/pc/images/logo.png") ?>"></a>
        <div class="m_search">
            <div class="m_search_i">
                <input type="text" id="txt_seach" placeholder="一拳超人" />
                <a class="m_search_se" href="javascript:;" onclick="seach()">
                    <img src="<?php echo asset( "/resources/views/frontend/pc/images/search.png") ?>">
                </a>
            </div>
        </div>
    </div>
</div>



<div class="m1100 m_content">
    <div class="ov r_tab">
        <div class="fl r_tab_l">
            <b>{{$manhua[0]['name']}}</b>
            <span>第{{$manhuaChapter[0]['chapter_name']}}话</span>
        </div>
        <div class="fr r_tab_r">
            @if($manhuaChapter[0]['next_chapter_id']==0)
                <a href="/manhuaview/{{$manhua_id}}" class="fr r_tab_down">下一章节</a>
            @else
                <a href="/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['next_chapter_id']}}" class="fr r_tab_down">下一章节</a>
            @endif

            <div class="fr t_tab_ac">
                <select id="jumpchapter" onchange="cpage(this.value)">
                    @foreach($chapterList as $list)
                        <option value="{{$list['chapter_id']}}" @if($list['chapter_id'] == $manhuaChapter[0]['chapter_id']) selected="selected" @endif>{{$list['chapter_name']}}话</option>
                    @endforeach
                </select>
            </div>
            @if($manhuaChapter[0]['pre_chapter_id']==0)
                <a href="/manhuaview/{{$manhua_id}}" class="fr r_tab_up">上一章节</a>
            @else
                <a href="/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['pre_chapter_id']}}" class="fr r_tab_up">上一章节</a>
            @endif


        </div>




    </div>
    <div class="r_img ">
        <img class="lazy" data-original="{{$attribute[1]['value']}}/public/manhua{{$manhuaPhotos[0]['photo']}}" src="/resources/views/frontend/pc/images/load.gif" alt="{{$manhua[0]['name']}} 第{{$manhuaChapter[0]['chapter_name']}}话">
        <img class="lazy" data-original="{{$attribute[1]['value']}}/public/manhua{{$manhuaPhotos[1]['photo']}}" src="/resources/views/frontend/pc/images/load.gif" alt="{{$manhua[0]['name']}} 第{{$manhuaChapter[0]['chapter_name']}}话">
    </div>
    <div class="shade">
        @if(isset($user))
        <div class="show-content">
            <div class="msg">
                很抱歉，您的还不是VIP会员，无法继续查看<br>请充值VIP或用金币购买后继续阅读，谢谢
            </div>
            <div class="button">
                <a href="/user/deposit">前往充值</a> <a href="javascript:" onclick="paychapter({{$manhuaChapter[0]['chapter_id']}});">购买本章节</a>
            </div>
        </div>
        @else
            <div class="show-content">
                <div class="msg">
                    很抱歉，您的还没有登陆，无法继续查看<br>请登陆后继续阅读
                </div>
                <div class="button">
                    <a href="/login">登陆</a> <a href="/registered">注册</a>
                </div>
            </div>
            @endif

    </div>
    <div class="ov r_page">

        <div class="fr r_tab_r" data-page="1" data-i="1">
            @if($manhuaChapter[0]['next_chapter_id']==0)
                <a href="/manhuaview/{{$manhua_id}}" class="fr r_tab_down">下一章节</a>
            @else
                <a href="/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['next_chapter_id']}}" class="fr r_tab_down">下一章节</a>
            @endif

            <div class="fr t_tab_ac">
                <select id="jumpchapter1" onchange="cpage(this.value)">
                    @foreach($chapterList as $list)
                        <option value="{{$list['chapter_id']}}" @if($list['chapter_id'] == $manhuaChapter[0]['chapter_id']) selected="selected" @endif>{{$list['chapter_name']}}话</option>
                    @endforeach
                </select>
            </div>
            @if($manhuaChapter[0]['pre_chapter_id']==0)
                <a href="/manhuaview/{{$manhua_id}}" class="fr r_tab_up">上一章节</a>
            @else
                <a href="/manhuachapter/{{$manhua_id}}/{{$manhuaChapter[0]['pre_chapter_id']}}" class="fr r_tab_up">上一章节</a>
            @endif

        </div>
    </div>
</div>

<script src="<?php echo asset( "/resources/views/frontend/js/jquery-1.10.1.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/js/swiper-3.4.2.jquery.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/js/manhua.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/js/layer/layer.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/js/jquery.lazyload.min.js") ?>"></script>

<script>
    $(function() {
        $("img.lazy").lazyload({effect: "fadeIn"});
    });

    function paychapter(chapter_id) {
        var index = layer.open({
            type: 2,
            title: "购买漫画章节",
            closeBtn: 0,
            area: ['400px', '300px'], //宽高
            shadeClose: true,
            resize:false,
            content: '/user/pay/' + chapter_id
        });
    }

    function cpage(value) {
        window.location.href = "/manhuachapter/{{$manhua_id}}/" + value;
    }
</script>
</body>


</html>

<script>
    function seach() {
        var seach = document.getElementById("txt_seach").value;
        if (seach == "") {
            seach = "一拳超人";
        }
        window.location.href = "/search/" + seach;
    }
</script>

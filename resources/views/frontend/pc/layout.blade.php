<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1,user-scalable=no">
    <title>18韩漫</title>

    <meta name="keywords" content="18韩漫">
    <meta name="description" content="18韩漫">
    <meta http-equiv="mobile-agent" content="format=xhtml; url=http://www.18hanman.com/m/" />
    <meta http-equiv="mobile-agent" content="format=html5; url=http://www.18hanman.com/m" />
    <link rel="alternate" media="only screen and (max-width: 640px)" href="http://www.18hanman.com/m" />

    <link href="<?php echo asset( "/resources/views/frontend/pc/images/favicon.ico") ?>" rel="shortcut icon" />
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/swiper-3.4.2.min.css") ?>">
    <link href="<?php echo asset( "/resources/views/frontend/pc/css/reset.css") ?>" rel="stylesheet" />
    <link href="<?php echo asset( "/resources/views/frontend/pc/css/manhua.css?ver=1.0") ?>" rel="stylesheet" />
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery-1.10.1.min.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/layer/layer.js") ?>"></script>


    <style>
    </style>

</head>
<body>
{{--<script>layer.msg('aaa');</script>--}}
<div id="header">

    <div class="m1100 header">
        <a class="m_logo" href="/"><img src="<?php echo asset( "/resources/views/frontend/pc/images/logo.png") ?>"></a>
        <div class="m_search">
            <div class="m_search_i">
                <input type="text" id="txt_seach" placeholder="性癖好" />
                <a class="m_search_se" href="javascript:;" onclick="seach();">
                    <img src="<?php echo asset( "/resources/views/frontend/pc/images/search.png") ?>">
                </a>
            </div>

        </div>

        <div class="m_register">
            <ul>
                @if(empty($user))
                <li class="reg_share">
                    <span><a href="/login">登陆</a></span>
                </li>
                <li class="reg_share">
                    <span><a href="/registered">注册</a></span>
                </li>
                <li class="reg_share">
                    <span><a href="{{$attribute[3]['value']}}" target="_blank">代理登陆</a></span>
                </li>
                @else
                    <li class="reg_share">
                        <span>用户:<a href="/user/center">{{$user}}</a>(@if($vip==1)VIP @else 普通用户 @endif )</span>
                    </li>
                    <li class="reg_share">
                        <span><a href="/user/center">用户中心</a></span>
                    </li>
                    <li class="reg_share">
                        <span><a href="/user/deposit">VIP充值</a></span>
                    </li>
                    <li class="reg_share">
                        <span><a href="/user/logout">注销</a></span>
                    </li>
                    @endif

            </ul>
        </div>
    </div>

</div>


<script>
    function seach() {
        var seach = document.getElementById("txt_seach").value;
        if (seach == "") {
            seach = "性癖好";
        }
        window.location.href = "/search/" + seach;
    }
</script>



<div class="m_navs">
    <div class="m1100 m_nav">
        <a href="/" class="active">首页</a>
        @foreach($categories as $category)
        <a href="{{$category['url']}}">{{$category['c_name']}}</a>
        @endforeach
    </div>
</div>

@yield('content')

<!--底部-->
<div class="m_foots">
    <div class="m1100 m_foot">
        <div class="m_foot_link">
            @if(isset($attribute[2]['value']))
            <a href="tencent://message/?uin={{$attribute[2]['value']}}">QQ:{{$attribute[2]['value']}}</a><br>
            @endif
            @if(isset($attribute[5]['value']))
            <a href="javascript:">微信:{{$attribute[5]['value']}}</a><br>
            @endif
        </div>
        <div class="m_foot_copy">
            CopyRight © 2016年-2019年 18hanhua.com 18韩漫 All Rights Reserved
        </div>
    </div>
</div>




</body>
</html>
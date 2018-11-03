<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>第1话</title>
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
                <a href="/caricature/chapter?cid=18">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fixed-prev.png") ?>" />
                </a>
            </div>
            <div class="fixed-top-title-text">第1话</div>
        </div>
    </div>
    <!-- 底部菜单 -->
    <div class="fixed-footer">
        <a href="javascript:location.reload();">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fiexd-refresh.png") ?>" />
            </div>
        </a>
        <a href="/caricature/chapter?cid=18">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fixed-list.png") ?>" />
            </div>
        </a>
        <a href="javascript:void(0);">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fixed-prev.png") ?>" />
            </div>
        </a>
        <a href="/caricature/item?cid=18&id=130">
            <div class="fixed-footer-item">
                <img src="<?php echo asset( "/resources/views/frontend/mobile/images/fiexd-next.png") ?>" />
            </div>
        </a>
    </div>
    <!-- 上一章 -->
    <!-- 顶部分割线 -->
    <div class="interval" style="position: fixed; width:750px;"></div>
    <!-- 内容 -->
    <div class="content-main">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/5b383162ab76cbccc95f7dd5972d90a8.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/8d02161e2ddde6e5987884405576d79d.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/d309ba42b8b218a36318de544d6b720c.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/df06daae7fec9da4858165b60b8da1cd.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/6675628a6252dcbf76c3e064e21deeba.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height: auto; display: inline;" data-original="http://img.18manhua.com/image/18/bcd7fc633894d0e29220c5ade98c50fe.jpg" class="lazy" src="http://img.18manhua.com/image/18/bcd7fc633894d0e29220c5ade98c50fe.jpg">
        <img style="height: auto; display: inline;" data-original="http://img.18manhua.com/image/18/770eec929af0bb133b922b25a0866529.jpg" class="lazy" src="http://img.18manhua.com/image/18/770eec929af0bb133b922b25a0866529.jpg">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/9c6b08c7a9e561d098128395475c6ea6.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/fafec6a6c3501c1042b07909d149c925.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/e1c75239f8c6cda90796aa4842bee1d0.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/7bf44d14f64926b9477bc6e80ddf59fd.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/323e08a8794667273928238d1f38436f.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/83b6ad72089397830f4bcdb92c5032c8.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/f1294fed407c9bc2c75b8bfb7ecf626a.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/dfb48e6b89f8d3b164eb12bec74e4475.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">
        <img style="height:1200px;" data-original="http://img.18manhua.com/image/18/1c1e6505b5c33c1e54e1831a4e65438b.jpg" class="lazy" src="http://img.18manhua.com/static/img/caricature/item/load.gif">

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
                <a href="/pay/index">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/pay.png") ?>" />
                    充值
                </a>
            </div>
        </div>
        <div class="menu-2">
            <div class="menu-2-item">
                <a href="javascript:void(0);">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/prev.png") ?>" />
                    上一页
                </a>
            </div>
            <div class="menu-2-item">
                <a href="/caricature/chapter?cid=18">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/list.png") ?>" />
                    返回目录
                </a>
            </div>
            <div class="menu-2-item">
                <a href="/caricature/item?cid=18&id=130">
                    <img src="<?php echo asset( "/resources/views/frontend/mobile/images/next.png") ?>" />
                    下一页
                </a>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>
</body>
</html>
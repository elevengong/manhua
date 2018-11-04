
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">

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
    </div>
    <!-- </div> -->
    <div style="height:15px;width:100%;background-color:#FFF;"></div>
    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=1"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=1">Roommate</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=1">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=1">校园 | 后宫 | 宅系 | 节操</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=1">更新至第56话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=1">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=18"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=18">癖好</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=18">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=18">爱情 | 生活 | 后宫 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=18">更新至第25话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=18">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=19"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=19">H-Mate</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=19">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=19">爱情 | 后宫 | 宅系 | 节操</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=19">更新至（外传）拐杖的爱情-04</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=19">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=20"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=20">30cm契约</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=20">完结</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=20">冒险 | 欢乐向 | 魔法 | 神鬼</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=20">更新至第52话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=20">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=21"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=21">偷窥</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=21">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=21">生活 | 后宫 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=21">更新至第84话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=21">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=22"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=22">高跟鞋</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=22">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=22">欢乐向 | 爱情 | 生活 | 后宫</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=22">更新至第24话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=22">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=23"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=23">朋友妻</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=23">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=23">爱情 | 生活 | 后宫 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=23">更新至第21话（完结）</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=23">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=24"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=24">愉快的旅行</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=24">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=24">爱情 | 宅系 | 节操 | 搞笑</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=24">更新至第39话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=24">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=25"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=25">无人岛</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=25">完结</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=25">冒险 | 爱情 | 生活 | 后宫</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=25">更新至第30话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=25">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=26"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=26">猎物</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=26">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=26">生活 | 后宫 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=26">更新至第24话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=26">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=27"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=27">同居</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=27">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=27">爱情 | 宅系 | 节操</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=27">更新至后记</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=27">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=28"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=28">深夜便利店</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=28">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=28">冒险 | 爱情 | 生活 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=28">更新至第41话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=28">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=29"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=29">女神网咖</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=29">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=29">爱情 | 生活 | 后宫 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=29">更新至第35话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=29">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=30"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=30">肤浅女</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=30">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=30">爱情 | 恐怖 | 悬疑 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=30">更新至第72话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=30">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=31"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=31">姐姐</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=31">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=31">生活 | 后宫 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=31">更新至后记</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=31">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=32"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=32">解禁</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=32">完结</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=32">爱情 | 后宫 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=32">更新至第32话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=32">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=33"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=33">阴湿路</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=33">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=33">冒险 | 神鬼 | 恐怖 | 后宫</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=33">更新至第13话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=33">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=34"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=34">玩火</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=34">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=34">爱情 | 生活 | 宅系</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=34">更新至第55话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=34">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=35"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=35">绝命学园</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=35">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=35">冒险 | 神鬼 | 校园 | 恐怖</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=35">更新至第2话 各自的不安</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=35">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

    <div class="caricature-item">
        <div class="caricature-item-left">
            <a href="/caricature/chapter?cid=36"><img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" /></a>
        </div>
        <div class="caricature-item-right">
            <div class="item-right-left">
                <div class="caricature-item-name"><a href="/caricature/chapter?cid=36">看见死亡的男人</a></div>
                <div class="caricature-item-status"><a href="/caricature/chapter?cid=36">连载中</a></div>
                <div class="caricature-item-label"><a href="/caricature/chapter?cid=36">爱情 | 侦探 | 魔法 | 恐怖</a></div>
                <div class="caricature-item-update-detail"><a href="/caricature/chapter?cid=36">更新至第3话</a></div>
            </div>
            <div class="item-right-right">
                <div class="read-button">
                    <a href="/caricature/chapter?cid=36">开始阅读</a>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>


</div>
<input type="hidden" name="page" value="1" />
<input type="hidden" name="totalPage" value="3" />
</body>
</html>
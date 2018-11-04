
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>癖好</title>
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
            癖好
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
    <div class="caricature-content">
        <div class="content-left">
            <div class="caricature-img">
                <a href="/caricature/item?cid=18&id=129">
                    <img src="http://www.manhua.com/resources/views/frontend/pc/images/12.jpg" />
                </a>
            </div>
        </div>
        <div class="content-right">
            <div class="content-title">
                <a href="/caricature/item?cid=18&id=129">癖好</a>
            </div>
            <div class="content-author">
                <a href="/caricature/item?cid=18&id=129">洗发精</a>
            </div>
            <div class="content-lable">
                <a href="/caricature/item?cid=18&id=129">爱情 | 生活 | 后宫 | 宅系</a>
            </div>
            <div class="content-status">
                <a href="/caricature/item?cid=18&id=129">连载中</a>
            </div>
            <div class="read-button">
                <a href="/caricature/item?cid=18&id=129">阅读漫画</a>
            </div>
        </div>
    </div>

    <div class="content-long-explain">
        作品介绍：
    </div>

    <div class="chapter-title">
        <div class="chapter-title-icon">
            <img src="http://img.18manhua.com/static/img/chapter_title_icon.png" />
        </div>
        <div class="chapter-title-text">
            章节目录
        </div>
        <div class="chapter-title-sort">
            <a href="/caricature/chapter?cid=18&orderBy=desc">
                <img src="http://img.18manhua.com/static/img/sort_down.png" />
                <span class="sort-text">倒序</span>
            </a>
        </div>
    </div>
    <a href="/caricature/item?cid=18&id=129">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/4c73ac67557c20a0f93d0f9d8f75bbb2.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第1话<span class="free">免费</span></div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>0金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=130">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/21ad6e3e2a4d21c73a30047669a216bd.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第2话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=133">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/16d9c54275ac5eab67db15c81fc729f5.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第4话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=134">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/1289bd8d34acfcceff4b9f3c64f78f5e.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第3话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=114">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/f816459e07d39dea6a201252a2429427.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第5话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=115">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/0f3c22241a3f5d93188f3d386ada8f3c.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第6话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=128">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/f191aa736f4f949fc9ed49b1cdea8323.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第7话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=121">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/0e20db8fa4448faaa05f857fb74d30f0.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第8话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=122">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/1f929f919c25fbc389147be6d37600c1.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第9话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=123">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/4acaca419c23b986061f0622b6b5a5c0.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第10话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=125">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/f750442c3a329ebbd0214fa663d78258.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第11话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=126">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/5ab702b3ee9274aca0be65ce1447e142.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第12话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=116">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/fb8141696939e6f4e411641b7096d61a.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第13话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=132">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/6f1759d99f7ce2f6479248d6bedfb2b0.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第14话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=112">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/c0a3f9181db4bf8bdf8edc9e3d9e40d6.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第15话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=113">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/231839c0f4b49ef9186684d6778ac8ab.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第16话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=117">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/9b918c1518afe10c989aa287637723d2.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第17话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=118">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/14c784fa08e90264558eaff9378cf9fc.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第18话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=119">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/a877bfaf13baa56b515c1ae3aee483bc.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第19话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>
    <a href="/caricature/item?cid=18&id=131">
        <div class="chapter-item">
            <div class="chapter-item-icon">
                <img data-original="http://img.18manhua.com/image/18/5e33fb7634db5ba9e89d54486959d7b4.jpg" class="lazy" />
            </div>
            <div class="chapter-item-detail">
                <div class="chapter-item-name">第20话</div>
                <div class="chapter-item-ctime">11-30</div>
            </div>
            <div class="chapter-item-gold">
                <img src="http://img.18manhua.com/static/img/gold.png" />
                <span>50金币</span>
            </div>
        </div>
    </a>

</div>
<input type="hidden" name="cid" value="18" />
<input type="hidden" name="page" value="1" />
<input type="hidden" name="totalPage" value="2" />
<input type="hidden" name="orderBy" value="asc" />
</body>
</html>
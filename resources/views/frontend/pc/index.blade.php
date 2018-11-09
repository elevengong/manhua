@extends("frontend.pc.layout")
@section('content')
    <script src="<?php echo asset( "/resources/views/frontend/js/imgSwitch.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/downfoot.js") ?>"></script>
 <div class="m1100 m_content">

    <div class="m_banner swiper-container swiper-container-horizontal">
        <div class="swiper-wrapper">

            <div class="swiper-slide" style="width: 1100px;">
                <a class="fl m_banner_l" href="#"><img src="<?php echo asset( "/resources/views/frontend/pc/images/3.png") ?>"></a>
                <div class="fr m_banner_r">
                    <div class="m_ban_rt">
                        <a class="m_ban_first" href="#"><img src="<?php echo asset( "/resources/views/frontend/pc/images/1.png") ?>"></a>
                        <a class="m_ban_second" href="#"><img src="<?php echo asset( "/resources/views/frontend/pc/images/2.png") ?>"></a>
                    </div>
                    <div class="m_ban_rb">
                        <a class="m_ban_first" href="#"><img src="<?php echo asset( "/resources/views/frontend/pc/images/4.png") ?>"></a>
                        <a class="m_ban_second" href="#"><img src="<?php echo asset( "/resources/views/frontend/pc/images/5.png") ?>"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="ov m_new">
         <div class="fl m_new_l">
             <div class="ov m_new_top">
                 <span class="fl m_new_img"></span>

                 <a href="/hanman/0" class="fr m_new_more">更多</a>
             </div>
             <ul class="ov m_new_ul">
                 @foreach($lastUpdateManhua as $manhua)
                 <li>
                     <a href="/manhuaview/{{$manhua['manhua_id']}}">
                         <img src="{{$attribute[1]['value'].$manhua['cover']}}">
                         <h3>{{$manhua['name']}}</h3>
                         <p>更新于：<span>{{date('Y-m-d',strtotime($manhua['last_update_time']))}}</span></p>
                     </a>
                 </li>
                 @endforeach
             </ul>
         </div>
     </div>


     <div class="ov m_hot">
         <div class="fl m_new_l">
             <div class="ov m_new_top">
                 <span class="fl m_hot_img"></span>

                 <a href="/hanman/hot" class="fr m_new_more">更多</a>
             </div>
             <ul class="ov m_new_ul">
                 @foreach($hotManhua as $manhua)
                     <li>
                         <a href="/manhuaview/{{$manhua['manhua_id']}}">
                             <img src="{{$attribute[1]['value'].$manhua['cover']}}">
                             <h3>{{$manhua['name']}}</h3>
                             <p>更新于：<span>{{date('Y-m-d',strtotime($manhua['last_update_time']))}}</span></p>
                         </a>
                     </li>
                 @endforeach
             </ul>
         </div>
     </div>



     <div class="m_end">
         <div class="ov m_new_top">
             <span class="fl m_end_img"></span>
             <a href="/hanman/1" class="fr m_new_more">更多</a>
         </div>
         <div class="ov m_day_tj">

             <div class="fl m_day_fl">

                 <div class="imgpreviewWrap">
                     <div class="snapShotWrap setbox2">
                         <a class="shotNext snap-shot-btn next" title="下一张" href="javascript:void(0);"><i></i></a>
                         <a class="shotPrev snap-shot-btn prev" title="上一张" href="javascript:void(0);"><i></i></a>
                         <ul class="snapShotCont" style="height: 190px;">
                             <li class="snopshot" style="width: 153px; opacity: 1; left: 0px; z-index: 2; margin-top: 15.8333px; height: 158.333px;">
                                 <a href="http://www.gumua.com/Manhua/27995.html"><img src="http://manhua.com/resources/views/frontend/pc/images/12.jpg"><span class="elementOverlay"></span></a>
                             </li>
                             <li class="snopshot" style="width: 153px; opacity: 1; left: 143.5px; z-index: 3; margin-top: 0px; height: 158.333px;">
                                 <a href="http://www.gumua.com/Manhua/27993.html"><img src="http://manhua.com/resources/views/frontend/pc/images/12.jpg"><span class="elementOverlays"></span></a>
                             </li>
                             <li class="snopshot" style="width: 153px; opacity: 1; left: 287px; z-index: 2; margin-top: 15.8333px; height: 158.333px;">
                                 <a href="http://www.gumua.com/Manhua/27950.html"><img src="http://manhua.com/resources/views/frontend/pc/images/12.jpg"><span class="elementOverlay"></span></a>
                             </li>
                             <li class="snopshot" style="width: 153px; opacity: 1; left: 287px; z-index: 2; margin-top: 15.8333px; height: 158.333px;">
                                 <a href="http://www.gumua.com/Manhua/27948.html"><img src="http://manhua.com/resources/views/frontend/pc/images/12.jpg"><span class="elementOverlay"></span></a>
                             </li>
                             <li class="snopshot" style="width: 153px; opacity: 0; left: -153px; z-index: 0; margin-top: 85px;">
                                 <a href="http://www.gumua.com/Manhua/27947.html"><img src="http://manhua.com/resources/views/frontend/pc/images/12.jpg"><span class="elementOverlay"></span></a>
                             </li>

                         </ul>
                     </div>
                     <div class="snopshot_vi" style="display: none;">
                         <a href="http://www.gumua.com/Manhua/27995.html" class="m_day_read">立即阅读</a>
                         <div class="m_day_cen">
                             <div class="m_day-ctit">
                                 <h2> <a href="http://www.gumua.com/Manhua/27995.html"> 小姨子的秘密 </a></h2>
                                 <p>作者：<span></span></p>
                                 <p>最新章节：<i>大结局</i></p>

                                 <p>
                                     <a href="/Manhua/7/"><u>韩国</u></a>
                                     <a href="/Manhua/10/"><u>完结</u></a>

                                 </p>
                             </div>
                             <span class="m_day_score"><i>9</i></span>
                         </div>
                         <div class="m_day_intro">
                             <span>简介：</span>
                             <p>《小姨子的秘密》是一部精彩韩漫，姐夫在出差过程中预约到了未来小姨子的特色裸体马杀鸡服务，当时二人并不知道对方的关系，姐夫在与女友见面时，向他介绍了她的妹妹,才发现那个裸体马杀鸡女就是自己的未来小姨子......</p>
                         </div>
                     </div>
                     <div class="snopshot_vi" style="display: none;">
                         <a href="http://www.gumua.com/Manhua/27993.html" class="m_day_read">立即阅读</a>
                         <div class="m_day_cen">
                             <div class="m_day-ctit">
                                 <h2> <a href="http://www.gumua.com/Manhua/27993.html"> 17种性幻想（情侣游戏） </a></h2>
                                 <p>作者：<span></span></p>
                                 <p>最新章节：<i>第55话</i></p>

                                 <p>
                                     <a href="/Manhua/7/"><u>韩国</u></a>
                                     <a href="/Manhua/9/"><u>连载</u></a>

                                 </p>
                             </div>
                             <span class="m_day_score"><i>9</i></span>
                         </div>
                         <div class="m_day_intro">
                             <span>简介：</span>
                             <p>17种性幻想情侣游戏漫画讲述长期的恋爱关系是否像白开水一样淡而无味？“幻想游戏”让我们重回初恋的激情？</p>
                         </div>
                     </div>
                     <div class="snopshot_vi" style="display: block;">
                         <a href="http://www.gumua.com/Manhua/27950.html" class="m_day_read">立即阅读</a>
                         <div class="m_day_cen">
                             <div class="m_day-ctit">
                                 <h2> <a href="http://www.gumua.com/Manhua/27950.html"> 家庭教师 </a></h2>
                                 <p>作者：<span></span></p>
                                     <a href="/Manhua/7/"><u>韩国</u></a>
                                     <a href="/Manhua/10/"><u>完结</u></a>

                                 </p>
                             </div>
                             <span class="m_day_score"><i>9</i></span>
                         </div>
                         <div class="m_day_intro">
                             <span>简介：</span>
                             <p>《家庭教师》是一部成人韩国漫画，年轻的女大学生兼职做了上门家教，却和有妇之夫发生了危险的恋情！她们的结局会是什么样？</p>
                         </div>
                     </div>
                     <div class="snopshot_vi" style="display:none">
                         <a href="http://www.gumua.com/Manhua/27948.html" class="m_day_read">立即阅读</a>
                         <div class="m_day_cen">
                             <div class="m_day-ctit">
                                 <h2> <a href="http://www.gumua.com/Manhua/27948.html"> 好友同居（H-mate） </a></h2>
                                 <p>作者：<span></span></p>
                                 <p>最新章节：<i>第78话：大结局（下）</i></p>
                             </div>
                             <span class="m_day_score"><i>9</i></span>
                         </div>
                         <div class="m_day_intro">
                             <span>简介：</span>
                             <p>韩国漫画《好友同居》是一部成人漫画，又名《爱上男闺蜜》《H-mate》，女主叫张美路，讲述十五年來的好友关系，即使喜欢也要强忍着冲动，但是这份感情卻在一夕间变了质，该用什么关系看待她呢......</p>
                         </div>
                     </div>
                     <div class="snopshot_vi" style="display:none">
                         <a href="http://www.gumua.com/Manhua/27947.html" class="m_day_read">立即阅读</a>
                         <div class="m_day_cen">
                             <div class="m_day-ctit">
                                 <h2> <a href="http://www.gumua.com/Manhua/27947.html"> 超级吸引力（sweetguy） </a></h2>
                                 <p>作者：<span></span></p>
                                 <p>最新章节：<i>大结局</i></p>
                             </div>
                             <span class="m_day_score"><i>9</i></span>
                         </div>
                         <div class="m_day_intro">
                             <span>简介：</span>
                             <p>《超级吸引力》又名《可爱的女友》和《可爱的家伙》（英文名：sweet guy ），触摸到我的女人都想和我在一起？！平常不受欢迎的家伙发生了一场事故，事故后，他的身上就有了奇妙的能力，正是由于这种的能力，让他和女人发生了意想不到的纠缠...</p>
                         </div>
                     </div>

                 </div>


             </div>
             <div class="fr m_day_fr">
                 <ul class="ov m_new_ul mine_photo">
                     @foreach($completeManhua as $manhua)
                     <li>
                         <a href="/manhuaview/{{$manhua['manhua_id']}}">
                             <img src="{{$attribute[1]['value'].$manhua['cover']}}">
                             <h3>{{$manhua['name']}}</h3>
                         </a>
                     </li>
                     @endforeach




                 </ul>
             </div>
         </div>

     </div>










 </div>

@endsection
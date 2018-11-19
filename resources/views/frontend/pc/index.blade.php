@extends("frontend.pc.layout")
@section('content')
    <script src="<?php echo asset( "/resources/views/frontend/js/imgSwitch.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/downfoot.js") ?>"></script>
 <div class="m1100 m_content">

    <div class="m_banner swiper-container swiper-container-horizontal">
        <div class="swiper-wrapper">

            <div class="swiper-slide" style="width: 1100px;">
                <a class="fl m_banner_l" href="/manhuaview/269"><img src="<?php echo asset( "/resources/views/frontend/pc/images/3.png") ?>"></a>
                <div class="fr m_banner_r">
                    <div class="m_ban_rt">
                        <a class="m_ban_first" href="/manhuaview/262"><img src="<?php echo asset( "/resources/views/frontend/pc/images/1.png") ?>"></a>
                        <a class="m_ban_second" href="/manhuaview/256"><img src="<?php echo asset( "/resources/views/frontend/pc/images/2.png") ?>"></a>
                    </div>
                    <div class="m_ban_rb">
                        <a class="m_ban_first" href="/manhuaview/38"><img src="<?php echo asset( "/resources/views/frontend/pc/images/4.png") ?>"></a>
                        <a class="m_ban_second" href="/manhuaview/53"><img src="<?php echo asset( "/resources/views/frontend/pc/images/5.png") ?>"></a>
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
                             @for($i=0;$i<5;$i++)
                             <li class="snopshot" style="">
                                 <a href="/manhuaview/{{$completeManhua[$i]['manhua_id']}}"><img src="{{$attribute[1]['value'].$completeManhua[$i]['cover']}}"><span class="elementOverlay"></span></a>
                             </li>
                             @endfor
                         </ul>
                     </div>
                     @for($i=0;$i<5;$i++)
                     <div class="snopshot_vi" style="@if($i==1)display: block;@endif">
                         <a href="/manhuaview/{{$completeManhua[$i]['manhua_id']}}" class="m_day_read">立即阅读</a>
                         <div class="m_day_cen">
                             <div class="m_day-ctit">
                                 <h2> <a href="/manhuaview/{{$completeManhua[$i]['manhua_id']}}"> {{$completeManhua[$i]['name']}} </a></h2>
                                 <p>作者：<span></span></p>
                                 <p>
                                     <a href="/manhua/1/"><u>韩国</u></a>
                                     <a href="/hanman/1/"><u>完结</u></a>

                                 </p>
                             </div>
                             <span class="m_day_score"><i>9</i></span>
                         </div>
                         <div class="m_day_intro">
                             <span>简介：</span>
                             <p>{{$completeManhua[$i]['intro']}}</p>
                         </div>
                     </div>
                     @endfor
                 </div>


             </div>
             <div class="fr m_day_fr">
                 <ul class="ov m_new_ul mine_photo complete_height">
                     @for($i=5;$i<13;$i++)
                     <li>
                         <a href="/manhuaview/{{$completeManhua[$i]['manhua_id']}}">
                             <img src="{{$attribute[1]['value'].$completeManhua[$i]['cover']}}">
                             <h3>{{$completeManhua[$i]['name']}}</h3>
                         </a>
                     </li>
                     @endfor




                 </ul>
             </div>
         </div>

     </div>










 </div>

@endsection
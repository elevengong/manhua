@extends("frontend.pc.layout")
@section('content')


    <div class="d_bgs">
        <div class="m1100 d_bgi">
            <a class="fl d_bgi_href" href="javascript:;"><img src="{{$attribute[1]['value'].$manhua[0]['cover']}}"></a>
            <div class="d_bg">
                <div class="d_bg_t">
                    <a href="#">{{$manhua[0]['name']}}</a>
                    <a href="#"><span>{{$manhua[0]['c_name']}}</span></a>
                    <a href="#"><span>@if($manhua[0]['finish'] == 1)完结 @else 连载中 @endif</span></a>

                </div>

                <div class="d_bg_name">
                    <i>作者：{{$manhua[0]['author']}}</i>
                </div>
                <div class="d_bg_ce" title="{{$manhua[0]['intro']}}">
                    <i>简介：</i> {{$manhua[0]['intro']}}
                </div>
                <div class="d_bg_zt">
                    <span>状态：<i>@if($manhua[0]['finish'] == 1)完结 @else 连载中 @endif</i></span>
                    <span>人气：<i>{{$manhua[0]['views']}}</i></span>
                </div>
                <div class="d_bg_b">
                    <a href="/manhuachapter/{{$chapterList[0]['manhua_id']}}/{{$chapterList[0]['chapter_id']}}" class="d_bg_read">开始阅读</a>
                </div>
                <span class="m_day_score"><i>9</i></span>
            </div>
    </div>
        <div class="chapterlist">
            <div class="showtitle" style="border-bottom: 1px solid rgb(218, 204, 204)">漫画章节</div>
            @foreach($chapterList as $chapter)
            <div class="chapterlist">
                <div class="chaptercss">

                    <a href="/manhuachapter/{{$chapter['manhua_id']}}/{{$chapter['chapter_id']}}" target="_blank">
                        @if(!empty($chapter['chapter_cover']))
                        <img src="{{$attribute[1]['value'].$chapter['chapter_cover']}}">
                        @else
                        <img src="<?php echo asset( "/resources/views/frontend/pc/images/nopicture.jpg") ?>">
                        @endif
                    </a>

                    <div class="chaptername">

                        <div class="chapternameview">第{{$chapter['chapter_name']}}话</div>
                    </div>
                    <div class="chapterupdatetime">
                        {{date('Y-m-d',strtotime($chapter['created_at']))}}
                    </div>
                    <div class="chapterview">
                        <a href="/manhuachapter/{{$chapter['manhua_id']}}/{{$chapter['chapter_id']}}" target="_blank">
                        @if($chapter['coin'] ==0)
                        <span class="chapterpay">&nbsp;免费&nbsp;</span>@else <span class="chapterpay" style="background-color:red !important;">&nbsp;{{$chapter['coin']}}金币&nbsp;</span>
                        @endif
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="margin-bottom: 50px;"></div>





@endsection
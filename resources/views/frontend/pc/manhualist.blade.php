@extends("frontend.pc.layout")
@section('content')

    <div class="m1100 l_content">
        <div class="l_tab">
            <span class="fl l_tab_t">排序</span>
            <ul class="l_tab_ul">
                <li>
                    <a class="l_tab " href="/Manhua/0_zh/1/">综合排序</a>
                </li>
                <li>
                    <a class="l_tab active" href="/Manhua/0_hot/1/">热门韩漫</a>
                </li>
                <li>
                    <a class="l_tab " href="/Manhua/0_new/1/">新作上架</a>
                </li>
                <li>
                    <a class="l_tab " href="/Manhua/0_upd/1/">更新时间</a>
                </li>
            </ul>
        </div>
        <ul class="ov m_new_ul">
            @foreach($manhuaList as $manhua)
            <li>
                <a href="/manhuaview/{{$manhua['manhua_id']}}">
                    <img src="{{$attribute[1]['value'].$manhua['cover']}}">
                    <h3>{{$manhua['name']}}</h3>
                    <p>更新于：<span>{{date('Y-m-d',strtotime($manhua['last_update_time']))}}</span></p>
                </a>
            </li>
            @endforeach
        </ul>

        <div class="pager">
            {{$manhuaList->links()}}
        </div>


    </div>

@endsection
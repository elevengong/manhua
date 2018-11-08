@extends("frontend.pc.layout")
@section('content')

    <div class="m1100 l_content">

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
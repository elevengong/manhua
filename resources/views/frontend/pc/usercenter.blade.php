@extends("frontend.pc.layout")
@section('content')
    <script src="<?php echo asset( "/resources/views/frontend/js/imgSwitch.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/downfoot.js") ?>"></script>
    <div class="m1100 m_content">

        <div id="ct" class="ct2_a wp cl">
            <div class="mn">
                <ul class="creditl mtm bbda cl"><li class="xi1 cl"><em> 用户名:</em>{{$user}}  &nbsp; </li>
                    <li><em> 会员等级:</em>@if($vip==1)VIP @else 普通用户 @endif  </li>
                    @if($vip==1)
                    <li><em> 到期时间:</em>{{$userInfo['vip_end_time']}}</li>
                    @endif
                    <li><em> 金币:</em>{{$userInfo['coin']}}</li>
                    <li><em> 登陆IP:</em>{{$userInfo['login_ip']}}</li>
                </ul>
            </div>
            <div class="appl"><div class="tbn">
                    <h2 class="mt bbda">用户中心</h2>
                    <ul>
                        <li class="a"><a href="#">个人资料</a></li>
                        <li><a href="/user/deposit">充值</a></li>
                        {{--<li><a href="#">充值记录</a></li>--}}
                        {{--<li><a href="#">购买记录</a></li>--}}
                        <li><a href="{{$attribute[3]['value']}}/register" target="_blank">成为代理</a></li>
                    </ul>
                </div></div>
        </div>


    </div>

@endsection
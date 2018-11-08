@extends("frontend.pc.layout")
@section('content')
    <div class="m1100 m_content">

        <div class="mn" id="main_message">
            <div class="bm">
                <div class="bm_h bbs">
                    <span class="y"><a href="/login" class="xi2">已经有帐号？登陆</a></span>
                    <h3 class="xs2">注册</h3>
                </div>
                <div>

                    <div id="main_messaqge_L4IM3">
                        <div class="loginform">
                            <div class="loginHint_wrapper">
                                <h1><a href="/login" style="color: red;">登陆</a>｜注册</h1>
                                <p class="bold">网站名和介绍</p>
                                <p class="normal">注册会员帐号，体现更多乐趣。</p>
                            </div>
                            <form class="form form-horizontal" action="#" method="post">
                                {{csrf_field()}}
                                <input id="recommend" name="recommend" type="hidden" value="{{$daili_id}}" class="input-text size-L">
                                <div class="input_field">
                                    <span class="input_fieldTitle">用户帐号</span>
                                    <input type="text" name="name" id="name" placeholder="请输入你的用户帐号" tabindex="1">
                                </div>
                                <div class="input_field">
                                    <span class="input_fieldTitle">密码</span>
                                    <input type="password" name="pwd" id="pwd" autocomplete="off" placeholder="请输入7-12字符" tabindex="2">
                                </div>
                                <div class="input_field">
                                    <span class="input_fieldTitle">重复密码</span>
                                    <input type="password" name="repwd" id="repwd" autocomplete="off" placeholder="请输入7-12字符" tabindex="2">
                                </div>
                                <div class="row cl">
                                    <div class="formControls col-xs-8 col-xs-offset-3">
                                        <input id="btn_registered" name="btn_login" type="button" class="btn btn-success radius size-L" value="&nbsp;注&nbsp;&nbsp;&nbsp;&nbsp;册&nbsp;">
                                        <input id="btn_clear" name="btn_clear" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo asset( "/resources/views/frontend/js/baseCheck.js") ?>"></script>
        <script src="<?php echo asset( "/resources/views/frontend/js/login.js") ?>"></script>
        <script>
        </script>

    </div>
@endsection
@extends("frontend.pc.layout")
@section('content')
    <div class="m1100 m_content">

        <div class="mn" id="main_message">
            <div class="bm">
                <div class="bm_h bbs">
                    <span class="y"><a href="/registered" class="xi2">没有帐号？注册</a></span>
                    <h3 class="xs2">登陆</h3>
                </div>
                <div>

                    <div id="main_messaqge_L4IM3">
                        <div class="loginform">
                            <div class="loginHint_wrapper">
                                <h1>登陆｜<a href="/registered" style="color: red;">注册</a></h1>
                                <p class="bold">网站名和介绍</p>
                                <p class="normal">登陆会员帐号，体现更多乐趣。</p>
                            </div>
                            <form class="form form-horizontal" action="#" method="post">
                                {{csrf_field()}}
                                <div class="input_field">
                                    <span class="input_fieldTitle">用户帐号</span>
                                    <input type="text" name="name" id="name" placeholder="请输入你的用户帐号" tabindex="1">
                                </div>
                                <div class="input_field">
                                    <span class="input_fieldTitle">密码</span>
                                    <input type="password" name="pwd" id="pwd" autocomplete="off" placeholder="请输入7-12字符" tabindex="2">
                                </div>
                                <div class="row cl">
                                    <div class="formControls col-xs-8 col-xs-offset-3">
                                        <input id="btn_login" name="btn_login" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
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
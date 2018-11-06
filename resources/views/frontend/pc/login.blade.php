@extends("frontend.pc.layout")
@section('content')
    <div class="m1100 m_content">

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


        <div class="m_banner swiper-container swiper-container-horizontal">
            <div class="swiper-wrapper">

                <div class="swiper-slide" style="width: 1100px;">
                    <a class="fl m_banner_l" href="#"><img src="<?php //echo asset( "/resources/views/frontend/pc/images/3.png") ?>"></a>
                    <div class="fr m_banner_r">
                        <div class="m_ban_rt">
                            <a class="m_ban_first" href="#"><img src="<?php //echo asset( "/resources/views/frontend/pc/images/1.png") ?>"></a>
                            <a class="m_ban_second" href="#"><img src="<?php //echo asset( "/resources/views/frontend/pc/images/2.png") ?>"></a>
                        </div>
                        <div class="m_ban_rb">
                            <a class="m_ban_first" href="#"><img src="<?php //echo asset( "/resources/views/frontend/pc/images/4.png") ?>"></a>
                            <a class="m_ban_second" href="#"><img src="<?php //echo asset( "/resources/views/frontend/pc/images/5.png") ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="<?php echo asset( "/resources/views/frontend/js/baseCheck.js") ?>"></script>
        <script>
            $(function(){
                $("#btn_login").click( function(){
                    var name = $("#name").val();
                    var pwd = $("#pwd").val();

                    if( !isUname_(name) || !( name.length >= 5 && name.length <= 20 ) ){
                        layer.msg("请输入字母、数字、下划线组成的5-20位的用户名");
                        $('#name').focus();
                        return false;
                    }

                    if( !isUname(pwd) || !( pwd.length >= 7 && pwd.length <= 20 ) ){
                        layer.msg("请输入字母、数字组成的7-20位的密码");
                        $('#pwd').focus();
                        return false;
                    }

                    var datas = { name: name, pwd: pwd};

                    $.ajax({
                        type:"post",
                        url:"/user/login",
                        dataType:'json',
                        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                        data:datas,
                        success:function(data){
                            if(data.status == 0)
                            {
                                layer.msg( data.msg );
                                return false;

                            }else{
                                layer.msg( data.msg ,function () {
                                    window.location.href = "/";
                                });
                            }

                            return false;
                        },
                        error:function (data) {
                            return false;

                        }

                    });

                } );
            });

        </script>
    </div>
@endsection
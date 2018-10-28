@extends("frontend.pc.layout")
@section('content')
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

        <div class="loginform">
            <form class="form form-horizontal" action="#" method="post">
                {{csrf_field()}}
                <input id="recommend" name="recommend" type="hidden" value="{{$daili_id}}" class="input-text size-L">
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="name" name="name" type="text" placeholder="账户" class="input-text size-L">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="pwd" name="pwd" type="password" placeholder="密码" class="input-text size-L">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="repwd" name="repwd" type="password" placeholder="重复密码" class="input-text size-L">
                    </div>
                </div>
                <div class="row cl">
                    <div class="formControls col-xs-8 col-xs-offset-3">
                        <input id="btn_registered" name="btn_login" type="button" class="btn btn-success radius size-L" value="&nbsp;注&nbsp;&nbsp;&nbsp;&nbsp;册&nbsp;">
                    </div>
                </div>
            </form>

        </div>

        <script src="<?php echo asset( "/resources/views/frontend/js/baseCheck.js") ?>"></script>
        <script>
            $(function(){
                $("#btn_registered").click( function(){
                    var name = $("#name").val();
                    var pwd = $("#pwd").val();
                    var repwd = $("#repwd").val();
                    var recommend = $("#recommend").val();

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

                    if( repwd != pwd ){
                        layer.msg("两个密码不相同");
                        $('#repwd').focus();
                        return false;
                    }
                    var datas = { name: name, pwd: pwd, repwd: repwd, recommend:recommend};

                    $.ajax({
                        type:"post",
                        url:"/user/registered",
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
                                    window.location.href = "/login.html";
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
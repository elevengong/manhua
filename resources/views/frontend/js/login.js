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
                        window.location.href = "/login";
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
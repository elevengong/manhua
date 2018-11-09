<!DOCTYPE html>
<html>
<head>
    <script src="<?php echo asset( "/resources/views/frontend/js/jquery-1.10.1.min.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/frontend/js/layer/layer.js") ?>"></script>
</head>
<style>
    .button {
        text-align: center;
        padding-top: 3px;
        padding-bottom: 20px;
    }
    .button a{
        font-size: 19px;
        /* width: 300px; */
        height: 28px;
        line-height: 88px;
        text-align: center;
        background-color: #fe7f1f;
        color: #fff;
        display: inline;
        border-radius: 5px;
        box-shadow: 0px 8px 10px #FFC49A;
        text-decoration: none;
        padding-left: 10px;
        padding-right: 10px;
    }

</style>
<body class="r_body">
{{csrf_field()}}
会员:{{$user[0]['user_name']}}<br>
当前可用金币数:{{$user[0]['coin']}}<br>
当前漫画章节需要的金币数:{{$chapter[0]['coin']}}金币<br>
购买后金币数余额:{{$user[0]['coin']-10}}<br>
@if($user[0]['coin']-10 < 0)金币余额不足，请及时充值或者成为VIP<br> @endif
成为VIP后，用户不用再用金币购买章节<br>

<div class="button">
    @if($user[0]['coin']-10 < 0)
    <a href="javascript:" onclick="jump();">充值</a> <a href="javascript:" onclick="jump();">成为VIP</a>
    @else
    <a href="javascript:" onclick="comfrimbuy({{$chapter[0]['chapter_id']}});">购买</a> <a href="javascript:" onclick="jump();">成为VIP</a>
    @endif
</div>

<script>
    function jump(){
        parent.location.href = '/user/deposit';
    }
    function comfrimbuy(chapter_id) {
        $.ajax({
            type:"post",
            url:"/user/paycoin/" + chapter_id,
            dataType:'json',
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
            data:$("#form1").serialize(),
            success:function(data){
                if(data.status == 0)
                {
                    layer.msg( data.msg );
                }else{
                    layer.msg( data.msg ,function () {
                        window.parent.location.reload();
                        window.location.close();
                    });
                }
            },
            error:function (data) {
                layer.msg(data.msg);
            }
        });
    }
</script>
</body>


</html>
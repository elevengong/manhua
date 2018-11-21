@extends("frontend.pc.layout")
@section('content')
    <div class="m1100 m_content">
        <div class="mn" id="main_message">
            <div class="bm">
                <div class="bm_h bbs">
                    <h3 class="xs2">充值中心</h3>
                </div>
                <div>
                    <div id="main_messaqge_L4IM3">
                        <div class="loginform">
                            <div class="goods-main">
                                <div class="goods-item" data-id="1">
                                    <div class="goods-item-left">
                                        <div class="goods-item-money">6.9元</div>
                                        <div class="goods-item-name">VIP日卡</div>
                                        <div class="goods-item-explain">1天免费看</div>
                                    </div>

                                    <div class="goods-item-right">
                                        <img src="<?php echo asset( "/resources/views/frontend/pc/images/1day.png") ?>">
                                    </div>
                                </div>
                                <div class="goods-item" data-id="2">
                                    <div class="goods-item-left">
                                        <div class="goods-item-money">29.9元</div>
                                        <div class="goods-item-name">VIP月卡</div>
                                        <div class="goods-item-explain">30天免费看</div>
                                    </div>

                                    <div class="goods-item-right">
                                        <img src="<?php echo asset( "/resources/views/frontend/pc/images/30.png") ?>">
                                    </div>
                                </div>
                                <div class="goods-item" data-id="3">
                                    <div class="goods-item-left">
                                        <div class="goods-item-money">69.9元</div>
                                        <div class="goods-item-name">VIP季卡</div>
                                        <div class="goods-item-explain">90天免费看</div>
                                    </div>

                                    <div class="goods-item-right">
                                        <img src="<?php echo asset( "/resources/views/frontend/pc/images/90.png") ?>">
                                    </div>
                                </div>
                                <div class="goods-item" data-id="4">
                                    <div class="goods-item-left">
                                        <div class="goods-item-money">199.9元</div>
                                        <div class="goods-item-name">VIP年卡</div>
                                        <div class="goods-item-explain">365天免费看</div>
                                    </div>

                                    <div class="goods-item-right">
                                        <img src="<?php echo asset( "/resources/views/frontend/pc/images/1year.png") ?>">
                                    </div>
                                </div>
                                <div class="goods-item pitch" data-id="5">
                                    <div class="goods-item-left">
                                        <div class="goods-item-money">0.01元</div>
                                        <div class="goods-item-name">1金币</div>
                                        <div class="goods-item-explain">1元=100金币</div>
                                    </div>

                                    <div class="goods-item-right">
                                        <img src="<?php echo asset( "/resources/views/frontend/pc/images/49.png") ?>">
                                    </div>
                                </div>

                                <div style="clear:both;"></div>

                                <div class="paymentpaytype">选择支付方式</div>

                                <div class="payselect">
                                    <div class="alipay pitch" data-key="pay" data-pay="alipay"><img src="<?php echo asset( "/resources/views/frontend/pc/images/ali_01.png") ?>"></div>
                                    <div class="wxpay" data-key="pay" data-pay="wxpay"><img src="<?php echo asset( "/resources/views/frontend/pc/images/wx_01.png") ?>"></div>

                                </div>
                                <form action="/user/payment" method="post" name="payform">
                                    {{csrf_field()}}
                                <input type="hidden" name="id" value="2">
                                <input type="hidden" name="pay_type" value="alipay">
                                </form>
                                <div style="clear:both;"></div>
                            </div>

                            <div class="depositbutton">
                                <a href="javascript:void(0);" onclick="onPay();">充值</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo asset( "/resources/views/frontend/js/payment.js") ?>"></script>
        <script>
            $(document).ready(function(){
                $(".goods-main .goods-item").click(function(){
                    $(".goods-main .goods-item").removeClass("pitch");
                    $(this).addClass("pitch");
                    $("input[name='id']").val($(this).attr("data-id"));
                });

                var default_id = $("input[name='id']").val();
                $(".goods-main .goods-item[data-id='"+default_id+"']").click();//默认选中

                $(".goods-main div[data-key='pay']").click(function(){
                    $(".goods-main div[data-key='pay']").removeClass("pitch");
                    $(this).addClass("pitch");
                    $("input[name='pay_type']").val($(this).attr("data-pay"));
                });
                var default_pay = $("input[name='pay_type']").val();
                $(".goods-main div[data-key='pay'][data-pay='"+default_pay+"']").click();//默认选中
            })

            function onPay() {
                document.payform.submit();
            }
        </script>
    </div>
@endsection
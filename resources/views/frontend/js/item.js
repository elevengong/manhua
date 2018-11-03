$(document).ready(function(){
	$(".content-main img").click(function(){
		img_click();
	});
	
	var menu_status = 'true';	//不显示
	function img_click(){
		if(menu_status == 'false'){
			$(".fixed-top-title,.fixed-footer").show();
			menu_status = 'true';
		}else if(menu_status == 'true'){
			$(".fixed-top-title,.fixed-footer").hide();
			menu_status = 'false';
		}
	}
	
	img_click();
	
	/*懒加载异常捕获*/

    try {
        $(".lazy").lazyload({
        	placeholder: site_url_static+'img/caricature/item/load.gif',
            failure_limit: 10,
            load:function(){
            	$(this).css({'height':'auto'})
            }
        });
    } catch (e) {

    }
})

$(function () {
    $(window).scroll(function () {
        var documentTop = $(document).scrollTop();
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();
        if ($(document).scrollTop() <= 0) {//滑动到顶部
			if($(".go-prev").is(":hidden")){
				$(".go-prev").show();
			}
        }else if($(document).scrollTop() > 98){
        	if(!$(".go-prev").is(":hidden")){
        		$(".go-prev").hide();
            }
        }

    });
});
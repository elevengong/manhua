//分页
function mod_page(){
	var _this = this;
	this.page = 1;
	this.totalPage = 0;
	
	this.init = function(page, totalPage){
		_this.page = page;
		_this.totalPage = totalPage;
	}
	
	//下一页
	this.next = function(){
		var result = 0;
		if(Number(_this.page)+1 <= Number(_this.totalPage)){
			_this.page = Number(_this.page) + 1;
			result = _this.page;
		}else{
			_this.page = _this.totalPage;
		}
		return result;
	}
	
	//上一页
	this.prev = function(){
		var result = 0;
		if(Number(_this.page-1) > 0){
			_this.page -= 1;
			result = _this.page;
		}else{
			_this.page = 1;
		}
		return result;
	}
}

//弹窗
function mod_alert(msg, callback, css){
	if(css != undefined && css != '') {
		css = "style='"+css+"'";
	}else{
		css = '';
	}
	var time = new Date().getTime();
	var html = "<div class='system-msg' time='"+time+"' "+css+"><div class='msg'>"+msg+"</div></div>";
	$("div.main").append(html);
	$('.system-msg[time="'+time+'"]').fadeOut(3000,function(){
		$('.system-msg[time="'+time+'"]').remove();
		if(typeof callback == 'function'){
			callback();
		}
	});
}

//底部触发更新
function mod_LoadMore(){
	var _this = this;
	
	//获取滚动条当前的位置 
	this.getScrollTop = function (){
		var scrollTop = 0;
	    if(document.documentElement && document.documentElement.scrollTop) {
	        scrollTop = document.documentElement.scrollTop;
	    } else if(document.body) {
	        scrollTop = document.body.scrollTop;
	    }
		return scrollTop;
	}
	//获取当前可视范围的高度
	this.getClientHeight = function() {
		var clientHeight = 0;
	    if(document.body.clientHeight && document.documentElement.clientHeight) {
	        clientHeight = Math.min(document.body.clientHeight, document.documentElement.clientHeight);
	    } else {
	        clientHeight = Math.max(document.body.clientHeight, document.documentElement.clientHeight);
	    }
	    return clientHeight;
	}
	//获取文档完整的高度 
	this.getScrollHeight = function() {
		return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
	}
	
	//上拉到底加载更多
	this.upLoadMore = function (upLoadMoreFunction){
		//滚动事件触发
		window.onscroll = function() {
		    if(_this.getScrollTop() + _this.getClientHeight() > _this.getScrollHeight()-5) {
	    		var ulmf = eval(upLoadMoreFunction);
		    	ulmf();	//到底部了执行传进来的方法
		    }
		}
	}
}

function mod_Lock(){
	var _this = this;
	this.open = false;
	this.getLock = function (){
		return _this.open;
	}
	//上锁
	this.addLock = function (){
		_this.open = true;
	}
	//清除锁
	this.clearLock = function (){
		_this.open = false;
	}
}

// $.ajaxSetup({
//     beforeSend: function () {
//     	$("div.main").append("<div id='ajax-loading' style='text-align:center;'><img src='"+site_url_static+"img/loading.gif' /></div>");
//     },
//     complete: function () {
//          //ajax请求完成，不管成功失败
//     	$("div.main").find("div#ajax-loading").remove();
//     },
//     error: function () {
//         //ajax请求失败
//     }
// })
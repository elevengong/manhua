$(document).ready(function(){
	/*懒加载异常捕获*/

    try {
        $(".lazy").lazyload({
            failure_limit: 10,
        });
    } catch (e) {

    }
	
	var m_page = new mod_page();
	var m_LoadMore = new mod_LoadMore();
	var m_Lock = new mod_Lock();
	m_LoadMore.upLoadMore(function(){
		if(!m_Lock.getLock()){
			m_Lock.addLock();	//上锁防止频繁请求
			getNextData();
		}
		
	});
	
	function getNextData(){
		var cid = $("input[name='cid']").val();
		var page = $("input[name='page']").val();
		var totalPage = $("input[name='totalPage']").val();
		var orderBy = $("input[name='orderBy']").val();
		m_page.init(page, totalPage);
		var tmp_page = m_page.next();
		if(tmp_page == 0){	//没有更多了
			if($("div[mark='bottom']").length == 0){
				$("div.main").append("<div mark='bottom' style='text-align:center;'>没有更多内容</div>");
			}
		}else{
			$("input[name='page']").val(tmp_page);
			$.ajax({
				url: '/caricature/chapter_data',
				dataType: 'json',
				type: 'POST',
				data:{'cid':cid, 'page':tmp_page, 'totalPage':totalPage, 'orderBy':orderBy},
				success: function (data){
					if(data.rs == 1){
						var html = createListHtml(data.list);
						$("div.main").append(html);
						try {
					        $(".lazy").lazyload({
					            failure_limit: 10,
					        });
					    } catch (e) {

					    }
					}else{
						
					}
					m_Lock.clearLock();	//释放锁
				},
				error:function(){
					m_Lock.clearLock();	//释放锁
				}
			});
		}
	}
	
	function createListHtml(list){
		var html = '';
		$.each(list, function (index, item){
			html += '<a href="/caricature/item?cid='+item.cid+'id='+item.id+'">';
			html += '	<div class="chapter-item">';
			html += '		<div class="chapter-item-icon">';
			/*html += '			<img src="'+item.img+'" />';*/
			html += '			<img data-original="'+item.img+'" class="lazy" />';
			html += '		</div>';
			html += '		<div class="chapter-item-detail">';
			html += '			<div class="chapter-item-name">' + item.name + (item.gold == 0 ? '<span class="free">免费</span>' : '')+'</div>';
			html += '			<div class="chapter-item-ctime">'+item.date+'</div>';
			html += '		</div>';
			html += '		<div class="chapter-item-gold">';
			html += '			<img src="'+site_url_static+'img/gold.png" />';
			html += '			<span>'+item.gold+'金币</span>';
			html += '		</div>';
			html += '	</div>';
			html += '</a>';
		});
		return html;
	}
})


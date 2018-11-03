$(document).ready(function(){
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
		var page = $("input[name='page']").val();
		var totalPage = $("input[name='totalPage']").val();
		m_page.init(page, totalPage);
		var tmp_page = m_page.next();
		if(tmp_page == 0){	//没有更多了
			if($("div[mark='bottom']").length == 0){
				$("div.main").append("<div mark='bottom' style='text-align:center;'>没有更多内容</div>");
			}
		}else{
			$("input[name='page']").val(tmp_page);
			$.ajax({
				url: '/caricature/ranking_data',
				dataType: 'json',
				type: 'POST',
				data:{'page':tmp_page},
				success: function (data){
					if(data.rs == 1){
						var html = createListHtml(data.list);
						$("div.main").append(html);
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
			var go_url = '/caricature/chapter?cid='+item.id;
			html += '<div class="caricature-item">';
			html +=	'	<div class="caricature-item-left">';
			html += '		<a href="'+go_url+'"><img src="'+(item.img ? item.img : '')+'" /></a>';
			html += '	</div>';
			html += '	<div class="caricature-item-right">';
			html += '		<div class="item-right-left">';
			html += '			<div class="caricature-item-name"><a href="'+go_url+'">'+(item.name ? item.name : '')+'</a></div>';
			html += '			<div class="caricature-item-status"><a href="'+go_url+'">'+(item.status_text ? item.status_text : '')+'</a></div>';
			html += '			<div class="caricature-item-label"><a href="'+go_url+'">'+(item.label_text ? item.label_text : '')+'</a></div>';
			html += '			<div class="caricature-item-update-detail"><a href="'+go_url+'">更新至'+(item.chapter_name ? item.chapter_name : '')+'</a></div>';
			html += '		</div>';
			html += '		<div class="item-right-right">';
			html += '			<div class="read-button">';
			html += '				<a href="'+go_url+'">阅读漫画</a>';
			html += '			</div>';
			html += '		</div>';
			html += '	</div>';
			html += '	<div style="clear:both;"></div>';
			html += '</div>';
		});
		return html;
	}
})


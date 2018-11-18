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
        var type = $("input[name='type']").val();
		m_page.init(page, totalPage);
		var tmp_page = m_page.next();
		if(tmp_page == 0){	//没有更多了
			if($("div[mark='bottom']").length == 0){
				$("div.main").append("<div mark='bottom' style='text-align:center;clear: both;height: 44px;font-size: 26px;'>没有更多内容</div>");
			}
		}else{
			$("input[name='page']").val(tmp_page);
            $.ajax({
                type:"post",
                url:"/m/hanman/next?page="+tmp_page,
                dataType:'json',
                headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                data:{'type':type},
                success:function(data){
                    if(data.status == 1)
                    {
                        var html = createListHtml(data.list,data.url);
                        $("div.main").append(html);
                    }else{

                    }
                    m_Lock.clearLock();	//释放锁
                },
                error:function (data) {
                    m_Lock.clearLock();	//释放锁
                }
            });
		}
	}
	
	function createListHtml(list,url){
		var html = '';
		$.each(list, function (index, item){
			var go_url = '/m/manhuaview/'+item.manhua_id+'/asc';
			html += '<div class="caricature-item">';
			html +=	'	<div class="caricature-item-left">';
			html += '		<a href="'+go_url+'"><img src="'+url+item.cover+'" /></a>';
			html += '	</div>';
			html += '	<div class="caricature-item-right">';
			html += '		<div class="item-right-left">';
			html += '			<div class="caricature-item-name"><a href="'+go_url+'">'+(item.name ? item.name : '')+'</a></div>';
			html += '			<div class="caricature-item-status"><a href="'+go_url+'">'+(item.finish ? '完结' : '连载')+'</a></div>';
			html += '			<div class="caricature-item-label"><a href="'+go_url+'">'+'韩漫'+'</a></div>';
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


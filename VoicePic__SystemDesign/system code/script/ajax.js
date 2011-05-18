//单个文章调用
function comment(page,aid) {
	$.post("../../include/ajaxcomment.php", {"show":"content","comtypeid":aid,"page":page}, function(html) {
		$("#ajaxContent").html(html);
	});
}
//提交评论
function postdata(aid){
	$("#postTemp").html('<div class="pop"><div class="ajaxLoading">正在发表，请稍等。。。</div></div>');
	$.post("../../include/ajaxcomment.php", {"save":"comment","codeNum":$("#codeNum").val(),"comtypeid":aid,"comname":$("#comname").val(),"comcontent":$("#comcontent").val()}, function(msg) {
		$("#postTemp").html(msg);
		if (msg == '<div class="pop">发表成功！</div>' || msg == '<div class="pop">发表成功！请等待审核！</div>') {
			$("#codeNum").val('');
			$("#comname").val('');
			$("#comcontent").val('');
			$("img.code").attr("src",function(){this.src+='?'+Math.random();});
			comment(1,aid);
		}
		$(".pop").fadeOut(3000);
	});
}
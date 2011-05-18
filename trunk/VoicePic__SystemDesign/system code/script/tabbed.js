function changeTab(oA){
	var oAName = oA.getAttribute("name");
	var oAs = document.getElementsByName(oAName);
	for(var i=0; i < oAs.length; i++){
		if(oAs[i].className=="selected" && oAs[i] != oA){
			oAs[i].className="";
			var oDiv = document.getElementById(oAs[i].getAttribute("target"));
			oDiv.style.display="none";
		}	
	}
	oA.className="selected";
	document.getElementById(oA.getAttribute("target")).style.display="";
	return false;
}

//搜索
function hSearch(form){
	if(form.keyWord.value.length < 2 || form.keyWord.value == "搜索：请输入2个以上字符"){
		form.keyWord.value = "搜索：请输入2个以上字符";
		form.keyWord.focus();
		return false;
	}
	return true;
}
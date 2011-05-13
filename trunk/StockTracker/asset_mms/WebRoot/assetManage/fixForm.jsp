<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>报修资产</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<style>
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
textarea{BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 50px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(../skins/images/button_bg.gif)}
</style>
<script src="/asset_mms/skins/inc/rili.js" type="text/javascript"></script>
<script type="text/javascript">
  function document.onclick() //任意点击时关闭该控件 //ie6的情况可以由下面的切换焦点处理代替
{ 
with(window.event)
{ if (srcElement.getAttribute("Author")==null && srcElement != outObject && srcElement != outButton)
closeLayer();
}
}

function document.onkeyup() //按Esc键关闭，切换焦点关闭
{
if (window.event.keyCode==27){
if(outObject)outObject.blur();
closeLayer();
}
else if(document.activeElement)
if(document.activeElement.getAttribute("Author")==null && document.activeElement != outObject && document.activeElement != outButton)
{
closeLayer();
}
}
function check()
{ 
	var refixPrice=document.form1.refixPrice.value;
	var fixCheckFactory=document.form1.fixCheckFactory.value;
	var fixReason=document.form1.fixReason.value;
	if(refixPrice==""|| fixCheckFactory==""|| fixReason=="")
	{
		alert("请将信息填写完整！");
	}
	
}
  </script>
</head>

<body>
<form name="form1" method="post" action="/asset_mms/action/fix.do?method=fixapply&m=${edit.assetId }">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">报修资产</td>
		</tr>
		<tr>
			<td rowspan="12" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">资产编号：</td>
			<td height=25 width="25%">${edit.assetNumber }</td>
			<td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">资产名称：</td>
		  <td height=25>${edit.assetName }</td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">报修时间：</td>
			<td height=25><input type="text" name="refixReportTime" onclick="setday(this)"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">预计修完时间：</td>
			<td height=25><input type="text" name="refixTimePre" onclick="setday(this)"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">修理价格：</td>
			<td height=25><input type="text" name="refixPrice"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">修配厂商：</td>
			<td height=25><input type="text" name="fixCheckFactory"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>		
		<tr>
			<td height=25 valign="top" align="right">故障原因：</td>
			<td height=25><textarea name="fixReason"></textarea></td>
		    <td width="25%" align="center"><input type="hidden" name="assetId"  value="${edit.assetId }" /></td>
		</tr>
		<tr>
			<td height=25 colspan="2" align="center"><input type="submit" value="申请报修" onclick="javascript:return check()" class="button"/></td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
</form>
<br/>
</body>
</html>

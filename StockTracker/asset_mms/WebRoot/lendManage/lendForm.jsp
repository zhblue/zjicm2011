<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����ʲ�</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<style>
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(../skins/images/button_bg.gif)}
</style>
<script src="/asset_mms/skins/inc/rili.js" type="text/javascript"></script>
<script type="text/javascript">
  function document.onclick() //������ʱ�رոÿؼ� //ie6�����������������л����㴦������
{ 
with(window.event)
{ if (srcElement.getAttribute("Author")==null && srcElement != outObject && srcElement != outButton)
closeLayer();
}
}

function document.onkeyup() //��Esc���رգ��л�����ر�
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
  </script>

</head>

<body>
<form method="post" action="/asset_mms/action/borrow.do?method=borrow&m=${edit.assetId }">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">����ʲ�</td>
		</tr>
		<tr>
			<td rowspan="12" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">�ʲ���ţ�</td>
			<td height=25 width="25%">${edit.assetNumber }</td>
			<td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�ʲ����ƣ�</td>
		  <td height=25>${edit.assetName }</td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		
		<tr>
			<td height=25 valign="top" align="right">Ԥ�ƹ黹ʱ�䣺</td>
			<td height=25><input type="text" onclick="setday(this)" name="backtime"/></td>
		    <td width="25%" align="center"></td>
		</tr>
		
		<tr>
			<td height=25 colspan="2" align="center"><input type="submit" value="������" class="button"/></td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
</form>
<br/>
</body>
</html>
			
<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<style>
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
textarea{BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 50px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(../skins/images/button_bg.gif)}
</style>
<script type="text/javascript" language="javascript">
function check()
{
	var name=document.form1.assetTypeName.value;
	var number=document.form1.assetTypeNumber.value;
	if(name==""){alert("�������ʲ�����");
		name.focus;
		return false;}
	if(number==""){
		alert("�������ʲ����");
		name.focus;
		return false;
	}
	return true;
}
</script>
</head>

<body>
<form name="form1" method="post" action="/asset_mms/action/assetType.do?method=add">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">����ʲ�����</td>
		</tr>
		<tr>
			<td rowspan="4" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">�ʲ����ͱ�ţ�</td>
			<td height=25><input type="text" name="assetTypeNumber"/></td>
			<td height=25 align="center" width="25%">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right">�ʲ��������ƣ�</td>
			<td height=25><input type="text" name="assetTypeName"/></td>
			<td align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�ʲ�����������</td>
			<td height=25><textarea name="assetTypeDecp"></textarea></td>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right"><input type="submit" value="���" onclick="javascript:return check()" class="button"/></td>
			<td height=25><input type="reset" value="ȡ��" class="button"/></td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
</form>
<br/>
</body>
</html>

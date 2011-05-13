<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ page language="java" import="com.mms.pojo.*"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理内容</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<style>
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
textarea{BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 50px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(../skins/images/button_bg.gif)}
</style>
</head>

<body>
<%
AssetType at=new AssetType();
at=(AssetType)request.getAttribute("edit");
 %>
<form method="post" action="/asset_mms/action/assetType.do?method=update">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">编辑资产类型</td>
		</tr>
		<tr>
			<td rowspan="4" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">资产类型编号：</td>
			<td height=25><input type="text" name="assetTypeNumber" value="<%=at.getAssetTypeNumber() %>"/></td>
			<td height=25 align="center" width="25%">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right">资产类型名称：</td>
			<td height=25><input type="text" name="assetTypeName" value="<%=at.getAssetTypeName() %>"/></td>
			<td align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">资产类型描述：</td>
			<td height=25><textarea name="assetTypeDecp" ><%=at.getAssetTypeDecp()%></textarea></td>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right"><input type="submit" value="提交" class="button"/></td>
			<td height=25><input type="reset" value="取消" class="button"/></td>
			<td align="center"><input type="hidden" name="assetTypeId" value="<%=at.getAssetTypeId() %>"/></td>
		</tr>
	</table>
</form>
<br/>
</body>
</html>

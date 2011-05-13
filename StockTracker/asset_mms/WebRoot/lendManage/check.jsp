<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>j检索资产</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<style>
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(../skins/images/button_bg.gif)}
</style>
</head>

<body>
<form action="/asset_mms/action/check.do" method="post">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">检索资产</td>
		</tr>
		
		<tr>
			<td rowspan="12" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">资产名称：</td>
			<td height=25 width="25%"><input type="text" name="assetName"/></td>
			<td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">资产编号：</td>
			<td height=25><input type="text" name="assetNumber"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">资产类型：</td>
			<td height=25>
				<select name="assetTypeId">
				<option value="0">&nbsp</option>
				 <c:forEach items="${kl}" var="kind">						
					<option value="${kind.assetTypeId }">${kind.assetTypeName} </option>
				 </c:forEach>
		    	</select></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">使用类型：</td>
			<td height=25>
				<select name="assetUseType">
				    <option value="2">&nbsp</option>
					<option value="0">备用</option>
					<option value="1">直接使用</option>
		    	</select></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		
		<tr>
			<td height=25 colspan="2" align="center"><input type="submit" value="开始检索"/></td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
	</form>
<br/>
</body>
</html>

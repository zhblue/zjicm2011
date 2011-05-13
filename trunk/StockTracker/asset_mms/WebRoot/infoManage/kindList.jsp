<%@ page language="java" import="java.util.*,com.mms.pojo.*" pageEncoding="gb2312"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>种类列表</title>
    
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />

</head>

<body>
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		
		<tr>
			<td height=25 colspan="5" class="td_title">资产类型列表</td>
		</tr>
		
		<tr>
			<td height=23 width="25%" align="center">资产类型编号</td>
		    <td height=23 width="25%" align="center">资产类型名称</td>
		    <td height=23 width="30%" align="center">资产类型描述</td>
		    <td height=23 colspan="2">&nbsp;</td>
	    </tr>
		<c:forEach items="${kl}" var="at">
		<tr>
			<td height=23 align="center">${at.assetTypeNumber }</td>
		    <td height=23 align="center">${at.assetTypeName }</td>
		    <td height=23 align="center">${at.assetTypeDecp }</td>
		    <td width="10%" height=23 align="center"><a href="action/assetType.do?method=edit&d=${at.assetTypeId }">编辑</a></td>
		    <td width="10%" height=23 align="center"><a href="action/assetType.do?method=delete&d=${at.assetTypeId }">删除</a></td>
		</tr>
		</c:forEach>
		<tr>
			<td height=23 colspan="5" align="center"><a href="action/assetType.do?method=addKindForm">添加新的资产类型</a></td>
		</tr>
	</table>
	<br/>
</body>
</html>

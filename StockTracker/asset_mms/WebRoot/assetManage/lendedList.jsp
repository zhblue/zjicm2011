<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>资产列表</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		
		<tr>
			<td height=25 colspan="8" class="td_title">借出资产列表</td>
		</tr>
		
		<tr>
			<td height=23 width="27%" align="center">资产编号</td>
		    <td height=23 width="26%" align="center">资产名称</td>
		    <td height=23 width="27%" align="center">借出时间</td>
			<td height=23 width="10%" align="center">审批人</td>
			<td height=23 width="10%" align="center">&nbsp;</td>
	    </tr>
		<c:forEach items="${bl}" var="borrow">
		<tr>
			<td height=23 align="center">${borrow.asset.assetNumber }</td>
		    <td height=23 align="center"><a href="/asset_mms/action/asset.do?method=listinfo&m=${borrow.asset.assetId }">${borrow.asset.assetName }</a></td>
		    <td height=23 align="center">${borrow.borrowTime }</td>
			<td height=23 align="center">${borrow.employeeByBorrowAdminCheck.empName }</td>
			<td height=23 align="center"><a href="/asset_mms/action/borrow.do?method=back&m=${borrow.borrowId }&n=${borrow.asset.assetId }">归还资产</a></td>
		</tr>
		</c:forEach>
		
	</table>
	<br/>
</body>
</html>

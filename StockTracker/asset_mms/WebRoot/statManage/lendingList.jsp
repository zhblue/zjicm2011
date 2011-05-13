<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户列表</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		
		<tr>
			<td height=25 colspan="8" class="td_title">用户列表</td>
		</tr>
		
		<tr>
			<td height=23 width="18%" align="center">编号</td>
		    <td height=23 width="18%" align="center">用户名称</td>
		    <td height=23 width="18%" align="center">用户角色</td>
			<td height=23 width="18%" align="center">用户密码</td>
			<td height=23 width="18%" align="center">用户电话号</td>
			<td height=23 width="10%" align="center">&nbsp;</td>
		</tr>
		
		<tr>
			<td height=23 align="center">111</td>
		    <td height=23 align="center">222</td>
		    <td height=23 align="center">333</td>
		    <td height=23 align="center">444</td>
		    <td height=23 align="center">555</td>
			<td height=23 width="20%" align="center"><a href="employee.do?method=edit">编辑</a>&nbsp;<a href="">删除</a></td>
		</tr>
		<tr>
			<td height=23 align="center">111</td>
		    <td height=23 align="center">222</td>
		    <td height=23 align="center">333</td>
		    <td height=23 align="center">444</td>
		    <td height=23 align="center">555</td>
			<td height=23 width="20%" align="center"><a href="employee.do?method=edit">编辑</a>&nbsp;<a href="">删除</a></td>
		</tr>
		<tr>
			<td height=23 align="center">111</td>
		    <td height=23 align="center">222</td>
		    <td height=23 align="center">333</td>
		    <td height=23 align="center">444</td>
		    <td height=23 align="center">555</td>
			<td height=23 width="20%" align="center"><a href="employee.do?method=edit">编辑</a>&nbsp;<a href="">删除</a></td>
		</tr>
	</table>
	<br/>
</body>
</html>

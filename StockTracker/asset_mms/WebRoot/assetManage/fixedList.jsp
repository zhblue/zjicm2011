<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ʲ��б�</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		
		<tr>
			<td height=25 colspan="8" class="td_title">�����ʲ��б�</td>
		</tr>
		
		<tr>
			<td height=23 width="12%" align="center">�ʲ����</td>
		    <td height=23 width="12%" align="center">�ʲ�����</td>
		    <td height=23 width="12%" align="center">����ʱ��</td>
			<td height=23 width="12%" align="center">����۸�</td>
			<td height=23 width="12%" align="center">���䳧��</td>
			<td height=23 width="18%" align="center">����ԭ��</td>
			<td height=23 width="12%" align="center">������</td>
			<td height=23 width="10%" align="center">&nbsp;</td>
	    </tr>
		<c:forEach items="${fl}" var="fix">
		<tr>
			<td height=23 align="center">${fix.asset.assetNumber }</td>
		    <td height=23 align="center"><a href="/asset_mms/action/asset.do?method=listinfo&m=${fix.asset.assetId }">${fix.asset.assetName }</a></td>
		    <td height=23 align="center">${fix.fixTimeCheck}</td>
			<td height=23 align="center">${fix.fixPrice}</td>
			<td height=23 align="center">${fix.fixCheckFactory}</td>
			<td height=23 align="center">${fix.fixReason}</td>
			<td height=23 align="center">${fix.employeeByFixCheckAdmin.empName}</td>
			<td height=23 align="center"><a href="/asset_mms/action/fix.do?method=fixedback&m=${fix.asset.assetId }&n=${fix.fixId }">�黹�ʲ�</a></td>
		</tr>
		</c:forEach>
		
	</table>
	<br/>
</body>
</html>

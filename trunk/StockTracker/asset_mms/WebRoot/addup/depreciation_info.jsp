<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������</title>
<link href="../skins/css/main.css" rel="stylesheet" type="text/css" />
<script src="../skins/inc/main.js" type="text/javascript"></script>
<script src="../skins/inc/admin.js" type="text/javascript"></script>
</head>

<body>
	<table cellpadding="3" cellspacing="1" width="101%" border="0" align="center">
		
		<tr>
			<td colspan=2 height=25 class="td_title">�ʲ��۾���Ϣ</td>
		</tr>
		
		<tr>
			<td height=23 colspan=2>
			<form name="form1" method="post" action="/asset_mms/action/asset.do?method=listcheckdep">
			  <label>
			    �ʲ����� 
			      <input type="text" name="assetName" >
		      </label>
		    &nbsp;&nbsp;&nbsp;
		    <label>
		      <input type="submit" name="button" id="button" value="����">
		      </label>
            </form></td>
		</tr>
		
		<tr>
			<td width="15%"  height=23>��Ʒ����</td>
			<td width="*" class="forumRow">�۾���</td>
		</tr>
		<c:forEach items="${al}" var="asset">
		<tr>
			<td height=23 align="center">${asset.assetName }</td>
			<td height=23>${asset.dep }</td>
		</tr>
		</c:forEach>	
	</table>
	<br/>
</body>
</html>

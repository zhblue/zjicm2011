<%@ page language="java"  pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib uri="/WEB-INF/struts-logic.tld" prefix="logic"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>列表</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" >
function set(id)
{
	 
	  document.forms[0].action = "stock.do?method=setdesign&id="+id;
	  document.forms[0].submit();
}
</script>
</head>

<body>
<form  method="post">
	    
		
		<table width="100%" border="0" align="center">
		<tr>
			<td height=23 width="23%" align="center">编号</td>
		    <td height=23 width="23%" align="center">获利位</td>
		    <td height=23 width="23%" align="center">止损位</td>
			<td height=23 width="23%" align="center">异动指标</td>
			<td height=23 width="23%" align="center">&nbsp;</td>
	    </tr>
	    <%int i =0; %>
		<c:forEach items="${degisn}" var="at">
		<%i++; %>
		<tr>
			<td height=23 align="center"><%=i %></td>
		    <td height=23 align="center">${at.max }</td>
			<td height=23 align="center">${at.min }</td>
			<td height=23 align="center">${at.diff }</td>
			<td height=23 align="center"><a href="javascript:set('${at.degisnId}')">设置</a></td>
		</tr>
		</c:forEach>
	</table>
	<br/>
</form>
</body>
</html>

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
<title>资产列表</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" >
function add(id)
{
	 
	  document.forms[0].action = "stock.do?method=addstock&id="+id;
	  document.forms[0].submit();
}
</script>
</head>

<body>
<form  method="post">
	    
		
		<table width="100%" border="0" align="center">
		<tr>
			<td height=23 width="23%" align="center">编号</td>
		    <td height=23 width="23%" align="center">股票名称</td>
		    <td height=23 width="23%" align="center">股票代码</td>
			<td height=23 width="23%" align="center">股票信息</td>
	    </tr>
	    <%int i =0; %>
		<c:forEach items="${stock}" var="at">
		<%i++; %>
		<tr>
			<td height=23 align="center"><%=i %></td>
		    <td height=23 align="center">${at.stockName }</td>
			<td height=23 align="center">${at.stockCode }</td>
			<td height=23 align="center">${at.stockInfo }</td>
			
		</tr>
		</c:forEach>
	</table>
	<br/>
</form>
</body>
</html>

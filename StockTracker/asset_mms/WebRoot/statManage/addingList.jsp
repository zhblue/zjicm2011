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
<title>�ʲ��б�</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" >
function add()
{
	  var code = document.getElementById("stockCode").value;
	  var name = document.getElementById("stockName").value;
	  if(code==null||name==null)
	  {
	  	alert("�������Ʊ���ƻ����");
	  }
	  document.forms[0].action = "stock.do?method=add";
	  document.forms[0].submit();
}
</script>
</head>

<body>
<form action="" method="post">
	    <table  width="100%" border="0" align="center">
		
		<tr>
			<td height=25  class="td_title"><br>��Ʊ���ƣ�<input type="text" id="stockName" name="stockName" /></td>
			<td height=25  class="td_title">��Ʊ���룺<input type="text" id="stockCode" name="stockCode" /></td>
			<td height=25  class="td_title">��Ʊ��飺<input type="text" id="stockInfo" name="stockInfo" /></td>
			<td height=25  class="td_title"><input type="button" value="���" onClick="add()"/></td>
		</tr>
		</table>
		<hr>
		<table width="100%" border="0" align="center">
		<tr>
			<td height=23 width="23%" align="center">���</td>
		    <td height=23 width="23%" align="center">��Ʊ����</td>
		    <td height=23 width="23%" align="center">��Ʊ����</td>
			<td height=23 width="23%" align="center">��Ʊ��ַ</td>
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

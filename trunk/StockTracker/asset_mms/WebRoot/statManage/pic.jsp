<%@ page language="java"  pageEncoding="gbk"%>
<%@ page language="java"  import="com.mms.pojo.*"%>
<%@ page language="java"  import="java.util.*"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib uri="/WEB-INF/struts-logic.tld" prefix="logic"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>K折线图</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />

</head>

<body onload="stock_list();" >
<div>
<% String id = (String)request.getAttribute("id");
   int num = Integer.parseInt((String)request.getAttribute("num"));
   System.out.print(num);
%>
<%if(num == 1){ %>
	<img src="http://image.sinajs.cn/newchart/min/n/sh<%=id %>.gif" />
<%}else if(num == 2) { %>
	<img src="http://image.sinajs.cn/newchart/daily/n/sh<%=id %>.gif" />
<%}else if(num == 3) { %>
	<img src="http://image.sinajs.cn/newchart/weekly/n/sh<%=id %>.gif" />
<%}else if(num == 4) { %>
	<img src="http://image.sinajs.cn/newchart/monthly/n/sh<%=id %>.gif" />
<%} %>
	
</div>
</body>
</html>

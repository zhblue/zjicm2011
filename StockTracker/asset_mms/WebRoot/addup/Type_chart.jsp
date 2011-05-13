<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ page import="com.mms.beans.*,java.io.*" %>
 <%
    String filename = BarChart3D.generateBarChart(session, new PrintWriter(out));
    String graphURL = request.getContextPath() + "/servlet/DisplayChart?filename=" + filename;
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>按分类现实平均折旧率比例</title>
<link href="../skins/css/main.css" rel="stylesheet" type="text/css" />
<script src="../skins/inc/main.js" type="text/javascript"></script>
<script src="../skins/inc/admin.js" type="text/javascript"></script>
</head>

<body>
	<table cellpadding="3" cellspacing="1" width="101%" border="0" align="center">
		
		<tr>
			<td colspan=2 height=25 class="td_title">按分类现实平均折旧率比例</td>
		</tr>
		
		<tr>
		  <td  class="forumRowHighlight" height=23 >搜索结果：</td>
	  </tr>
	  <tr><td align="center"><img src="<%= graphURL %>" width=500 height=300 border=0 ></td></tr>
	</table>
	<br/>
</body>
</html>

<%@ page language="java" contentType="text/html; charset=gb2312"%>
<%@ page import="com.mms.beans.*,java.io.*" %>
 <%
    String filename = BarChart3D.generateBarChart(session, new PrintWriter(out));
    String graphURL = request.getContextPath() + "/servlet/DisplayChart?filename=" + filename;
%>
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body leftmargin=10 topmargin=10>
<img src="<%= graphURL %>" width=500 height=300 border=0 >
</body>
</html>
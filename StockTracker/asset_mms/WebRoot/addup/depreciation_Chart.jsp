<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ page import="com.mms.beans.*,java.io.*" %>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
    String filename = PieChart3D.generatePieChart(session, new PrintWriter(out));
    String graphURL = request.getContextPath() + "/servlet/DisplayChart?filename=" + filename;
%>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>资产类型列表</title>
<link href="../skins/css/main.css" rel="stylesheet" type="text/css" />

</head>

<body>
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		
		<tr>
			<td height=67 colspan="4" class="td_title"><p>折旧状况分析&#13;</p></td>
		</tr>
		
		<tr>
			<td width="42%" height=23 align="center">
			<form name="form1" method="post" action="/asset_mms/action/asset.do?method=listavgdepchart">
	        <label>
			      按分类查看：
			      
		            <select name="select" id="select">
		           <c:forEach items="${kl}" var="asset">						
					<option value="${asset.assetTypeId }">${asset.assetTypeName} </option>
				 </c:forEach>
		           </select>
		        </label>
	        </form></td>
		    <td width="58%" height=23 colspan="3" align="center"><form name="form2" method="post" action="">
            <label>
              <input type="submit" name="button" id="button" value="查找">
	            </label>
            </form></td>
	    </tr>
	    <tr><td colspan="4" align="center"><img src="<%= graphURL %>" width=500 height=300 border=0 ></td></tr>
	</table>
	<br/>
</body>
</html>

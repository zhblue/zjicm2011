<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib uri="/WEB-INF/struts-logic.tld" prefix="logic"%>
<%@ page  import="com.mms.pojo.*" %>
<%@ page  import="com.mms.util.*" %>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>资产列表</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		
		<tr>
			<td height=25 colspan="8" class="td_title">资产列表</td>
		</tr>
		
		<tr>
			<td height=23 width="20%" align="center">资产编号</td>
		    <td height=23 width="20%" align="center">资产名称</td>
		    <td height=23 width="20%" align="center">使用类型</td>
			<td height=23 width="20%" align="center">状态</td>
		    <td height=23 width="20%" align="center">折旧率</td>
	    </tr>
		<c:forEach items="${al}" var="asset">
		<tr>
			<td height=23 align="center">${asset.assetNumber }</td>
		    <td height=23 align="center"><a href="/asset_mms/action/asset.do?method=listinfo&m=${asset.assetId }">${asset.assetName }</a></td>
		    <logic:equal value="0" property="assetUseType"  name="asset">
		    <td height=23 align="center">备用</td>
		    </logic:equal>
		    <logic:equal value="1" property="assetUseType"  name="asset">
		    <td height=23 align="center">购买后使用</td>
		    </logic:equal>	
			<logic:equal value="0" property="assetState"  name="asset">
		    <td height=23 align="center">可用</td>
		    </logic:equal>
		    <logic:equal value="1" property="assetState"  name="asset">
		    <td height=23 align="center">已借出</td>
		    </logic:equal>
		    <logic:equal value="2" property="assetState"  name="asset">
		    <td height=23 align="center">申请借出</td>
		    </logic:equal>
		    <logic:equal value="3" property="assetState"  name="asset">
		    <td height=23 align="center">正修理</td>
		    </logic:equal>
		    <logic:equal value="4" property="assetState"  name="asset">
		    <td height=23 align="center">申请修理</td>
		    </logic:equal>
		    <logic:equal value="5" property="assetState"  name="asset">
		    <td height=23 align="center">申请报废</td>
		    </logic:equal>
		    <logic:equal value="6" property="assetState"  name="asset">
		    <td height=23 align="center">已报废</td>
		    </logic:equal>			
		    <logic:equal value="7" property="assetState"  name="asset">
		    <td height=23 align="center">申请添置</td>
		    </logic:equal>
            <td height=23 align="center">${asset.dep }</td>
		</tr>	
		</c:forEach>	
		
			
	</table>
	<br/>
</body>
</html>

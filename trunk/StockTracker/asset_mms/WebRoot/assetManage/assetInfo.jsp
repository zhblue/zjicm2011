<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ page language="java" import="com.mms.pojo.*" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib uri="/WEB-INF/struts-logic.tld" prefix="logic"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>资产详细信息</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">资产详细信息</td>
		</tr>
		<tr>
			<td rowspan="25" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">资产编号：</td>
			<td height=25 width="25%">${edit.assetNumber}</td>
			<td rowspan="25" width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right">资产名称：</td>
			<td height=25>${edit.assetName}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">资产类型：</td>
			<td height=25>${edit.assetType.assetTypeName}</td>
		</tr>				 
		<tr>
		    <logic:equal value="0" property="assetUseType"  name="edit">
		    <td height=25 valign="top" align="right">使用类型：</td>
			<td height=25>备用</td>
		    </logic:equal>
		    <logic:equal value="1" property="assetUseType"  name="edit">
		    <td height=25 valign="top" align="right">使用类型：</td>
			<td height=25>购买后使用</td>
		    </logic:equal>			
		</tr>
		<tr>
		    <logic:equal value="0" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">状态：</td>
			<td height=25>可用</td>
		    </logic:equal>
		    <logic:equal value="1" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">状态：</td>
			<td height=25>已借出</td>
		    </logic:equal>
		    <logic:equal value="2" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">状态：</td>
			<td height=25>申请借出</td>
		    </logic:equal>
		    <logic:equal value="3" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">状态：</td>
			<td height=25>正修理</td>
		    </logic:equal>
		    <logic:equal value="4" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">状态：</td>
			<td height=25>申请修理</td>
		    </logic:equal>
		    <logic:equal value="5" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">状态：</td>
			<td height=25>申请报废</td>
		    </logic:equal>
		    <logic:equal value="6" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">状态：</td>
			<td height=25>已报废</td>
		    </logic:equal>
		    <logic:equal value="7" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">状态：</td>
			<td height=25>申请添加</td>
		    </logic:equal>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">型号：</td>
			<td height=25>${edit.assetModelType}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">生产厂家：</td>
			<td height=25>${edit.assetFactory}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">价格（元）：</td>
			<td height=25>${edit.assetPrice}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">购买日期：</td>
			<td height=25>${edit.assetBuyTime}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">预计使用到的年限：</td>
			<td height=25>${ edit.assetUseToYear}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">累计使用时间（天）：</td>
			<td height=25>${edit.assetUseTime}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">折旧率：</td>
			<td height=25>23%</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">资产负责人：</td>
			<td height=25>${edit.employee.empName}</td>
		</tr>		
	</table>
<br/>
</body>
</html>
		   
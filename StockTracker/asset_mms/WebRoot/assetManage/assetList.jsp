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
<title>�ʲ��б�</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		
		<tr>
			<td height=25 colspan="8" class="td_title">�ʲ��б�</td>
		</tr>
		
		<tr>
			<td height=23 width="20%" align="center">�ʲ����</td>
		    <td height=23 width="20%" align="center">�ʲ�����</td>
		    <td height=23 width="20%" align="center">ʹ������</td>
			<td height=23 width="20%" align="center">״̬</td>
		    <td height=23 width="20%" align="center">�۾���</td>
	    </tr>
		<c:forEach items="${al}" var="asset">
		<tr>
			<td height=23 align="center">${asset.assetNumber }</td>
		    <td height=23 align="center"><a href="/asset_mms/action/asset.do?method=listinfo&m=${asset.assetId }">${asset.assetName }</a></td>
		    <logic:equal value="0" property="assetUseType"  name="asset">
		    <td height=23 align="center">����</td>
		    </logic:equal>
		    <logic:equal value="1" property="assetUseType"  name="asset">
		    <td height=23 align="center">�����ʹ��</td>
		    </logic:equal>	
			<logic:equal value="0" property="assetState"  name="asset">
		    <td height=23 align="center">����</td>
		    </logic:equal>
		    <logic:equal value="1" property="assetState"  name="asset">
		    <td height=23 align="center">�ѽ��</td>
		    </logic:equal>
		    <logic:equal value="2" property="assetState"  name="asset">
		    <td height=23 align="center">������</td>
		    </logic:equal>
		    <logic:equal value="3" property="assetState"  name="asset">
		    <td height=23 align="center">������</td>
		    </logic:equal>
		    <logic:equal value="4" property="assetState"  name="asset">
		    <td height=23 align="center">��������</td>
		    </logic:equal>
		    <logic:equal value="5" property="assetState"  name="asset">
		    <td height=23 align="center">���뱨��</td>
		    </logic:equal>
		    <logic:equal value="6" property="assetState"  name="asset">
		    <td height=23 align="center">�ѱ���</td>
		    </logic:equal>			
		    <logic:equal value="7" property="assetState"  name="asset">
		    <td height=23 align="center">��������</td>
		    </logic:equal>
            <td height=23 align="center">${asset.dep }</td>
		</tr>	
		</c:forEach>	
		
			
	</table>
	<br/>
</body>
</html>

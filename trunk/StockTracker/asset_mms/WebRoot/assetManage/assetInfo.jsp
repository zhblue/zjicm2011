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
<title>�ʲ���ϸ��Ϣ</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">�ʲ���ϸ��Ϣ</td>
		</tr>
		<tr>
			<td rowspan="25" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">�ʲ���ţ�</td>
			<td height=25 width="25%">${edit.assetNumber}</td>
			<td rowspan="25" width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right">�ʲ����ƣ�</td>
			<td height=25>${edit.assetName}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�ʲ����ͣ�</td>
			<td height=25>${edit.assetType.assetTypeName}</td>
		</tr>				 
		<tr>
		    <logic:equal value="0" property="assetUseType"  name="edit">
		    <td height=25 valign="top" align="right">ʹ�����ͣ�</td>
			<td height=25>����</td>
		    </logic:equal>
		    <logic:equal value="1" property="assetUseType"  name="edit">
		    <td height=25 valign="top" align="right">ʹ�����ͣ�</td>
			<td height=25>�����ʹ��</td>
		    </logic:equal>			
		</tr>
		<tr>
		    <logic:equal value="0" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">״̬��</td>
			<td height=25>����</td>
		    </logic:equal>
		    <logic:equal value="1" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">״̬��</td>
			<td height=25>�ѽ��</td>
		    </logic:equal>
		    <logic:equal value="2" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">״̬��</td>
			<td height=25>������</td>
		    </logic:equal>
		    <logic:equal value="3" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">״̬��</td>
			<td height=25>������</td>
		    </logic:equal>
		    <logic:equal value="4" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">״̬��</td>
			<td height=25>��������</td>
		    </logic:equal>
		    <logic:equal value="5" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">״̬��</td>
			<td height=25>���뱨��</td>
		    </logic:equal>
		    <logic:equal value="6" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">״̬��</td>
			<td height=25>�ѱ���</td>
		    </logic:equal>
		    <logic:equal value="7" property="assetState"  name="edit">
		    <td height=25 valign="top" align="right">״̬��</td>
			<td height=25>�������</td>
		    </logic:equal>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�ͺţ�</td>
			<td height=25>${edit.assetModelType}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�������ң�</td>
			<td height=25>${edit.assetFactory}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�۸�Ԫ����</td>
			<td height=25>${edit.assetPrice}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�������ڣ�</td>
			<td height=25>${edit.assetBuyTime}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">Ԥ��ʹ�õ������ޣ�</td>
			<td height=25>${ edit.assetUseToYear}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�ۼ�ʹ��ʱ�䣨�죩��</td>
			<td height=25>${edit.assetUseTime}</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�۾��ʣ�</td>
			<td height=25>23%</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�ʲ������ˣ�</td>
			<td height=25>${edit.employee.empName}</td>
		</tr>		
	</table>
<br/>
</body>
</html>
		   
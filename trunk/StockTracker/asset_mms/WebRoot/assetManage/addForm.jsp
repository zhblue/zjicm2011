<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�����ʲ�</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<style>
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(../skins/images/button_bg.gif)}
</style>
<script type="text/javascript" language="javascript">
function check()
{
	var assetName=document.form1.assetName.value;
	var assetNumber=document.form1.assetNumber.value;
	var assetModelType=document.form1.assetModelType.value;
	var assetFactory=document.form1.assetFactory.value;
	var assetPrice=document.form1.assetPrice.value;
    if(assetName==""|| assetNumber==""|| assetModelType==""|| assetFactory==""|| assetPrice=="")
    {
    	alert("�뽫��Ϣ��д������");
    	return false ;
    }
}
</script>
</head>

<body>
<form name="form1" method="post" action="/asset_mms/action/asset.do?method=add">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">�����ʲ�</td>
		</tr>
		
		<tr>
			<td rowspan="12" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">�ʲ����ƣ�</td>
			<td height=25 width="25%"><input type="text" name="assetName"/></td>
			<td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�ʲ���ţ�</td>
			<td height=25><input type="text" name="assetNumber"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�ʲ����ͣ�</td>
			<td height=25>
				<select name="assetTypeId">
				 <c:forEach items="${kl}" var="kind">						
					<option value="${kind.assetTypeId }">${kind.assetTypeName} </option>
				 </c:forEach>
		    	</select></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">ʹ�����ͣ�</td>
			<td height=25>
				<select name="assetUseType">
					<option selected="selected" value="0">����</option>
					<option value="1">ֱ��ʹ��</option>
		    	</select></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�ͺţ�</td>
			<td height=25><input type="text" name="assetModelType"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�������ң�</td>
			<td height=25><input type="text" name="assetFactory"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">�۸�Ԫ��:</td>
			<td height=25><input type="text" name="assetPrice"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		
		<tr>
			<td height=25 valign="top" align="right">�ʲ������ˣ�</td>
			<td height=25>
				<select name="assetEmployee">
					<c:forEach items="${el}" var="employee">						
					<option value="${employee.empId}">${employee.empName} </option>
				    </c:forEach>
		    	</select></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 colspan="2" align="center"><input type="submit" value="��������" onclick="javascript:return check()" class="button"/></td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
</form>
<br/>
</body>
</html>
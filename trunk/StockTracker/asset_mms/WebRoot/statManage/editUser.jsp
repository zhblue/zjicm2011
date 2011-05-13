<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ page language="java" import="com.mms.pojo.*"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>编辑用户</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<style>
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(../skins/images/button_bg.gif)}
</style>
</head>

<body>

<form method="post" action="employee.do?method=update">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">编辑用户</td>
		</tr>
		
		
		<tr>
			<td height=25 align="right">用户名：</td>
			<td height=25><input type="text" name="userName" value=""/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">密码：</td>
			<td height=25><input type="text" name="userPassword" value=""/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">重新输入密码：</td>
			<td height=25><input type="text" value=""/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right" >员工角色：</td>
			<td height=25>
			<select>
			<option>系统用户</option>
			<option>普通用户</option>
			</select>
			</td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		
		<tr>
			<td height=25 valign="top" align="right">手机号：</td>
			<td height=25><input type="text" name="empTelnum" value=""/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right"><input type="submit" value="提交" class="button"/></td>
			<td height=25><input type="reset" value="取消" class="button"/></td>
			<td align="center"><input type="hidden" name="empId" value=""/></td>
			<td align="center"><input type="hidden" name="userId" value=""/></td>
		</tr>
	</table>
</form>
<br/>
</body>
</html>
			
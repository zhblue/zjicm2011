<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ page language="java" import="com.mms.pojo.*" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户信息</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function check()
{
	
}
</script>
</head>

<body>
<%
TUser at=new TUser();
at=(TUser)request.getAttribute("tuser");

 %>
 <form method="post" action="employee.do?method=saveuser">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		
		<tr>
			<td height=25 colspan="3" class="td_title">用户信息</td>
		</tr>
		
		
		<tr>
			<td height=25 align="right">用户名：</td>
			<td height=25><input type="text" name="userName" value="<%=at.getUserName() %>"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">密码：</td>
			<td height=25><input type="text" name="userPassword" value="<%=at.getUserPassword() %>"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">重新输入密码：</td>
			<td height=25><input type="text" value=""/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">手机号：</td>
			<td height=25><input type="text" name="empTelnum" value="<%=at.getTelNum() %>"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right"><input type="submit" value="提交" class="button"/></td>
			<td height=25><input type="reset" value="取消" class="button"/></td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
</form>
	<br/>
</body>
</html>

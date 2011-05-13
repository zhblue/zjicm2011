<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ page language="java" import="com.mms.pojo.*" %>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户详细信息</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<%
Employee at=new Employee();
at=(Employee)request.getAttribute("edit");
%>
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">用户详细信息</td>
		</tr>
		<tr>
			<td rowspan="11" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">员工编号：</td>
			<td height=25 width="25%"><%=at.getEmpNum() %></td>
			<td width="25%" rowspan="11" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right">用户名：</td>
			<td height=25><%= at.getTUser().getUserName()%></td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">密码：</td>
			<td height=25><%= at.getTUser().getUserPassword() %></td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">员工姓名：</td>
			<td height=25><%=at.getEmpName() %></td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">性别：</td>
			<%
			if(at.getEmpSex().equals("0"))
			{
			%>
			<td height=25>男</td>
			<%
			}
			else{
			%>
			<td height=25>女</td>
			<%
			}
			 %>
			
			
		</tr>
		<tr>
			<td height=25 valign="top" align="right">员工角色：</td>
			<td height=25><%=at.getTUser().getRole().getRoleName()%></td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">身份证：</td>
			<td height=25><%=at.getEmpManid() %></td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">手机号：</td>
			<td height=25><%=at.getEmpTelnum() %></td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">家庭住址：</td>
			<td height=25><%=at.getEmpAddress() %></td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">E-mail：</td>
			<td height=25><%= at.getEmpEmail() %></td>
		</tr>	
	</table>
<br/>
</body>
</html>

<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>添加用户</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<style> 
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(../skins/images/button_bg.gif)}
</style>
<script type="text/javascript" language="javascript">
function  check()
{
	var pw=document.form1.userPassword.value;
	var pw1=document.form1.userpassword1.value;
	var empNum=document.form1.empNum.value;
	var userName=document.form1.userName.value;
	var empName=document.form1.empName.value;
	var empManid=document.form1.empManid.value;
	var empTelnum=document.form1.empTelnum.value;
	var empAddress=document.form1.empAddress.value;
	var empEmail=document.form1.empEmail.value;
	//判断两次输入密码是否一致
	if(pw!=pw1)
	{
		alert("两次输入密码不一致，请重新输入！");
		return false;
		
	}
	//判断输入不为空
	else if(empNum==""||userName==""||empManid==""|| empTelnum==""|| empAddress==""|| empEmail=="")
	{
		alert("请将信息填写完整！");	
		return false;	
	}
	//判断电子邮件格式
	var reg= /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/; 
    else if(!reg.test(empEmail))
    {
    	alert("请输入正确的电子邮件地址");
     	return false;
    }
    //判断输入是否是数字
    var re = /^[\d]+$/; 
    else if(!re.test(empManid))
    {
    	alert("请输入数字");
    	return false;
    }
    //判断输入是否是电话号码
    var re =(\d{11})|(\d{3}|(\d{3}|\d{4})-)?(\d{8}|\d{7})|([1][2]\d{1}|[0]\d{3}-)?(\d{7}|\d{8});  
    else if(!re.test(empTelnum))
    {
    	alert("请输入正确的电话号码");
    	return false;
    }	
}

</script>
</head>

<body>
<form name="form1" method="post" action="/asset_mms/action/employee.do?method=add">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">添加用户</td>
		</tr>
		<tr>
			<td rowspan="12" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">员工编号：</td>
			<td height=25 width="25%"><input type="text" name="empNum"/></td>
			<td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right">用户名：</td>
			<td height=25><input type="text" name="userName"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right">密码：</td>
			<td height=25><input type="text" name="userPassword"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">重新输入密码：</td>
			<td height=25><input type="text" name="userpassword1" /></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">员工姓名：</td>
			<td height=25><input type="text" name="empName" "/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">性别：</td>
			<td height=25>
			  <input type="radio" name="empSex" value="0" checked="checked">男
			  <input type="radio" name="empSex" value="1">女
			</td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right" name="roleId">员工角色：</td>
			<td height=25>
			 	<select name="role">
					<option selected="selected" value="1">系统管理员</option>
					<option value="2">普通员工</option>
					<option value="3">设备科长</option>
					<option value="4">院长</option>
					<option value="5">副院长</option>
		    	</select>
			</td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">身份证：</td>
			<td height=25><input type="text" name="empManid"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">手机号：</td>
			<td height=25><input type="text" name="empTelnum"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">家庭住址：</td>
			<td height=25><input type="text" name="empAddress"/></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">E-mail：</td>
			<td height=25><input type="text" name="empEmail" /></td>
		    <td width="25%" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right"><input type="submit" value="添加" onclick="javascript:return check()"  class="button" /></td>
			<td height=25><input type="reset" value="取消" class="button"/></td>
			<td align="center">&nbsp;</td>
		</tr>
	</table>
</form>
<br/>
</body>
</html>

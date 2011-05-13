<%@ page language="java" pageEncoding="UTF-8"%>
<%@ taglib uri="http://struts.apache.org/tags-bean" prefix="bean"%> 
<%@ taglib uri="http://struts.apache.org/tags-html" prefix="html"%>
<html> 
	<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312" />
<TITLE>登录</TITLE>
<style>
table { font-size:12px; font-family : tahoma, 宋体, fantasy; }
td { font-size:12px; font-family : tahoma, 宋体, fantasy;}
.td_login { height:24px; line-height:20px; background:#EEF7FD; font-size:12px; border:1px solid #fff; color:#135294; padding:2px; width:150px}
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; WIDTH: 150px; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(skins/images/button_bg.gif)}
th {height:24px;color:#135294;font-weight:bold;padding-left:20px;}
.checknum {BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; WIDTH: 60px; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
</style>
<script type="text/javascript" language="javascript">
function check()
{
	var name=document.form1.userName.value;
	var password=document.form1.password.value;
	if(name==""){alert("请输入用户名");
		name.focus;
		return false;}
	if(password==""){
		alert("请输入密码");
		name.focus;
		return false;
	}
	return true;
}
</script>
</head>
<BODY bgcolor="#337ABB">
<%session.setAttribute("passed","passing"); %>
<form name="form1" method="post" action="login.do?method=login">
<TABLE border=0 cellPadding=0 cellSpacing=0 height="50%" width="50%" align="center" >
	<TBODY>
		<TR>
			<TD width="100%" colspan="2" align="center" vAlign="middle" bgcolor="#337ABB">
				<!--正文头部开始-->
				<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#C4D8ED">
					<tr height="32">
					
						<td valign="top" width="10" background="skins/images/bg2.gif">
							<img src="skins/images/teble_top_left.gif" width="5" height="12"/>
						</td>
							
						<th background="skins/images/bg2.gif" align="center">
							欢迎来到金融证券行情跟踪系统！
						</th>
						
						<td align="right" valign="top" background="skins/images/bg2.gif" width="10" >
							<img src="skins/images/teble_top_right.gif" width="5" height="12"/>	
						</td>
					</tr>
				</table>
				<!--正文头部结束-->
				<!--正文开始-->
				<!--  -->
					<table bgcolor="#C4D8ED" width="100%" cellpadding="3" cellspacing="1" border="0" align="center">
						<tr>
							<td rowspan="6" class="td_login">&nbsp;</td>
							<td height=25 class="td_login" align="center">用户名：</td>
							<td height=25 class="td_login"><input name="userName" type="text"/></td>
							<td class="td_login">&nbsp;</td>
						</tr>
						<tr>
							<td height=25 class="td_login" align="center">密码：</td>
							<td height=25 class="td_login"><input name="password" type="password"/></td>
						    <td class="td_login">&nbsp;</td>
						</tr>
						
						<tr>
							<td height=25 class="td_login" align="center">用户角色：</td>
							<td height=25 class="td_login"><select name="roleId" type="select">
							<option selected="selected" value="1">系统管理员</option>
							<option value="2">普通员工</option>
							
							
							
							</select></td>
						    <td class="td_login">&nbsp;</td>
						</tr>
						<tr>
							<td height=25 class="td_login" align="center">验证码：</td>
							<td height=25 class="td_login"><input type="text" class="checknum"/>
							<img src="/asset_mms/validate.do"/></td>
						    <td class="td_login"><a href="jsp/regedit.jsp">注册</a></td>
						</tr>
						<tr>
							<td height=25 class="td_login" align="center"><input type="submit" value="登陆" class="button" onclick="javascript:return check()"/></td>
							<td height=25 class="td_login"><input type="reset" value="取消" class="button"/></td>
						    <td class="td_login">&nbsp;</td>
						</tr>
					</table>
				<!---->
				<!--正文结束-->
				<!--正文尾部开始-->
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#C4D8ED;">
					<tr>
						<td><img src="skins/images/teble_bottom_left.gif" width="5" height="6" /></td>
						<td align="right"><img src="skins/images/teble_bottom_right.gif" width="5" height="6" /></td>
					</tr>
				</table>
				<!--正文尾部结束-->
		  </TD>
		</TR>
	</TBODY>
</TABLE>
 </form>
</body>
</html>


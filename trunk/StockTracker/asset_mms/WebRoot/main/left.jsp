<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312" />
<TITLE>左栏帮助</TITLE>
<link href="../skins/css/style_left.css" rel="stylesheet" type="text/css" />
</head>
<BODY>
	<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td valign="top" style="padding-top:10px; ">
				<table class="alpha">
					<tr>
						<td valign="top" class="menu" id="menubar">
							<li><a href="welcome.html" target='frmright'>基本查询</a></li>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
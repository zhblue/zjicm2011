<%@ page language="java" import="java.util.*" pageEncoding="gbk"%>
<%@ page language="java" import="com.mms.pojo.*"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理内容</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<style>
input { BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 20px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
textarea{BORDER-BOTTOM: #ffffff 1px solid; BORDER-LEFT: #ffffff 1px solid; HEIGHT: 50px; BORDER-TOP: #ffffff 1px solid; BORDER-RIGHT: #ffffff 1px solid}
.button { color: #135294; border:1px solid #666; height:21px; line-height:21px; background:url(../skins/images/button_bg.gif)}
</style>
</head>

<body>
<%
Degisn at=new Degisn();
at=(Degisn)request.getAttribute("degisn");
 %>
<form method="post" action="/asset_mms/action/stock.do?method=updatedesign">
	<table cellpadding="3" cellspacing="1" width="100%" border="0" align="center">
		<tr>
			<td height=25 colspan="4" class="td_title">设置股票信息</td>
		</tr>
		<tr>
			<td rowspan="4" width="25%">&nbsp;</td>
			<td height=25 align="right" width="25%">股票ID：</td>
			<td height=25><input type="text" name="degisnId" value="<%=at.getDegisnId()%>"/></td>
			<td height=25 align="center" width="25%">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="right">获利位：</td>
			<td height=25><input type="text" name="max" value="<%=at.getMax() %>"/></td>
			<td align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">止损位：</td>
			<td height=25><input type="text" name="min" value="<%=at.getMin()%>" /></td>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 valign="top" align="right">异动指标：</td>
			<td height=25><input type="text" name="diff" value="<%=at.getDiff()%>" /></td>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height=25 align="center" width="25%">&nbsp;</td>
			<td height=25 align="right"><input type="submit" value="提交" class="button"/></td>
			<td height=25><input type="reset" value="取消" class="button"/></td>
			<td height=25 align="center" width="25%">&nbsp;</td>
			<td align="center"><input type="hidden" name="stock_id" value="<%=at.getStockId() %>"/></td>
		</tr>
	</table>
</form>
<br/>
</body>
</html>

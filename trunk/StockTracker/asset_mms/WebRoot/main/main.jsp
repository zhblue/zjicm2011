<%@ page language="java" import="java.util.*" pageEncoding="gb2312"%>
<%@ page language="java" import="com.mms.pojo.*" %>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>��ҳ</title>
    
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
<link href="skins/css/style.css" rel="stylesheet" type="text/css" />
<style>
.main_left {table-layout:auto; background:url(skins/images/left_bg.gif)}
.main_left_top{ background:url(skins/images/left_menu_bg.gif); padding-top:2px !important; padding-top:5px;}
.main_left_title{text-align:left; padding-left:15px; font-size:14px; font-weight:bold; color:#fff;}
.left_iframe{HEIGHT: 92%; VISIBILITY: inherit;WIDTH: 180px; background:transparent;}
.main_iframe{HEIGHT: 92%; VISIBILITY: inherit; WIDTH:100%; Z-INDEX: 1}
table { font-size:12px; font-family : tahoma, ����, fantasy; }
td { font-size:12px; font-family : tahoma, ����, fantasy;}
</style>
<script src="skins/inc/admin.js" type="text/javascript"></script>
<SCRIPT>
var status = 1;
var Menus = new DvMenuCls;
document.onclick=Menus.Clear;
function switchSysBar(){
     if (1 == window.status){
		  window.status = 0;
          switchPoint.innerHTML = '<img src="skins/images/left.gif">';
          document.all("frmTitle").style.display="none"
     }
     else{
		  window.status = 1;
          switchPoint.innerHTML = '<img src="skins/images/right.gif">';
          document.all("frmTitle").style.display=""
     }
}
</SCRIPT>
<BODY style="MARGIN: 0px">
<%TUser user = new TUser(); 
user = (TUser)request.getSession().getAttribute("user");
System.out.println("<<<<<<<<<<<"+user.getUserName());%>
<!--�������ֿ�ʼ-->
<div class="top_table">
<div class="top_table_leftbg">
	<div class="system_logo"><img src="skins/images/top_table_leftbg.gif"></div>
	<div class="menu">
		<ul>
			<li id="menu_0" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);">
				<a href="main/context.jsp" target="frmright">������Ϣ����</a>
				<div class="menu_childs" onMouseOut="Menus.Hide(0);">
					<ul>
						
						<li><a href="/asset_mms/action/employee.do?method=list" target="frmright">�û�����</a></li>
					</ul>
				</div>
				<div class="menu_div"><img src="skins/images/menu01_right.gif" style="vertical-align:bottom;"></div>
			</li>

			<li id="menu_1" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);">
				<a href="/asset_mms/action/stock.do?method=liststock" target="frmright">��Ʊ����</a>
				<div class="menu_childs" onMouseOut="Menus.Hide(0);">
					<ul>
						<li><a href="/asset_mms/action/stock.do?method=liststock" target="frmright">�鿴��Ʊ</a></li>
						<li><a href="/asset_mms/action/stock.do?method=listbyuser" target="frmright">��ѡ�����</a></li>
						<li><a href="/asset_mms/action/stock.do?method=listset" target="frmright">��Ʊ����</a></li>
						<li><a href="/asset_mms/action/stock.do?method=liststockbyuser" target="frmright">��ѡ���б�</a></li>
					</ul>
				</div>
				<div class="menu_div"><img src="skins/images/menu01_right.gif" style="vertical-align:bottom;"></div>
			</li>

			<li id="menu_2" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);">
				<a href="main/context.jsp" target="frmright">���Ź���</a>
				<div class="menu_childs" onMouseOut="Menus.Hide(0);">
					<ul>
						<li><a href="/asset_mms/action/asset.do?method=lendlist" target="frmright">�ֻ�������</a></li>
						<li><a href="/asset_mms/action/asset.do?method=checklist" target="frmright">������������</a></li>
					</ul>
				</div>
				<div class="menu_div"><img src="skins/images/menu01_right.gif" style="vertical-align:bottom;"></div>
			</li>

			<li id="menu_3" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);">
				<a href="main/context.jsp" target="frmright">ϵͳ����</a>
				<div class="menu_childs" onMouseOut="Menus.Hide(0);">
					<ul>
						<li><a href="/asset_mms/action/borrow.do?method=lendinglist" target="frmright">�û���Ϣά��</a></li>
						<li><a href="/asset_mms/action/stock.do?method=list" target="frmright">��Ʊ��Ϣά��</a></li>
					</ul>
				</div>
				<div class="menu_div"><img src="skins/images/menu01_right.gif" style="vertical-align:bottom;"></div>
			</li>
			<li id="menu_4" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);">
				<a href="main/context.jsp" target="frmright">������</a>
				<div class="menu_childs" onMouseOut="Menus.Hide(0);">
					<ul>
						<li><a href="/asset_mms/action/borrow.do?method=lendinglist" target="frmright">��Ϣ�б�</a></li>
					</ul>
				</div>
				<div class="menu_div"><img src="skins/images/menu01_right.gif" style="vertical-align:bottom;"></div>
			</li>
			<li id="menu_5" onMouseOver="Menus.Show(this,0)" >
				<a href="index.jsp">�˳�ϵͳ</a>
				<div class="menu_childs" onMouseOut="Menus.Hide(0);"></div>
				<div class="menu_div"><img src="skins/images/menu01_right.gif" style="vertical-align:bottom;"></div>
			</li>
		</ul>
	</div>
</div>
</div>
<div style="height:24px; background:#337ABB;"></div>
<!--�������ֽ���-->

<TABLE border=0 cellPadding=0 cellSpacing=0 height="92%" width="100%" style="background:#337ABB;">
	<TBODY>
		<TR>
			<!--��ർ����ʼ-->
			<TD align="center" id="frmTitle" vAlign="top" name="fmTitle" class="main_left">
			
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_left_top">
					<tr height="32">
						<td class="main_left_title" id="leftmenu_title">���ÿ�ݹ���</td>
					</tr>
				</table>
				
				<IFRAME frameBorder=0 id=frmleft name=frmleft src="main/left.jsp" class="left_iframe" allowTransparency="true"></IFRAME>
			
			</TD>
		  	<!--��ർ������-->
			
		  	<!--�رղ����ʼ-->
			<TD bgColor="#337ABB" style="WIDTH: 10px">
				<TABLE border="0" cellPadding="0" cellSpacing="0" height="100%">
					<TBODY>
						<TR>
							<TD onClick="switchSysBar()" style="HEIGHT: 100%">
								<SPAN class="navPoint" id="switchPoint" title="�ر�/������"><img src="skins/images/right.gif"></SPAN>
							</TD>
						</TR>
					</TBODY>
				</TABLE>
			</TD>
			<!--�رղ������-->
			
			<TD bgcolor="#337ABB" width="100%" vAlign=top>
				<!--����ͷ����ʼ-->
				<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#C4D8ED">
					<tr height="32">
						<td valign="top" width="10" background="skins/images/bg2.gif"><img src="skins/images/teble_top_left.gif" alt="" /></td>
						<td background="skins/images/bg2.gif">
							<span style="color:#c00; font-weight:bold; float:left;width:300px;" id="dvbbsannounce"></span>
						</td>
						<td align="right" valign="top" background="skins/images/bg2.gif" width="28" ><img src="skins/images/teble_top_right.gif" alt="" /></td>
						<td align="right" width="16" bgcolor="#337ABB"></td>
					</tr>
				</table>
				<!--����ͷ������-->
				<!--���Ŀ�ʼ-->
				<IFRAME frameBorder="0" id="frmright" name="frmright" scrolling="yes" src="main/context.jsp" class="main_iframe"></IFRAME>
				<!--���Ľ���-->
				<!--����β����ʼ-->
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#C4D8ED;">
					<tr>
						<td><img src="skins/images/teble_bottom_left.gif" alt="" width="5" height="6" /></td>
						<td align="right"><img src="skins/images/teble_bottom_right.gif" alt="" width="5" height="6" /></td>
						<td align="right" width="16" bgcolor="#337ABB"></td>
					</tr>
				</table>
				<!--����β������-->
			</TD>
		</TR>
	</TBODY>
</TABLE>

</body>
</html>

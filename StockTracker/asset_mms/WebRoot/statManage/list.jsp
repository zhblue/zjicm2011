<%@ page language="java"  pageEncoding="gbk"%>
<%@ page language="java"  import="com.mms.pojo.*"%>
<%@ page language="java"  import="java.util.*"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib uri="/WEB-INF/struts-logic.tld" prefix="logic"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��Ʊ�б�</title>
<link href="/asset_mms/skins/css/main.css" rel="stylesheet" type="text/css" />
<%
List lst = new ArrayList();
	String codes="";
	lst = (List)request.getAttribute("stock");
	for(int i=0;i<lst.size();i++)
	{
		Stock stc = new Stock();
		stc=(Stock)lst.get(i);
		if(i == lst.size() -1){
			codes += "sh"+stc.getStockCode();
		}else{
			codes += "sh"+stc.getStockCode()+',';
		}
		
	}	
%>
<script type="text/javascript" src="http://hq.sinajs.cn/list=<%=codes %>" charset="gb2312"></script>

<script type="text/javascript">
function stock_list(){
<%
	String s="";
	lst = (List)request.getAttribute("stock");
	for(int i=0;i<lst.size();i++)
	{
		Stock stc = new Stock();
		stc=(Stock)lst.get(i);
		s = stc.getStockCode();
%>
	for(var j = 0; j <32; j++){
	 
		var current = <%=s%>+"_"+j;
		var elements=hq_str_sh<%=s%>.split(",");
		if(document.getElementById(current)){
			document.getElementById(current).innerHTML = elements[j];
		}
	}
<%		 
	}
%>

}

</script>
</head>

<body onload="stock_list();" >
<form action="" method="post">
	    
		
		<table width="100%" border="0" align="center">
		<tr>
			<td height=23 width="5%" align="center">���</td>
		    <td height=23 width="8%" align="center">��Ʊ����</td>
		    <td height=23 width="8%" align="center">���տ��̼�</td>
			<td height=23 width="8%" align="center">�������̼�</td>
			<td height=23 width="8%" align="center">��ǰ�۸�</td>
			<td height=23 width="8%" align="center">������߼�</td>
			<td height=23 width="8%" align="center">������ͼ�</td>
			<td height=23 width="8%" align="center">�ɽ��Ĺ�Ʊ��</td>
			<td height=23 width="8%" align="center">����</td>
			<td height=23 width="8%" align="center">ʱ��</td>
			<td height=23 width="22%" align="center">ͼ��</td>
	    </tr>
	    
	    <%int i =0; %>
		<c:forEach items="${stock}" var="at">
		<%i++; %>
		<tr>
			<td height=23 width="5%" align="center" ><%=i %></td>
		    <td height=23 width="8%" align="center" id="${at.stockCode}_0"></td>
		    <td height=23 width="8%" align="center" id='${at.stockCode}_1'> </td>
			<td height=23 width="8%" align="center" id='${at.stockCode}_2'></td>
			<td height=23 width="8%" align="center" id='${at.stockCode}_3'></td>
			<td height=23 width="8%" align="center" id='${at.stockCode}_4'></td>
			<td height=23 width="8%" align="center" id='${at.stockCode}_5'></td>
			<td height=23 width="8%" align="center" id='${at.stockCode}_8'></td>
			<td height=23 width="8%" align="center" id='${at.stockCode}_30'></td>
			<td height=23 width="8%" align="center" id='${at.stockCode}_31'></td>
			<td height=23 width="22%" align="center" ><a href="/asset_mms/action/stock.do?method=getPic&id=${at.stockCode}&num=1" >��ʱ��</a>&nbsp;<a href="/asset_mms/action/stock.do?method=getPic&id=${at.stockCode}&num=2" >��K��ͼ</a>&nbsp;<a href="/asset_mms/action/stock.do?method=getPic&id=${at.stockCode}&num=3" >��K��</a>&nbsp;<a href="/asset_mms/action/stock.do?method=getPic&id=${at.stockCode}&num=4" >��K��</a></td>
		</tr>
		</c:forEach>
	    
	</table>
	<br/>
</form>
</body>
</html>

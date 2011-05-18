<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>公告与自定义板块</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>公告、自定义板块、广告代码</h2>
<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "saveCustom") {saveCustom();}

$query = 'select * from custom order by feid';
$result = mysql_query($query) or die ('错误：' . mysql_error());

while($rs=mysql_fetch_object($result)) {
	echo "<form method='post' action='custom.php?action=saveCustom&id=". $rs->feid ."'>";
	if ($rs->feid == 1) {
	echo '<div class="customList Notice">';
	echo '<p><strong>网站公告：</strong>公告是以弹层的形式出现的，只在首页出现，若想显示，先在网站设置里，把公告设为选中状态。</p>';
	echo "<input type='hidden' value='' name='fename' /> <input type='hidden' value='' name='fenameen' /> <input type='hidden' value='' name='felink' />\n";
	}else if ($rs->feid == 2) {
	echo '<div class="customList Custom">';
	echo "<p><strong>自定义板块：</strong></p>\n";
	echo "<p>板块名称：<input type='text' value='".$rs->fename."' name='fename' /> 英文名称：<input type='text' value='".$rs->fenameen."' name='fenameen' /> 更多链接：<input type='text' value='".$rs->felink."' name='felink' /></p>\n";
	}else {
	echo '<div class="customList Ad">';
	echo "<p><strong>广告代码".$rs->fename ."：</strong></p>\n";
	echo "<input type='hidden' value='".$rs->fename ."' name='fename' /> <input type='hidden' value='' name='fenameen' /> <input type='hidden' value='' name='felink' />\n";
	}
	echo "<p><textarea name='fecontent'>".htmlspecialchars(stripslashes($rs->fecontent))."</textarea></p>\n";
	echo '<p><input class="but" type="submit" value="确定" /> <input class="but" type="reset" value="还原" /></p>';
	echo "</div>\n";
	echo "</form>\n\n";
	if ($rs->feid == 1 || $rs->feid == 2) echo '<div class="line"></div>';
}


function saveCustom() {
	$id = $_GET['id'];
	$fename = addslashes($_POST['fename']);
	$fenameen = addslashes($_POST['fenameen']);
	$felink = addslashes($_POST['felink']);
	$fecontent = addslashes($_POST['fecontent']);
	//echo $id.",".$typeid.",".$typename.",".$typenameen .",".$postTypeurl.".";

	$sqlQuery = "update custom set fename = '$fename', fenameen = '$fenameen', felink = '$felink', fecontent = '$fecontent' where feid='$id'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='custom.php';</script>";
}
?>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
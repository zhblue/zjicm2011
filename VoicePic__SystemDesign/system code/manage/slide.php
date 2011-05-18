<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>幻灯管理</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function tSubmit(form){
	if(form.slideid.value==''){
		alert('序号！');
		form.slideid.focus();
		return false;
	}
	if(form.slideimg.value==''){
		alert('图片！');
		form.slideimg.focus();
		return false;
	}
	if(form.slideurl.value==''){
		alert('链接！');
		form.slideurl.focus();
		return false;
	}
	return true;
}
</script>
</head>
<?php if (isset($_GET['action']) && addslashes($_GET['action']) == "addslide") addslide(); ?>
<?php if (isset($_GET['action']) && addslashes($_GET['action']) == "edslide") edslide(); ?>
<?php if (isset($_GET['action']) && addslashes($_GET['action']) == "delslide") delslide(); ?>
<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>幻灯片管理</h2>

<?php

$query = 'select * from slide order by slideid, slideautoid';
$result = mysql_query($query) or die ('错误：' . mysql_error());

while($rs=mysql_fetch_object($result)) {
	$sImg = (substr($rs->slideimg,0,4) == "http") ? "$rs->slideimg" : "../$rs->slideimg";
	echo '<div class="slideList">';
	echo '<div class="slideL"><img src="'.$sImg.'" /></div>';
	echo '<div class="slideR">';
	echo '<form method="post" action="slide.php?action=edslide&id='.$rs->slideautoid.'">';
	echo '<p>排序：<input type="text" class="sort" value="'.$rs->slideid.'" name="slideid" /></p>';
	echo '<p>图片：</p><p><input type="text" value="'.$rs->slideimg.'" name="slideimg" /></p>';
	echo '<p>链接：</p><p><input type="text" value="'.$rs->slideurl.'" name="slideurl" /></p>';
	echo '<p><input type="submit" class="but" value="更改" name="upload" />';
	echo '<a href="slide.php?action=delslide&id='.$rs->slideautoid.'">删除</a></p>';
	echo '</form>';
	echo '</div>';
	echo "</div>";
}
?>
<div class="clear"></div>
<p>&nbsp;</p>
<?php
function addslide() {
	$slideid = addslashes($_POST['slideid']);
	$slideimg = addslashes($_POST['slideimg']);
	$slideurl = addslashes($_POST['slideurl']);
	$sqlQuery = "insert into slide (slideid, slideimg, slideurl) values ('$slideid', '$slideimg', '$slideurl')";
	mysql_query( $sqlQuery ) or die(mysql_error());
	makeXml();
	echo "<script type='text/javascript'>location='slide.php';</script>";
}

function edslide() {
	$id = $_GET['id'];
	$slideid = addslashes($_POST['slideid']);
	$slideimg = addslashes($_POST['slideimg']);
	$slideurl = addslashes($_POST['slideurl']);
	$sqlQuery = "update slide set slideid = '$slideid', slideimg = '$slideimg', slideurl = '$slideurl' where slideautoid='$id'";
	$result = MYSQL_QUERY($sqlQuery);
	makeXml();
	echo "<script type='text/javascript'>location='slide.php';</script>";
}

function delslide() {
	$id = $_GET['id'];
	$sql = "DELETE FROM slide where slideautoid = '$id'";
	$result = MYSQL_QUERY($sql);
	makeXml();
	echo "<script type='text/javascript'>location='slide.php';</script>";
}

function makeXml() {
	$slideXml = '<?xml version="1.0" encoding="utf-8" ?>'."\n";
	$slideXml .= '<data speed="4" but="160,220" center="0" rotundity="1,1,1,1" style="1">'."\n";
	$query = 'select * from slide order by slideid';
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	while($rs=mysql_fetch_object($result)) {
		$slideXml .= '	<video imgURL="'.$rs->slideimg.'" url="'.$rs->slideurl.'" />'."\n";
	}
	$slideXml .= '</data>';
	$makeFile = "../images/slide.xml";
	$handle = fopen($makeFile,"w"); //打开文件指针，创建文件
	if (!is_writable($makeFile)) die("<h4>生成幻灯xml失败，".$makeFile."不可写，请检查文件或目录属性后重试！</h4>");
	if (!fwrite($handle,$slideXml)) die("<h4>生成幻灯xml".$makeFile."失败！</h4>"); //将信息写入文件
	fclose($handle); //关闭指针
}
?>

<h2>新增幻灯图片</h2>
	<form method="post" action="slide.php?action=addslide" onsubmit="return tSubmit(this);">
		<div class="inBox">
			<label>图片序号：</label><input type="text" class="textC" name="slideid" />
			<div class="inBoxTxt"></div>
		</div>
		<div class="inBox">
			<label>图片地址：</label><input type="text" class="textB" name="slideimg" id="slideimg1" /> <input class="but1" type="button" value="上传图片" onclick="window.open('upimg.php','slideimg','width=270,height=350');" />
			图片最佳大小为宽222px，高250px
		</div>
		<div class="inBox">
			<label>图片链接：</label><input type="text" class="textB" name="slideurl" />
		</div>
		<div class="inEnd">
			<input type="submit" value="增加" />
		</div>
	</form>

<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
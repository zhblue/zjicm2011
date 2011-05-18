<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>相册管理</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function tSubmit(form){
	if(form.albumtype.value=='dafi'){
		alert('没有建立相册栏目！请先到栏目管理里去建立相册栏目。');
		form.albumtype.focus();
		return false;
	}
	if(form.albumtype.value==''){
		alert('没有选择相册栏目！');
		form.albumtype.focus();
		return false;
	}
	if(form.albumid.value==''){
		alert('请填写相册排序！');
		form.albumid.focus();
		return false;
	}
	if(form.albumname.value==''){
		alert('请填写相册名称！');
		form.albumname.focus();
		return false;
	}
	return true;
}
</script>
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>相册管理</h2>

<div class="aNav">
<?php
if (isset($_GET["type"])) echo '<a href="album.php">所有相册</a>';
else echo '<a href="album.php" class="selected">所有相册</a>';
$query2 = 'select * from ttype where outurl=2 order by typeid';
$result2 = mysql_query($query2) or die ('错误：' . mysql_error());
while($rs2=mysql_fetch_object($result2)) {
	if (isset($_GET["type"]) && $rs2->typeautoid == $_GET["type"]) echo ' | <a href="album.php?type='.$rs2->typeautoid.'" class="selected">'.$rs2->typename.'</a>';
	else echo ' | <a href="album.php?type='.$rs2->typeautoid.'">'.$rs2->typename.'</a>';
}
?>
</div>

<ul class="type typeTitle">
	<li>所属栏目</li>
	<li class="sort">相册排序</li>
	<li class="sort2">相册名称</li>
	<li>相册介绍</li>
	<li>相册图片</li>
	<li class="sort2">相册链接</li>
	<li class="short">修改</li>
	<li class="short">删除</li>
</ul>
<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "saveSet") saveSet();
if (isset($_GET['action']) && addslashes($_GET['action']) == "addType") addType();
if (isset($_GET['action']) && addslashes($_GET['action']) == "delType") delType();

$getType = (isset($_GET["type"])) ? 'where albumtype = '.$_GET["type"] : '';

$query = 'select * from album '.$getType.' order by albumid';
$result = mysql_query($query) or die ('错误：' . mysql_error());

while($rs=mysql_fetch_object($result)) {
	if ($count % 2 == 0) echo '<ul class="type">';
	else echo '<ul class="type even">';
?>

	<form method="post" action="album.php?action=saveSet&id=<?php echo $rs->albumautoid ; ?>">
	<li><select name="albumtype">
<?php
$query1 = 'select typeautoid,typename from ttype where outurl = 2 order by typeid';
$result1 = mysql_query($query1);
	while($rs1=mysql_fetch_object($result1)) {
		$selected = ($rs->albumtype == $rs1->typeautoid) ? ' selected="selected"' : '';
		echo '<option value="'.$rs1->typeautoid.'"'.$selected.'>'.$rs1->typename.'</option>';
	}
?>
			</select></li>
	<li class="sort"><input type="text" value="<?php echo $rs->albumid; ?>" name="albumid" /></li>
	<li class="sort2"><input type="text" value="<?php echo $rs->albumname; ?>" name="albumname" /></li>
	<li><input type="text" value="<?php echo $rs->albuminfo; ?>" name="albuminfo" /></li>
	<li><input type="text" value="<?php echo $rs->albumcover; ?>" name="albumcover" /></li>
	<li class="sort2"><input type="text" value="<?php echo $rs->albumlink; ?>" name="albumlink" /></li>
	<li class="short"><input type="submit" value="修改" /></li>
	<li class="short"><a href="album.php?action=delType&id=<?php echo $rs->albumautoid; ?>" onclick="return confirm('真的要删除?')">删除</a></li>
	</form>
</ul>

<?php
}
?>

<div class="space"></div>
<h2>新增相册</h2>
<form method="post" action="album.php?action=addType" onsubmit="return tSubmit(this);">
		<div class="inBox">
			<label>所属栏目：</label> &nbsp; 
			<select name="albumtype">
<?php
$query1 = 'select typeautoid,typename from ttype where outurl = 2 order by typeid';
$result1 = mysql_query($query1);
	if (mysql_num_rows($result1)<1) echo '<option value="dafi">无相册，请先添加相册栏目</option>';
	else echo '<option selected="selected" value="">请选择栏目</option>';
	while($rs1=mysql_fetch_object($result1)) {
		echo '<option value="'.$rs1->typeautoid.'">'.$rs1->typename.'</option>';
	}
?>
			</select>
		</div>
		<div class="inBox">
			<label>相册排序：</label><input type="text" class="textC" name="albumid" />
		</div>
		<div class="inBox">
			<label>相册名称：</label><input type="text" class="textB" name="albumname" />
		</div>
		<div class="inBox">
			<label>相册介绍：</label><input type="text" class="textA" name="albuminfo" />
		</div>
		<div class="inBox">
			<label>相册图片：</label><input type="text" class="textB" name="albumcover" value="http://" />
		</div>
		<div class="inBox">
			<label>链接地址：</label><input type="text" class="textB" name="albumlink" value="http://" />
		</div>
		<div class="inEnd">
			<input type="submit" value="添加" />
			<input type="reset" value="取消" />
		</div>
</form>

<?php
function saveSet() {
	$id = $_GET['id'];
	$albumid = addslashes($_POST['albumid']);
	$albumtype = addslashes($_POST['albumtype']);
	$albumname = addslashes($_POST['albumname']);
	$albuminfo = addslashes($_POST['albuminfo']);
	$albumcover = addslashes($_POST['albumcover']);
	$albumlink = addslashes($_POST['albumlink']);
	$sqlQuery = "update album set albumid = '$albumid', albumtype = '$albumtype', albumname = '$albumname', albuminfo = '$albuminfo', albumcover = '$albumcover', albumlink = '$albumlink' where albumautoid='$id'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='album.php';</script>";
}


function addType() {
	$albumid = addslashes($_POST['albumid']);
	$albumtype = addslashes($_POST['albumtype']);
	$albumname = addslashes($_POST['albumname']);
	$albuminfo = addslashes($_POST['albuminfo']);
	$albumcover = addslashes($_POST['albumcover']);
	$albumlink = addslashes($_POST['albumlink']);
	$albumdate = date("y-m-d H:i:s");
	//echo $postalbumlink . "|" . $postalbumlink1. "|" .$albumlink ."\n";
	$sqlQuery = "insert into album (albumid, albumtype, albumname, albuminfo, albumcover, albumlink, albumdate) VALUES ('$albumid','$albumtype','$albumname','$albuminfo', '$albumcover', '$albumlink', '$albumdate')";
	mysql_query( $sqlQuery ) or die(mysql_error());
	echo "<script type='text/javascript'>location='album.php';</script>";
}


function delType() {
	$id = $_GET['id'];
	$sql = "delete from album where albumautoid = '$id'";
	$result = MYSQL_QUERY($sql);
	echo "<script type='text/javascript'>location='album.php';</script>";
}
?>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
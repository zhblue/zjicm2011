<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>友情链接</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function tSubmit(form){
	if(form.lname.value==''){
		alert('链接名称！');
		form.lname.focus();
		return false;
	}
	if(form.lsite.value==''){
		alert('链接地址！');
		form.lsite.focus();
		return false;
	}
	return true;
}
</script>
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>未审核的友情链接</h2>

<ul class="linkList linkTitle">
	<li class="l1">排序</li>
	<li class="l2">网站名称</li>
	<li>网站介绍</li>
	<li>网站地址</li>
	<li>网站图片</li>
	<li class="l2">申请时间</li>
	<li class="l3">审核</li>
	<li class="l4">修改</li>
	<li class="l3">删除</li>
</ul>
<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "saveLink") saveLink();
if (isset($_GET['action']) && addslashes($_GET['action']) == "addLink") addLink();
if (isset($_GET['action']) && addslashes($_GET['action']) == "delLink") delLink();
if (isset($_GET['action']) && addslashes($_GET['action']) == "shLink") shLink();
function saveLink() {
	$id = $_GET['id'];
	$lsort = addslashes($_POST['lsort']);
	$lname = addslashes($_POST['lname']);
	$linfo = addslashes($_POST['linfo']);
	$lsite = addslashes($_POST['lsite']);
	$llogo = (isset($_POST['llogo'])) ? ", llogo = '".$_POST['llogo']."'" : "";
	$lset = $_POST['linkSet'];

	$sqlQuery = "update flink set lsort = '$lsort', lname = '$lname', linfo = '$linfo', lsite = '$lsite', lset ='$lset'".$llogo." where lid='$id'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='link.php';</script>";
}


function shLink() {	
	$id = $_GET['id'];
	$lset = $_GET['lset'];
	$sqlQuery = "update flink set lset ='$lset' where lid='$id'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='link.php';</script>";
}


function addLink() {
	$postlogo = "";
	$postlogo1 = "";
	$llogo = addslashes($_POST['llogo']);
	$ltype = addslashes($_POST['ltype']);
	if ($ltype == 1) {
		$postlogo = ", llogo";
		$postlogo1 = ",'".$llogo."'";
	}
	$lsort = addslashes($_POST['lsort']);
	$lname = addslashes($_POST['lname']);
	$linfo = addslashes($_POST['linfo']);
	$lsite = addslashes($_POST['lsite']);
	$lset = addslashes($_POST['lset']);
	$ldate = date("y-m-d H:i:s");

	$sqlQuery = "insert into flink (lsort, lname, linfo, lsite, ltype, lset, ldate ".$postlogo.") values ('$lsort', '$lname', '$linfo', '$lsite', '$ltype', '$lset', '$ldate'".$postlogo1.")";
	/*echo "<script type='text/javascript'>location='link.php';</script>";*/
	mysql_query( $sqlQuery ) or die(mysql_error());
}


function delLink() {
	$id = $_GET['id'];
	$sql = "DELETE FROM flink where lid = '$id'";
	$result = MYSQL_QUERY($sql);
	echo "<script type='text/javascript'>location='link.php';</script>";
}

$query = 'select * from flink where lset = 0 order by ldate desc';
$result = mysql_query($query) or die ('错误：' . mysql_error());

while($rs=mysql_fetch_object($result)) {
if ($count % 2 == 0) echo '<ul class="linkList">';
else echo '<ul class="linkList even">';
?>
<form method="post" action="link.php?action=saveLink&id=<?php echo $rs->lid; ?>">
<li class="l1"><input type="text" value="<?php echo $rs->lsort; ?>" name="lsort" /></li>
<li class="l2"><input type="text" value="<?php echo $rs->lname; ?>" name="lname" /></li>
<li><input type="text" value="<?php echo $rs->linfo; ?>" name="linfo" /></li>
<li><input type="text" value="<?php echo $rs->lsite; ?>" name="lsite" /></li>
<?php
if ($rs->ltype == 1) echo '<li><input type="text" value="'.$rs->llogo.'" name="llogo" /></li>'."\n";
else echo '<li>非图片链接</li>'."\n";
?>
<li class="l2"><?php echo $rs->ldate; ?></li>
<li class="l3"><a href="link.php?action=shLink&lset=1&id=<?php echo $rs->lid; ?>">审核通过</a><input type="hidden" name="linkSet" value="<?php echo $rs->lset; ?>" /></li>
<li class="l4"><input type="submit" value="修改" /></li>
</form>
<li class="l3"><a href="link.php?action=delLink&id=<?php echo $rs->lid; ?>" onclick="return confirm('真的要删除?')">删除</a></li>
</ul>
<?php
}
?>

<div class="space"></div>

<h2>已审核的友情链接</h2>
<ul class="linkList linkTitle">
	<li class="l1">排序</li>
	<li class="l2">网站名称</li>
	<li>网站介绍</li>
	<li>网站地址</li>
	<li>网站图片</li>
	<li class="l2">申请时间</li>
	<li class="l3">审核</li>
	<li class="l4">修改</li>
	<li class="l3">删除</li>
</ul>
<?php
$query1 = 'select * from flink where lset = 1 order by lsort';
$result1 = mysql_query($query1) or die ('错误：' . mysql_error());
$i = 0;
while($rs1=mysql_fetch_object($result1)) {
if ($i % 2 == 0) echo '<ul class="linkList">';
else echo '<ul class="linkList even">';
?>
<form method="post" action="link.php?action=saveLink&id=<?php echo $rs1->lid; ?>">
<li class="l1"><input type="text" value="<?php echo $rs1->lsort; ?>" name="lsort" /></li>
<li class="l2"><input type="text" value="<?php echo $rs1->lname; ?>" name="lname" /></li>
<li><input type="text" value="<?php echo $rs1->linfo; ?>" name="linfo" /></li>
<li><input type="text" value="<?php echo $rs1->lsite; ?>" name="lsite" /></li>
<?php
if ($rs1->ltype == 1) echo '<li><input type="text" value="'.$rs1->llogo.'" name="llogo" /></li>'."\n";
else echo '<li>非图片链接</li>'."\n";
?>
<li class="l2"><?php echo $rs1->ldate; ?> </li>
<li class="l3"><a href="link.php?action=shLink&lset=0&id=<?php echo $rs1->lid; ?>">取消通过</a><input type="hidden" name="linkSet" value="<?php echo $rs1->lset; ?>" /></li>
<li class="l4"><input type="submit" value="修改" /></li>
</form>
<li class="l3"><a href="link.php?action=delLink&id=<?php echo $rs1->lid; ?>" onclick="return confirm('真的要删除?')">删除</a></li>
</ul>
<?php
	$i ++;
}
?>

<div class="space"></div>
<h2>添加友情链接</h2>
	<form method="post" action="link.php?action=addLink" onsubmit="return tSubmit(this);">
		<div class="inBox">
			<label>链接排序：</label><input type="text" class="textC" name="lsort" />
		</div>
		<div class="inBox">
			<label>链接名称：</label><input type="text" class="textB" name="lname" />
		</div>
		<div class="inBox">
			<label>链接介绍：</label><input type="text" class="textA" name="linfo" />
		</div>
		<div class="inBox">
			<label>链接地址：</label><input type="text" class="textA" name="lsite" />
		</div>
		<div class="inBox">
			<label>图片链接：</label>
			<div class="inBoxTxt">
			<input type="radio" value="1" name="ltype" id="ltype1" onclick="document.getElementById('logoShow').style.display='';" /><label for="ltype1">是</label> <input type="radio" value="0" name="ltype" id="ltype0" onclick="document.getElementById('logoShow').style.display='none';" checked="checked" /><label for="ltype0">否</label>
			</div>
		</div>
		<div class="inBox" id="logoShow" style="display:none;">
			<label>图片地址：</label><input class="textA" type="text" name="llogo" value="http://" />
		</div>
		<div class="inBox">
			<label>通过审核：</label>
			<div class="inBoxTxt">
			<input type="radio" value="1" name="lset" id="lset1" checked="checked" /><label for="lset1">是</label> <input type="radio" value="0" name="lset" id="lset0" /><label for="lset0">否</label>
			</div>
		</div>
		<div class="inEnd">
			<input type="submit" value="添加" />
			<input type="reset" value="取消" />
		</div>
	</form>

<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统设置</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>网站设置</h2>
<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "saveSet") saveSet();

$query = 'SELECT * FROM tsystem where tsystemid = "1"';
$result = mysql_query($query) or die ('错误：' . mysql_error());
$rs=mysql_fetch_object($result);
?>

<form method='post' action='system.php?action=saveSet'>
		<div class="inBox">
			<label>网站名称：</label><input type='text' class="textB" value='<?php echo $rs->webname; ?>' name='webname' />
		</div>
		<div class="inBox">
			<label>网站介绍：</label><input type='text' class="textA" value='<?php echo $rs->webint; ?>' name='webint' />
		</div>
		<div class="inBox">
			<label>网站域名：</label><input type='text' class="textB" value='<?php echo $rs->weburl; ?>' name='weburl' />
		</div>
		<div class="inBox">
			<label>管理员帐号：</label><input type='text' class="textB" value='<?php echo $rs->adminacc; ?>' name='adminacc' />
		</div>
		<div class="inBox">
			<label>管理员密码：</label><input type='password' class="textB" value='<?php echo $rs->adminpass; ?>' name='adminpass' />
		</div>
		<div class="inBox">
			<label>管理员邮箱：</label><input type='text' class="textB" value='<?php echo $rs->adminmail; ?>' name='adminmail' />
		</div>
		<div class="inBox">
			<label>留言评论审核：</label>
<?php
if ($rs->setleave=="1") {
echo '
			<div class="inBoxTxt"><input type="radio" value="1" name="setleave" id="yes1" checked="checked" /><label for="yes1">需要</label> <input type="radio" value="0" name="setleave" id="no1" /><label for="no1">不需要</label></div>
';
}else {
echo '
			<div class="inBoxTxt"><input type="radio" value="1" name="setleave" id="yes1" /><label for="yes1">需要</label> <input type="radio" value="0" name="setleave" id="no1" checked="checked" /><label for="no1">不需要</label>	</div>
';
}
?>
		</div>
		<!--<div class="inBox">
			<label>网站公告：</label>
<?php
	if ($rs->shownotice=="1") {
		echo '
			<div class="inBoxTxt"><input type="radio" value="1" name="shownotice" id="yes2" checked="checked" /><label for="yes2">显示</label><input type="radio" value="0" name="shownotice" id="no2" /><label for="no2">隐藏</label></div>
';
	}else {
		echo '
			<div class="inBoxTxt"><input type="radio" value="1" name="shownotice" id="yes2" /><label for="yes2">显示</label><input type="radio" value="0" name="shownotice" id="no2" checked="checked" /><label for="no2">隐藏</label></div>
';
	}
?>
		</div>-->
		<div class="inBox">
			<label>热门条件：</label><input type='text' class="textC" value='<?php echo $rs->articlehot; ?>' name='articlehot' />
			<div class="inBoxTxt">点击率	</div>
		</div>
		<div class="inBox">
			<label>最新文章：</label><input type='text' class="textC" value='<?php echo $rs->articlenew; ?>' name='articlenew' />
			<div class="inBoxTxt">天内发表的文章</div>
		</div>
		<div class="inBox">
			<label>每页显示：</label><input type='text' class="textC" value='<?php echo $rs->howpage; ?>' name='howpage' />
			<div class="inBoxTxt">篇文章（栏目页）</div>
		</div>
		<div class="inBox">
			<label>备案号：</label><input type='text' class="textB" value='<?php echo $rs->webicp; ?>' name='webicp' />
		</div>
		<div class="inEnd">
			<input type="submit" value="确定" />
			<input type="reset" value="取消" />
		</div>
</form>


<?php
function saveSet() {
$query1 = 'select adminpass from tsystem where tsystemid = "1"';
$result1 = mysql_query($query1) or die ('错误：' . mysql_error());
$adpass = mysql_fetch_object($result1)->adminpass;
	$webname = addslashes($_POST['webname']);
	$weburl = addslashes($_POST['weburl']);
	$webint = addslashes($_POST['webint']);
	$adminacc = addslashes($_POST['adminacc']);
	$adminpass = ($_POST['adminpass'] != $adpass) ? md5($_POST['adminpass']) : $_POST['adminpass'];
	$adminmail = addslashes($_POST['adminmail']);
	$setleave = addslashes($_POST['setleave']);
	$articlehot = addslashes($_POST['articlehot']);
	$articlenew = addslashes($_POST['articlenew']);
	$howpage = addslashes($_POST['howpage']);
	//$shownotice = addslashes($_POST['shownotice']);
	$webicp = addslashes($_POST['webicp']);

	$sqlQuery = "update tsystem set webname = '$webname', weburl = '$weburl', webint = '$webint', adminacc = '$adminacc', adminpass = '$adminpass', adminmail = '$adminmail', setleave = '$setleave', articlehot = '$articlehot', articlenew = '$articlenew', howpage = '$howpage', webicp = '$webicp'";
	//$sqlQuery = "update tsystem set webname = '$webname', weburl = '$weburl', webint = '$webint', adminacc = '$adminacc', adminpass = '$adminpass', adminmail = '$adminmail', setleave = '$setleave', articlehot = '$articlehot', articlenew = '$articlenew', howpage = '$howpage', shownotice = '$shownotice', webicp = '$webicp'";
	/*echo "<script type='text/javascript'>location='system.php';</script>";*/
	$result = MYSQL_QUERY($sqlQuery);
}
?>

<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
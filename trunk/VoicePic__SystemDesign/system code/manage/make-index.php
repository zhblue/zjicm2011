<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/temp.php"); ?>
<?php include_once("../include/function.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电脑语音早教系统</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<?php
$makeTitle = (isset($_GET['make']) && addslashes($_GET['make']) == "index") ? '生成首页' : '生成全站';
echo '<h2>'.$makeTitle.'</h2>';

if (isset($_GET['make']) && addslashes($_GET['make']) == "index") {
	templates();
	makeIndex();
}

if (isset($_GET['make']) && addslashes($_GET['make']) == "all") makeAll();

function makeAll() {
	echo '<div class="space"></div>
	<iframe class="makeFrame" frameborder="0" src="make-index.php?make=index"></iframe>
	<iframe class="makeFrame" frameborder="0" src="make-column.php?make=all"></iframe>
	<iframe class="makeFrame" frameborder="0" src="make-article.php?make=all"></iframe>';
}
?>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
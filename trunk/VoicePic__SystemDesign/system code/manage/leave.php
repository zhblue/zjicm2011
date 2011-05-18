<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php
include_once("../include/conn.php");
require("../include/page.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言管理</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function show(showId) {
	document.getElementById(showId).style.display='';
}
function hide(hideId) {
	document.getElementById(hideId).style.display='none';
}
</script>
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>留言管理</h2>

<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "edit") edit();
if (isset($_GET['action']) && addslashes($_GET['action']) == "del") del();
if (isset($_GET['action']) && addslashes($_GET['action']) == "myRe") myRe();
if (isset($_GET['action']) && addslashes($_GET['action']) == "verify") verify();

$page = isset($_GET['p']) ? intval($_GET['p']):1;

$query1 = 'SELECT * FROM guestbook';
$total = mysql_num_rows(mysql_query($query1)); 
$pagenum=ceil($total/10);

if($page>$pagenum || $page == 0){
       echo "没有这一页";
       exit;
}
$offset=($page-1)*10;//limit第一个参数的值，假如第一页则为(1-1)*10=0,第二页为(2-1)*10=10。

$query = 'SELECT * FROM guestbook order by guestVerify,guestId desc limit '.$offset.',10';
$result = mysql_query($query) or die ('错误：' . mysql_error());

while($rs=mysql_fetch_object($result)) {
$setVerify = ($rs->guestVerify == 0) ? '<a href="leave.php?id='.$rs->guestId.'&action=verify&verify=1" class="verify">通过审核</a>' : '<a href="leave.php?id='.$rs->guestId.'&action=verify&verify=0">取消审核</a>'
?>


<div class="leaveList" id="list<?php echo $rs->guestId; ?>">
	<div class="leaveG">
		No.<?php echo $rs->guestId; ?> | <span><?php echo $rs->guestDate; ?></span> | <strong><?php echo $rs->guestName; ?></strong> | 头像<?php echo $rs->guestHead; ?> | <?php echo $rs->guestContact; ?> | <a href="<?php echo $rs->guestUrl; ?>" target="_blank"><?php echo $rs->guestUrl; ?></a>
	</div>
	<div class="leaveS">
		<?php echo $setVerify; ?> | <a href="javascript:show('re<?php echo $rs->guestId; ?>');hide('myRe<?php echo $rs->guestId; ?>');">回复</a> | <a href="javascript:show('edit<?php echo $rs->guestId; ?>');hide('list<?php echo $rs->guestId; ?>');">编辑</a> | IP：<a href="http://www.baidu.com/s?&wd=<?php echo $rs->guestIp; ?>" target="_blank"><?php echo $rs->guestIp; ?></a> | <a href="leave.php?id=<?php echo $rs->guestId; ?>&action=del" onclick="return confirm('真的要删除?')"><strong>×</strong></a>
	</div>
	<div class="leaveC">
		<?php echo $rs->guestContent; ?>
	</div>
	<div id="myRe<?php echo $rs->guestId; ?>">
<?php if (strlen($rs->myRe) > 3) {
echo '<div class="leaveC leaveRe">我的回复：'.htmlspecialchars(stripslashes($rs->myRe)).'</div>';
} ?>
	</div>
	<div class="leaveC" style="display:none;" id="re<?php echo $rs->guestId; ?>">
		<form method="post" action="leave.php?action=myRe&id=<?php echo $rs->guestId; ?>">
		<p><textarea name="myRe1"><?php echo htmlspecialchars(stripslashes($rs->myRe)); ?></textarea></p>
		<p><input type="submit" value="回复" /> <input type="reset" value="取消" onclick="hide('re<?php echo $rs->guestId; ?>');show('myRe<?php echo $rs->guestId; ?>');" /></p>
		</form>
	</div>
</div>

<div class="leaveList" style="display:none;" id="edit<?php echo $rs->guestId; ?>">
	<form method="post" action="leave.php?action=edit&guestId=<?php echo $rs->guestId; ?>">
	<div class="leaveG">
		No.<?php echo $rs->guestId; ?> | 
		时间：<input type="text" value="<?php echo $rs->guestDate; ?>" name="guestDate" /> | 
		名称：<input type="text" value="<?php echo $rs->guestName; ?>" name="guestName" />  | 
		头像：<input type="text" value="<?php echo $rs->guestHead; ?>" class="short" name="guestHead" /> | 
		联系方式：<input type="text" value="<?php echo $rs->guestContact; ?>" name="guestContact" /> |  
		网站：<input type="text" value="<?php echo $rs->guestUrl; ?>" name="guestUrl" />
	</div>
	<div class="leaveS">
		<a href="javascript:show('list<?php echo $rs->guestId; ?>');hide('edit<?php echo $rs->guestId; ?>');">返回</a> | IP：<input type="text" value="<?php echo $rs->guestIp; ?>" name="guestIp" />
	</div>
	<div class="leaveC">
		<p><textarea name="guestContent"><?php echo htmlspecialchars(stripslashes($rs->guestContent)); ?></textarea></p>
		<p><input type="submit" value="修改" /> <input type="reset" value="取消" onclick="show('list<?php echo $rs->guestId; ?>');hide('edit<?php echo $rs->guestId; ?>');" /> 请注意！现在是HTML代码模式！</p>
	</div>
	</form>
</div>

<?php
}
if ($total < 1) {
	echo "没有数据";
}else {
	echo '<div class="space"></div>';
	echo '<div class="page">';
	$page_size=10;
	$nums=$total;
	$sub_pages=10;
	$pageCurrent=$page;
	$subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"leave.php?p=");
	echo '</div>';
}
?>

<?php
function del() {
	$guestId = $_GET['id'];
	$sql = "DELETE FROM guestbook WHERE guestId = '$guestId'";
	$result = MYSQL_QUERY($sql);
	echo "<script type='text/javascript'>location='leave.php';</script>";
}

function edit() {
	$guestId = $_GET['guestId'];
	$guestName = addslashes($_POST['guestName']);
	$guestHead = addslashes($_POST['guestHead']);
	$guestDate = addslashes($_POST['guestDate']);
	$guestContact = addslashes($_POST['guestContact']);
	$guestUrl = addslashes($_POST['guestUrl']);
	$guestIp = addslashes($_POST['guestIp']);
	$guestContent = addslashes($_POST['guestContent']);

	$sqlQuery = "update guestbook set guestName = '$guestName', guestHead = '$guestHead', guestDate = '$guestDate', guestContact = '$guestContact', guestUrl = '$guestUrl', guestIp = '$guestIp', guestContent = '$guestContent' where guestId='$guestId'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='leave.php';</script>";
}

function myRe() {
	$guestId = $_GET['id'];
	$myRe = addslashes($_POST['myRe1']);
	$sqlQuery = "update guestbook set myRe = '$myRe', guestVerify='1' where guestId='$guestId'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='leave.php';</script>";
}

function verify() {
	$guestId = $_GET['id'];
	$guestVerify = $_GET['verify'];
	$sqlQuery = "update guestbook set guestVerify = '$guestVerify' where guestId='$guestId'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='leave.php';</script>";
}
?>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
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
<title>评论管理</title>
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
<h2>评论管理</h2>

<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "edit") edit();
if (isset($_GET['action']) && addslashes($_GET['action']) == "del") del();
if (isset($_GET['action']) && addslashes($_GET['action']) == "myRe") myRe();
if (isset($_GET['action']) && addslashes($_GET['action']) == "verify") verify();

$page = isset($_GET['p']) ? intval($_GET['p']):1;

$query1 = 'SELECT * from comment';
$total = mysql_num_rows(mysql_query($query1)); 
$pagenum=ceil($total/10);

if($page>$pagenum || $page == 0){
       echo "没有这一页";
       exit;
}
$offset=($page-1)*10;//limit第一个参数的值，假如第一页则为(1-1)*10=0,第二页为(2-1)*10=10。

$query = 'select * from comment order by comverify,comid desc limit '.$offset.',10';
$result = mysql_query($query) or die ('错误：' . mysql_error());

while($rs=mysql_fetch_object($result)) {
$setVerify = ($rs->comverify == 0) ? '<a href="comment.php?id='.$rs->comid.'&action=verify&verify=1" class="verify">通过审核</a>' : '<a href="comment.php?id='.$rs->comid.'&action=verify&verify=0">取消审核</a>'
?>


<div class="leaveList" id="list<?php echo $rs->comid; ?>">
	<div class="leaveG">
		No.<?php echo $rs->comid; ?> | <span><?php echo $rs->comdate; ?></span> | <strong><?php echo $rs->comname; ?></strong>
	</div>
	<div class="leaveS">
		<?php echo $setVerify; ?> | <a href="javascript:show('edit<?php echo $rs->comid; ?>');hide('list<?php echo $rs->comid; ?>');">编辑</a> | IP：<a href="http://www.baidu.com/s?&wd=<?php echo $rs->comip; ?>" target="_blank"><?php echo $rs->comip; ?></a> | <a href="comment.php?id=<?php echo $rs->comid; ?>&action=del" onclick="return confirm('真的要删除?')"><strong>×</strong></a>
	</div>
	<div class="leaveC">
		<?php echo $rs->comcontent; ?>
	</div>
	<div class="leaveC" style="display:none;" id="re<?php echo $rs->comid; ?>">
		<form method="post" action="comment.php?action=myRe&id=<?php echo $rs->comid; ?>">
		<p><textarea name="myRe1"><?php echo htmlspecialchars(stripslashes($rs->myRe)); ?></textarea></p>
		<p><input type="submit" value="回复" /> <input type="reset" value="取消" onclick="hide('re<?php echo $rs->comid; ?>');show('myRe<?php echo $rs->comid; ?>');" /></p>
		</form>
	</div>
</div>

<div class="leaveList" style="display:none;" id="edit<?php echo $rs->comid; ?>">
	<form method="post" action="comment.php?action=edit&comid=<?php echo $rs->comid; ?>">
	<div class="leaveG">
		No.<?php echo $rs->comid; ?> | 
		时间：<input type="text" value="<?php echo $rs->comdate; ?>" name="comdate" /> | 
		名称：<input type="text" value="<?php echo $rs->comname; ?>" name="comname" />
	</div>
	<div class="leaveS">
		<a href="javascript:show('list<?php echo $rs->comid; ?>');hide('edit<?php echo $rs->comid; ?>');">返回</a> | IP：<input type="text" value="<?php echo $rs->comip; ?>" name="comip" />
	</div>
	<div class="leaveC">
		<p><textarea name="comcontent"><?php echo htmlspecialchars(stripslashes($rs->comcontent)); ?></textarea></p>
		<p><input type="submit" value="修改" /> <input type="reset" value="取消" onclick="show('list<?php echo $rs->comid; ?>');hide('edit<?php echo $rs->comid; ?>');" /> 请注意！现在是HTML代码模式！</p>
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
	$subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"comment.php?p=");
	echo '</div>';
}
?>

<?php
function del() {
	$id = $_GET['id'];
	$sql = "delete from comment where comid = '$id'";
	$result = MYSQL_QUERY($sql);
	echo "<script type='text/javascript'>alert('删除成功！');history.go(-1);</script>";
}

function edit() {
	$comid = $_GET['comid'];
	$comname = addslashes($_POST['comname']);
	$comdate = addslashes($_POST['comdate']);
	$comip = addslashes($_POST['comip']);
	$comcontent = addslashes($_POST['comcontent']);

	$sqlQuery = "update comment set comname = '$comname', comdate = '$comdate', comip = '$comip', comcontent = '$comcontent' where comid='$comid'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='comment.php';</script>";
}

function verify() {
	$comid = $_GET['id'];
	$comverify = $_GET['verify'];
	$sqlQuery = "update comment set comverify = '$comverify' where comid='$comid'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='comment.php';</script>";
}
?>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
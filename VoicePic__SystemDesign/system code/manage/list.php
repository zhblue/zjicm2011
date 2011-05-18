<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章列表</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>文章管理</h2>

<?php
function del() {
	$aid = $_GET['aid'];
	$sql = "delete from article where aid = '$aid'";
	$result = MYSQL_QUERY($sql);
	echo "<script type='text/javascript'>location='list.php';</script>";
}

function edit() {
	$aid = $_GET['aid'];
	$atitle = addslashes($_POST['atitle']);
	$adate = addslashes($_POST['adate']);
	if (isset($_POST['atop'])) $atop = addslashes($_POST['atop']);
	else $atop = "0";
	$apv = addslashes($_POST['apv']);
	$sqlQuery = "update article set atitle = '$atitle', adate = '$adate', atop = '$atop', apv = '$apv' where aid='$aid'";
	$result = MYSQL_QUERY($sqlQuery);
	echo '<h3>修改成功</h3><h4>生成以下静态页面： &nbsp; <a href="list.php">关闭</a></h4><iframe class="makeFrame" frameborder="0" src="make-article.php?make=only&makeId='.$aid.'"></iframe>';
}
?>

<div class="aNav">
<?php
if (isset($_GET["type"])) echo '<a href="list.php">所有栏目</a>';
else echo '<a href="list.php" class="selected">所有栏目</a>';

$query2 = 'select typeautoid,typename from ttype where outurl=0 and typeleave=1 order by typefather, typeid';
$result2 = mysql_query($query2) or die ('错误：' . mysql_error());
while($rs2=mysql_fetch_object($result2)) {
	if (isset($_GET["type"]) && $rs2->typeautoid == $_GET["type"]) echo ' | <a href="list.php?type='.$rs2->typeautoid.'" class="selected">'.$rs2->typename.'</a>';
	else echo ' | <a href="list.php?type='.$rs2->typeautoid.'">'.$rs2->typename.'</a>';
}
?>
</div>


<?php
include("../include/page.php");
$page = isset($_GET['p']) ? intval($_GET['p']):1;

$aPage = " limit 0,20";
if (isset($_GET['p'])) {
	$offset = ($_GET["p"]-1)*20;
	$aPage = " limit $offset,20";
}

if (isset($_GET["type"])) {
	$getType = " where atypeid = $_GET[type]";
	$typeUrl = 'type='.$_GET["type"].'&';
}else {
	$getType = '';
	$typeUrl = '';
}

$query1 = 'select aid from article'.$getType;
$total = mysql_num_rows(mysql_query($query1)); 
$pagenum=ceil($total/20);
if($page>$pagenum || $page == 0){
	echo '<br /><br /><p>无此页，或此栏目下无文章</p>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>';
	exit;
}
?>

<ul class="aList aTitle">
	<li class="l1">序号</li>
	<li class="l2">标题</li>
	<li>浏览量</li>
	<li>时间</li>
	<li>置顶</li>
	<li>提交</li>
	<li>内容</li>
	<li>浏览</li>
	<li class="del">删除</li>
</ul>
<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "edit") edit();
if (isset($_GET['action']) && addslashes($_GET['action']) == "del") del();

$query = 'SELECT * FROM article '.$getType.' order by atop desc, aid desc'.$aPage;
$result = mysql_query($query) or die ('错误：' . mysql_error());

$count = 0;
while($rs=mysql_fetch_object($result)) {
if ($count % 2 == 0) echo '<ul class="aList">';
else echo '<ul class="aList even">';
?>
<form method="post" action="list.php?action=edit&aid=<?php echo $rs->aid; ?>">
<li class="l1"><?php echo $rs->aid; ?></li>
<li class="l2"><input text="text" value="<?php echo $rs->atitle; ?>" name="atitle" maxlength="68" /></li>
<li><input text="text" value="<?php echo $rs->apv; ?>" name="apv" maxlength="8" /></li>
<li><input text="text" value="<?php echo $rs->adate; ?>" name="adate" maxlength="20" /></li>
<?php
if ($rs->atop == 1) echo '<li><input type="checkbox" value="1" name="atop" class="atop" checked="checked" /></li>';
else echo '<li><input type="checkbox" value="1" name="atop" class="atop" /></li>';
?>
<li><input type="submit" class="but" value="修改" /></li>
</form>
<li><a href="editor.php?action=edit&aid=<?php echo $rs->aid; ?>">编辑</a></li>
<li><a href="../article/<?php echo date("y-m-d",strtotime($rs->adate)).'/'.$rs->aid; ?>.html" target="_blank">查看</a></li>
<li class="del"><a href="list.php?aid=<?php echo $rs->aid; ?>&action=del" onclick="return confirm('真的要删除？')">删除</a></li>
</ul>
<?php
$count++;
}
?>

<div class="space"></div>
<div class="page">
<?php
$page_size=20;
$nums=$total;
$sub_pages=10;
$pageCurrent=$page;
/*if (isset($_GET['type']) $subPages = new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"type.php?type=$_GET[type]&p=");
else */$subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"list.php?".$typeUrl."p=");
?>
</div>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
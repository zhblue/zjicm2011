<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/temp.php"); ?>
<?php include_once("../include/function.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>生成HTML</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>生成文章</h2>
	<h3><a href="make-article.php?make=all">生成所有文章</a></h3>
	<h3>按栏目生成</h3>
<?php
$query1 = 'select typeautoid,typename from ttype where outurl=0 order by typeid';
$result1 = mysql_query($query1);
echo '<ul class="default"><li>';
while($rs1=mysql_fetch_object($result1)) {
	echo '<a href="make-article.php?make=type&typeId='.$rs1->typeautoid.'">'.$rs1->typename.'</a>'."&nbsp; \n";
}
echo '</li></ul>';
?>
	<h3>按单个ID生成</h3>

<?php
$query = 'select * from article order by aid';
$result = mysql_query($query) or die ('错误：' . mysql_error());

	echo '<ul class="default"><li>';
	while($rs1 = mysql_fetch_object($result)) {
		echo '<a href="make-article.php?make=only&makeId='.$rs1->aid.'">'.$rs1->aid.'</a>'."&nbsp; \n";
	}
	echo '</li></ul>';

if (isset($_GET["make"]) && $_GET["make"] == "all") {
	$makeSet = '';
	makeArticle($makeSet);
}else if (isset($_GET["make"]) && $_GET["make"] == "type") {
	$makeSet = ' where atypeid= '.$_GET["typeId"].' ';
	makeArticle($makeSet);
}else if (isset($_GET["make"]) && $_GET["make"] == "only") {
	$makeSet = ' where aid= '.$_GET["makeId"].' ';
	makeArticle($makeSet);
}
?>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
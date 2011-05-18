<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/temp.php"); ?>
<?php include_once("../include/function.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>生成栏目</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>生成栏目</h2>
<h3><a href="make-column.php?make=all">生成所有栏目</a></h3>
<h3>生成单个栏目</h3>
<?php
$query1 = 'select typeautoid,typename from ttype where outurl !=1 and typefather = 0 order by typeid';
$result1 = mysql_query($query1);
while($rs1=mysql_fetch_object($result1)) {
	$queryZ = 'select typeautoid,typename from ttype where outurl !=1 and typefather = '.$rs1->typeautoid.' order by typeid';
	$resultZ = mysql_query($queryZ);
	$totalZ = mysql_num_rows($resultZ);
	if ($totalZ < 1) echo '';
	else {
		echo '<h3>'.$rs1->typename.'</h3>';
		echo '<ul class="default"><li>';
		while($rsZ=mysql_fetch_object($resultZ)) {
			echo '<a href="make-column.php?make=single&typeid='.$rsZ->typeautoid.'">'.$rsZ->typename.'</a>'."&nbsp; \n";
		}
	}
	echo '</li></ul>';
}
if (isset($_GET["make"]) && $_GET["make"] == "all") {
	echo '<h4>已成功生成以下栏目:';
	$query2 = 'select typeautoid from ttype where outurl!=1 order by typeid';
	$result2 = mysql_query($query2);
	while($rs2=mysql_fetch_object($result2)) {
		$makeSql = ' and typeautoid = '.$rs2->typeautoid.' ';
		$aSql = $rs2->typeautoid;
		makecolumn($makeSql);
	}
	echo '</h4>';
}else if (isset($_GET["make"]) && $_GET["make"] == "single") {
	echo '<h4>已成功生成以下栏目:';
	$makeSql = ' and typeautoid = '.$_GET["typeid"];
	$aSql = $_GET["typeid"];
	makecolumn($makeSql);
	echo '</h4>';
}
?>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
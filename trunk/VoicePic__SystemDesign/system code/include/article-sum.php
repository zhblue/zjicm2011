<?php include_once("conn.php"); ?>
<?php
if (isset($_GET["aid"])) {
	$query = 'select apv from article where aid='.intval(addslashes($_GET["aid"]));
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	$rs = mysql_fetch_object($result);
	echo "document.write('".$rs->apv."');";
	$rs->apv = $rs->apv + 1;
	$sqlQuery = "update article set apv = '".$rs->apv."' where aid='".intval(addslashes($_GET["aid"]))."'";
	$result = MYSQL_QUERY($sqlQuery);
}
?>
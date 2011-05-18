<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目设置</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function tSubmit(form){
	if(form.typefather.value==''){
		alert('所属区块！');
		form.typefather.focus();
		return false;
	}
	if(form.typeid.value==''){
		alert('栏目排序！');
		form.typeid.focus();
		return false;
	}
	if(form.typename.value==''){
		alert('栏目名称！');
		form.typename.focus();
		return false;
	}
	return true;
}
function qSubmit(form){
	if(form.typename.value==''){
		alert('区块名！');
		form.typename.focus();
		return false;
	}
	if(form.typeid.value==''){
		alert('区块排序！');
		form.typeid.focus();
		return false;
	}
	return true;
}
</script>
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>栏目设置</h2>
<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "saveSet") saveSet();
if (isset($_GET['action']) && addslashes($_GET['action']) == "addType") addType();
if (isset($_GET['action']) && addslashes($_GET['action']) == "delType") delType();
if (isset($_GET['action']) && addslashes($_GET['action']) == "saveQu") saveQu();
if (isset($_GET['action']) && addslashes($_GET['action']) == "addQu") addQu();
if (isset($_GET['action']) && addslashes($_GET['action']) == "delQu") delQu();

$query = 'select typeautoid,typename,typeid from ttype where typeleave = 0 order by typeid';
$result = mysql_query($query) or die ('错误：' . mysql_error());

while($rs=mysql_fetch_object($result)) {
	echo '<h3>
			<form method="post" action="type.php?action=saveQu&id='.$rs->typeautoid.'">
			<input type="text" value="'.$rs->typename.'" name="typename" /> 
			区块排序：<input type="text" class="num" value="'.$rs->typeid.'" name="typeid" /> 
			<input type="submit" class="but" value="修改" />
			&nbsp; <!-- 真实ID：'.$rs->typeautoid.'（子栏目所属ID）-->
			<a href="type.php?action=delQu&id='.$rs->typeautoid.'" onclick="return confirm(\'真的要删除？\')">删除</a>
			</form>
		</h3>'."\n";
	$queryZ = 'select * from ttype where typeleave != 0 and typefather = '.$rs->typeautoid.' order by typeid';
	$resultZ = mysql_query($queryZ);
	echo '<ul class="type typeTitle">
		<li class="short">├ id</li>
		<li class="sort">栏目排序</li>
		<li>父级栏目</li>
		<li>栏目名称</li>
		<li>英文名称</li>
		<li>栏目链接</li>
		<li class="short">修改</li>
		<li class="short">删除</li>
	</ul>';
	$count = 0;
	while($rsZ=mysql_fetch_object($resultZ)) {
		if ($count % 2 == 0) echo '<ul class="type">';
		else echo '<ul class="type even">';

		echo '<li class="short" title="真实ID：'.$rsZ->typeautoid.'">├'.$rsZ->typeautoid.'</li>';
		echo '<form method="post" action="type.php?action=saveSet&id='.$rsZ->typeautoid.'">';
		echo '<li class="sort"><input type="text" value="'.$rsZ->typeid.'" name="typeid" title="排序ID：'.$rsZ->typeid.'" /></li>';
		
		$queryF = 'select typeautoid,typename from ttype where typeleave = 0 order by typeid';
		$resultF = mysql_query($queryF) or die ('错误：' . mysql_error());
		echo '<li><select name="typefather">';
		while($rsF=mysql_fetch_object($resultF)) {
			$selected = ($rsZ->typefather == $rsF->typeautoid) ? ' selected="selected"' : '';
			echo '<option value="'.$rsF->typeautoid.'"'.$selected.'>'.$rsF->typename.'</option>';
		}
		echo '</select></li>';

		echo '<li><input type="text" value="'.$rsZ->typename.'" name="typename" /></li>';
		echo '<li><input type="text" value="'.$rsZ->typenameen.'" name="typenameen" /></li>';
		if ($rsZ->outurl == 1) echo '<li><input type="text" value="'.$rsZ->typeurl.'" name="typeurl" /></li>';
		else if ($rsZ->outurl == 2) echo '<li>相册栏目</li>';
		else echo '<li>系统栏目</li>';
		echo '<li class="short"><input type="submit" value="修改" /></li>';
		echo '<li class="short"><a href="type.php?action=delType&id='.$rsZ->typeautoid.'" onclick="return confirm(\'真的要删除？\')">删除</a></li>';
		echo '</form>';

		echo '</ul>';
		$count++;
	}
}
?>
<p class="end"></p>

<div class="space"></div>
<h2>新增区块(区块只是作为栏目的总开关，区块下不可发表文章)</h2>
	<h3>
		<form method="post" action="type.php?action=addQu" onsubmit="return qSubmit(this);">
		区块名称：<input type="text" value="" name="typename" /> 
		区块排序：<input type="text" class="num" value="" name="typeid" /> 
		<input type="submit" class="but" value="添加" />
		</form>
	</h3>

<div class="space"></div>
<h2>新增栏目</h2>
<form method="post" action="type.php?action=addType" onsubmit="return tSubmit(this);">
		<div class="inBox">
			<label>所属类别：</label> &nbsp; 
			<select name="typefather">
				<option selected="selected">请选择分区</option>
<?php
$query1 = 'select typeautoid,typename from ttype where typeleave = 0 order by typeid';
$result1 = mysql_query($query1);
	while($rs1=mysql_fetch_object($result1)) {
		echo '<option value="'.$rs1->typeautoid.'">'.$rs1->typename.'</option>';
	}
?>
			</select>
		</div>
		<div class="inBox">
			<label>栏目排序：</label><input type="text" class="textC" name="typeid" />
		</div>
		<div class="inBox">
			<label>栏目名称：</label><input type="text" class="textB" name="typename" />
		</div>
		<div class="inBox">
			<label>英文名称：</label><input type="text" class="textB" name="typenameen" /><div class="inBoxTxt">非必填项</div>
		</div>
		<div class="inBox">
			<label>栏目类别：</label>
			<div class="inBoxTxt">
				<input type="radio" value="0" name="outurl" id="outurl1" checked="checked" onclick="document.getElementById('noSystemUrl').style.display='none';" /><label for="outurl1">默认</label>
				<input type="radio" value="1" name="outurl" id="outurl2" onclick="document.getElementById('noSystemUrl').style.display='';" /><label for="outurl2">站外</label>
				<input type="radio" value="2" name="outurl" id="outurl3" onclick="document.getElementById('noSystemUrl').style.display='none';" /><label for="outurl3">相册</label>
			</div>
		</div>
		<div class="inBox" style="display:none;" id="noSystemUrl">
			<label>链接地址：</label><input type="text" class="textB" name="typeurl" value="http://" />
		</div>
		<div class="inEnd">
			<input type="submit" value="添加" />
			<input type="reset" value="取消" />
		</div>
</form>

<?php
function saveQu() {
	$id = $_GET['id'];
	$typeid = addslashes($_POST['typeid']);
	$typename = addslashes($_POST['typename']);
	$sqlQuery = "update ttype set typeid = '$typeid', typename = '$typename' where typeautoid='$id'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='type.php';</script>";
}


function addQu() {
	$typeid = addslashes($_POST['typeid']);
	$typename = addslashes($_POST['typename']);
	//echo $posttypeurl . "|" . $posttypeurl1. "|" .$typeurl ."\n";

	$sqlQuery = "insert into ttype (typeleave, typeid, typename) VALUES ('0','$typeid','$typename')";
	mysql_query( $sqlQuery ) or die(mysql_error());
	echo "<script type='text/javascript'>location='type.php';</script>";
}


function saveSet() {
	$id = $_GET['id'];
	$typeid = addslashes($_POST['typeid']);
	$typename = addslashes($_POST['typename']);
	$typenameen = addslashes($_POST['typenameen']);
	$typefather = $_POST['typefather'];
	$typeurl = "";
	$postTypeurl = "";
	if (isset($_POST['typeurl'])) {
		$typeurl = addslashes($_POST['typeurl']);
		$postTypeurl = ", typeurl = '$typeurl'";
	}
	$sqlQuery = "update ttype set typeid = '$typeid', typefather = '$typefather', typename = '$typename', typenameen = '$typenameen'".$postTypeurl." where typeautoid='$id'";
	$result = MYSQL_QUERY($sqlQuery);
	echo "<script type='text/javascript'>location='type.php';</script>";
}


function addType() {
	$posttypeurl = "";
	$posttypeurl1 = "";
	$typeurl = addslashes($_POST['typeurl']);
	if (isset($_POST['typeurl']) && $_POST['outurl'] == 1) {
		$posttypeurl = ", typeurl";
		$posttypeurl1 = ",'".$typeurl."'";
	}
	$outurl = addslashes($_POST['outurl']);
	$typefather = $_POST['typefather'];
	$typeid = addslashes($_POST['typeid']);
	$typename = addslashes($_POST['typename']);
	$typenameen = addslashes($_POST['typenameen']);
	//echo $posttypeurl . "|" . $posttypeurl1. "|" .$typeurl ."\n";

	$sqlQuery = "insert into ttype (typefather, typeleave, outurl, typeid, typename, typenameen".$posttypeurl.") VALUES ('$typefather','1','$outurl','$typeid','$typename', '$typenameen'".$posttypeurl1.")";
	mysql_query( $sqlQuery ) or die(mysql_error());
	echo "<script type='text/javascript'>location='type.php';</script>";
}


function delQu() {
	$id = $_GET['id'];
	$query = 'select * from ttype where typefather = '.$id;
	$result = mysql_query($query);
	if (mysql_num_rows($result)>0) echo "<script type='text/javascript'>alert('此区块下存在栏目，请先删除此区块下的所有栏目。');</script>";
	else {
		$sql = "DELETE FROM ttype where typeautoid = '$id'";
		$result = MYSQL_QUERY($sql);
		echo "<script type='text/javascript'>location='type.php';</script>";
	}
}


function delType() {
	$id = $_GET['id'];
	$sql = "DELETE FROM ttype where typeautoid = '$id'";
	$result = MYSQL_QUERY($sql);
	$sql1 = "DELETE FROM article where atypeid = '$id'";
	$result1 = MYSQL_QUERY($sql1);
	$sql2 = "DELETE FROM album where albumtype = '$id'";
	$result2 = MYSQL_QUERY($sql2);
	echo "<script type='text/javascript'>location='type.php';</script>";
}
?>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
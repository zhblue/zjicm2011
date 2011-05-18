<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php
include_once("../include/conn.php");
include("../".$FckDir."FCKeditor/fckeditor.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发表文章</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function tSubmit(form){
	if(form.atitle.value==''){
		alert('标题！');
		form.atitle.focus();
		return false;
	}
	if(form.atypeid.value==''){
		alert('栏目！');
		form.atypeid.focus();
		return false;
	}
	return true;
}
</script>
</head>

<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>发表文章</h2>

<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "add") add();
if (isset($_GET['action']) && addslashes($_GET['action']) == "publish") publish();

function publish() {
?>
	<form method="post" action="publish.php?action=add" onsubmit="return tSubmit(this);">
			<div class="inBox">
				<label>所属分类：</label>
				<div class="inBoxTxt">
				<select name="atypeid">
					<option value="" selected="selected">请选择栏目</option>
	<?php
	$query = 'select * from ttype where typefather !=0 and outurl=0 order by typefather, typeid';
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	
	$count = 0;
	while($rs=mysql_fetch_object($result)) {
		echo "<option value='".$rs->typeautoid."'>".$rs->typename."</option>\n";
		$count ++;
	}
	?>
	</select>
				</div>
			</div>
			<div class="inBox">
				<label>文章标题：</label><input type="text" class="textA" name="atitle" maxlength="68" />
				<div class="inBoxTxt">
					<input type="checkbox" id="atop" name="atop" value="1" />
					<label for="atop"><cite>文章置顶</cite></label>
				</div>
			</div>
	
			<div class="inBox">
				<label>文章介绍：</label><input type="text" class="textA" name="ainfo" maxlength="68" />
				<div class="inBoxTxt">
					请填写文章介绍，有助于SEO，最多68个字符。
				</div>
			</div>
	
			<div class="inBox">
				<label>关键字：</label><input type="text" class="textA" name="akey" maxlength="58" />
				<div class="inBoxTxt">
					请填写关键字，有助于SEO，用半角逗号隔开，最多68个字符。
				</div>
			</div>
	
			<table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 10px;">
				<td width="100" valign="top" style="text-align:right;"><label>文章内容：</label></td>
				<td style="border:1px solid #ccc;">
	<?php
	$sBasePath = "/FCKeditor/";
	$oFCKeditor = new FCKeditor('acontent') ;
	$oFCKeditor->BasePath  = $sBasePath ;
	$oFCKeditor->Height = '300';
	//$oFCKeditor->ToolbarSet = 'Basic';
	$oFCKeditor->Create() ;
	?>
				</td>
			</table>
	
			<div class="inEnd">
				<input type="submit" value="确定" />
				<input type="reset" value="清空" />
			</div>
	</form>
<?php } //end publish() ?>

<?php
function add() {
	$atitle = addslashes($_POST['atitle']);
	$atypeid = addslashes($_POST['atypeid']);
	$ainfo = addslashes($_POST['ainfo']);
	$akey = addslashes($_POST['akey']);
	$akey = str_replace("，",",",$akey);
	$akey = str_replace("。",".",$akey);
	$atop = (isset($_POST['atop'])) ? $_POST['atop'] : "0";
	$acontent = addslashes($_POST['acontent']);
	$acontent = str_replace("<p>--|--</p>","--|--",$acontent);
	$adate = date("y-m-d H:i:s");

	$sqlQuery = "insert into article (atitle, atypeid, ainfo, akey, atop, acontent, adate ) values ('$atitle', '$atypeid', '$ainfo', '$akey', '$atop', '$acontent','$adate')";	
	mysql_query( $sqlQuery ) or die(mysql_error());
	$query = 'select * from article order by aid desc limit 0,1';
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	$rs=mysql_fetch_object($result);
	echo '<h3>发表成功</h3><h4> <a href="list.php">返回文章列表&raquo;</a></h4>';
}
?>

<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
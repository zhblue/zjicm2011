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
<title>编辑文章</title>
<link href="css/content.css" rel="stylesheet" type="text/css" />
</head>
<body><div id="content"><u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
<h2>文章编辑</h2>

<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "edit") edit();
if (isset($_GET['action']) && addslashes($_GET['action']) == "editor") editor();

function edit() {
$id = $_GET['aid'];
$query1 = 'select * from article where aid ='.$id;
$result1 = mysql_query($query1) or die ('错误：' . mysql_error());
$rs1=mysql_fetch_object($result1);

$atitle1 = $rs1->atitle;
$atypeid1 = $rs1->atypeid;
$ainfo1 = $rs1->ainfo;
$akey1 = $rs1->akey;
$astar1 = $rs1->astar;
$atop1 = $rs1->atop;
$acontent1 = $rs1->acontent;

?>



<form method="post" action="editor.php?action=editor&aid=<?php echo $id; ?>">
		<div class="inBox">
			<label>所属分类：</label>
			<div class="inBoxTxt"><select name="atypeid">
<?php
	$query = 'select * from ttype where typefather !=0 and outurl=0 order by typefather, typeid';
$result = mysql_query($query) or die ('错误：' . mysql_error());

$count = 0;
while($rs=mysql_fetch_object($result)) {
	if ($rs->typeautoid == $atypeid1) echo "<option value='".$rs->typeautoid."' selected='selected'>".$rs->typename."</option>\n";
	else echo "<option value='".$rs->typeautoid."'>".$rs->typename."</option>\n";
	$count ++;
}
?>
</select>
			</div>
		</div>
		<div class="inBox">
			<label>文章标题：</label><input type="text" class="textA" name="atitle" value="<?php echo $atitle1; ?>" />
			<div class="inBoxTxt">
<?php
	if ($atop1 == 1) echo '<input type="checkbox" id="atop" name="atop" value="1" checked="checked" /> <label for="atop"><cite>文章置顶</cite></label>';
	else echo  '<input type="checkbox" id="atop" name="atop" value="1" /> <label for="atop"><cite>文章置顶</cite></label>';
	
?>
			</div>
		</div>

		<div class="inBox">
			<label>文章介绍：</label><input type="text" class="textA" name="ainfo" value="<?php echo $ainfo1; ?>" />
		</div>

		<div class="inBox">
			<label>关键字：</label><input type="text" class="textA" name="akey" value="<?php echo $akey1; ?>" />
		</div>

		<table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 10px;">
			<td width="100" valign="top" style="text-align:right;"><label>文章内容：</label></td>
			<td style="border:1px solid #ccc;">
<?php
$sBasePath = "/FCKeditor/";
$oFCKeditor = new FCKeditor('acontent') ;
$oFCKeditor->BasePath  = $sBasePath ;
$oFCKeditor->Height = '300';
$oFCKeditor->Value = stripslashes($acontent1); 
//$oFCKeditor->ToolbarSet = 'Basic';
$oFCKeditor->Create() ;
?>
			</td>
		</table>

		<div class="inEnd">
			<input type="submit" value="确定" />
			<input type="reset" value="还原" />
		</div>
</form>

<?php
} //end edit()

function editor() {
	$aid = $_GET['aid'];
	$atitle = addslashes($_POST['atitle']);
	$atypeid = addslashes($_POST['atypeid']);
	$ainfo = addslashes($_POST['ainfo']);
	$akey = addslashes($_POST['akey']);
	$akey = str_replace("，",",",$akey);
	$akey = str_replace("。",".",$akey);
	$atop = (isset($_POST['atop'])) ? $_POST['atop'] : "0";
	$acontent = addslashes($_POST['acontent']);
	$acontent = str_replace("<p>--|--</p>","--|--",$acontent);

	$sqlQuery = "update article set atitle = '$atitle', atypeid = '$atypeid', ainfo = '$ainfo', akey = '$akey', atop = '$atop', acontent = '$acontent' where aid='$aid'";
	$result = mysql_query($sqlQuery);
	echo '<h3>修改成功</h3><h4>生成以下静态页面： &nbsp; <a href="list.php">返回文章列表&raquo;</a></h4><iframe class="makeFrame" frameborder="0" src="make-article.php?make=only&makeId='.$aid.'"></iframe>';
}
?>

</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
</html>
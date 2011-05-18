<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<?php include_once("../include/conn.php");
if (!isset($_GET['include']) || $_GET['include'] == "") index();
if (isset($_GET['include']) && $_GET['include'] == "head") head();
if (isset($_GET['include']) && $_GET['include'] == "nav") nav();
if (isset($_GET['include']) && $_GET['include'] == "content") content();
?>

<?php
function index() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>早教后台管理</title>
</head>
<frameset rows="45,*" border="0">
	<frame src="index.php?include=head" scrolling="no" noresize="noresize" />
	<frameset cols="210,*">
		<frame src="index.php?include=nav" noresize="noresize" />
		<frame src="index.php?include=content" name="center" scrolling="yes" scrolling-x="no" />
	</frameset>
</frameset>
<noframes></noframes>
</html>
<?php
}
?>

<?php
function head() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>早教后台管理</title>
<link href="css/head.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="head">

	<div class="headLogo">
		<img src="css/images/logo.gif" alt="yin" />
	</div>

	<div class="shortcut">
		<div class="shortcutL"></div>
		<div class="shortcutC">
			<a target="center" href="leave.php">留言管理</a> |  
			<a target="center" href="comment.php">评论管理</a> | 
			<a target="center" href="link.php">友情链接</a> | 
			<a target="_top" href="login.php?action=quit">退出管理</a> | 
			<a target="_blank" href="../index.php">浏览首页</a>
		</div>
		<div class="shortcutR"></div>
	</div>

	<div class="headL"></div>

</div>
</body>
</html>
<?php
}
?>


<?php
function nav() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>早教后台管理</title>
<link href="css/nav.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function switchMenu(oH){
	var oDiv = oH.parentNode;
	var oHs = oDiv.getElementsByTagName("H3");
	for(var i=0; i<oHs.length; i++){
		var oUl = oHs[i].nextSibling;
		while(oUl.nodeName=="#text"){
			oUl = oUl.nextSibling;
		}
		if(oUl.tagName == "UL"){
			if(oHs[i] != oH){
				//oUl.style.display="none"; //展开其中一个时是否关闭其他的子菜单
			}else{
				if(oUl.style.display=="none"){
					oUl.style.display="";
				}else{
					oUl.style.display="none";
				}
			}
		}
	}
}
</script>
</head>

<body>

<div id="nav">

	<div class="welcome">
		<cite>欢迎你，<span><?php echo $GLOBALS["adminacc"]; ?></span></cite>
		<a href="login.php?action=quit" target="_top">退出管理</a>
	</div>

	<div class="navMenu">

		<h3 onclick="switchMenu(this);">网站管理</h3>
		<ul>
			<li><a target="center" href="publish.php?action=publish">发表文章</a></li>
			<li><a target="center" href="list.php">文章管理</a></li>
			<li><a target="center" href="slide.php">幻灯管理</a></li>
			<li><a target="center" href="custom.php">公告、广告和自定义板块</a></li>
			<li><a target="center" href="leave.php">留言管理</a></li>
			<li><a target="center" href="comment.php">评论管理</a></li>
			<li><a target="center" href="link.php">友情链接管理</a></li>
			<li><a target="center" href="album.php">相册管理</a></li>
			<li><a target="center" href="swfupload/video.php">视频管理</a></li>
		</ul>
		<h3 onclick="switchMenu(this);">生成静态</h3>
		<ul style="display:none;">
			<!--<li><a target="center" href="make-index.php?make=index">生成首页</a></li>-->
			<li><a target="center" href="make-column.php">生成栏目</a></li>
			<li><a target="center" href="make-article.php">生成文章</a></li>
		</ul>
		<h3 onclick="switchMenu(this);">网站设置</h3>
		<ul style="display:none;">
			<li><a target="center" href="system.php">网站设置</a></li>
			<li><a target="center" href="type.php">网站栏目</a></li>
		</ul>

	</div>

</div>
</body>
</html>
<?php
}
?>


<?php
function content() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/content.css" rel="stylesheet" type="text/css" />
<title>早教后台管理</title>
</head>

<body>

<div id="content">
	<u class="b1"></u>
	<u class="b2"></u>
	<u class="b3"></u>
	<div class="contentIn">
		<h2>后台首页</h2>
		<h3><strong>欢迎你登陆后台！</strong></h3>
		<ul class="default">
			<li>完成后台操作时，请点击左上角“退出登陆”的链接退出登陆状态，而不是仅仅关闭浏览器。</li>
			<li>o(∩_∩)o 此系统还有很多需要修改和完善的地方，会在接下来完善，谢谢！</li>
			<li>Email：919314856@qq.com &nbsp; &nbsp; QQ：919314856</li>
			<li>后台管理最佳分辨率：1024+</li>
		</ul>
		<h3>系统提示：</h3>
		<ul class="default">
<?php
$query1 = 'select lid from flink where lset = 0';
$newLink = mysql_num_rows(mysql_query($query1));

if ($GLOBALS["setleave"] == "1") {
$query2 = 'select guestId from guestbook where guestVerify = 0';
$newLeave = mysql_num_rows(mysql_query($query2));
$query3 = 'select comid from comment where comverify = 0';
$newComment = mysql_num_rows(mysql_query($query3));
	echo '		
			<li>有<strong>'.$newLeave.'</strong>个留言<a href="leave.php" target="center">等待审核</a>。</li>
			<li>有<strong>'.$newComment.'</strong>个评论<a href="leave.php" target="center">等待审核</a>。</li>
';}
?>
			<li>有<strong><?php echo $newLink; ?></strong>个友情链接申请<a href="link.php" target="center">等待审核</a>。</li>
		</ul>
		<div class="space"></div>
	</div>
	<u class="b3"></u>
	<u class="b2"></u>
	<u class="b1"></u>
</div>
</body>
</html>
<?php
}
?>
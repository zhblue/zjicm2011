<?php
session_start();
include_once("include/temp.php");
include_once("include/function.php");
?>
<?php
templates("");
$templateHead = str_replace("{title}",'首页- '.$webname,$templateHead);
$templateHead = str_replace("{sNumber}",'L',$templateHead);
$makeContent = $templateHead;
tempReplace($makeContent);
echo $makeContent;

if($_REQUEST['action']=="login"){
if($_POST['username']&&$_POST['password']){
  $sql="select count(*) from user where username='".$_POST['username']."'and password='".md5($_POST['password'])."'";
  $result = mysql_query($query) or die ('错误：' . mysql_error());
  if(mysql_fetch_object($result)){
  		$vlogin="<div><p>欢迎".$_POST['username']."登录！</p><p><a href='index.php?action=quit'>退出</a></p></div>";
		$_SESSION['username']=$_POST['username'];
  }
  else{
  $vlogin="sorry,用户名或密码错误";
  }
}}
if($_SESSION['username']){
  $vlogin="欢迎".$_SESSION['username']."登录！";
}

$makeContent = $templateIndex;
tempReplace($makeContent);
echo $makeContent;
$makeContent = $templateFoot;
tempReplace($makeContent);
echo $makeContent;
if (isset($_GET['action']) && addslashes($_GET['action']) == "quit") {
	session_unset();
	session_destroy();
}
?>
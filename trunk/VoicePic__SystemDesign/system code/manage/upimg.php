<?php session_start(); ?>
<?php include_once("verifylogin.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传幻灯图片</title>
<style type="text/css">
<!--
* {
	padding: 0;
	margin: 0;
	border: 0;
	font: 12px Arial, sans-serif;
}
body {
	padding: 10px;
	width: 250px;
	height: 330px;
}
.wrap {
	text-align: center;
	width: 230px;
	height: 310px;
	padding: 9px;
	border: 1px solid #ccc;
}
.uploadImg {
	width: 222px;
	height: 270px;
	padding: 2px;
	margin: 0 auto 10px;
	line-height: 25px;
	color: #9b0;
	border: 1px solid #333;
	overflow: hidden;
}
.uploadImg img {
	float: left;
	width: 222px;
	height: 250px;
	margin-bottom: 2px;
	*margin-bottom: 4px;
	cursor: pointer;
}
input {
	width: 35px;
	height: 20px;
	border: 1px solid #333;
}
input.file {
	width: 187px;
	height: 20px;
}
-->
</style>
</head>
<div class="wrap">
	<div class="uploadImg">
<?php if (isset($_GET['action']) && addslashes($_GET['action']) == "uploadimg") {uploadimg();} ?>
<body>
<?php
function uploadimg() {
/*****************************************

Title :文件上传详解
Author:showtime
Finish Date :2007-3-22

*****************************************/

$uploaddir = "../images/slide/";//设置文件保存目录 注意包含/
$type=array("jpg","gif","bmp","png");//设置允许上传文件的类型

//获取文件后缀名函数
function fileext($filename)
{
return substr(strrchr($filename, '.'), 1);
}
//生成随机文件名函数
function random($length)
{
$hash = 'slide-';
$chars = '0123456789abcdefghijklmnopqrstuvwxyz';
$max = strlen($chars) - 1;
mt_srand((double)microtime() * 1000000);
for($i = 0; $i < $length; $i++)
{
$hash .= $chars[mt_rand(0, $max)];
}
return $hash;
}

$a=strtolower(fileext($_FILES['file']['name']));
//判断文件类型
if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type))
{
$text=implode(",",$type);
echo "您只能上传以下类型文件: ",$text,"<br>";
}
//生成目标文件的文件名
else{
$filename=explode(".",$_FILES['file']['name']);
do
{
$filename[0]=random(5); //设置随机数长度
$name=implode(".",$filename);
//$name1=$name.".Mcncc";
$uploadfile=$uploaddir.$name;
}

while(file_exists($uploadfile));

if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile))
{
if(is_uploaded_file($_FILES['file']['tmp_name']))
{

echo "上传失败!";
}
else
{//输出图片预览
echo "<p><img src='$uploadfile' onclick='returnVal();window.close();' alt='请点击图片关闭本窗口' id='uploadFT' /></p><p style='padding-bottom:10px;'>上传成功！请点击图片选中。</p>";
}
}

}
}// end function
?>
	<p>图片最佳大小为宽222px，高250px，宁大勿小，谢谢合作，可以传2M以内的图片。</p>
	</div>
<script type="text/javascript">
function returnVal()
{
var val1=document.getElementById("uploadFT").src;
window.opener.document.getElementById("slideimg1").value=val1;
}
</script>
	<form method="post" action="upimg.php?action=uploadimg" enctype="multipart/form-data">
		<input type="file" name="file" class="file" />
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		<input type="submit" value="上传" name="upload" class="button" />
	</form>

</div>
</body>
</html>
<?php
session_start();
include_once("include/conn.php");
include_once("include/temp.php");
include_once("include/function.php");
?>
<?php
templates("");
$templateHead = str_replace("{title}",'注册 - '.$webname,$templateHead);
$templateHead = str_replace("{sNumber}",'L',$templateHead);
$makeContent = $templateHead;
tempReplace($makeContent);
echo $makeContent;
?>

<script type="text/javascript">
function getId(idName){return document.getElementById(idName);}
function tsubmit(form){
	if(form.uname.value == ''){
		getId('label1').innerHTML = '';
		form.uname.focus();
		return false;
	}
	if(form.pawd.value == ''){
		getId('label2').innerHTML = '';
		form.pawd.focus();
		return false;
	}
	if(form.pawd1.value == ''){
		getId('label3').innerHTML = '';
		form.pawd1.focus();
		return false;
	}	
	if(form.pawd.value !=form.pawd1.value){
		getId('label3').innerHTML = '两次密码不同';
		form.pawd1.focus();
		return false;
	}
	if(form.email.value == ''){
		getId('label4').innerHTML = '';
		form.email.focus();
		return false;
	}
	if(strlen(form.email.value.length)<6&&strlen(form.email.value.length)>0||!preg_match("/^[\w\-\.]+@[\w\-]+(\.\w+)+$/",form.email.value))
		{
		getId('label4').innerHTML = 'email格式不正确';
		form.email.focus();	
		return false;
		}
	if(form.age.value == ''){
		getId('label5').innerHTML = '';
		form.age.focus();
		return false;
	}
	return true;
}
function tabInput(inputId,labelId) {
	if (getId(inputId).value.length == "") {
		if (labelId == 1) {
			getId("label"+labelId).innerHTML = "用户名不能为空 ";
		}else if (labelId == 2) {
			getId("label"+labelId).innerHTML = "密码不能为空 ";
		}else if (labelId == 3) {
			getId("label"+labelId).innerHTML = "请再次输入密码 ";
		}else if (labelId == 4) {
			getId("label"+labelId).innerHTML = "请输入email ";
		}else if (labelId == 5) {
			getId("label"+labelId).innerHTML = "请输入年龄 ";
		}
		
	}else if (getId(inputId).value.length >= 1) {
		getId("label"+labelId).innerHTML = "";
	}
}
</script>

<?php if (isset($_GET['action']) && addslashes($_GET['action']) == "register") register(); ?>

		<div class="left" align="center">
		<table width="90%" align="center" cellpadding="5" cellspacing="1">
          <form method="post" action="register.php?action=register" onsubmit="return tsubmit(this);">
            <tr> 
              <td colspan="2"><div align="center"><strong>用户注册</strong></div></td>
            </tr>
            <tr> 
              <td width="25%"><div align="right" >用户名:</div></td>
              <td width="75%">
			  <input class="atext" id="uname" name="uname" onBlur="tabInput('uname','1');" type="text" size="20">
                <font color="#FF0000" id="label1">*</font></td>
            </tr>
            <tr> 
              <td><div align="right">昵称</div></td>
              <td><input class="atext" name="sname" type="text" size="20">
            </tr>			
            <tr> 
              <td><div align="right">密码:</div></td>
              <td><input class="atext" id="pawd" name="pawd" onBlur="tabInput('pawd','2');" type="password" size="20">
                <font color="#FF0000" id="label2">*</font></td>
            </tr>
            <tr> 
              <td><div align="right">密码确认:</div></td>
              <td><input class="atext" id="pawd1" name="pawd1" onBlur="tabInput('pawd1','3');" type="password" size="20">
                <font color="#FF0000" id="label3">*</font></td>
            </tr>
            <tr> 
              <td><div align="right">email:</div></td>
              <td><input class="atext" id="email" name="email" onBlur="tabInput('email','4');" type="text" size="20">
                <font color="#FF0000" id="label4">*</font></td>
            </tr>
            <tr> 
              <td><div align="right">年龄:</div></td>
              <td><input class="atext" id="age" name="age" onBlur="tabInput('age','5');" type="text" size="20">
			      <font color="#FF0000" id="label5">*</font></td>
            </tr>
            <tr> 
              <td><div align="right">等级:</div></td>
              <td><input class="atext" name="level" type="text" size="20"></td>
            </tr>
            <tr> 
              <td>&nbsp;</td>
              <td><input type="submit" name="submit" value="注册">
                <input type="reset" name="reset" value="重置"></td>
            </tr>
          </form>
        </table>
		</div><!-- left -->

<?php
$makeContent = $templateRight;
tempReplace($makeContent);
echo $makeContent;
?>
<?php
function register() {
	$query = "select * from user where username='".$_POST["uname"]."'";
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	//$rs=mysql_fetch_array($result);
	//print_r($rs);
	if(mysql_fetch_object($result)){
	echo '<script>alert("用户名已存在！");history.go(-1);</script>';
	}
	else{
    $sql="insert into user(username,sname,password,email,ages,level,date) values
	('".$_POST['uname']."','".$_POST['sname']."','".md5($_POST['pawd'])."','".$_POST['email']."','".$_POST['ages']."','".$_POST['level']."','".date("Y-m-d")."')";
	mysql_query($sql);
	if(mysql_affected_rows()>0){
	$_SESSION["username"]=$_POST["uname"];	}
	}
	}
?>
<?php
$makeContent = $templateFoot;
tempReplace($makeContent);
echo $makeContent;
?>
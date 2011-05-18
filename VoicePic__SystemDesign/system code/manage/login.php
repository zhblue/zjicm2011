<?php session_start(); ?>
<?php include_once("../include/conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php早教系统</title>
<style type="text/css">
<!--
*{margin:0;padding:0;border:0;}
body{font:12px Arial, sans-serif;color:#000;}
.wrap {
	width: 366px;
	height: 320px;
	margin: 50px auto 0;
	background: url(css/images/login.gif) left -31px no-repeat;
}
.loginBox {padding: 30px 40px 0 120px;line-height:18px;}
.loginBox h1 {font:bold 18px/35px "微软雅黑", Arial, sans-serif;border-bottom:1px solid #ccc;}
.loginBox h1 span {font-size:17px;color:#e36;}
.loginBox p.space {
	margin-top: 5px;
}
.loginBox input, .loginBox label{vertical-align:middle;cursor:pointer;}
.loginBox label{font-weight:bold;color:#333;}
.loginBox input {
	width: 194px;
	height: 18px;
	padding: 3px 5px;
	font: bold 16px/18px verdana, sans-serif;
	border: 1px solid #ccc;
}
.loginBox input.code {
	width: 80px;
}
.loginBox label.check {
	color: #666;
	font-weight: normal;
}
.loginBox input.checkbox {
	width: auto;
	height: auto;
	margin-right: 5px;
}
.loginBox input.submit {
	width: 71px;
	height: 31px;
	font-size: 14px;
	border: none;
	color: #333;
	background: url(css/images/login.gif) left top no-repeat;
	letter-spacing: 3px;
}
.loginBox img.code {
	width: 80px;
	height: 26px;
	vertical-align: middle;
}
.loginEnd {
	padding-top: 50px;
	font: bold 11px/20px Arial, sans-serif;
	text-align: center;
}
.loginEnd span {
	color: #e36;
}
-->
</style>
</head>

<body>
<div class="wrap">
	<div class="loginBox">
		<h1><span>Admin Login</span> 管理员登陆</h1>
		<form method="post" action="login.php?action=login">
		<p class="space"><label for="user">管理帐号</label></p>
		<p><input type="text" name="user" id="user" maxlength="12" tabindex="1" /></p>
		<p class="space"><label for="pass">管理密码</label></p>
		<p><input type="password" name="pass" id="pass" maxlength="16" tabindex="2" /></p>
		<p class="space"><label for="code">验证码</label></p>
		<p>
			<input type="text" name="code" id="code" class="code" maxlength="4" tabindex="3" />
			<img src="../include/code.php" alt="点击刷新验证码" class="code" onclick="this.src+='?' + Math.random();" />
		</p>
		<p style="padding-top:10px;"><input type="submit" class="submit" value="登陆" tabindex="4" />
								<input type="reset" class="submit" value="取消" tabindex="4" />
		</p>
		</form>
	</div>
	<div class="loginEnd">
		Copyright 2011 <span>y</span>in<span>c</span>hao<span>h</span>uan.com AllRights Reserved. 
	</div>
</div>
</body>
</html>
<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "login") login();
if (isset($_GET['action']) && addslashes($_GET['action']) == "quit") quit();
function login() {
	$query = 'select adminacc,adminpass from tsystem';
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	$rs = mysql_fetch_object($result);
	if ($_POST["user"] != $rs->adminacc || md5($_POST["pass"]) != $rs->adminpass ) {
		echo '<script>alert("用户名或密码不对！");</script>';
	}else if ($_POST['code'] != $_SESSION["codeNumber"]) {
		echo '<script>alert("验证码！");</script>';
	}else {
		$_SESSION['adminacc'] = $_POST["user"];
		$_SESSION['adminpass'] = md5($_POST["pass"]);
		echo '<script>location="index.php";</script>';
	}
}
function quit() {
	session_unset();
	session_destroy();
	echo '<script>location="login.php";</script>';
}
?>
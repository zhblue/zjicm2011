<?php
$mysqlHost = "localhost"; //你的MySQL主机
$mysqlUser = "root"; //你的MySQL帐户
$mysqlPass = ""; //你的MySQL密码
$mysqlName = "tcms"; //你的数据库名
$fileDirectory = ""; //你的安装目录，如是根目录，请留空。
$connect = mysql_connect($mysqlHost, $mysqlUser, $mysqlPass)
or die("错误：".mysql_error());
mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=binary", $connect);
mysql_query("SET SQL_MODE = ''", $connect);
mysql_select_db($mysqlName) or die("没有查找到(".$mysqlName."这个表)，错误：".mysql_error());
date_default_timezone_set("PRC");
?>
<?php
include_once("../include/conn.php");
if (!isset($_SESSION['adminacc']) || $_SESSION['adminacc'] != $adminacc || !isset($_SESSION['adminpass']) || $_SESSION['adminpass'] != $rssystem->adminpass) {
	echo '<script>top.location="login.php";</script>';
	exit;
}
?>
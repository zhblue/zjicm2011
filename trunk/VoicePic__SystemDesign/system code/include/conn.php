<?php include_once("config.php"); ?>
<?php
$query = 'select * from tsystem';
$result = mysql_query($query) or die ('错误：' . mysql_error());
$rssystem=mysql_fetch_object($result);
$webname = $rssystem->webname;
$weburl = $rssystem->weburl;
$webint = $rssystem->webint;
$adminacc = $rssystem->adminacc;
$adminmail = $rssystem->adminmail;
$setleave = $rssystem->setleave;
$articlehot = $rssystem->articlehot;
$articlenew = $rssystem->articlenew;
$howpage = $rssystem->howpage;
$shownotice = $rssystem->shownotice;
$webicp = $rssystem->webicp;
$Dir = ($fileDirectory == "") ? "/" : "/".$fileDirectory."/";
$FckDir = ($fileDirectory == "") ? "" : "../";
?>
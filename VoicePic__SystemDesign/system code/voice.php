<?php
session_start();
include_once("include/temp.php");
include_once("include/function.php");
?>
<?php
templates("");
$templateHead = str_replace("{title}",'语音-'.$webname,$templateHead);
$templateHead = str_replace("{sNumber}",'L',$templateHead);
$makeContent = $templateHead;
tempReplace($makeContent);
echo $makeContent;
if($_SESSION['username']){
?>
<style type="text/css">
<!--
body,td,th {
	font-size: 16px;
}
-->
</style>

<div class="left">
<?php
$vpage = isset($_GET['p']) ? intval($_GET['p']) : 1;
$vquery = 'select vid from video';
$vtotal = mysql_num_rows(mysql_query($vquery));
$vpagenum = ceil($vtotal/4);
if($vpage>$vpagenum || $vpage == 0){
	popLayer(1,1,"出错了！","<br /><br /><strong>没有这一页。</strong>","返回","history.go(-1);");
	exit;
}
$voffset = ($vpage-1)*4;
?>
			<h2>
				<div class="ftl"></div>
				<span>Choose Voice</span>
				<cite>语音选择</cite>
			</h2>
			<div class="fm">
			
<?php
//语音列表
$query = 'select * from video where vtype="voice" order by vid desc limit '.$voffset.',4';
$result = mysql_query($query) or die ('错误：' . mysql_error());
?>
<div style="text-align:center"><ul>
<?php
if($_GET['url']){
?>
<a href="voice.php" style="text-align:left;text-decoration:underline;"><h3 style="color: #FF0000; font-size: 20px;">语音列表</h3>
</a><br/>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0">
			<param name="movie" value="<?php echo $_GET['url'];?>" />
			<param name="quality" value="high" />
			<param name="wmode" value="transparent"/>
			<embed src="<?php echo $_GET['url'];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="500" height="400"></embed>
		</object>
<?php 
}else{
while($rs=mysql_fetch_object($result)){
?>
	  <li style="float:left;" width="330px">
	  <a href="?url=<?php echo $rs->vurl;?>"><img src="images/upimg/<?php echo $rs->vname;?>.jpg" width="300px" height="250"></a>
	  <br/><span><?php echo $rs->vname;?></span>
	  </li>
			<?php
			}	
			?>
	</ul>
</div>	
<div class="listPage commentPage">
<?php
if ($vpage != 1) echo '<a href="voice.php">首页</a> ';
if ($vpage != 1) echo '<a href="voice.php?p='.($vpage-1).'">上一页</a> ';
for ($i=1;$i<$vpagenum+1;$i++) {
	if ($page == $i) echo '<strong>'.$i.'</strong> ';
	else echo '<a href="voice.php?p='.$i.'">'.$i.'</a> ';
}
if ($vpage != $vpagenum) echo '<a href="voice.php?p='.($vpage+1).'">下一页</a>';
if ($vpage != $vpagenum) echo '<a href="voice.php?p='.$vpagenum.'">尾页</a>';
}?>
			</div>
			</div>
			<div class="fe"><div class="fel"></div></div>
</div><!--left -->
<?php
}
else{
echo '很抱歉，只有登录才能查看语音！请<a href="'.$Dir.'index.php" style="color:#FF0000;" >登录</a>';
}
$makeContent = $templateRight;
tempReplace($makeContent);
echo $makeContent;
$makeContent = $templateFoot;
tempReplace($makeContent);
echo $makeContent;
?>
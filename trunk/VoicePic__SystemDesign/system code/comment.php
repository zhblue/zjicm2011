<?php
session_start();
include_once("include/temp.php");
include_once("include/function.php");
include_once("include/page.php");
?>
<?php
templates("");
$templateHead = str_replace("{title}",'最新100条评论 - '.$webname,$templateHead);
$makeContent = $templateHead;
tempReplace($makeContent);
echo $makeContent;
?>

		<div class="left">

<?php
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
$comverify = ($setleave == 1) ? " where comverify = 1 " : "";
$query1 = 'select comid from comment '.$comverify.' limit 0,100';
$total = mysql_num_rows(mysql_query($query1));
$pagenum = ceil($total/10);
if($page>$pagenum || $page == 0){
	popLayer(1,1,"出错了！","<br /><br /><strong>没有这一页。</strong>","返回","history.go(-1);");
	exit;
}
$offset = ($page-1)*10;
?>

			<h2>
				<div class="ftl"></div>
				<span>New Comment</span>
				<cite>最新100条评论</cite>
			</h2>
			<div class="fm">
<?php
$query = 'select * from comment '.$comverify.' order by comid desc limit '.$offset.',10';
$result = mysql_query($query) or die ('错误：' . mysql_error());
while($rs=mysql_fetch_object($result)) {
	$adminManage = (!isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] != "adminlogin") ? '' : '| <a href="manage/comment.php?id='.$rs->comid.'&action=del" onclick="return confirm(\'真的要删除？\')" title="删除评论">X</a>';
	$queryA = 'select aid,atitle,adate from article where aid = '.$rs->comtypeid;
	$resultA = mysql_query($queryA) or die ('错误：' . mysql_error());
	$rsA = mysql_fetch_object($resultA);
?>
				<div class="commentList">
					<div class="commentTitle">
						<cite>
							<a href="http://www.baidu.com/s?wd=<?php echo $rs->comip; ?>" title="点击查看IP归属地" target="_blank"><?php echo stripslashes($rs->comname); ?></a>
							评论文章：<a href="article/<?php echo date("y-m-d",strtotime($rsA->adate)).'/'.$rsA->aid; ?>.html" class="title" target="_blank"><?php echo utf8Substr($rsA->atitle,0,22); ?></a>
						</cite>
						<span><?php echo $rs->comdate.$adminManage; ?></span>
					</div>
					<div class="commentContent">
						<?php echo stripslashes($rs->comcontent); ?>
					</div>
				</div>
<?php
}
?>

				<div class="listPage commentPage">
<?php
if ($page != 1) echo '<a href="comment.php">首页</a> ';
if ($page != 1) echo '<a href="comment.php?p='.($page-1).'">上一页</a> ';
for ($i=1;$i<$pagenum+1;$i++) {
	if ($page == $i) echo '<strong>'.$i.'</strong> ';
	else echo '<a href="comment.php?p='.$i.'">'.$i.'</a> ';
}
if ($page != $pagenum) echo '<a href="comment.php?p='.($page+1).'">下一页</a>';
if ($page != $pagenum) echo '<a href="comment.php?p='.$pagenum.'">尾页</a>';
?>
				</div>

			</div>
			<div class="fe"><div class="fel"></div></div>

		</div><!-- left -->

<?php
$makeContent = $templateRight;
tempReplace($makeContent);
echo $makeContent;
$makeContent = $templateFoot;
tempReplace($makeContent);
echo $makeContent;
?>
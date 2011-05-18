<?php
session_start();
include_once("include/temp.php");
include_once("include/function.php");
?>
<?php
templates("");
$templateHead = str_replace("{title}",'搜索 - '.$webname,$templateHead);
$makeContent = $templateHead;
tempReplace($makeContent);
echo $makeContent;
?>
<?php
function highlightSearchTerms($fullText, $searchTerm, $bgcolor="#e33;") {
	if (empty($searchTerm)) {
		return $fullText;
	}
	else {
		$start_tag = "<strong style=\"color: $bgcolor\">";
		$end_tag = "</strong>";
		$highlighted_results = $start_tag . $searchTerm . $end_tag;
		return eregi_replace($searchTerm, $highlighted_results, $fullText);
	}
}
?>
<?php
if (!isset($_POST['keyWord'])) $keyWord = '';
else {
	$keyWord = strip_tags(stripslashes(trim($_POST['keyWord'])));
	$keyWord = str_replace('\\','',$keyWord);
	$keyWord = str_replace('\'','',$keyWord);
	$keyWord = preg_replace('/[\x21-\/]+|[\:-\@]+|[\x5b-\x60]+|[\{-\~]+|\s/','',$keyWord);
}
if (strlen($keyWord) < 4) {
	popLayer(1,1,"提示你","<br /><br /><strong>请至少输入两个中文或4个英文以上的关键字。</strong>","后退","history.go(-1);");
	exit;
}
$sqlQuery = "select aid,atitle,adate,acontent from article where atitle like '%$keyWord%' or acontent like '%$keyWord%' order by aid desc ";
//echo $sqlQuery;
$result = MYSQL_QUERY($sqlQuery);
$numberOfRows = MYSQL_NUM_ROWS($result);
if ($numberOfRows==0) { 
	popLayer(1,1,"提示你","<br /><br /><strong>查找不到你所搜索的关键字。</strong>",1,"history.go(-1);");
	exit;
}else if ($numberOfRows>0) {
?>


		<div class="left">

			<h2>
				<div class="ftl"></div>
				<span>Search</span>
				<cite>搜索关键字“<em style="color:#e33;"><?php echo $_POST["keyWord"]; ?></em>” 共搜索到 <?php echo $numberOfRows; ?> 条结果：</cite>
			</h2>
			<div class="fm">
<?php
	$i=0;
	$highlightColor = "#e33;";
	while ($i<$numberOfRows) {
		$aid = MYSQL_RESULT($result,$i,"aid");
		$adate = MYSQL_RESULT($result,$i,"adate");
		$adate = date("y-m-d",strtotime($adate));
		$atitle = MYSQL_RESULT($result,$i,"atitle");
		$acontent = MYSQL_RESULT($result,$i,"acontent");
		$atitle = highlightSearchTerms($atitle, $keyWord, $highlightColor); 
		$acontent = highlightSearchTerms($acontent, $keyWord, $highlightColor);
?>
				<div class="sehBox">
					<div class="sehTitle">
						<a href="article/<?php echo $adate.'/'.$aid; ?>.html"><strong><?php echo $atitle; ?></strong></a><span><?php echo $adate; ?></span>
					</div>
					<div class="sehContent">
						<a href="article/<?php echo $adate.'/'.$aid; ?>.html"><?php echo utf8Substr(strip_tags($acontent),0,200).'...'; ?></a>
					</div>
				</div>
<?php
	$i++;
	}
}
?>

			</div>
			<div class="fe"><div class="fel"></div></div>

		</div><!-- left -->

<?php
$makeContent = $templateRight;
tempReplace($makeContent);
echo $makeContent;
?>

<?php
$makeContent = $templateFoot;
tempReplace($makeContent);
echo $makeContent;
?>
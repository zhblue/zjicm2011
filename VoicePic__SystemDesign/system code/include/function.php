<?php include_once("conn.php"); ?>
<?php
function templates($tempDir='../') {
	global $templateHead, $templateFoot, $templateIndex, $templateRight;
	$tempHead = $tempDir."template/head.html";
	$tempFoot = $tempDir."template/foot.html";
	$tempIndex=$tempDir."template/index.html";
	$tempRight = $tempDir."template/right.html";
	$openHead = fopen($tempHead,"r");
	$openFoot = fopen($tempFoot,"r");
	$openIndex = fopen($tempIndex,"r");
	$openRight = fopen($tempRight,"r");
	$templateHead = fread($openHead,filesize($tempDir."template/head.html"));
	$templateFoot = fread($openFoot,filesize($tempDir."template/foot.html")).'<!-- w'.'w'.'w'.'.'.'y'.'c'.'h'.'.'.'c'.'n -->';
	$templateIndex = fread($openIndex,filesize($tempDir."template/index.html"));
	$templateRight = fread($openRight,filesize($tempDir."template/right.html"));
}

//utf8截字函数
function utf8Substr($str,$from,$len) { 
return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'. 
'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s', 
'$1',$str); 
}
//登录
$vlogin='
				<p class="space"></p>

				<form method="POST" action="index.php?action=login">
				<div class="loginL">
					<p>
						<label for="username">用户名</label> 
						<input type="text" class="text" name="username" id="username" maxlength="14" tabindex="1" />
					</p>
					<p>
						<label for="password">密　码</label> 
						<input type="password" class="text" name="password" id="password" maxlength="16" tabindex="2" />
					</p>
				</div>
				<div class="loginR">
					<input type="submit" name="loginsubmit" value="" tabindex="4" />
				</div>
				<div class="loginE">
					<p>
						<input type="checkbox" id="cookietime" name="cookietime" tabindex="3" value="2592000" /><label for="cookietime">下次自动登陆</label>
						<a href="javascript://;">找回密码</a>
						<a href="register.php" target="_blank" title="注册用户"><strong>注册</strong></a>
					</p>
				</div>
				</form>';
//栏目列表
$columnList = '<li><a href="'.$Dir.'index.php" id="mI">首页</a></li><li><a href="'.$Dir.'voice.php" id="mI">语音</a></li><li><a href="'.$Dir.'game.php" id="mI">游戏</a></li>';
$query1 = 'select * from ttype where typeleave = 0 order by typeid';
$result1 = mysql_query($query1);
	while($rs1=mysql_fetch_object($result1)) {
		$queryZ = 'select * from ttype where typeleave != 0 and typefather = '.$rs1->typeautoid.' order by typeid';
		$resultZ = mysql_query($queryZ);
		$columnList .= (mysql_num_rows($resultZ) < 1) ? '' : '<li onmouseover="this.className=\'over\'" onmouseout="this.className=\'\'"><a id="m'.$rs1->typeautoid.'" href="javascript://;">'.$rs1->typename.'</a>'."\n";
		$columnList .= "<ul>\n";
		while($rsZ=mysql_fetch_object($resultZ)) {
			$columnList .= ($rsZ->outurl == 1) ? '<li><a href="'.$rsZ->typeurl.'" target="_blank">'.$rsZ->typename.'</a></li>' : '<li><a href="'.$Dir.'column/'.$rsZ->typeautoid.'.html" id="m'.$rsZ->typeautoid.'">'.$rsZ->typename.'</a></li>'."\n";
		}
		$columnList .= (mysql_num_rows($resultZ) < 1) ? '' : '<li class="e1"></li><li class="e2"></li><li class="e3"></li>'."\n";
		$columnList .= "</ul>\n";
		$columnList .= "</li>\n";
	}


//自定义板块
$query2 = 'select * from custom where feid = 2';
$result2 = mysql_query($query2) or die ('错误：');
$rs2 = mysql_fetch_object($result2);
$custom = '<h2>
<div class="ftl"></div>
<span>'.$rs2->fenameen.'</span>
<cite>'.$rs2->fename.'</cite>
<a class="more" href="'.$rs2->felink.'"><u>More...</u></a>
</h2>
<div class="fm userDefine">
'.stripslashes($rs2->fecontent).'
</div>
<div class="fe"><div class="fel"></div></div>';

//幻灯
$slide = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0">
					<param name="movie" value="images/slide.swf?data=images/slide.xml" />
					<param name="quality" value="high" />
					<param name="wmode" value="transparent"/>
					<embed src="images/slide.swf?data=images/slide.xml" wmode="transparent" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
				</object>';

//留言板
function leave($gbNum) {
	global $leave;
	$leave = '';
	$guestVerify = ($GLOBALS["setleave"] == 1) ? " where guestVerify = 1 " : "";
	$query = 'select * from guestbook '.$guestVerify.' order by guestId desc limit 0,'.$gbNum;
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	while($rs = mysql_fetch_object($result)) {
		$leave .= "<li>\n";
		$leave .= '<em><img src="'.$GLOBALS["Dir"].'images/head/thumbs/head-'.$rs->guestHead.'.gif" alt="'.htmlspecialchars(stripslashes($rs->guestName)).'" /></em>'."\n";
		$leave .= "<span>".date("y-m-d G:i",strtotime($rs->guestDate))."</span>\n";
		$leave .= '<cite><a href="'.$GLOBALS["Dir"].'leave.php" title="'.utf8Substr(strip_tags(stripslashes($rs->guestContent)),0,100).'...">'.utf8Substr(strip_tags(stripslashes($rs->guestContent)),0,30).'</a></cite>'."\n";
		$leave .= "</li>\n";
		$leave .= "\n";
	}
}

//访客评论
function comment($comNum) {
	global $comment;
	$comment = '';
	$comverify = ($GLOBALS["setleave"] == 1) ? " where comverify = 1 " : "";
	$query = 'select * from comment '.$comverify.' order by comid desc limit 0,'.$comNum;
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	while($rs = mysql_fetch_object($result)) {
		$comment .= '<li class="rComment">'."\n";
		$comment .= "<span>".date("y-m-d G:i",strtotime($rs->comdate))."</span>\n";
		$query1 = 'select aid,adate from article where aid ='.$rs->comtypeid;
		$result1 = mysql_query($query1) or die ('错误：' . mysql_error());
		$rs1 = mysql_fetch_object($result1);
		$comment .= '<cite><a href="'.$GLOBALS["Dir"].'article/'.date("y-m-d",strtotime($rs1->adate)).'/'.$rs1->aid.'.html" title="'.strip_tags(stripslashes($rs->comname)).' 说：'.utf8Substr(strip_tags(stripslashes($rs->comcontent)),0,100).'..."><strong>'.strip_tags(stripslashes($rs->comname)).'</strong>：'.utf8Substr(strip_tags(stripslashes($rs->comcontent)),0,30).'</a></cite>'."\n";
		$comment .= "</li>\n";
		$comment .= "\n";
	}
}

//文章列表
function articleList($aType,$aLNum,$aTNum,$aLlb,$aDate,$aSort) {
	global $articleList;
	$articleList = '';
	switch ($aSort) {
		case "2":
			$aSort = "apv desc";
			break;
		case "1":
			$aSort = "aid desc";
			break;
		default:
			$aSort = "atop desc, aid desc";
			break;
	}
	$aWhere = " where atypeid=".$aType;
	if ($aType == 0) {
		$aWhere = "";
	}
	$query = 'select * from article'.$aWhere.' order by '.$aSort;
	$result = mysql_query($query);

	$a = 0;
	while($rs = mysql_fetch_object($result)) {
		$adate = date("y-m-d",strtotime($rs->adate));
		if ($aTNum == 0) {
			$aLTitle = $rs->atitle;
		}else {
			$aLTitle = utf8Substr($rs->atitle,0,$aTNum);
		}
		$aLdate = "";
		if ($aDate == 1) {
			$aLdate = "<span>".$adate."</span>";
		}
		$aLabel = "";
		if ($aLlb == 1) {
			$ahot = (($rs->apv) >= $GLOBALS["articlehot"]) ? '<em class="hot"><u>热门文章</u></em>' : '';
			$atop = (($rs->atop) == 1) ? '<em class="top"><u>热门文章</u></em>' : '';
			$anew = (abs((strtotime(date("Y-m-d"))-strtotime($adate))/86400) <= $GLOBALS["articlenew"]) ? '<em class="new"><u>置顶文章</u></em>' : '';
			$aLabel = $ahot.$atop.$anew;
		}
		if ($a % 2 == 0) $articleList .= '<li><cite><a href="'.$GLOBALS["Dir"].'article/'.$adate.'/'.$rs->aid.'.html" title="'.$rs->atitle.'">'.$aLTitle.'</a></cite>'."$aLabel$aLdate</li>\n";
		else $articleList .= '<li class="even"><cite><a href="'.$GLOBALS["Dir"].'article/'.$adate.'/'.$rs->aid.'.html" title="'.$rs->atitle.'">'.$aLTitle.'</a></cite>'."$aLabel$aLdate</li>\n";
		$a ++;
		if ($a == $aLNum) break;
	}
}

//相册列表
function album($albumType,$albumStyle,$albumSum) {
	global $album;
	$albumType = ($albumType != 0) ? ' where albumtype = '.$albumType : '';
	$query = 'select * from album '.$albumType.' order by albumid';
	$result = mysql_query($query);
	$total = mysql_num_rows($result);
	$album = "";
	if ($total < 1) $album = '暂无相册';
	else {
		$i = 0;
		while($rs = mysql_fetch_object($result)) {
			if ($albumStyle == 1) $album .= '<a href="'.$rs->albumlink.'" target="_blank"><img src="'.$rs->albumcover.'" alt="'.$rs->albumname.'" /></a>'."\n";
			else $album .= '				<div class="albumList">
						<p class="img"><a href="'.$rs->albumlink.'" target="_blank">
							<img src="'.$rs->albumcover.'" alt="'.$rs->albuminfo.'" />
						</a></p>
						<p><a href="'.$rs->albumlink.'" target="_blank">'.$rs->albumname.'</a></p>
					</div>
			';
			$i ++;
			if ($i !=0 && $i == $albumSum) break;
		}
	}
}

//单个栏目
function columnSingle($theTypeId,$theTypeLg="1") {
	global $columnSingle;
	$query = 'select typename,typenameen from ttype where typeautoid='.$theTypeId;
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	$rs = mysql_fetch_object($result);
	@$columnSingle = ($theTypeLg != "1") ? $rs->typenameen : $rs->typename;
}

//
if ($shownotice == 0) $notice = '';
else {
	$query = 'select fecontent from custom where feid = 1';
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	$rs = mysql_fetch_object($result);
	$notice =  stripslashes($rs->fecontent);
}

//广告
function adCode($adNo) {
	global $adCode;
	$adCode = '';
	$query = 'select fecontent from custom where fename = '.$adNo;
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	$rs = mysql_fetch_object($result);
	$adCode .= stripslashes($rs->fecontent);
}

//友情链接
function friendly($fNum=0,$fSet) {
	global $friendly;
	$friendly = '';
	$fSql = ($fSet == 1) ? ' and ltype=1 ' : ' and ltype=0 ';
	$query = 'select * from flink where lset = 1 '.$fSql.' order by lsort, ldate';
	$result = mysql_query($query) or die ('错误：' . mysql_error());	
	$i = 0;
	while($rs = mysql_fetch_object($result)) {
		if ($fSet == "1") {
			$friendly .=  '<a href="'.stripslashes($rs->lsite).'" target="_blank"><img src="'.stripslashes($rs->llogo).'" alt="'.stripslashes($rs->lname).' - '.stripslashes($rs->linfo).'" /></a>';
		}else {
			$friendly .= '<a href="'.stripslashes($rs->lsite).'" title="'.stripslashes($rs->linfo).'" target="_blank">'.stripslashes($rs->lname).'</a>';
		}
		$friendly .= "\n";
		$i ++;
		if ($fNum > 0 && $i == $fNum) break;
	}
}

//文章的前一篇，后一篇
function relation($articleId) {
	global $relation;
	$relation = '';
	$queryQ = 'select aid,atitle,adate from article where aid < '.$articleId.' order by aid desc limit 0,1';
	$resultQ = mysql_query($queryQ) or die ('错误：' . mysql_error());
	$rsQ = mysql_fetch_object($resultQ);
	if ($rsQ) $relation .= '<div class="relationL"><strong>上一篇：</strong><a href="../'.date("y-m-d",strtotime($rsQ->adate)).'/'.$rsQ->aid.'.html">'.$rsQ->atitle.'</a></div>';
	else $relation .= '<div class="relationL"><strong>上一篇：</strong>没有了。</div>';
	$queryH = 'select aid,atitle,adate from article where aid > '.$articleId.' order by aid asc limit 0,1';
	$resultH = mysql_query($queryH) or die ('错误：' . mysql_error());
	$rsH = mysql_fetch_object($resultH);
	if ($rsH) $relation .= '<div class="relationR"><strong>下一篇：</strong><a href="../'.date("y-m-d",strtotime($rsH->adate)).'/'.$rsH->aid.'.html">'.$rsH->atitle.'</a></div>';
	else $relation .= '<div class="relationR"><strong>下一篇：</strong>没有了。</div>';
}

//内容页分页
function articlePage($aid,$aP,$aCount) {
	global $articlePage;
	//echo $aP;
	$articlePage = '<ul class="articlePage">';
	$articlePage .= "\n";
		for ($p=0;$p<$aCount;$p++) {
			//echo $aP;
			if ($p == 0 && $aP == 0) $articlePage .= '<li><strong title="当前第1页">1</strong></li>';
			else if ($p == 0) $articlePage .= '<li><a href="'.$aid.'.html" title="转到第1页">1</a></li>';
			else if ($p == $aP) $articlePage .= '<li><strong title="当前第'.($p+1).'页">'.($p+1).'</strong></li>';
			else $articlePage .= '<li><a href="'.$aid.'-'.$p.'.html" title="转到第'.($p+1).'页">'.($p+1).'</a></li>';
			$articlePage .= "\n";
		}
		//echo "|".$aP."&".$p;
	$articlePage .= '</ul>';
return $articlePage;
}

//栏目页下的文章列表
function columnAList($aSql,$aPageSum) {
	global $columnAList;
	$articleSql = ($aSql == " where atypeid = $aSql ") ? "" : " where atypeid = $aSql ";
	$query = 'select * from article '.$articleSql.' order by atop desc, aid desc limit '.$aPageSum.','.$GLOBALS["howpage"];
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	$total = mysql_num_rows($result);
	if ($total == 0) $columnAList .= '<li>此栏目下暂无文章，请浏览其他内容。</li>';
	if ($aPageSum > 0 && $total == 0) {
		echo ' &nbsp; '.$aSql.' 。';
		exit;
	}

	$a = 0;
	while($rs = mysql_fetch_object($result)) {
		$adate = date("y-m-d",strtotime($rs->adate));
		$aLTitle = utf8Substr($rs->atitle,0,40);
		$aLdate = "<span>".$adate."</span>";
		$ahot = (($rs->apv) >= $GLOBALS["articlehot"]) ? '<em class="hot"><u>热门文章</u></em>' : '';
		$atop = (($rs->atop) == 1) ? '<em class="top"><u>热门文章</u></em>' : '';
		$anew = (abs((strtotime(date("Y-m-d"))-strtotime($adate))/86400) <= $GLOBALS["articlenew"]) ? '<em class="new"><u>置顶文章</u></em>' : '';
		$aLabel = $ahot.$atop.$anew;
		if ($a % 2 == 0) $columnAList .= '<li><cite><a href="'.$GLOBALS["Dir"].'article/'.$adate.'/'.$rs->aid.'.html" title="'.$aLTitle.'">'.$aLTitle.'</a></cite>'."$aLabel$aLdate</li>\n";
		else $columnAList .= '<li class="even"><cite><a href="'.$GLOBALS["Dir"].'article/'.$adate.'/'.$rs->aid.'.html" title="'.$aLTitle.'">'.$aLTitle.'</a></cite>'."$aLabel$aLdate</li>\n";
		$a ++;
	}
}

//栏目页文章列表分页
function sTypeSum($aSql) {
	global $singleTypeSum;
	$articleSql = ($aSql == "") ? "" : " where atypeid = $aSql ";
	$query = 'select aid from article '.$articleSql;
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	$total = mysql_num_rows($result);
	$singleTypeSum = ($total==0) ? 1 : ceil($total/$GLOBALS["howpage"]);
}

//栏目页文章分页页码
function columnPage($tid,$i) {
	global $columnPage;
	$pageSum = $GLOBALS["singleTypeSum"];
	if ($i==2) $columnPage .= '<a href="'.$tid.'.html">首页</a> <a href="'.$tid.'.html">上一页</a> ';
	else if ($i>1 && $i!=2) $columnPage .= '<a href="'.$tid.'.html">首页</a> <a href="'.$tid.'-'.($i-2).'.html">上一页</a> ';
	else $columnPage .= '';
	for ($p=1;$p<$pageSum+1;$p++) {
		if ($p==1 && $p==$i) $columnPage .= '<strong title="当前第1页">1</strong> ';
		else if ($p==1 && $i<5) $columnPage .= '<a href="'.$tid.'.html" title="转到第1页">1</a> ';
		else if (($i-$p) > 5) $columnPage .= '';
		else if (($p-$i) > 5) $columnPage .= '';
		else if ($p==$i) $columnPage .= '<strong title="当前第'.($p).'页">'.$p.'</strong> ';
		else $columnPage .= '<a href="'.$tid.'-'.($p-1).'.html" title="转到第'.($p).'页">'.$p.'</a> ';
	}
	if ($i<($pageSum)) $columnPage .= '<a href="'.$tid.'-'.$i.'.html">下一页</a> <a href="'.$tid.'-'.($pageSum-1).'.html">尾页</a>';
}

//弹层
function popLayer($layerShow,$layerId,$layerTitle,$layerContent,$layerButton,$layerUrl="") {
	if ($layerShow == 1) {
		$layerShow = '';
	}else {
		$layerShow = 'none';
	}
	echo '
<div class="notice" id="cue'.$layerId.'" style="display:'.$layerShow.';">'."\n";
	echo '<h2><span>Cue</span><cite>'.$layerTitle.'</cite><i onClick="document.getElementById(\'cue'.$layerId.'\').style.display=\'none\';">Close X</i></h2>'."\n";
	echo '<div class="noticeBox cueBox">'."\n";
	echo '<p>'.$layerContent.'</p>'."\n";
	if ($layerButton == "0") {
		echo '';
	}else if ($layerButton == "1") {
		echo '<p><input type="button" class="button" value="关闭" onClick="document.getElementById(\'cue'.$layerId.'\').style.display=\'none\';'.$layerUrl.'" /></p>';
	}else {
		echo '<p><input type="button" class="button" value="'.$layerButton.'" onClick="document.getElementById(\'cue'.$layerId.'\').style.display=\'none\';'.$layerUrl.'" /></p>';
	}
	echo '</div>'."\n";
	echo '</div>'."\n";
}

//友情链接 fLink([调用条数，0为不限制],[1为只调用图片链接，0为只调用文字的])
function fLink($fNum,$fSet) {
	$fSql = ($fSet == 1) ? ' and ltype=1 ' : ' and ltype=0 ';
	$limitSql = ($fNum == 0) ? "" : " limit 0,$fNum";
	$query = 'select * from flink where lset = 1 '.$fSql.' order by lsort, ldate'.$limitSql;
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	while($rs = mysql_fetch_object($result)) {
		if ($rs->ltype == 0) echo '<a href="'.stripslashes($rs->lsite).'" title="'.stripslashes($rs->linfo).'" target="_blank">'.stripslashes($rs->lname).'</a>'."\n";
		else echo '<a href="'.stripslashes($rs->lsite).'" target="_blank"><img src="'.stripslashes($rs->llogo).'" alt="'.stripslashes($rs->lname).' - '.stripslashes($rs->linfo).'" /></a>'."\n";
	}
}
//fLink(2,1);
?>
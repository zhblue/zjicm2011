<?php include_once("conn.php"); ?>
<?php
function tempReplace($makeContent) {
	global $makeContent, $tempEreg;
	$makeContent = str_replace("{webName}",$GLOBALS["webname"],$makeContent);
	$makeContent = str_replace("{webUrl}",$GLOBALS["weburl"],$makeContent);
	$makeContent = str_replace("{adminEmail}",$GLOBALS["adminmail"],$makeContent);
	$makeContent = str_replace("{columnList}",$GLOBALS["columnList"],$makeContent);
	$makeContent = str_replace("{vlogin}",$GLOBALS["vlogin"],$makeContent);
	$makeContent = str_replace("{custom}",$GLOBALS["custom"],$makeContent);
	$makeContent = str_replace("{slide}",$GLOBALS["slide"],$makeContent);
	$makeContent = str_replace("{record}",$GLOBALS["webicp"],$makeContent);
	$makeContent = str_replace("{tcmsDir}",$GLOBALS["Dir"],$makeContent);
	$makeContent = str_replace("{notice}",$GLOBALS["notice"],$makeContent);
//
	preg_match_all('/\{(.*?)\]}/',$makeContent,$tagName);
	$tempArrMax = count($tagName[0]);
	for ($i=0;$i<$tempArrMax;$i++) {
		$temp2 = $tagName[0][$i];
		$tagTemp = $tagName[0][$i];
		preg_match_all('/\{(.*?)\[/',$tagTemp,$temp1);
		$t1Arr = $temp1[1][0];
		$tagTemp = str_replace("{","",$tagName[0][$i]);
		$tagTemp = str_replace("]}","",$tagTemp);
		$tagTemp = str_replace("[","",$tagTemp);
		$tagTemp = str_replace($t1Arr,"",$tagTemp);
		$t2Arr = split(",",$tagTemp);
		$tempEreg = '{\\'.$t1Arr.'[^}]+\]}';
		if ($t1Arr == "articleList") {
			articleList($t2Arr[0],$t2Arr[1],$t2Arr[2],$t2Arr[3],$t2Arr[4],$t2Arr[5]);
			$makeContent = str_replace($temp2,$GLOBALS["articleList"],$makeContent);
		}else if ($t1Arr == "album") {
			album($t2Arr[0],$t2Arr[1],$t2Arr[2]);
			$makeContent = str_replace($temp2,$GLOBALS["album"],$makeContent);
		}else if ($t1Arr == "columnSingle") {
			columnSingle($t2Arr[0],$t2Arr[1]);
			$makeContent = str_replace($temp2,$GLOBALS["columnSingle"],$makeContent);
			//$makeContent = ereg_replace($tempEreg,$GLOBALS["columnSingle"],$makeContent);
		}else if ($t1Arr == "leave") {
			leave($t2Arr[0]);
			$makeContent = str_replace($temp2,$GLOBALS["leave"],$makeContent);
		}else if ($t1Arr == "comment") {
			comment($t2Arr[0]);
			$makeContent = str_replace($temp2,$GLOBALS["comment"],$makeContent);
		}else if ($t1Arr == "friendly") {
			friendly($t2Arr[0],$t2Arr[1]);
			$makeContent = str_replace($temp2,$GLOBALS["friendly"],$makeContent);
		}else if ($t1Arr == "adCode") {
			adCode($t2Arr[0]);
			$makeContent = str_replace($temp2,$GLOBALS["adCode"],$makeContent);
		}
	}
}

function makeIndex() {
	global $makeContent;
	$tempMain = "../template/index.html";
	//$openFile = fopen($tempHead,"r");
	$openMain = fopen($tempMain,"r");
	$makeContent = $GLOBALS["templateHead"];
	$makeContent .= fread($openMain,filesize("../template/index.html"));
	$makeContent .= $GLOBALS["templateFoot"];
	$makeContent = str_replace("{title}",$GLOBALS["webname"],$makeContent);
	$makeContent = str_replace("{sNumber}","I",$makeContent);
	$makeContent = str_replace("{description}",$GLOBALS["webint"],$makeContent);
	$makeContent = str_replace("{keywords}",$GLOBALS["webname"].", php早教系统, PHP网站程序.",$makeContent);

	tempReplace($makeContent);

	$makeFile = "../index.html";
	$htmlPageFoot = '<div class="space"></div>
	</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
	</html>';
	$handle = fopen($makeFile,"w"); //打开文件指针，创建文件
	if (!is_writable($makeFile)) die("<h3>生成首页失败，".$makeFile."不可写，请检查文件或目录属性后重试！</h3>".$htmlPageFoot);
	if (!fwrite($handle,$makeContent)) die("<h3>生成首页".$makeFile."失败！</h3>".$htmlPageFoot); //将信息写入文件
	fclose($handle); //关闭指针
	echo ("<h3>生成首页成功！</h3>");
}

function makeIndex4php() {
	global $makeContent;
	$tempMain = "template/index.html";
	//$openFile = fopen($tempHead,"r");
	$openMain = fopen($tempMain,"r");
	$makeContent = $GLOBALS["templateHead"];
	$makeContent .= fread($openMain,filesize("template/index.html"));
	$makeContent .= $GLOBALS["templateFoot"];
	$makeContent = str_replace("{title}",$GLOBALS["webname"],$makeContent);
	$makeContent = str_replace("{sNumber}","I",$makeContent);
	$makeContent = str_replace("{description}",$GLOBALS["webint"]."，本网站基于简易PHP网站系统构建，www.yinchaohuan.cn",$makeContent);
	$makeContent = str_replace("{keywords}",$GLOBALS["webname"].", 简易早教网站, PHP网站程序, 简单网站程序, www.yinchaohuan.cn.",$makeContent);

	tempReplace($makeContent);

	$makeFile = "index.html";
	$handle = fopen($makeFile,"w"); //打开文件指针，创建文件
	if (!is_writable($makeFile)) die("<h3>生成首页失败，".$makeFile."不可写，请检查文件或目录属性后重试！</h3>".$htmlPageFoot);
	if (!fwrite($handle,$makeContent)) die("<h3>生成首页".$makeFile."失败！</h3>".$htmlPageFoot); //将信息写入文件
	fclose($handle); //关闭指针
}

function makecolumn($makeSql) {
	global $makeContent;
	$query = 'select * from ttype where outurl !=1 and typefather !=0 '.$makeSql.' order by typeid';
	$result = mysql_query($query);
	while($rs=mysql_fetch_object($result)) {
		templates();
		$tempMain = ($rs->outurl == 2) ? "../template/album.html" : "../template/column.html";
		//$openFile = fopen($tempHead,"r");
		$openMain = fopen($tempMain,"r");
		$makeContent = $GLOBALS["templateHead"];
		$makeContent .= ($rs->outurl == 2) ? fread($openMain,filesize("../template/album.html")) : fread($openMain,filesize("../template/column.html"));
		$makeContent .= $GLOBALS["templateRight"];
		$makeContent .= $GLOBALS["templateFoot"];
		
		$makeContent = str_replace("{title}",$rs->typename.' - '.$GLOBALS["webname"],$makeContent);
		$makeContent = str_replace("{columnId}",$rs->typeautoid,$makeContent);
		$makeContent = str_replace("{sNumber}",$rs->typefather,$makeContent);
		$makeContent = str_replace("{description}",$rs->typename.' - '.$GLOBALS["webname"],$makeContent);
		$makeContent = str_replace("{keywords}",$rs->typename.", 简易早教网站, PHP网站程序, 简单PHP网站程序, www.yinchaohuan.cn.",$makeContent);

		tempReplace($makeContent);

		$tempContent = $makeContent;
		sTypeSum($GLOBALS["aSql"]);
		for ($i=0;$i<$GLOBALS["singleTypeSum"];$i++) {
			columnAList($GLOBALS["aSql"],$i*$GLOBALS["howpage"]);
			//echo $GLOBALS["columnAList"].'-------------'.($i*$GLOBALS["howpage"]).'<br>';
			$makeContent = str_replace("{columnAList}",$GLOBALS["columnAList"],$tempContent);
			$GLOBALS["columnAList"] = "";//清空累加
//栏目分页
			columnPage($rs->typeautoid,$i+1);
			$makeContent = str_replace("{columnPage}",$GLOBALS["columnPage"],$makeContent);
			$GLOBALS["columnPage"] = "";

			$makeFile = ($i==0) ? "../column/$rs->typeautoid.html" : "../column/$rs->typeautoid-$i.html";
			$htmlPageFoot = '<div class="space"></div>
			</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div></body>
			</html>';
			$handle = fopen($makeFile,"w"); //打开文件指针，创建文件
			if (!is_writable($makeFile)) die("<h3>生成失败，".$makeFile."不可写，请检查文件或目录属性后重试！</h3>".$htmlPageFoot);
			if (!fwrite($handle,$makeContent)) die("<h3>生成".$makeFile."失败！</h3>".$htmlPageFoot); //将信息写入文件
			fclose($handle); //关闭指针
		}
		echo ' &nbsp; <a href="'.$GLOBALS["Dir"].'column/'.$rs->typeautoid.'.html" title="浏览该栏目" target="_blank">'.$rs->typename.'</a>';
	}
}


function makeArticle($makeSql) {
	global $makeContent;
	echo '<h4>已成功生成以下文章：';
	$query = 'select * from article '.$makeSql.' order by aid';
	$result = mysql_query($query) or die ('错误：' . mysql_error());
	while($rs = mysql_fetch_object($result)) {
		templates();
		$tempMain = "../template/article.html";
		$openMain = fopen($tempMain,"r");
		$makeContent = $GLOBALS["templateHead"];
		$makeContent .= fread($openMain,filesize("../template/article.html"));
		$makeContent .= $GLOBALS["templateRight"];
		$makeContent .= $GLOBALS["templateFoot"];
//获取当前类别
		$query1 = 'select typeautoid,typename,typenameen from ttype where typeautoid='.$rs->atypeid;
		$result1 = mysql_query($query1) or die ('错误：' . mysql_error());
		$rs1 = mysql_fetch_object($result1);
		$makeContent = str_replace("{articleType}","<span><a href=\"../../column/$rs1->typeautoid.html\">$rs1->typenameen</a></span><cite><a href=\"../../column/$rs1->typeautoid.html\">$rs1->typename</a></cite>",$makeContent);
//替换文章标签
		$makeContent = str_replace("{articleTitle}",$rs->atitle,$makeContent);
		$makeContent = str_replace("{articleId}",$rs->aid,$makeContent);
		$makeContent = str_replace("{articleTypeId}",$rs->atypeid,$makeContent);
		$makeContent = str_replace("{articleDate}",$rs->adate,$makeContent);
		$makeContent = str_replace("{articleSum}",'<script type="text/javascript" src="'.$GLOBALS["Dir"].'include/article-sum.php?aid='.$rs->aid.'"></script>',$makeContent);
		$makeContent = str_replace("{title}",$rs->atitle.' - '.$GLOBALS["webname"],$makeContent);

		$queryF = 'select typefather from ttype where typeautoid = '.$rs->atypeid;
		$resultF = mysql_query($queryF);
		$rsF = mysql_fetch_object($resultF);
		$makeContent = str_replace("{sNumber}","$rsF->typefather",$makeContent);

		$makeContent = str_replace("{description}",$rs->atitle.$rs->ainfo,$makeContent);
		$makeContent = str_replace("{keywords}",$rs->atitle.','.$rs->akey,$makeContent);

		relation($rs->aid);
		$makeContent = str_replace("{relation}",$GLOBALS["relation"],$makeContent);

		tempReplace($makeContent);

//内容分页
		$aArr = split('\-\-\|\-\-',stripslashes($rs->acontent));
		$aCount = count($aArr);
		$tempContent = $makeContent;
		for ($aP=0;$aP<$aCount;$aP++) {
//页码
			if ($aCount == 1) $makeContent = str_replace("{articlePage}","",$makeContent);
			else {
				articlePage($rs->aid,$aP,$aCount);
				$makeContent = str_replace("{articlePage}",$GLOBALS["articlePage"],$tempContent);
			}

			$makeContent = str_replace("{article}",$aArr[$aP],$makeContent);
			$makeContent = str_replace($aArr,$aArr[$aP],$makeContent);
			$adate = date("y-m-d",strtotime($rs->adate));
			$makeFile = ($aCount==1 || $aP==0) ? "../article/$adate/".$rs->aid.".html" : "../article/$adate/".$rs->aid."-".$aP.".html";
			if(!is_dir("../article/$adate")) mkdir("../article/$adate"); //如果此文件夹不存在，则自动建立一个
			chmod("../article/$adate",0777);
			$handle = fopen($makeFile,"w"); //打开文件指针，创建文件
			if (!is_writable($makeFile)) die("生成失败，".$makeFile."不可写，请检查文件或目录属性后重试！");
			if (!fwrite($handle,$makeContent)) die("生成".$makeFile."失败！"); //将信息写入文件
			fclose($handle); //关闭指针
		}
		echo ' &nbsp; <a href="'.$GLOBALS["Dir"].'article/'.$adate.'/'.$rs->aid.'.html" title="浏览该篇文章" target="_blank">'.$rs->aid.'</a>';
	}
	echo '</h4>';
}
?>
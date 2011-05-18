<?php
session_start();
include_once("conn.php");
?>
<?php
if (isset($_POST['save']) && $_POST['save'] == 'comment') savecomment();
if (isset($_POST['show']) && $_POST['show'] == 'content') content();
function savecomment() {
	$hexie = array("日你","操你","我操","他妈","她妈","它妈","你妈","日她","我日","妈的","吗的","妈B");
	$comname = trim(addslashes($_REQUEST['comname']));
	$comname = strip_tags($comname);
	$comcontent = trim(addslashes($_REQUEST['comcontent']));
	$comcontent = strip_tags($comcontent);
	$comname = str_replace($hexie,'河蟹',$comname);
	$comcontent = str_replace($hexie,'河蟹',$comcontent);
	$comtypeid = intval(addslashes($_REQUEST['comtypeid']));
	$comip = (strtolower($comname) == 't') ? 'dafi' : $_SERVER['REMOTE_ADDR'];
	$comdate = date("y-m-d H:i:s");
	$comverify = ($GLOBALS["setleave"] == 1) ? '0' : '1';
	if (isset($_SESSION["comcontent"]) && $comcontent == $_SESSION["comcontent"]) {
		echo '<div class="pop">你已经发表过了，无需再次发表。</div>';
		exit;
	}else if (intval($_POST['codeNum']) != $_SESSION["codeNumber"]) {
		echo '<div class="pop">验证码不对。</div>';
		exit;
	}else if ($comname == "") {
		echo '<div class="pop">请输入你的昵称。</div>';
		exit;
	}else if (strlen($comcontent) < 3) {
		echo '<div class="pop">评论字数太少了。</div>';
		exit;
	}else if (strlen($comcontent) > 1000) {
		echo '<div class="pop">评论字数太多了。</div>';
		exit;
	}else {
		$_SESSION["comcontent"] = $comcontent;
		$sqlQuery = "insert into comment (comname,comcontent,comtypeid,comdate,comip,comverify) VALUES ('$comname','$comcontent','$comtypeid','$comdate','$comip','$comverify')";
		mysql_query( $sqlQuery ) or die(mysql_error());
		if ($GLOBALS["setleave"] == 1) echo '<div class="pop">发表成功！请等待审核！</div>';
		else echo '<div class="pop">发表成功！</div>';
	}
}

function content() {
	$pageNow = intval(addslashes($_POST["page"]));
	$limit1 = ($pageNow - 1) * 5;
	$cTypeWhere = (isset($_POST["comtypeid"])) ? 'where comtypeid='.intval(addslashes($_POST["comtypeid"])) : '';
	$cVerifyWhere = ($GLOBALS["setleave"] == 0) ? '' : ' and comverify = 1 ';
	$query = 'select * from comment '.$cTypeWhere.$cVerifyWhere.' order by comid desc limit '.$limit1.',5';
	$total = mysql_num_rows(mysql_query('select comid from comment '.$cTypeWhere)); 
	$pagesum = ceil($total/5);
	$result = mysql_query($query) or die ('错误'. mysql_error());
	if (mysql_num_rows($result)<1) echo '暂无评论，快来抢沙发。';
	else {
		while($rs=mysql_fetch_object($result)) {
			echo '<div class="commentList">';
			echo '<div class="commentTitle"><cite>
				<a href="http://www.baidu.com/s?wd='.$rs->comip.'" title="点击查询IP归属地" target="_blank">'.stripslashes($rs->comname).'</a></cite> <span>'.$rs->comdate.'</span></div>';
			echo '<div class="commentContent">'.stripslashes($rs->comcontent).'</div>';
			echo '</div>';
		}
		if ($pagesum<2) echo '';
		else {
			echo '<div class="listPage commentPage">';
			if ($pageNow != 1) echo '<a onclick="comment(1,'.$_POST["comtypeid"].');" href="javascript://;">首页</a> ';
			for ($i=1;$i<($pagesum+1);$i++) {
				if ($i == $_POST["page"]) echo '<strong>'.$i.'</strong> ';
				else if (($pageNow - $i) > 5 || ($i - $pageNow) > 5) echo ' . ';
				else echo '<a onclick="comment('.$i.','.$_POST["comtypeid"].');" href="javascript://;">'.$i.'</a> ';
			}
			if ($pageNow != $pagesum) echo '<a onclick="comment('.$pagesum.','.$_POST["comtypeid"].');" href="javascript://;">尾页</a> ';
			echo '</div>';
		}
	}
}
?>
<?php
session_start();
include_once("include/temp.php");
include_once("include/function.php");
include_once("include/page.php");
?>
<?php
templates("");
$templateHead = str_replace("{title}",'留言本 - '.$webname,$templateHead);
$templateHead = str_replace("{sNumber}",'L',$templateHead);
$makeContent = $templateHead;
tempReplace($makeContent);
echo $makeContent;
?>

<script type="text/javascript">
function getId(idName){return document.getElementById(idName);}
function tSubmit(form){
	if(form.code.value == ''){
		getId('label1').innerHTML = '请输入验证码';
		form.code.focus();
		return false;
	}
	if(form.guestName.value == ''){
		getId('label2').innerHTML = '请输入你的称呼';
		form.guestName.focus();
		return false;
	}
	if(form.guestContact.value == '' || form.guestContact.value.length < 5){
		getId('label3').innerHTML = '请输入你的联系方式';
		form.guestContact.focus();
		return false;
	}
	return true;
}
function tabInput(inputId,labelId) {
	if (getId(inputId).value.length == "") {
		if (labelId == 1) {
			getId("label"+labelId).innerHTML = "请输入验证码";
		}else if (labelId == 2) {
			getId("label"+labelId).innerHTML = "请输入你的称呼";
		}else if (labelId == 3) {
			getId("label"+labelId).innerHTML = "请输入你的联系方式";
		}
	}else if (getId(inputId).value.length >= 1) {
		getId("label"+labelId).innerHTML = "";
	}
}
function selectImg(imgSrc) {
	getId("userImg").src = "images/head/head-"+imgSrc+".gif";
	getId('headLayer').style.display = "none";
	getId("guestHead").value = imgSrc;
}
</script>

<?php if (isset($_GET['action']) && addslashes($_GET['action']) == "publish") publish(); ?>

		<div class="left">

<?php
$page = isset($_GET['p']) ? intval($_GET['p']):1;
$guestVerify = ($setleave == 1) ? " where guestVerify = 1 " : "";
$query1 = 'select guestId from guestbook '.$guestVerify;
$total = mysql_num_rows(mysql_query($query1));
$pagenum=ceil($total/10);
if($page>$pagenum || $page == 0){
	popLayer(1,1,"出错了！","<br /><br /><strong>没有这一页。</strong>","返回","history.go(-1);");
}
$offset = ($page-1)*10;
?>

			<h2>
				<div class="ftl"></div>
				<span>Leave Book</span>
				<cite>留言本</cite>
			</h2>
			<div class="fm leaveWord">
<?php
$query = 'select * from guestbook '.$guestVerify.' order by guestId desc limit '.$offset.',10';
$result = mysql_query($query) or die ('错误：' . mysql_error());
while($rs=mysql_fetch_object($result)) {
?>
				<div class="leaveList">
					<div class="leaveL">
						<img src="images/head/head-<?php echo $rs->guestHead; ?>.gif" alt="<?php echo $rs->guestName; ?>" />
					</div>
					<div class="leaveR">
						<div class="leaveTitle">
							<span><?php echo $rs->guestDate; ?></span>
							<strong><?php echo stripslashes($rs->guestName); ?></strong>
							<em><?php echo stripslashes($rs->guestContact); ?></em>
							<!--<a class="userContact" title="<?php echo $rs->guestContact; ?>"><u>联系方式</u></a>-->
							<em><?php if (strlen($rs->guestUrl) > 12) echo $rs->guestUrl; ?></em>
						</div>
						<div class="leaveMatter">
							<?php echo stripslashes($rs->guestContent); ?>
						</div>
<?php
if ($rs->myRe == "") echo "";
else {
	echo '						<div class="leaveRe">
							<strong>'.$gbAdmin.'：</strong>'.stripslashes($rs->myRe).'
						</div>
';
	}
?>
					</div>
				</div>
<?php
}
?>

				<div class="listPage leavePage">
<?php
$page_size=10;
$nums=$total;
$sub_pages=10;
$pageCurrent=$page;
$subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"leave.php?p=");
?>
				</div>

			</div>
			<div class="fe"><div class="fel"></div></div>

			<h2>
				<div class="ftl"></div>
				<span>Publish Leave</span>
				<cite>发表留言</cite>
			</h2>
			<div class="fm">

				<div class="gbHead">
					<p><img id="userImg" src="images/head/head-01.gif" alt="你可以选择你喜欢的头像" /></p>
					<p><input type="button" value="选择头像" onclick="document.getElementById('headLayer').style.display = 'block';" /></p>
					<div class="headLayer" id="headLayer" title="关闭" style="display:none;">
						<div class="headLClose" onclick="document.getElementById('headLayer').style.display = 'none';">X</div>
						<div class="headLayerBox">
							<a href="javascript:selectImg('01');"><img src="images/head/thumbs/head-01.gif" alt="点击选中头像" /></a>
							<a href="javascript:selectImg('02');"><img src="images/head/thumbs/head-02.gif" alt="点击选中头像" /></a>
							<a href="javascript:selectImg('03');"><img src="images/head/thumbs/head-03.gif" alt="点击选中头像" /></a>
							<a href="javascript:selectImg('04');"><img src="images/head/thumbs/head-04.gif" alt="点击选中头像" /></a>
							<a href="javascript:selectImg('05');"><img src="images/head/thumbs/head-05.gif" alt="点击选中头像" /></a>
							<a href="javascript:selectImg('06');"><img src="images/head/thumbs/head-06.gif" alt="点击选中头像" /></a>
							<a href="javascript:selectImg('07');"><img src="images/head/thumbs/head-07.gif" alt="点击选中头像" /></a>
							<a href="javascript:selectImg('08');"><img src="images/head/thumbs/head-08.gif" alt="点击选中头像" /></a>
							<a href="javascript:selectImg('09');"><img src="images/head/thumbs/head-09.gif" alt="点击选中头像" /></a>
							<a href="javascript:selectImg('10');"><img src="images/head/thumbs/head-10.gif" alt="点击选中头像" /></a>
							<p></p><!-- IE6 a元素float BUG Fuck IE6 -->
						</div>
					</div>
				</div>
				<div class="gbInfo">
					<form action="leave.php?action=publish" method="post" onsubmit="return tSubmit(this);">
					<p><img src="include/code.php" alt="点击刷新验证码" name="codeNum" id="codeNum" class="code" onclick="this.src+='?' + Math.random();" />
					<input type="text" name="code" id="code" class="short" maxlength="4" onBlur="tabInput('code','1');" /> <label for="code">验证码（必须）<span id="label1">*</span></label>
					点击图片可刷新验证码 </p>
					<p><input type="text" name="guestName" id="guestName" maxlength="12" onBlur="tabInput('guestName','2');" /> <label for="guestName">你的称呼（必须）<span id="label2">*</span></label></p>
					<p><input type="text" name="guestContact" id="guestContact" maxlength="30" onBlur="tabInput('guestContact','3');" /> <label for="guestContact">你的联系方式（必须）<span id="label3">*</span></label></p>
					<p><input type="text" name="guestUrl" id="guestUrl" value="http://" maxlength="50" /> <label for="guestUrl">你的网站或Blog</label><input type="hidden" value="01" name="guestHead" id="guestHead" /></p>
					<p class="textarea"><textarea name="guestContent"></textarea></p>
					<p><input type="submit" class="button" value="发表" /> <input type="reset" class="button" value="清空" /></p>
					</form>
				</div>

			</div>
			<div class="fe"><div class="fel"></div></div>

		</div><!-- left -->

<?php
$makeContent = $templateRight;
tempReplace($makeContent);
echo $makeContent;
?>


<?php
function publish() {
	if ((isset($_SESSION['s_guestName']) && $_POST['guestName'] == $_SESSION['s_guestName']) && (isset($_SESSION['s_guestContent']) && $_POST['guestContent'] == $_SESSION['s_guestContent'])) {
		popLayer(1,1,"提醒你","<br /><br /><strong>你已经发表过了，无需再次发表。</strong>","后退","history.go(-1);");
		exit;
	}
	if ($_POST['code'] != $_SESSION["codeNumber"]) {
		popLayer(1,1,"提醒你","<br /><br /><strong>验证码错误。</strong>","后退","history.go(-1);");
		exit;
	}else if ($_POST['guestName'] == "") {
		popLayer(1,1,"提醒你","<br /><br /><strong>你的称呼是必须填写的。</strong>","后退","history.go(-1);");
		exit;
	}else {
		$guestName = strip_tags(addslashes($_POST['guestName']));
		$_SESSION['s_guestName'] = $guestName;
	}
	if (strlen(strip_tags($_POST['guestContent'])) < 5) {
		popLayer(1,1,"提醒你","<br /><br /><strong>既然写了，就多打几个字吧。</strong>","后退","history.go(-1);");
		exit;
	}else if (strlen($_POST['guestContent']) > 1000) {
		popLayer(1,1,"提醒你","<br /><br /><strong>请保证留言内容在1000个字符以下。</strong>","后退","history.go(-1);");
		exit;
	}else {
		$guestContent = strip_tags($_POST['guestContent']);
		//$guestContent = preg_replace('[\n|\r]+',"\n",$guestContent);
		$guestContent = nl2br($guestContent);
		$guestContent = trim($guestContent);
		$_SESSION['s_guestContent'] = $guestContent;
	}
	$guestContact = strip_tags(addslashes($_POST['guestContact']));
	$guestUrl = (strlen($_POST['guestUrl']) < 8) ? "" : strip_tags(addslashes($_POST['guestUrl']));
	$guestHead = addslashes($_POST['guestHead']);
	$guestIp = $_SERVER['REMOTE_ADDR'];
	$guestDate = date("y-m-d H:i:s");
	$guestVerify = ($GLOBALS["setleave"] == 1) ? '0' : '1';
	//echo $guestContact. "\n" .$guestContent ."\n";

	$sqlQuery = "insert into guestbook (guestName, guestContact, guestUrl, guestDate, guestHead, guestContent, guestIp, guestVerify) values ('$guestName', '$guestContact', '$guestUrl' , '$guestDate', '$guestHead' , '$guestContent' , '$guestIp' , '$guestVerify')";
	mysql_query($sqlQuery);
	if ($GLOBALS["setleave"] == 1) popLayer(1,0,"留言成功！","<br /><strong>留言成功，请等待审核。</strong><br /><strong>谢谢你的留言！</strong>",1);
	else {
		popLayer(1,0,"留言成功！","<br /><strong>留言成功！</strong><br /><strong>谢谢你的留言！</strong>",1);
		templates("");
		makeIndex4php();
	}
}
?>

<?php
$makeContent = $templateFoot;
tempReplace($makeContent);
echo $makeContent;
?>
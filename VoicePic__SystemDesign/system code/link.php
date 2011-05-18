<?php
session_start();
include_once("include/temp.php");
include_once("include/function.php");
?>
<?php
templates("");
$templateHead = str_replace("{title}",'友情链接 - '.$webname,$templateHead);
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
	if(form.lname.value == ''){
		getId('label2').innerHTML = '请输入你的网站名称';
		form.lname.focus();
		return false;
	}
	if(form.lsite.value == '' || form.lsite.value.length < 11){
		getId('label3').innerHTML = '请输入你的网站地址';
		form.lsite.focus();
		return false;
	}
	return true;
}
function tabInput(inputId,labelId) {
	if (getId(inputId).value.length < 3) {
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
</script>

<?php if (isset($_GET['action']) && addslashes($_GET['action']) == "addLink") addLink(); ?>

		<div class="left">

			<h2>
				<div class="ftl"></div>
				<span>Friendly Link</span>
				<cite>友情链接</cite>
			</h2>
			<div class="fm linkAll">

				<h3>文字链接</h3>
				<div class="linkTxt">
					<?php fLink(0,0); ?>
				</div>
				<h3>图片链接</h3>
				<div class="linkImg">
					<?php fLink(0,1); ?>
				</div>

			</div>
			<div class="fe"><div class="fel"></div></div>

			<h2>
				<div class="ftl"></div>
				<span>Apply Link</span>
				<cite>申请链接</cite>
			</h2>
			<div class="fm">

				<div class="gbInfo">
					<form action="link.php?action=addLink" method="post" onsubmit="return tSubmit(this);">
					<p><img src="include/code.php" alt="点击刷新验证码" name="codeNum" id="codeNum" class="code" onclick="this.src+='?' + Math.random();" />
					<input type="text" name="code" id="code" class="short" maxlength="4" onblur="tabInput('code',1);" /> <label for="code">验证码（必须）<span id="label1">*</span></label>
					点击图片可刷新验证码 </p>
					<p><input type="text" name="lname" id="lname" maxlength="30" onblur="tabInput('lname',2);" /> <label for="lname">网站名称（必须）<span id="label2">*</span></label></p>
					<p><input type="text" name="lsite" id="lsite" value="http://" maxlength="50" onblur="tabInput('lsite',3);" /> <label for="lsite">网站地址（必须）<span id="label3">*</span></label></p>
					<p><input type="text" name="linfo" id="linfo" class="long" maxlength="68" /> <label for="linfo">网站介绍</label></p>
					<p>
						<input type="text" class="long" name="llogo" id="logoInput" value="http://" maxlength="50" style="display:none;" />
						<input type="checkbox" name="ltype" class="check" id="ltype" value="1" onclick="if(getId('logoInput').style.display=='none'){getId('logoInput').style.display='inline';}else{getId('logoInput').style.display='none';};" />
						<label for="ltype">Logo链接</label>
					</p>
					<p><input type="submit" class="button" value="申请" /> <input type="reset" class="button" value="清空" /></p>
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
function addLink() {
	if ((isset($_SESSION['s_lname']) && $_POST['lname'] == $_SESSION['s_lname']) && (isset($_SESSION['s_lsite']) && $_POST['lsite'] == $_SESSION['s_lsite'])) {
		popLayer(1,1,"提醒你","<br /><br /><strong>你已经申请过了，无需再次申请。</strong>","后退","history.go(-1);");
		exit;
	}
	if ($_POST['code'] != $_SESSION["codeNumber"]) {
		popLayer(1,1,"提醒你","<br /><br /><strong>验证码错误。</strong>","后退","history.go(-1);");
		exit;
	}else if ($_POST['lname'] == "") {
		popLayer(1,1,"提醒你","<br /><br /><strong>网站名称是必须填写的。</strong>","后退","history.go(-1);");
		exit;
	}else {
		$lname = addslashes($_POST['lname']);
		$_SESSION['s_lname'] = $lname;
	}
	if (strlen($_POST['lsite']) < 12) {
		popLayer(1,1,"提醒你","<br /><br /><strong>网站地址是必须填写的。</strong>","后退","history.go(-1);");
		exit;
	}else {
		$lsite = addslashes($_POST['lsite']);
		$_SESSION['s_lsite'] = $lsite;
	}
	$llogo = (strlen($_POST['llogo']) > 12) ? addslashes($_POST['llogo']) : "";
	$ltype = (isset($_POST['ltype']) && strlen($_POST['llogo']) > 12) ? "1" : "0";
	$linfo = addslashes($_POST['linfo']);
	$ldate = date("y-m-d H:i:s");
	//echo $postlogo . "|" . $postlogo1. "|" .$llogo ."\n";

	$sqlQuery = "insert into flink (lname, linfo, lsite, ldate, llogo, ltype) values ('$lname', '$linfo', '$lsite', '$ldate', '$llogo', '$ltype')";
	popLayer(1,0,"申请成功！","<br /><br /><strong>友情链接申请成功，请等待审核。</strong>",1);
	mysql_query( $sqlQuery ) or die(mysql_error());
}
?>

<?php
$makeContent = $templateFoot;
tempReplace($makeContent);
echo $makeContent;
?>
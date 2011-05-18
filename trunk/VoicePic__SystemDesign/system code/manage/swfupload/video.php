<!-----
		[Leo.C, Studio] (C)2004 - 2008
		
   		$Hanization: LeoChung $
   		$E-Mail: who@imll.net $
   		$HomePage: http://imll.net $
   		$Date: 2008/11/8 18:02 $
----->
<?php include_once("../../include/conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<head>
<title>VOICEUpload</title>
<!--<link href="css/default.css" rel="stylesheet" type="text/css" />-->
<link href="../css/content.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="swfupload/swfupload.js"></script>
<script type="text/javascript" src="js/swfupload.queue.js"></script>
<script type="text/javascript" src="js/fileprogress.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>
<script type="text/javascript">
		var swfu;
		window.onload = function() {
			var settings = {
				flash_url : "swfupload/swfupload.swf",
				upload_url: "http://localhost/manage/swfupload/upload.php",	// Relative to the SWF file
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
				file_size_limit : "100 MB",
				file_types : "*.*",
				file_types_description : "All Files",
				file_upload_limit : 100,
				file_queue_limit : 0,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,

				// Button settings
				button_image_url: "images/TestImageNoText_65x29.png",	// Relative to the Flash file
				button_width: "65",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '<span class="theFont">浏览</span>',
				button_text_style: ".theFont { font-size: 16; }",
				button_text_left_padding: 12,
				button_text_top_padding: 3,
				
				// The event handler functions are defined in handlers.js
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	// Queue plugin event
			};
			swfu = new SWFUpload(settings);
			};
		function setPost(){     //动态传递参数
		  var type = document.getElementById('type').value; //视频类型
          var name = document.getElementById('name').value; //视频题目
		  var level = document.getElementById('level').value; //视频难度
          swfu.addPostParam("type", type);
		  swfu.addPostParam("name", name);//动态修改SWFUpload初始化设置中的post_params属性，其中所有的值都将被覆盖。
		  swfu.addPostParam("level", level);
		}
	</script>
</head>
<body>
<?php
function del() {
	$vid = $_GET['vid'];
	$sql = "delete from video where vid = '$vid'";
	$result = MYSQL_QUERY($sql);
	echo "<script type='text/javascript'>location='video.php';</script>";
}
?>
<div id="content">
<u class="b1"></u><u class="b2"></u><u class="b3"></u><div class="contentIn">
	<h2>VoiceUpload</h2>
	
<ul class="aList aTitle">
	<li class="l1">序号</li>
	<li class="l2">名字</li>
	<li>类型</li>
	<li>地址</li>
	<li>级别</li>
	<li>发布时间</li>
	<li>内容</li>
	<li class="del">删除</li>
</ul>
<?php
if (isset($_GET['action']) && addslashes($_GET['action']) == "edit") edit();
if (isset($_GET['action']) && addslashes($_GET['action']) == "del") del();

$query = 'SELECT * FROM video order by vid asc';
$result = mysql_query($query) or die ('错误：' . mysql_error());
$count = 0;
while($rs=mysql_fetch_object($result)) {
if ($count % 2 == 0) echo '<ul class="aList">';
else echo '<ul class="aList even">';
?>
<li class="l1"><?php echo $rs->vid; ?></li>
<li class="l2"><input text="text" value="<?php echo $rs->vname; ?>" name="atitle" maxlength="68" /></li>
<li><input text="text" value="<?php echo $rs->vtype; ?>" name="vtype" maxlength="8" /></li>
<li><input text="text" value="<?php echo $rs->vurl; ?>" name="vurl" maxlength="20" /></li>
<li><input text="text" value="<?php echo $rs->vlevel; ?>" name="vlevel" maxlength="20" /></li>
<li><input text="text" value="<?php echo $rs->vdate; ?>" name="vdate" maxlength="20" /></li>
<li><a href="editor.php?action=edit&vid=<?php echo $rs->vid; ?>">编辑</a></li>
<li class="del"><a href="video.php?vid=<?php echo $rs->vid; ?>&action=del" onclick="return confirm('真的要删除？')">删除</a></li>
</ul>
<?php
$count++;
}
?>
<div class="space"></div>
<h2>新增语音</h2>
	<form id="form1" action="" method="post" enctype="multipart/form-data">
		<div id="divStatus"><h3>0 个文件已上传</h3></div>
		<div class="inBox">
		<label>类型：</label>&nbsp;
			  <select id="type" name="type" value="voice">
			  <option value="voice">voice</option>
			  <option value="games">games</option>
			  </select>
		</div>		
		<div class="inBox">
		<label>名字：</label><input type="text" class="textC" id="name" name="name"/>
		</div>		
		<div class="inBox">
		<label>级别：</label>&nbsp;
			  <select id="level" name="level" value="easy" onblur="setPost();">
			  <option value="easy">easy</option>
			  <option value="middle">middle</option>
			  <option value="difficult">difficult</option>
			  </select>
		</div>
		<div class="inBox">
		<label>文件：</label>
		<span id="spanButtonPlaceHolder"></span>
		<input id="btnCancel" type="button" value="取消所有上传" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 7pt; height: 25px;" />
		</div>
	</form>
<div class="space"></div>
</div><u class="b3"></u><u class="b2"></u><u class="b1"></u></div>
</body>
</html>

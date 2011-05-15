<?

require_once("include/db_info.inc.php");
$user_id=$_POST['user_id'];
if (isset($_POST['problem_id'])) $id=intval($_POST['problem_id']);
else{
	echo "<h2>No Such Problem!</h2>";
	exit(0);
}
$source=$_POST['source'];
if(get_magic_quotes_gpc())
	$source=stripslashes($source);
$source=mysql_real_escape_string($source);
//$source=trim($source);
$len=strlen($source);
//echo $source;

$language=intval($_POST['language']);
if ($language>6 || $language<0) $language=0;
$language=strval($language);

$ip=$_SERVER['REMOTE_ADDR'];

if ($len<2){
	require_once("oj-header.php");
	echo "Source Code Too Short!";
	require_once("oj-footer.php");
	exit(0);
}
if ($len>65536){
	require_once("oj-header.php");
	echo "Source Code Too Long!";
	require_once("oj-footer.php");
	exit(0);
}
$sql= "SELECT * FROM `users` WHERE user_id =".$user_id;

if(!mysql_query($sql)){
	$sql="INSERT INTO `users`("
	."`user_id`,`email`,`ip`,`accesstime`,`password`,`reg_time`,`nick`,`school`)"
	."VALUES('".$user_id."','".$_POST['email']."','".$_SERVER['REMOTE_ADDR']."',NOW(),'".$password."',NOW(),'".$user_id."','".$school."')";
	mysql_query($sql);// or die("Insert Error!\n");
}

$sql="INSERT INTO solution(problem_id,user_id,in_date,language,ip,code_length)
	VALUES('$id','$user_id',NOW(),'$language','$ip','$len')";

mysql_query($sql);
$insert_id=mysql_insert_id();

$sql="INSERT INTO `source_code`(`solution_id`,`source`)VALUES('$insert_id','$source')";
mysql_query($sql);

?>

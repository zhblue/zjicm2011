<?php
	$action=$_REQUEST['action'];
	switch ($action){
		case "problem":
			require_once 'problem_ajax.php';
			break;
		case "problemset":
			require_once 'problemset_ajax.php';
			break;
		default:
			break;
	}
?>
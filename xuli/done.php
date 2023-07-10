<?php
	session_start();
	require_once __DIR__."/../config.php";
 
	if($_GET['task_id']){
		$taskid = $_GET['task_id'];
 
		$conn->query("UPDATE `todo` SET `done` = 1 WHERE `taskid` = $taskid") or die(mysqli_errno($conn));
		header("location:/");
	}
?>
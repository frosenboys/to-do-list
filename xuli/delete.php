<?php
	session_start();
	require_once __DIR__."/../config.php";
 
	if($_GET['task_id']){
		$task_id = $_GET['task_id'];
 
		$conn->query("DELETE FROM `todo` WHERE `taskid` = $task_id") or die(mysqli_errno($conn));
		header("location:/");
	}	
?>
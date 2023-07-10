<?php 
	session_start();
	require_once __DIR__."/../config.php";
	if(ISSET($_POST['add'])){
        if($_POST['task'] != "" && $_POST['date-time'] != "" ){
            $task = $_POST['task'];
            $username = $_SESSION["username"];
            $time = $_POST["date-time"];
            $sql = "INSERT INTO todo(username, task, time) VALUES ('$username' , '$task', '$time')" ;
            $result = mysqli_query($con, $sql);
            if($result)
            {
                $task = "";
                $username = "";
                $time = "";
                header('location:/');
            }
        }
    }
    else{
    	header("location:/");
    }
    header("location:/");
?>
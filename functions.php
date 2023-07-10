<?php 
    require_once __DIR__."/config.php";

    function add($content,$time){
        $username = $_SESSION["username"];
        $sql = "INSERT INTO todo(username, task, time) VALUES ('$username' , '$task', '$time')" ;
        $result = mysqli_query($con, $sql);
        if($result)
        {
            $task = "";
            $username = "";
            $time = "";
            echo "Done";
        }
    }

?>
<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "web";

    $conn = mysqli_connect($server, $username, $password, $db);
        mysqli_set_charset($conn,'utf8mb4');
    $con = $conn;
    if(!$conn)
    {
        echo "Error";
    }
?>
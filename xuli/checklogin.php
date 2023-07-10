<?php
    session_start();
    require_once __DIR__."/../config.php";
    if(isset($_GET["login"]))
    {
        $username = $_GET['username'];
        $password = md5($_GET['password']);

        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($result);

        if(isset($_SESSION["username"]))
        {
           header("location:/");
        }
        else{
            if($username === $rows["username"] && ($password === $rows["password"]))
            {
                $_SESSION["name"] = $rows["fullname"];
                $_SESSION["id"] = $rows["id"];
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $rows["email"];
                $_SESSION["password"] = $password;
                echo "<script>alert('Đăng nhập thành công')</script>";
                header("location:/");
    
            }
            else if($username != $rows["username"] || $password != $rows["password"])
            {
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không khớp')</script>";
                header("location:/login.php");
            }
            else
            {
                echo "<script>alert('error')</script>";
                header("location:/login.php");
            }
        }
    }
?>
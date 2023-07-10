<?php
    require_once __DIR__."/../config.php";
    if(isset($_GET["signup"]))
    {
        $fullname = $_GET["fullname"];
        $email = $_GET["email"];
        $phone = $_GET["phone"];
        $username = strtolower($_GET['username']);
        $password = md5($_GET["password"]);
        $cpassword = md5($_GET["cpassword"]);

        if($fullname == "" || $email == "" || $phone == "" || $username == "" || $password == "" || $cpassword == "")
        {
            echo '<script>alert("Không được bỏ trống")</script>';
            header("refresh:1;url=/signup.php");
        }
        else
        {
            if($cpassword === $password)
            {
                $sql = "SELECT * FROM user WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
                if(!$result->num_rows >0)
                {
                    $sql = "INSERT INTO user(username, password, fullname, email, phone ) VALUES ('$username' ,'$password', '$fullname', '$email', '$phone')" ;
                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        $fullname = "";
                        $email = "";
                        $phone = "";
                        $username = "";
                        $_GET['password'] = "";
                        $_GET['cpassword'] = "";
                        echo "<script>alert('Đăng ký thành công !')</script>";
                        header("refresh:1;url=/login.php");
                    }
                    else{
                        echo "<script>alert('Đăng ký không thành công! Lỗi hệ thống')</script>";   
                    }
                }else{
                    echo "<script>alert('$username - Đã tồn tại')</script>";
                }
            }else{
                echo "<script>alert('Mật khẩu không khớp')</script>";
            }
        }
    }

?>
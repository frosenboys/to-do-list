<?php
  session_start();
  require_once __DIR__."/config.php";
  if(isset($_SESSION["id"]))
  {
    header("location: /");
  }
  $title = "Tạo tài khoản";
  require_once __DIR__."/application/head.php";
?>

<body>
    <div class="container-fluid mt-0" id="board">
        <div class="wrapper">
            <center>
                <p class="fs-1 fw-bold">Tạo tài khoản</p>
                <br>
            </center>
            <center>
            <form action="/../xuli/checksignup.php" method = "GET">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name = "fullname" placeholder="Họ và tên" auto-complete="off">
                    <label for="fullname">Họ và tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name = "email" placeholder="Email" auto-complete="off">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="phone" name = "phone" placeholder="Số điện thoại" auto-complete="off">
                    <label for="phone">Số điện thoại</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name = "username" placeholder="Tên đăng nhập" auto-complete="off">
                    <label for="username">Tên đăng nhập</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name = "password" placeholder="******" auto-complete="off">
                    <label for="password">Mật khẩu</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="cpassword" name = "cpassword" placeholder="******" auto-complete="off">
                    <label for="cpassword">Nhắc lại mật khẩu</label>
                </div>
                <center>
                    <button type="submit" class = "btn btn-success" name = "signup">Đăng ký</button>
                </center>
            </form>
            </center>
            <center>
                    <div id="sign">
                        <p class="paragraph">Bạn đã có tài khoản ?</p>
                        <button class="btn btn-primary" id="login">Đăng nhập ngay</button>
                    </div>
            </center>
        </div>
    </div>
    <style type="text/css">
        #board{
            padding: 30px;
            background-color: white;
            border-radius: 20px;
        }
        body{
            background-image: linear-gradient(to right,#7eaffc,#7efcdb);
            padding-top: 100px;
            padding-left: 10%;
            padding-right: 10%;
            padding-bottom: 100px;
        }
    </style>
    <script>
        document.getElementById("login").addEventListener("click", ()=>{
            window.location.href = '/login.php';
        })
    </script>
    </body>
</html>
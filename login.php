<?php
  session_start();
  require_once __DIR__."/config.php";
  if(isset($_SESSION["id"]))
  {
    header("location: /");
  }
  $title = "Đăng nhập";
  require_once __DIR__."/application/head.php";
?>
<body>
    <div class="container-fluid mt-0" id="board">
        <div class="wrapper">
            <center>
                <p class="fs-1 fw-bold">Đăng nhập</p>
                <br>
            </center>
            <form action="/../xuli/checklogin.php" method = "GET">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name = "username" placeholder="Tên đăng nhập" auto-complete="off">
                    <label for="username">Tên đăng nhập</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name = "password" placeholder="******" auto-complete="off">
                    <label for="password">Mật khẩu</label>
                </div>
                <center>
                    <button type="submit" class="btn btn-primary" name = "login">Đăng nhập</button>
                </center>
            </form>
            <center>
                    <div id="forgotten">
                        <a class = "forgot" href="">Quên mật khẩu</a>
                    </div>
                    <div id="sign">
                        <p class="paragraph">Bạn chưa có tài khoản ?</p>
                        <button class="btn btn-primary" name = "signup" id="signup">Tạo tài khoản</button>
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
        }
    </style>
    <script>
        document.getElementById("signup").addEventListener("click", ()=>{
            window.location.href = '/signup.php';
        })
    </script>
</body>
</html>
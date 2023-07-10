<?php
    session_start();
    require_once __DIR__."/config.php";
    require_once __DIR__."/functions.php";

    if(!isset($_SESSION["id"]))
    {
        header("location:/login.php");
    }
    $title = "To do list";
    require_once __DIR__."/application/head.php";
    $username = $_SESSION["username"];

?> 
<body style="background-image: linear-gradient(to right,#9de2f5,#e29df5);">
    <div class="container">
        <div class="content col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8" id ="content">
            <!-- Hello -->
            <div class="part welcome mt-5 border border-danger">
                <p class="fs-4"> Xin chào, <?php echo $_SESSION["name"] ?>!<span id="name" class="fw-bold"></span></p>
                <p class="fs-5">Hãy bắt đầu đặt ra mục tiêu ngay hôm nay để phát triển bản thân nào !</p>
                <a class="btn btn-secondary" href="/logout.php">Đăng xuất</a>
            </div>
            <br>
            <br>

            <!-- Add task -->
            <div class="part welcome mt-5 border border-success">
                <center><h4>Thêm công việc</h4></center>
                <form action="/xuli/add.php" method="post">
                    <input type="text" id="itask" class="d-flex flex-grow-1 px-2" style="border-radius: 10px;outline: none;border: solid 1px gray;width: 100%;height: 40px;" placeholder ="Nội dung công việc ..." name="task">

                    <input type="text" class="date form-control" placeholder="Thời gian hoàn thành" id="itime" name ="date-time">

                    <button id="button" class="btn btn-primary" type="submit" name="add" title="Thêm công việc">Thêm</button>
                </form>
            </div>
            <br>
            <br>

            <!-- Unfinish tasks list -->
            <div class="task-board border border-info">
                <center><h4>Mục tiêu:</h4></center>
                <hr>

                <?php
                    $username = $_SESSION["username"];
                    $query = $conn->query("SELECT * FROM `todo` WHERE `username` = '$username'");
                    $count = 0;
                    while($row = $query->fetch_array()){
                        
                        if ($row['done']==0){
                            $count++;
                 ?>

                <div class="task">
                    <div class="text">
                        <p><b><?php echo $row['time'] ?></b></p>
                        <p class="test"><?php echo $row['task'] ?></p>
                    </div>
                    
                    <div class="tool-btn">
                        <a class="del-btn fa-solid fa-check" title="Done" style="color: #29ff4c;text-decoration:none" href="/xuli/done.php?task_id=<?php echo $row['taskid']?>"></a>

                        <a class="del-btn fa-solid fa-trash" title="Delete" style="color: #c23838;text-decoration:none" href="xuli/delete.php?task_id=<?php echo $row['taskid']?>"></a>
                    </div>
                </div>
                <hr>

                <?php 
                    }
                        }
                    if ($count==0){
                ?>
                    <i>(Chưa có)</i>
                <?php
                    }
                ?>
            </div>

            <!-- Finish task list-->
            <div class="task-board border border-info">
                <center><h4>Mục tiêu đã hoàn thành:</h4></center>
                <hr>

                <?php
                    $username = $_SESSION["username"];
                    $query = $conn->query("SELECT * FROM `todo` WHERE `username` = '$username'");
                    $count = 0;
                    while($row = $query->fetch_array()){
                        if ($row['done']==1){
                            $count++;
                 ?>

                <div class="task">
                    <div class="text">
                        <p><b><?php echo $row['time'] ?></b></p>
                        <p class="test"><?php echo $row['task'] ?></p>
                    </div>
                    <div class="tool-btn">
                        <!-- <a class="del-btn fa-solid fa-check" title="Done" style="color: #29ff4c;text-decoration:none" href="/xuli/done.php?task_id=<?php echo $row['taskid']?>"></a> -->

                        <a class="del-btn fa-solid fa-trash" title="Delete" style="color: #c23838;text-decoration:none; margin: auto;" href="xuli/delete.php?task_id=<?php echo $row['taskid']?>"></a>
                    </div>
                </div>
                <hr>

                <?php 
                    }
                        }

                    if ($count==0){
                ?>
                    <i>(Chưa có)</i>
                <?php
                    }
                ?>                
            </div>
        </div>
    </div>
</body>

<footer id="sticky-footer" class=" py-4 bg-dark text-white-50" style="margin-top: 100px;">
    <div class="text-center">
        <small>Copyright &copy; To Do List</small>
    </div>
</footer>

<style type="text/css">
    .task-board{
        width: 100%;
        height: auto;
        background-color: white;
        padding: 30px;
        border-radius: 30px;
        margin-bottom: 10px;
    }
    .task{
        display: flex;
    }
    .text{
        max-width: 90%;
        min-height: 70px;
        width: 90%;
        word-wrap: break-word;
    }

    .test{
    }

    .tool-btn{
        text-align: center;
        margin: auto;
        margin-left: 10px;
    }
    .check{
        width: 30px;
        height: 30px;
        margin-bottom: 40px;
    }
    .del-btn{
        width: 30px;
        height: 30px;
        outline: none;
        border: none;
        margin-bottom: 10px;
        background: none;
        transition: transform .2s;
    }
    .del-btn:hover{
        transform: scale(1.5);
    }

    .date{
        width: 100%;
        margin-top: 8px;
        margin-bottom: 8px;
        border: solid 1px gray;
        outline: none;
        border-radius: 10px;
    }
</style>


<script type="text/javascript">
    // calender
    $('#itime').bootstrapMaterialDatePicker({ format : 'HH:mm DD-MM-YYYY' });
</script>

</html>
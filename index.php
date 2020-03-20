<?php 
    session_start();
    //ไม่มีการ login เข้ามาให้กลับไปหน้า login
    if(!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must login first"; //เก็บค่าข้อความไว้แล้วกลับไปโชวหน้าlogin
        header('location: login.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);//unset user ออก
        header('location: login.php');//Loout กลับไปหน้า login
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href='style.css'>
</head>
<body>
    <div class="header">
        <h2>Home Page</h2>
    </div>
    <div class="content">
        <!-- แจ้งเตือนข้อความ-->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="seccess">
                <h3>
                    <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>

            </div>
        <?php endif ?>

        <!-- login เข้ามารึยัง-->
        <?php if(isset($_SESSION['username'])) : ?>
        <!-- login เข้ามาแล้ว echo username -->
            <p> Welcome <strong><?php echo $_SESSION['username']; ?></p>
            <p><a href="index.php?logout='1'" >login</a></p> <!-- ส่งค่าพารามิเตอร์ -->
        <?php endif ?>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href='style.css'>
</head>
<body>
    <div>
        <h1>Register</h1>   
    </div>
    
    <form action="register_bb.php" method="post">
        <?php include('errors.php'); ?>
        <div class='input-g'>
            <label for="username">Username</label>
            <input type="text" name="username" >
        </div>
        <div class='input-g'>
            <label for="password_1">Password</label>
            <input type="password" name="password_1" >
        </div>
        <div class='input-g'>
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2" >
        </div>
        <div class='input-g'>
            <button  type="submit" name="reg_user" class="btn" >Register</button><!--เก็บ reg_userส่งไปยัง register_bb.php-->
        </div>
        <p> Member? <a href = "login.php">Sigin</a></p>
    </form>
</body>
</html>
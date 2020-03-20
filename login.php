<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <h1>login</h1>   
    </div>
    
    <form action="login_bb.php" method="post">
    <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>

            </div>
        <?php endif ?>

        <div class='input-g'>
            <label for="username">Username :</label>
            <input type="text" name="username" >
        </div>
        <div class='input-g'>
            <label for="password">Password :</label>
            <input type="password" name="password" >
        </div>
        <div class='input-g'>
            <button  type="submit" name="logib_user" class="btn" >login</button>
        </div>
        <p> Member? <a href = "register.php">Sigin Up</a></p>
    </form>
</body>
</html>
<?php
    session_start();
    include('connect.php');
    $username = "";
    $password = "";

    if(isset($_REQUEST['username'])) {
        $username = $_REQUEST['username'];
    }    
    if(isset($_REQUEST['password'])) {
        $password = $_REQUEST['password'];
    }

    $sql = "SELECT * FROM user WHERE username ='$username'";


    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) ==1) {
        while($row = mysqli_fetch_assoc($result)) {
            if($row['password']==$password){
                $_SESSION['name'] = $_REQUEST['username'];
                header("Location:index.php");
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('password ไม่ถูกต้อง');";
                echo "window.history.back();";
                echo "</script>";
                // echo "ไม่";
                // header("Location:login.php");
            }
        }
    }else{
        header("Location:login.php");
    }
    // $recult = mysqli_query($conn,$sql);

?>

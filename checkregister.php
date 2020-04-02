<?php

    $nameuser = $_REQUEST["Nameuser"];
    $username1 = $_REQUEST["username"];
    $passname = $_REQUEST["password"];
    $repassword = $_REQUEST["repassword"];
    $status = "user";
    require('connect.php');


    $check = "SELECT * FROM user ";
    $result = mysqli_query($conn, $check);
    $row = mysqli_fetch_assoc($result);

    if($username1 == $row['username']){
        echo "<script type='text/javascript'>";
        echo "alert('username ซ้ำ');";
        echo "window.history.back();";
        echo "</script>";
    }
    else{
        $sql = "INSERT INTO user (username,password,status,name) VALUES ('$username1', '$passname', '$status','$nameuser')";

        $result = mysqli_query($conn,$sql);
        
        mysqli_close($conn);
        header("location:login.php"); //ไปหน้า index
    }

?> 
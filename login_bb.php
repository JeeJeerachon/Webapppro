<?php
session_start();
include('server.php');
    $errors = array();
    if(isset($_POST['login_user'])){ // รับค่า input จากหน้า login.php
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
    //เช็คค่าว่าง
    if(empty($username)) {
        array_push($errors,"Username is requird");
    }
    if(empty($password)) {
        array_push($errors,"Password is requird");
    }
    if(count($errors) == 0){
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysql_query($conn, $query);

        if(mysqli_num_row($result)==1){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Your are now login";
            header("location: index.php");
        }else{
            array_push($errors,"Wrong username/password combination");
            $_SESSION['error'] = "Wrong username/password try again!";
            header("location: login.php");
        }
    }
    }
?>
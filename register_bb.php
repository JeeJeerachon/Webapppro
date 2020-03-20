<?php 
session_start();
include('server.php');
$errors = array();
if(isset($_POST['reg_user'])){
    //รับค่ามาใส่ในตัวแปร
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);
    //เช็ค username เป็นค่าว่างไหม?
    if(empty($username)){
        array_push($errors,"Username is required");
    }
    if(empty($password_1)){
        array_push($errors,"Password is required");
    }
    if(empty($password_2)){
        array_push($errors,"Confirm Password is required");
    }
    //เช็ค password เหมือนกันไหม?
    if($password_1 != $password_1){
        array_push($errors,"Password not match");
    }
    $user_check_query = "SELECT * FROM user WHERE username = '$username' ";
    $query = mysqli_query($conn,$user_check_query);
    $result = mysqli_fetch_assoc($query);

    if(result){ //มี user อยู่ในระบบ
        if($result['username'] === $username){//เช็ค user อยู่ในระบบ 
            array_push($errors,"Username alredy exists");
        }
    }
    //ถ้าไม่ error 
    if(count($errors) == 0){
        $password = md5($password_1);
        $sql = "INSERT INTO user (username,password) VALUES ('$username','$password')";
        mysqli_query($conn,$sql);
        
        $_SESSION['username'] = $username;//เก็บ username
        $_SESSION['success'] = "You are now login";
        header('location: index.php');
    }
}
?>
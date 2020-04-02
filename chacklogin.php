<?php
    include('connect.php');
    session_start();
    $errors = array();
    
    if (isset($_POST['userr'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Your are now logged in";
                header("location: index.php");
            } else {
                array_push($errors, "Wrong username/password combination");
                $_SESSION['error'] = "Wrong username or password try again!";
                header("location: login.php");
            }
        }
    }

    // if(isset($_REQUEST['username'])) {
    //     $username = $_REQUEST['username'];
    // }    
    // if(isset($_REQUEST['password'])) {
    //     $password = $_REQUEST['password'];
    // }
    // if($username ==""){
    //     echo "";
    // }else{
    //     $sql = "SELECT * FROM user";
    //     $recult = mysqli_query($conn,$sql);
    //     while($row = mysqli_fetch_assoc($recult)) {
    //         if($username == $row['username'] and $password == $row['password']){
    //             header("location:index.php"); //ไปหน้า index
    //         } else {
    //             echo "Wrong username or password try again!";
    //         }
    //     }
    // }
?>

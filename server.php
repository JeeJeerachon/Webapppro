<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register_bb"; //ชื่อฐานข้อมูล

    // Create Connecttion
    $conn = mysqli_connect($servername,$username,$password);
    // ส่งค่า $servername,$username,$password

    // check connection
    if (!$conn) {
        //ไม่มีการเชื่อมต่อ
        die("Connection failed" . mysqli_connect_error());
    } //else {
        //มีการเชื่อมต่อ
        //echo "Connection succ";
    //}
?>
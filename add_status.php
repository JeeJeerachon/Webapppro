<?php
//1.connect
require("connect.php");

 //$status_id = $_REQUEST['status_id'];
 $status_th = $_REQUEST['status_th'];
 $status_en = $_REQUEST['status_en'];

 //echo "status_id: " . $status_id. "<br/>";
 //echo "status_th: " . $status_th. "<br/>";
 //echo "status_en: " . $status_en. "<br/>";

 //2.select sql : insert
$sql = "INSERT INTO status (status_th,status_en) VALUES ";
$sql .= "('". $status_th."','".$status_en."')";
//$sql = "INSERT INTO status (status_id, status_th,status_en) VALUES ";
//$sql = "(".$status_id.",'". $status_th."','".$status_en."')";

echo $sql ;

//บันทึกลง database
if (mysqli_query($conn,$sql)) {
    echo "New record created successfully";
}else {
        echo "error: ".$sql."<br>" .mysqli_error($conn);
    }
    mysqli_close($conn);
    //header("Location:show_status.php");
?>
<?php

    require("connect.php");
    // $send = $_REQUEST['send'];
    $img = "";
    if((isset($_REQUEST["img"]))){
        $img = "picture/".$_REQUEST["img"]; 
    }

    $id = $_REQUEST["id"];
    $name = $_REQUEST["name_version"];
    $brand = $_REQUEST["brand"];
    $price = $_REQUEST["price"];


    
    if($img == "picture/"){
        $sql = "UPDATE product SET Brand_id='$brand',price='$price',name_version='$name' WHERE product_id = '$id'";
        echo $sql;
    }else{
        $sql = "UPDATE product SET Brand_id='$brand',price='$price',img_product='$img',name_version='$name' WHERE product_id = '$id'";
        echo $sql;
    }
    mysqli_query($conn,$sql);

    header("Location:index.php");

    





?>
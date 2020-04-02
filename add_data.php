<?php 
    require("connect.php");
    $img = "picture/";
    $add_brand = "";

    $name = $_REQUEST["name_version"];
    $brand = $_REQUEST["brand"];
    $price = $_REQUEST["price"];
    $img .= $_REQUEST["img"];
    if(isset($_REQUEST['add_brand'])) $add_brand=$_REQUEST['add_brand'];

    if($add_brand == ""){
        $sql = "INSERT INTO product (brand_id,price,img_product,name_version) VALUE ('$brand','$price','$img','$name')";
        mysqli_query($conn,$sql);
        header("Location:index.php");
        // echo $sql;
    }

    else{
        $cheack = "SELECT * FROM brand WHERE brand_name = '$add_brand'";
        echo $cheack;
        $result= mysqli_query($conn,$cheack);
        if(mysqli_num_rows($result) == 0){
            $sql2 = "INSERT INTO brand (brand_name) VALUE ('$add_brand')";
            mysqli_query($conn,$sql2);
            header("Location:index.php");
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('ยี่ห้อซ้ำ');";
            echo "window.history.back();";
            echo "</script>";
        }
    }


    

    


?>
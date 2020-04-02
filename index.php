<?php
    include('connect.php');
    session_start();

 


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">BIG COMPANY</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
            <?php
                if(isset($_SESSION['name'])){
                echo'   <form action="logout.php">';
                echo'       <p class="navbar-brand">'.$_SESSION['name'].'</p>';
                echo'       <button type="submit" class="btn btn-light"> Logout </button>';
                echo'    </form>';
                }else{
                    echo'   <form action="login.php">';
                    echo'       <button type="submit" class="btn btn-light" > Login </button>';
                    echo'    </form>';
                }
            ?>
        </div>
    </nav>


    <div class="container">

    <?php
    if(isset($_SESSION['name'])){
        if($_SESSION['name']=="admin"){
            echo'<form class="border border-secondary rounded-lg " action="add_data.php">';
             echo'<div class="fromlogin form-group">';
            echo'<h1><span class="badge badge-secondary">Import product</span></h1>';
            echo'<br>';
            echo'<h6>ชื่อรุ่น<span class=" badge badge-secondary"></span></h6>';
            echo'<input type="text" class="form-control" id="username" name="name_version">';
            echo'<br>';
            echo'<h6>เพิ่มยี่ห้อ<span class=" badge badge-secondary"></span></h6>';
            echo'<input type="text" class="form-control" id="username" name="add_brand">';
            // echo'<select class="custom-select" name="brand">';
            // echo'<option value="">brand car</option>';
            // echo'<option value="Nisan">Nisan</option>';
            // echo'<option value="Toyata">Toyata</option>';
            // echo'<option value="Isuzu">Isuzu</option>';
            // echo'</select>';


            require("connect.php");
            $se = "SELECT * FROM brand ";
            $re = mysqli_query($conn, $se);
            echo '<select class="custom-select" name="brand">';
            echo '<option value="">ยี่ห้อ</option>';
            while($row = mysqli_fetch_assoc($re)){
    
                echo'<option value="'.$row['Brand_id'].'">'.$row['brand_name'].'</option>';
            }
            echo '</select>';
            echo'<br>';
            echo'<br>';
            echo'<input type="submit" class="btn btn-secondary btn-lg btn-block" id="username" name="add" value="เพิ่มยี่ห้อ">';


            echo'<h6>ราคา<span class="badge badge-secondary"></span></h6>';
            echo'<input type="text" class="form-control" id="username" name="price">';
            echo'<br>';
            echo'<div class="custom-file">';
            echo'<input type="file" name="img" class="custom-file-input" id="validatedCustomFile">';
            echo'<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>';
            echo'</div>';
            echo'<br><br>';
            echo'<button type="submit" class="btn btn-secondary btn-lg btn-block">Submit</button><br><br>';
            echo'</div>';
            echo'</form>';
        }
    }
    ?>









        <!-- โชว์รถ -->
        <!-- ค้นหา -->
        <nav class="navbar navbar-light bg-light" id="barcar">
            <span class="navbar-brand mb-0 h1">Car</span>
            <form class="form-inline my-2 my-lg-0" >
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">

                <?php
                require("connect.php");
                $se = "SELECT * FROM brand ";
                $re = mysqli_query($conn, $se);
                echo '<select class="form-control mr-sm-2" name="brand">';
                echo '<option value="">ยี่ห้อ</option>';
                while($row = mysqli_fetch_assoc($re)){
                    echo'<option value="'.$row['brand_name'].'">'.$row['brand_name'].'</option>';
                }
                echo '</select>';
                ?>
                <button class="btn btn-dark" type="submit">Search</button>
            </form>
        </nav>


        <?php
        // รับค่าตัวแปล search
        $search = "";
        $brand = "";
        if(isset($_REQUEST['search']))$search = $_REQUEST['search'];
        if(isset($_REQUEST['brand']))$brand = $_REQUEST['brand'];




        require("connect.php");
        // inner join product กับ brand
        $sql = "SELECT product.img_product ,product.name_version,product.price,product.product_id, product.brand_id,brand.brand_name FROM product INNER JOIN brand ON product.brand_id = brand.brand_id ";
        // echo $sql;
        $sql2 = "SELECT * FROM brand ";
        mysqli_query($conn, $sql2);
        // if($brand != ""){
        // //     while($row = mysqli_fetch_assoc($result)){
        // //         if($row['brand_name'] == $brand){
        //             // echo $brand;
        //             $sql .="WHERE brand_name='$brand'";
        //     //     }
        //     // }   
        // }
       if($search !="" and $brand != ""){
            echo "เข้า1";
            $sql .="WHERE brand_name='$brand' AND name_version LIKE '%$search%'";
        }else if($search !="" and $brand == ""){
            echo "เข้า2";
            $sql .="WHERE name_version LIKE '%$search%'";
        }else if($search =="" and $brand != ""){
            echo "เข้า3";
            $sql .="WHERE brand_name ='$brand'";
        }




        // echo $sql;
        // mysqli_query($conn, $sql);

        

    



        if(isset($_SESSION['name'])){
            if($_SESSION['name']=="admin"){
                $result = mysqli_query($conn, $sql);
                echo '<br>';
                echo '<div class="row" style="float:left;" >';
                while($row = mysqli_fetch_assoc($result)){
                    echo '<form action="edit.php">';
                    echo '<div id="orderss">';
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="'.$row['img_product'].'" class="card-img-top">';
                    echo '<input type="hidden" name="PK_form" value="'.$row['product_id'].'">';
                    echo '<input type="hidden" name="img_form" value="'.$row['img_product'].'">';
                    echo '<input type="hidden" name="name_form" value="'.$row['name_version'].'">';
                    echo '<input type="hidden" name="brand_form" value="'.$row['brand_id'].'">';
                    echo '<input type="hidden" name="price_form" value="'.$row['price'].'">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.$row['name_version'].'</h5>';
                    echo '<h5 class="card-title">'.$row['brand_name'].'</h5>';
                    echo '<p class="card-text">'.$row['price'].'</p>';
                    echo '<input class="btn btn-primary" type="submit" name="send" value="Edit">';
                    echo '<br>';
                    echo '<br>';
                    echo '<input class="btn btn-danger" type="submit" name="send" value="Delete">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';
                }
                echo '</div>';
            }
            else if($_SESSION['name']!="admin" || !isset($_SESSION['name'])){
                $result = mysqli_query($conn, $sql);
                echo '<br>';
                echo '<div class="row" style="float:left;" >';
                while($row = mysqli_fetch_assoc($result)){
                    echo '<form action="edit.php">';
                    echo '<div id="orderss">';
                    echo '<div class="card" style="width: 18rem;">';
                    echo '<img src="'.$row['img_product'].'" class="card-img-top">';
                    echo '<input type="hidden" name="PK_form" value="'.$row['product_id'].'">';
                    echo '<input type="hidden" name="img_form" value="'.$row['img_product'].'">';
                    echo '<input type="hidden" name="name_form" value="'.$row['name_version'].'">';
                    echo '<input type="hidden" name="brand_form" value="'.$row['brand_name'].'">';
                    echo '<input type="hidden" name="price_form" value="'.$row['price'].'">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.$row['name_version'].'</h5>';
                    echo '<h5 class="card-title">'.$row['brand_name'].'</h5>';
                    echo '<p class="card-text">'.$row['price'].'</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';
                }
                echo '</div>';
            }
        }else{
            $result = mysqli_query($conn, $sql);
            echo '<br>';
            echo '<div class="row" style="float:left;" >';
            while($row = mysqli_fetch_assoc($result)){
                echo '<form action="edit.php">';
                echo '<div id="orderss">';
                echo '<div class="card" style="width: 18rem;">';
                echo '<img src="'.$row['img_product'].'" class="card-img-top">';
                echo '<input type="hidden" name="PK_form" value="'.$row['product_id'].'">';
                echo '<input type="hidden" name="img_form" value="'.$row['img_product'].'">';
                echo '<input type="hidden" name="name_form" value="'.$row['name_version'].'">';
                echo '<input type="hidden" name="brand_form" value="'.$row['brand_name'].'">';
                echo '<input type="hidden" name="price_form" value="'.$row['price'].'">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$row['name_version'].'</h5>';
                echo '<h5 class="card-title">'.$row['brand_name'].'</h5>';
                echo '<p class="card-text">'.$row['price'].'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
            }
            echo '</div>';
        
        }


        ?>






    </div>

</body>

</html>
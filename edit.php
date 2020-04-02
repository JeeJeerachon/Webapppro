<?php
    require("connect.php");
    $id = $_REQUEST["PK_form"];
    $name = $_REQUEST["name_form"];
    $brand = $_REQUEST["brand_form"];
    $price = $_REQUEST["price_form"];
    $img = $_REQUEST["img_form"];
    $send = $_REQUEST["send"];

    if($send == "Delete"){
        $sql = "DELETE FROM product WHERE product_id='$id'";
        mysqli_query($conn,$sql);
        header("Location:index.php");
    }


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
            <form action="logout.php">
                <button type="submit" class="btn btn-light"> Logout </button>
            </form>

        </div>
    </nav>
    <div class="container">
        <!-- ค้นหา -->
        <form class=""  action="update_data.php">

        
            <div class="form-group">
            <h1><span class="badge badge-secondary">Edit product</span></h1>
                <br>
                <img src="<?php echo $img;?>" class="card-img-top">
                <h6>ชื่อรุ่น<span class="badge badge-secondary"></span></h6>
                <input type="text" class="form-control" id="username" name="name_version" value="<?php echo $name;?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <!-- <input type="hidden" name="img1" value=""> -->
                <?php
                    require("connect.php");
                    $se = "SELECT * FROM brand ";
                    $re = mysqli_query($conn, $se);
                    echo '<br><select class="form-control mr-sm-2" name="brand">';
                    echo '<option value="'.$brand.'">ยี้ห้อ</option>';
                    while($row = mysqli_fetch_assoc($re)){
                        echo'<option value="'.$row['Brand_id'].'">'.$row['brand_name'].'</option>';
                    }
                    echo '</select>';
                ?>

            </div>
            <h6>ราคา<span class="badge badge-secondary"></span></h6>
            <input type="text" class="form-control" id="username" name="price" value="<?php echo $price;?>" >
            <br>
            <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="validatedCustomFile" >
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            </div>
            <br><br>
            <button type="submit" class="btn btn-secondary btn-lg btn-block">Submit</button>
            <button class="btn btn-secondary btn-lg btn-block" link="index.php">Cancel</button>
        </form>





    </div>

</body>

</html>
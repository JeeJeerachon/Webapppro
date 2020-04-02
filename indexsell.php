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
                    <a class="nav-link" href="#">ลงขาย </a>
                </li>
            </ul>
            <form action="" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <label class=""><?php echo $_SESSION['name']; ?></label>
            </form>
            <form action="logout.php">
                <button type="submit" class="btn btn-light"> Logout </button>
            </form>

        </div>
    </nav>
    <div class="container">
        <!-- inputdata -->
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose Picture</label>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Brand CAR
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Nissan</a>
                <a class="dropdown-item" href="#">Toyata</a>
                <a class="dropdown-item" href="#">Issuzu</a>
            </div>
        </div>
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">ชื่อรุ่น</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">ราคา</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-lg">
        </div>
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-lg">ปี</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-lg">
        </div>
        <button type="button" class="btn btn-dark">Submit</button>
        
        <!-- โชว์รถ -->
        <nav class="navbar navbar-light bg-light" id="barcar">
            <span class="navbar-brand mb-0 h1">Car</span>
        </nav>
        <div id="orderss">
            <div class="card" style="width: 18rem;">
                <img src="picture/1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">ยี้ห้อ</h5>
                    <h5 class="card-title">รุ่นรถ</h5>
                    <p class="card-text">ราคา</p>
                    <p class="card-text">ปี</p>
                    <a href="#" class="btn btn-primary">เลือก</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
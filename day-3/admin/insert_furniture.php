<?php
include('../cont.php');




if (isset($_POST['submit'])) {
    $img1 = $_POST['img_url1'];
    $img2 = $_POST['img_url2'];
    $img3 = $_POST['img_url3'];
    $img4 = $_POST['img_url4'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];


    $err = array();

    if (empty($img1)) {
        $err[] = "Enter A Img";
    }
    if (empty($img2)) {
        $err[] = "Enter A Img";
    }

    if (empty($img3)) {
        $err[] = "Enter A Img";
    }

    if (empty($img4)) {
        $err[] = "Enter A Img";
    }


    if (empty($name)) {
        $err[] = "Enter A Name";
    }
    if (empty($detail)) {
        $err[] = "Enter A detail";
    }


    if (empty($err)) {
        $qry = "INSERT INTO `furniture` (`id`, `name`, `img_url1`, `img_url2`, `img_url3`, `img_url4`, `detail`) VALUES (NULL, '$name','$img1','$img2','$img3','$img4','$detail');";

        mysqli_query($connection, $qry);

        echo '<script>location.replace("furniture.php")</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>furniture</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <a class="navbar-brand" href="./header.php">furniture store</a>
        <button onclick="shownav()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText" style="padding-left: 70px;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./header.php">Home</a>
                </li>
                <!-- <li class="nav-item">
        <a class="nav-link" href="./orders.php">Orders</a>
      </li> -->

                <li class="nav-item">
                    <a class="nav-link" href="./furniture.php">furniture</a>
                </li>
                <!-- <li class="nav-item">
        <a class="nav-link" href="./equip.php">Equipments</a>
      </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <script>
        var some = false;


        function shownav() {
            var nav = document.getElementById('navbarText');
            if (some == false) {
                nav.classList.remove('collapse');
                some = true;
            } else {
                nav.classList.add('collapse');
                some = false;
            }


        }
    </script>




    <div class="container" style="margin-left: 40px;">
        <h1>Insert furniture items</h1>
        <hr>
    </div>

    <div style="padding: 25px 50px 75px 100px;">


        <form action="" method="POST">
            <div class="form-group">

                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name" required>
            </div>


            <div class="form-group">

                <label for="ikmg">Img Url1</label>
                <input type="text" class="form-control" id="ikmg" aria-describedby="emailHelp" placeholder="Enter Img Url" name="img_url1" required>
            </div>
            <div class="form-group">

                <label for="ikmg">Img Url2</label>
                <input type="text" class="form-control" id="ikmg" aria-describedby="emailHelp" placeholder="Enter Img Url" name="img_url2" required>
            </div>
            <div class="form-group">

                <label for="ikmg">Img Url3</label>
                <input type="text" class="form-control" id="ikmg" aria-describedby="emailHelp" placeholder="Enter Img Url" name="img_url3" required>
            </div>
            <div class="form-group">

                <label for="ikmg">Img Url4</label>
                <input type="text" class="form-control" id="ikmg" aria-describedby="emailHelp" placeholder="Enter Img Url" name="img_url4" required>
            </div>
            <div class="form-group">

                <label for="ikmg">Detail</label>
                <!-- <input type="text" class="form-control" id="ikmg" aria-describedby="emailHelp" placeholder="Enter Img Url" name="detail" required> -->
                <textarea class="form-control" id="exampleFormControlTextarea1" name="detail"  rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
    </form>

    </div>



    <!-- <div class="form-group">

<label for="price">Rate</label>
<input type="number" class="form-control" id="price" aria-describedby="emailHelp" placeholder="Enter Rate" name="price">
</div> -->




    <!-- <input type="submit" class="btn btn-primary" name="submit"></input> -->
   
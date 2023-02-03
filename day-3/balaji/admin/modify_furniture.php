<?php
include('../cont.php');


if (isset($_GET['id'])) {

    $get_plant = "SELECT * from furniture where id = {$_GET['id']}";
    $old_plant = mysqli_fetch_assoc(mysqli_query($connection, $get_plant));
    if (isset($_POST['submit'])) {
        $img1 = $_POST['img_url1'];
        $img2 = $_POST['img_url2'];
        $img3 = $_POST['img_url3'];
        $img4 = $_POST['img_url4'];
        $name = $_POST['name'];
        $detail = $_POST['detail'];
        // $rate = $_POST['price'];

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

        // if(empty($rate)){
        //     $err[] = "Enter A Rate";
        // }



        if (empty($err)) {
            // $qry = "INSERT INTO `equip` (`name`, `id`, `price`, `img_url`) VALUES ('$name', NULL, '$rate', '$img');";
            $qry = "UPDATE `furniture` SET name='$name',img_url1='$img1',img_url2 = '$img2',img_url3 = '$img3' , img_url4 = '$img4' ,detail = '$detail' WHERE `furniture`.`id` = {$_GET['id']}   ";

            mysqli_query($connection, $qry);

            echo '<script>location.replace("furniture.php")</script>';
        }
        // $qry = 
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
                        <a class="nav-link" href="./insert_furniture.php">Insert furniture</a>
                    </li>
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
            <h1>Modify furniture details</h1>
            <hr>
        </div>

        <div style="padding: 25px 50px 75px 100px;">
            <form action="" method="POST">
                <div class="form-group">

                    <label for="exampleInputEmail1">Name</label>
                    <input value="<?php echo $old_plant['name'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
                </div>


                <div class="form-group">

                    <label for="ikmg">Img Url 1</label>
                    <input value="<?php echo $old_plant['img_url1'] ?>" type="text" class="form-control" id="ikmg" aria-describedby="emailHelp" placeholder="Enter Img Url 1" name="img_url1">
                </div>
                <div class="form-group">

                    <label for="ikmg">Img Url 2</label>
                    <input value="<?php echo $old_plant['img_url2'] ?>" type="text" class="form-control" id="ikmg" aria-describedby="emailHelp" placeholder="Enter Img Url 2" name="img_url2">
                </div>
                <div class="form-group">

                    <label for="ikmg">Img Url 3</label>
                    <input value="<?php echo $old_plant['img_url3'] ?>" type="text" class="form-control" id="ikmg" aria-describedby="emailHelp" placeholder="Enter Img Url 3" name="img_url3">
                </div>
                <div class="form-group">

                    <label for="ikmg">Img Url 4</label>
                    <input value="<?php echo $old_plant['img_url4'] ?>" type="text" class="form-control" id="ikmg" aria-describedby="emailHelp" placeholder="Enter Img Url 4" name="img_url4">
                </div>
               

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3"><?php echo $old_plant['detail'] ?></textarea>
                </div>






                <input type="submit" class="btn btn-primary btn-lg" name="submit"></input>
            </form>

        </div>





    <?php


}
    ?>
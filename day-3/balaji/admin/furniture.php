<?php
// include('./header.php');
include('../cont.php');

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


function shownav(){
   var nav =  document.getElementById('navbarText');
   if(some == false){
   nav.classList.remove('collapse');
   some = true;
   }else{
    nav.classList.add('collapse');
    some = false;
   }


}

</script>
    


<style>

img {
    width: 60px;
}
</style>
<table class="table table-bordered table-hover" >


    <thead class="thead-dark">
        <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>

        <th scope="col">Image1</th>
        <th scope="col">Image2</th>
        <th scope="col">Image3</th>
        <th scope="col">Image4</th>
        <th scope="col">Detail</th>

            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>



        <?php

        $qry = "SELECT * FROM `furniture`";
        $result = mysqli_query($connection, $qry);

        while ($equip = mysqli_fetch_assoc($result)) {

        ?>
            <tr style="height:100px">
                <td scope="col"><?php echo $equip['id'] ?></td>
                <td scope="col"><?php echo $equip['name'] ?></td>
                <td scope="col"><img src="<?php echo $equip['img_url1'] ?>"></td>
                <td scope="col"><img src="<?php echo $equip['img_url2'] ?>"></td>
                <td scope="col"><img src="<?php echo $equip['img_url3'] ?>"></td>
                <td scope="col"><img src="<?php echo $equip['img_url4'] ?>"></td>
                <td scope="col" style="width:50%"><?php echo $equip['detail'] ?></td>
                <td scope="col">

                
                <a class="btn btn-dark btn-lg" href="delete_furniture.php?id=<?php echo $equip['id']  ?>">Delete</a>
                <a class="btn btn-dark btn-lg" href="modify_furniture.php?id=<?php echo $equip['id']  ?>">Modify</a>
                </td>
            </tr>

        <?php
        }

        ?>


    </tbody>
</table>


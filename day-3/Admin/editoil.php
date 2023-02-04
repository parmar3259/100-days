<?php
include 'session.php';
include('../database/connection.php');
?>




  <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin </title>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="https://cdn.jsdelivr.net/gh/mdbootstrap/Bootstrap-4-templates/admin/css/style.min.css" rel="stylesheet">
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
  </style>
</head>

</head>
<body>
<!-- partial:index.partial.html -->
<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>
  <?php include 'header.php'; ?>

  <!-- Sidebar -->

<!-- Sidebar -->
</header>

  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
            <span>/</span>
            <span>Oil</span>
          </h4>

          <form class="d-flex justify-content-center">
            <!-- Default input -->
            <!-- <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button> -->

          </form>

        </div>

      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-8">


        
        <?php

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM oil WHERE ID = $id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
   
    
  }
?>


         <!-- Add button -->
         <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['ID']; ?>">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="form-group">
          <label for="quality">Quality</label>
          <input type="text" class="form-control" id="quality" name="quality" value="<?php echo $product['quality']; ?>" required>
        </div>
        <div class="form-group">
          <label for="rate">Rate</label>
          <input type="text" class="form-control" id="rate" name="rate" value="<?php echo $product['rate']; ?>" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" required><?php echo $product['description']; ?></textarea>
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
<!-- PHP code to insert the form data into the database -->
<?php
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $quality = $_POST['quality'];
    $rate = $_POST['rate'];
    $description = $_POST['description'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  
    $query = "INSERT INTO oil (name, quality, rate, description, image) VALUES ('$name', '$quality', '$rate', '$description', '$image')";
    if (mysqli_query($conn, $query)) {
      echo '<div class="alert alert-success" role="alert">New oil record added successfully!</div>';
    } else {
      echo '<div class="alert alert-danger" role="alert">Error: ' . mysqli_error($conn) . '</div>';
    }
  }
?>

        </div>


      </div>
      <!--Grid row-->


    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->

  <footer>
  <?php include 'footer.php'; ?>
</footer>

<!-- partial -->
  
</body>
</html>

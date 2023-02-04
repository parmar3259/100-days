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

         <!-- Add button -->
         <div class="d-flex justify-content-end mb-3">
  <a href="insertoil.php" class="btn btn-success" id="addBtn">Add New</a>
</div>

<?php
$query = "SELECT * FROM oil";
$result = mysqli_query($conn, $query);
?>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Quality</th>
      <th>Rate</th>
      <th>Description</th>
      <th>Date Stamp</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['quality']; ?></td>
        <td><?php echo $row['rate']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['date_stamp']; ?></td>
        <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" height="100" width="100"/>'; ?></td>
        <td>
        <a href="editoil.php?id=<?php echo $row['ID']; ?>" class="btn btn-warning">Edit</a>
        <form action="deleteoil.php" method="post">
  <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
  <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">
</form>



      </td>

      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

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

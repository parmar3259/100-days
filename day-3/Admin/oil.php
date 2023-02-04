<?php
include 'session.php';
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
  <button class="btn btn-success" id="addBtn">Add New</button>
</div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>Name</th>
      <th>Birthday</th>
      <th>Age</th>
      <th>Sex</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John Doe</td>
      <td>01/01/2000</td>
      <td>23</td>
      <td>Male</td>
      <td>
        <a href="#" class="btn btn-primary btn-sm">Edit</a>
      </td>
      <td>
        <button class="btn btn-danger btn-sm">Delete</button>
      </td>
    </tr>
    <!-- Add more rows as needed -->
  </tbody>
</table>


<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <!-- Input fields for name, birthday, age, and sex -->
          <div class="form-group">
            <label for="nameInput">Name</label>
            <input type="text" class="form-control" id="nameInput">
          </div>
          <div class="form-group">
            <label for="birthdayInput">Birthday</label>
            <input type="text" class="form-control" id="birthdayInput">
          </div>
          <div class="form-group">
            <label for="ageInput">Age</label>
            <input type="text" class="form-control" id="ageInput">
          </div>
          <div class="form-group">
            <label for="sexInput">Sex</label>
            <input type="text" class="form-control" id="sexInput">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript to open the modal -->
<script>
  document.querySelector("#addBtn").addEventListener("click", function() {
    $("#addModal").modal("show");
  });
</script>


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

<?php

include('session.php');
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="./admin.php">furniture store</a>
  <button onclick="shownav()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
    </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText" style="padding-left: 70px;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./admin.php">Home</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="./orders.php">Orders</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="./user.php">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./equip.php">furnitures</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="./equip.php">Equipments</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="./logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav> -->

<!-- 
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

</script> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
    />
    <link rel="stylesheet" href="./dashboard.css" />
  </head>
  <body>
    <!-- partial:index.partial.html -->
    <div class="dashboard">
      <div class="dashboard-nav">
        <header>
          <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a
          ><a href="#" class="brand-logo"
            ><i class="fas fa-anchor"></i> <span>Furniture store</span></a
          >
        </header>
        <nav class="dashboard-nav-list">
          <!-- <a href="#" class="dashboard-nav-item"
            ><i class="fas fa-home"></i> Home </a
          > -->
          <a href="#" class="dashboard-nav-item active"
            ><i class="fas fa-tachometer-alt"></i> dashboard </a
          ><a href="./insert_furniture.php" class="dashboard-nav-item"
            ><i class="fas fa-file-upload"></i> Upload new item
          </a>
          <div class="dashboard-nav-dropdown">
            <a
              href="#"
              class="dashboard-nav-item dashboard-nav-dropdown-toggle"
              ><i class="fas fa-photo-video"></i> Furniture
            </a>
            <div class="dashboard-nav-dropdown-menu">
              <a href="furniture.php" class="dashboard-nav-dropdown-item">All</a
              >
              <!-- <a href="#" class="dashboard-nav-dropdown-item">Recent</a
              >
              <a href="#" class="dashboard-nav-dropdown-item">Images</a
              >
              <a href="#" class="dashboard-nav-dropdown-item">Video</a> -->
            </div>
          </div>
          <!-- <div class="dashboard-nav-dropdown">
            <a
              href="#!"
              class="dashboard-nav-item dashboard-nav-dropdown-toggle"
              ><i class="fas fa-users"></i> Users
            </a>
            <div class="dashboard-nav-dropdown-menu">
              <a href="#" class="dashboard-nav-dropdown-item">All</a
              ><a href="#" class="dashboard-nav-dropdown-item">Subscribed</a
              ><a href="#" class="dashboard-nav-dropdown-item">Non-subscribed</a
              ><a href="#" class="dashboard-nav-dropdown-item">Banned</a
              ><a href="#" class="dashboard-nav-dropdown-item">New</a>
            </div>
          </div> -->
          <!-- <div class="dashboard-nav-dropdown">
            <a
              href="#!"
              class="dashboard-nav-item dashboard-nav-dropdown-toggle"
              ><i class="fas fa-money-check-alt"></i> Payments
            </a>
            <div class="dashboard-nav-dropdown-menu">
              <a href="#" class="dashboard-nav-dropdown-item">All</a
              ><a href="#" class="dashboard-nav-dropdown-item">Recent</a
              ><a href="#" class="dashboard-nav-dropdown-item"> Projections</a>
            </div>
          </div> -->
          <!-- <a href="#" class="dashboard-nav-item"
            ><i class="fas fa-cogs"></i> Settings </a
          ><a href="#" class="dashboard-nav-item" -->
            <!-- ><i class="fas fa-user"></i> Profile -->
          </a>
          <div class="nav-item-divider"></div>
          <a href="./logout.php" class="dashboard-nav-item"
            ><i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </nav>
      </div>
      <div class="dashboard-app">
        <header class="dashboard-toolbar">
          <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
        </header>
        <div class="dashboard-content">
          <div class="container">
            <div class="card">
              <div class="card-header">
                <h1>Welcome back ADMIN  </h1>
              </div>
              <div class="card-body">
                <p>Your account type is: Administrator</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./dashboard.js"></script>
  </body>
</html>

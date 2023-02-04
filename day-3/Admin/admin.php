<?php
session_start();
include('../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $sql = "SELECT id, username, password FROM admin_login WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Create a session
    session_start();
    $_SESSION['username'] = $username;
    header("Location: admindash.php");
    exit;
  } else {
    echo "Wrong username or password";
  }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin login</title>
  <link rel="stylesheet" href="./style.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <!DOCTYPE html>
  <html>

  <head>
    <title>Login Admin</title>
    <link rel="stylesheet" type="text/css" href="form.css">
  </head>

  <body>
    <div class="kotak_login">
      <p class="tulisan_login">Balaji Enterprises</p>

      <img src="https://freedesignfile.com/upload/2017/07/Hand-drawn-coffee-logos-design-vector-set-07.jpg"
        alt="coffee">


      <form action="" method="post"> <label>Username</label>
        <input type="text" name="username" class="form_login" placeholder="username..">

        <label>Password</label>
        <input type="password" name="password" class="form_login" placeholder="Password ..">

        <input type="submit" class="tombol_login" value="LOGIN">
      </form>

    </div>
  </body>

  </html>
  <!-- partial -->

</body>

</html>
<?php
session_start();
// print_r($_SESSION);

$err = '';
include('../cont.php');
 if(isset($_POST["username"]) && isset($_POST["password"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    //echo $username.'<br>'.$password;
    $query = "SELECT * FROM `login` WHERE `username`= '$username'  AND `password`= '$password' AND `role` = 'admin'";
    $res = mysqli_query($connection,$query);
    $ress = mysqli_fetch_array($res,MYSQLI_ASSOC);

    
    if(isset($ress['id'])){
        $_SESSION["user"] = $username;
  echo '<script>location.replace("./header.php")</script>';      
      }else{
        $err = 'not an admin';
    }

 }



?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./adminlogin.css">
</head>
<body>
  <canvas id='world'></canvas>
<!-- partial:index.partial.html -->
                                <!-- <label class="form-control-label">USERNAME</label>
                                <input type="text"  name="username" class="form-control">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="password" class="form-control" i>
                                 <button type="submit" name="" value="login"class="btn btn-outline-primary">LOGIN</button> -->


<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" method="post">
      <h4>Admin<span>Dashboard</span></h4>
      <h5>Sign in to your account.</h5>
        <input type="text" name="username" placeholder="name" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password"  name="password"  placeholder="Passsword" id="pwd" autocomplete="off">
        <input type="submit" name="login" value="Login In" class="btn1">
      </form>
  </div> 
</div>








<!-- partial -->
<script src='./adminlogin.js'></script>
</body>
</html>
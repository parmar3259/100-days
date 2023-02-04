<?php
   include 'config.php';

   $conn = mysqli_connect($host,$dbuser,$dbpassword,$dbname);

   // Check connection
   if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
       exit();
   }
   else {
       mysqli_set_charset($conn, 'utf8mb4');
    //    echo 'Successful connection';
   }
?>

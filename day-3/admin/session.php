<?php 
    
    session_start();

    if(!isset($_SESSION["user"]))
    {
        echo "<script> location.replace('../index.php');</script>";
        die();
    }
    
   ?>
<?php
include 'session.php';
include('../database/connection.php');
$id = $_POST['id'];

$query = "DELETE FROM oil WHERE ID = '$id'";

if (mysqli_query($conn, $query)) {
    mysqli_query($conn, "ALTER TABLE oil AUTO_INCREMENT = 1");

  header("Location: oil.php?message=delete_success");
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);




?>
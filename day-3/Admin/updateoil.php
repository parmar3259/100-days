<?php
include 'session.php';
include('../database/connection.php');

 echo $_SESSION['username']; 


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quality = $_POST['quality'];
    $rate = $_POST['rate'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $temp_image = $_FILES['image']['tmp_name'];
    move_uploaded_file($temp_image, "images/$image");

    $query = "UPDATE oil SET name='$name', quality='$quality', rate='$rate', description='$description', image='$image' WHERE ID='$id'";


    print_r($query);
    die();
    if (mysqli_query($conn, $query)) {
        header("Location:index.php");
    }
    else {
        echo "Error: " . mysqli_error($connection);
    }
}

?>
<?php

include('../cont.php');

?>


<?php

if(isset($_GET['id'])){

    $qry = "DELETE from furniture where id = {$_GET['id']} ";
    $res = mysqli_query($connection,$qry);

    echo '<script>location.replace("furniture.php")</script>';
}
?>
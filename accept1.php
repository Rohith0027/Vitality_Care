<?php 
    session_start();
    require 'config.php';
    $id=$_GET['id'];
    $update = "UPDATE `items` SET stat = 0 WHERE title = '$id'";
    $update = "UPDATE `buy` SET status = 0 WHERE title = '$id'";
    mysqli_query($conn,$update);
    printf("Accepted");
?>
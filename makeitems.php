<?php
    session_start();
    include 'config.php';
    if(isset($_POST['update_items'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $catogery = mysqli_real_escape_string($conn, $_POST['catogery']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
        $tmp_name =  $_FILES['image']['tmp_name'];
        $local_image = "upload/";
        $query  = "INSERT INTO `items`(`title`, `description`, `catogery`, `quantity`, `price`, `image`,`email`,`name`) VALUES ('$title','$description','$catogery','$quantity','$price','$image','".$_SESSION["email"]."','".$_SESSION['name']."')";
        $query_run = mysqli_query($conn , $query);
        if($query_run){
            $_SESSION['status'] = "Image stored successfully";
            move_uploaded_file($tmp_name,$local_image.$image);
            header('Location: merchant.php');
        }else{
            $_SESSION['status'] = "Image not stored";
            header('Location: items.php');
        }
    }
?>

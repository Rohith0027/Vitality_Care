<?php
    session_start();
    include 'config.php';
    if(isset($_POST['update_profile'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $addr = mysqli_real_escape_string($conn, $_POST['addr']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $id = $_SESSION['id'];
        $query  = "UPDATE `login` SET  name='$name',age = '$age', phone = '$phone', dob = '$dob', addr = '$addr',email = '$email' WHERE id = $id";
        $query_run = mysqli_query($conn , $query);
        if($query_run){
            header('Location: profilea.php');
        }else{
            header('Location: updateprofilea.php');
        }
    }
?>
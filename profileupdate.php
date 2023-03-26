<?php
    session_start();
    include 'config.php';
    if(isset($_POST['update_profile'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $speci = mysqli_real_escape_string($conn, $_POST['speci']);
        $hospital = mysqli_real_escape_string($conn, $_POST['hospital']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $id = $_SESSION['id'];
        $query  = "UPDATE `login` SET  name='$name',age = '$age', phone = '$phone', dob = '$dob', speci = '$speci', hospital = '$hospital',email = '$email' WHERE id = $id";
        $query_run = mysqli_query($conn , $query);
        if($query_run){
            $query1 = mysqli_query($conn,"INSERT INTO `beds`(`hname`,`did`) VALUES ('$hospital','$id')");
            
            header('Location: profile.php');
        }else{
            header('Location: updateprofile.php');
        }
    }
?>
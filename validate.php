<?php
    include 'config.php';
    if(isset($_POST['signup'])){
        session_start();
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
        $tmp_name =  $_FILES['image']['tmp_name'];
        $local_image = "upload/";
        $select = mysqli_query($conn, "SELECT * FROM `login` WHERE phone = '$phone' AND password = '$password'") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $message[] = 'user already exist'; 
         }else{
            $insert = mysqli_query($conn, "INSERT INTO `login`(`id`, `name`, `password`,`age`, `dob`,`addr` ,`email`, `phone`, `speci`, `hospital`, `type`, `image`) VALUES ('','$name','$password','','','','','$phone','','','$type','$image')") or die('query failed');
            if($insert){
                $select = mysqli_query($conn, "SELECT * FROM `login` WHERE phone =$phone AND password = '$password'") or die('query failed');
                $ro = mysqli_fetch_assoc($select);
                if($type == 'doctor'){
                $_SESSION['id'] = $ro['id'];
                $_SESSION['name'] = $ro['name'];
                move_uploaded_file($tmp_name,$local_image.$image);
                header('Location:profile.php');
                }elseif($type == 'patient'){
                    $_SESSION['id'] = $ro['id'];
                    $_SESSION['name'] = $ro['name'];
                    move_uploaded_file($tmp_name,$local_image.$image);
                    header('Location:profilea.php');
                }
             }else{
                echo 'registeration failed!';
             }
         }
    }elseif(isset($_POST['signin'])){
        session_start();
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $select = mysqli_query($conn, "SELECT * FROM `login` WHERE phone = '$phone' AND password = '$password'") or die('query failed');
        $ro = $select -> fetch_assoc();
        printf ("%s (%s)\n", $ro["name"], $ro["email"]);
        if(mysqli_num_rows($select) > 0){
            if($ro['type']=='doctor'){
                $_SESSION['id'] = $ro['id'];
                $_SESSION['name'] = $ro['name'];
                header('Location:profile.php');
            }elseif($ro['type']=='patient'){
                $_SESSION['id'] = $ro['id'];
                $_SESSION['name'] = $ro['name'];
                header('Location:profilea.php');
            }
        }else{
            echo 'invalid email or password';
        }
    }
?>
<?php
    include 'config.php';
    if(isset($_POST['signup'])){
        session_start();
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'") or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $message[] = 'user already exist'; 
         }else{
            $insert = mysqli_query($conn, "INSERT INTO `user`(name, email, password, type) VALUES('$name', '$email', '$password', '$type')") or die('query failed');
            if($insert){
                if($type == 'Merchant'){
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                header('Location:merchant.php');
                }elseif($type == 'Customer'){
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $name;
                    header('Location:customer.php');
                }
             }else{
                echo 'registeration failed!';
             }
         }
    }elseif(isset($_POST['signin'])){
        session_start();
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'") or die('query failed');
        $ro = $select -> fetch_assoc();
        printf ("%s (%s)\n", $ro["name"], $ro["email"]);
        if(mysqli_num_rows($select) > 0){
            if($ro['type']=='Customer'){
                $_SESSION['email'] = $ro['email'];
                $_SESSION['name'] = $ro['name'];
                header('Location:customer.php');
            }elseif($ro['type']=='Merchant'){
                $_SESSION['email'] = $ro['email'];
                $_SESSION['name'] = $ro['name'];
                header('Location:merchant.php');
            }
        }else{
            echo 'invalid email or password';
        }
    }
?>
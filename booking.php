<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .comment-box{
            width: 50%;
            border: 1px solid #ccc;
            margin: 50px 0;
            padding: 10px 20px;
            font-family: 'Poppins',sans-serif;
            border-radius: 5px;
            margin-left: 25%;
            margin-top: 80px;
            box-shadow: 0px 0px 10px 1px rgb(165,165,165);
        }
        .comment-form input, .comment-form textarea{
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            outline: none;
            font-size: 18px;
            font-family: 'Poppins',sans-serif;
            border: 1px solid #ddd;
            color: #777;
        }
        .comment-form button{
            margin: 10px 0;
            border: none;
            background-color: #d0d0d0;
            padding: 10px;
            font-size: 18px;
            border-radius: 3px;
            color: #444;
        }
        button:hover{
            color: white;
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="comment-box">
        <p>Book Product</p>
        <form class="comment-form" method="POST">
            <input type="title" disabled placeholder="title" value="<?php echo $_GET['data'];?>" name="title">
            <input type="industry" disabled placeholder="title" value="<?php echo "by ".$_SESSION['name'];?>" name="industry">
            <input type="price" disabled value="<?php echo "for ".$_GET['data1']; ?>(per unit)" name="price">
            <input type="name" disabled value="<?php echo "to ".$_GET['data3']; ?>" name="mu">
            <input type="quantity" value="Enter units must not exceed(<?php echo $_GET['data2']; ?>)" name="quantity">
            <button type="submit" name="com">Submit</button>
        </form>
    </div>
    <?php
        require 'config.php';
        if(isset($_POST['com'])){
            $title = $_GET['data'];
            $industry = $_SESSION['name'];
            $price = $_GET['data1'];
            $mu = $_GET['data3'];
            $quantity = $_POST['quantity'];
            $insert = mysqli_query($conn , "INSERT INTO `buy`(`title`, `industry`, `price`, `mu`, `quantity`) VALUES ('$title','$industry','$price','$mu','$quantity')");
            if($insert){
                header('location:customer.php');
            }
            else{
                echo "failed!";
            }
        }
    ?>
</body>
</html>
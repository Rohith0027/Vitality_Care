<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
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
            <p>Leave a Comment</p>
            <form class="comment-form" method="POST">
                <input type="title" disabled placeholder="title" value="<?php echo $_GET['data'];?>" name="title">
                <textarea rows="10" placeholder="Write Your Comment" name="description" required></textarea>
                <button type="submit" name="com">Post Comment</button>
            </form>
        </div>
    <?php 
        require 'config.php';
        if(isset($_POST['com'])){
            $title = $_GET['data'];
            $uemail = $_SESSION['name'];
            $memail = $_GET['data1'];
            $comment = $_POST['description'];
            $insert = mysqli_query($conn , "INSERT INTO `comment`(`uname`, `memail`, `title`, `comment`) VALUES ('$uemail','$memail','$title','$comment')");
        }
    ?>
</body>
</html>
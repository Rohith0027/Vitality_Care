<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="merchant.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Industry</title>
</head>
<body>
    <header>
        <h1 class="brand"><?php echo $_SESSION['name']; ?></h1>
        <div class="menu">
            <div class="btn">
                <i class="fas fa-times close-btn"></i>
            </div>
            <a href="customer.php">Home</a>
            <a href="item.php">Search</a>
            <a href="hospital.php">Register</a>
            <a href="sales.php">Purchase & Sales</a>
            <a href="creports.php">Reports</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="btn">
            <i class="fas fa-bars menu-btn"></i>
        </div>
    </header>
    <div class="box-container">
    <?php 
        require 'config.php';
        $query = "SELECT * FROM `items`";
        $query_run = mysqli_query($conn , $query);
        $check_product = mysqli_num_rows($query_run)>0;
        if($check_product){
            while($row = mysqli_fetch_assoc($query_run)){
                if($row['stat']==1){
            ?>
            <div class="box">
                <div class="image">
                    <img src="upload/<?php echo $row['image']; ?>" alt="">
                </div>
                <div class="info">
                        <form method="post"><h3 class="title"><?php echo $row['title'];?> (<?php echo $row['catogery'];?>) <?php echo "by ".$row['name'] ?></h3></form>
                    <h4 class="description"><?php echo $row['description'];?></h4>
                    <div class="subinfo">
                        <div class="price"><?php echo $row['quantity'] ?> units<span>(<?php echo $row['price']; ?>rs per unit)</span></div>
                    </div>
                </div>
                <a href="booking.php?data=<?php echo $row['title']; ?>&data1=<?php echo $row['price']; ?>&data2=<?php echo $row['quantity']; ?>&data3=<?php echo $row['name']; ?>" class="bt"  name="edit"><i class="fas fa-cart-shopping"></i>Book Now</a>
                <div class="overlay">
                    
                        <a href="comment.php?data=<?php echo $row['title'];?>&data1=<?php echo $row['email'];?>" style="--i:1;" class="fa-solid fa-comment" name="comment">
                        </a>
                        <a href="" style="--i:2;" class="fa-solid fa-share"></a>
                   
                </div>
            </div>
            <?php
                }
            }
        }else{
            echo "No Products Posted";
        }
    ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js" integrity="sha512-Gfrxsz93rxFuB7KSYlln3wFqBaXUc1jtt3dGCp+2jTb563qYvnUBM/GP2ZUtRC27STN/zUamFtVFAIsRFoT6/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="merchant.js"></script>
</body>
</html>
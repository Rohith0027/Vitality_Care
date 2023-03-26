<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="item.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Industry</title>
</head>
<body>
    <header>
        <h1 class="brand"></h1>
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
    <form action="item.php" method="GET" class="fo">
            <input type="text" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder = "Search Product" name="search"/>
            <button class="btn btn-dark btn-sm" type="submit">Search</button>
    </form>
    <div class="box-container">
    <?php 
        require 'config.php';
        if(isset($_GET['search'])){
            $filtervalues = $_GET['search'];
            $query = "SELECT * FROM items WHERE CONCAT(title,description,catogery,quantity,price) LIKE '%$filtervalues%'";
            $query_run = mysqli_query($conn,$query);
                if(mysqli_num_rows($query_run)>0){
                    foreach($query_run as $items){
                    ?>
                    <div class="box">
                    <div class="image">
                    <img src="upload/<?php echo $items['image']; ?>" alt="">
                    </div>
                    <div class="info">
                    <h3 class="title"><?php echo $items['title'];?> (<?php echo $items['catogery'];?>)</h3>
                    <h4 class="description"><?php echo $items['description'];?></h4>
                    <div class="subinfo">
                        <div class="price"><?php echo $items['quantity'] ?> units<span>(<?php echo $items['price']; ?>rs per unit)</span></div>
                    </div>
                    </div>
                    <a href="booking.php?data=<?php echo $query['title']; ?>&data1=<?php echo $query['price']; ?>&data2=<?php echo $query['quantity']; ?>" class="bt"  name="edit"><i class="fas fa-cart-shopping"></i>Book Now</a>
                    <div class="overlay">
                    <a href="#" style="--i:1;" class="fa-solid fa-comment"></a>
                    <a href="#" style="--i:2;" class="fa-solid fa-share"></a>
                    </div>
                    </div>
                    <?php
                    }
                }else{
                   ?>
                        <h1>No Record Found</h1>
                   <?php
                }
            }
    ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js" integrity="sha512-Gfrxsz93rxFuB7KSYlln3wFqBaXUc1jtt3dGCp+2jTb563qYvnUBM/GP2ZUtRC27STN/zUamFtVFAIsRFoT6/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="merchant.js"></script>
</body>
</html>
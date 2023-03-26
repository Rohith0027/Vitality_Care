<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="merchant.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sales & Purchase</title>
</head>
<body style="margin: 50px; padding-top: 50px;">
    <header>
        <h1 class="brand"><?php echo $_SESSION['name']; ?></h1>
        <div class="menu">
            <div class="btn">
                <i class="fas fa-times close-btn"></i>
            </div>
            <a href="merchant.php">Home</a>
            <a href="items.php">Items</a>
            <a href="purchase.php">Purchase </a>
            <a href="msales.php">Sales</a>
            <a href="mreports.php">Reports</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="btn">
            <i class="fas fa-bars menu-btn"></i>
        </div>
    </header>
    <h1>List of orders</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Industry</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'config.php';
            $sql = mysqli_query($conn, "SELECT * FROM `buy` WHERE mu = '".$_SESSION['name']."'");
            while($row = $sql->fetch_assoc()){
                if($row['status']==0){
            ?>  <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['industry']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td> <?php if($row['status']==0){    
                        echo "<h4>Sold</h4>";
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            }
            ?>
        </tbody>
    </table>
    <script src="merchant.js"></script>
</body>
</html>
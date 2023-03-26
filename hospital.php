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
    <h1>Patients Register</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Issue</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'config.php';
            $sql = mysqli_query($conn, "SELECT * FROM `appointments` WHERE hname = '".$_SESSION['name']."' AND (status=0 OR status=1)");
            $row = $sql->fetch_assoc();
            if($row){
            if($row['status']!=3 || $row['status']!=2){
                ?>
                <tr>
                    <td><?php echo $row['issue']; ?></td>
                    <td><?php echo $row['pname']; ?></td>
                    <td><?php echo $row['dname']; ?></td>
                    <td><?php echo "In Process" ?></td>
                    <td><?php if($row['status']==0){    
                        echo "<h4>New</h4>";
                        }elseif($row['status']==1){
                            echo "<h4>On Going</h4>";
                        }
                        ?>
                    </td>
                </tr>
                <?php
                }
            }else{
                $sqli = mysqli_query($conn, "SELECT * FROM `hospitalization` WHERE hname = '".$_SESSION['name']."'");
                $rows = $sqli->fetch_assoc();
                if($rows){
                    ?>
                    <tr>
                        <td><?php echo $rows['issue']; ?></td>
                        <td><?php echo $rows['pname']; ?></td>
                        <td><?php echo $rows['dname']; ?></td>
                        <td><?php echo $rows['prize'] ?></td>
                        <td><?php echo "Completed"; ?></td>
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
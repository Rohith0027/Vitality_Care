<?php session_start(); ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body> <input type="checkbox" id="menu">
    <nav> <label>Doctors Module</label>
        <ul>
            <li><a href="#">Logout</a></li>
        </ul> <label for="menu" class="menu-bar"> <i class="fa fa-bars"></i> </label>
    </nav>
    <div class="side-menu">
        <center> <?php 
            require 'config.php';
            $id=$_SESSION['id'];
            $query = "SELECT * FROM `login` WHERE id=$id";
            $query_run = mysqli_query($conn , $query);
            $check_product = mysqli_num_rows($query_run)>0;
            if($check_product==1){
                $row = mysqli_fetch_assoc($query_run);?>
    <img src="upload/<?php echo $row['image']; ?>"> <br><br>
    <h2><?php echo $_SESSION['name']; ?></h2>
    <?php } ?>
        </center> <br> <a href="appointments.php"><i class="fa fa-envelope"></i><span>Appointments</span></a>
        <a href="mypatients.php"><i class="fa fa-user"></i><span>My Patients</span></a> 
        <a href="beds.php"><i class="fa-solid fa-bed"></i><span>Beds Availability</span></a> 
        <a href="profile.php"><i class="fa-solid fa-address-card"></i><span>Profile</span></a> 
        <a href="logout.php" class="Logout"><span>Logout</span></a>
    </div>
    <div style="margin-top: 85px; width: 82.3%; float: right;" class="filter">
        <div class="row">
            <?php 
                require 'config.php';
                $id = $_SESSION['id'];
                $query = "SELECT * FROM `appointments` WHERE did='$id' AND status=0 OR status=1";
                $query_run = mysqli_query($conn , $query);
                if($row=mysqli_fetch_array($query_run)){
                    $iid=$row['pid'];
                    $query1 = mysqli_query($conn ,"SELECT image FROM `login` WHERE id=$iid");
                    $q=mysqli_fetch_assoc($query1);
            ?>
            <div class="column">
                <div class="card">
                    <img src="upload/<?php echo $q['image']; ?>" alt="image" style="width: 70%">
                    <div class="container">
                        <h4><b><?php echo $row['pname']; ?></b></h4>
                        <p><?php echo $row['issue']; ?></p>
                    </div>
                    <?php
                    require 'config.php';
                    $id = $_SESSION['id'];
                    $query = "SELECT * FROM `appointments` WHERE did='$id' AND status=0 OR status=1";
                    $query_run = mysqli_query($conn , $query);
                    $row = mysqli_fetch_array($query_run);
                    echo '<a href="hospitalization.php?id='.$row['pid'].'&pname='.$row['pname'].'" class="Logout"><span>Hospitalization</span></a>';?> /
                    <?php echo '<a href="cuns.php?id='.$row['pid'].'&pname='.$row['pname'].'" class="Logout"><span>Consultation</span></a>';?> <br><?php
                    echo '<a href="pres.php?id='.$row['pid'].'&name='.$row['pname'].'&hname='.$row['hname'].'" class="Logout"><span>Prescription</span></a>'; ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>
<?php session_start(); ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body> <input type="checkbox" id="menu">
    <nav> 
    <label>Doctors Module</label>
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
    <div style="margin-top: 85px; width: 83.3%; height: 100vh; float: right;" class="filter">
        <div class="update-profile">
            <form action="" method="post" enctype="multipart/form-data">
                <?php require 'config.php';
                $id = $_SESSION['id'];
                $q = mysqli_query($conn,"SELECT * FROM `login` WHERE id=$id");
                $rr = mysqli_fetch_assoc($q);
                $hname = $rr['hospital'];
                $query1 = mysqli_query($conn,"SELECT * FROM `beds` WHERE did=$id");
                $rows = mysqli_fetch_array($query1);
                $r = $rows['addr'];
                ?>
               <div class="flex">
                  <div class="inputBox">
                     <span>Hospital :</span>
                     <input type="text" name="hname" placeholder="<?php echo $hname; ?>" class="box">
                     <span>Area :</span>
                     <input type="text" name="addr" placeholder="<?php echo $r; ?>" class="box">
                     <span>Phone :</span>
                     <input type="phone" name="phone" placeholder="<?php echo $rows['phone']; ?>" class="box">
                     <span>Price :</span>
                     <input type="text" name="prize" placeholder="<?php echo $rows['prize']; ?>" class="box">
                  </div>
                  <div class="inputBox">
                     <span>Room :</span>
                     <input type="text" name="room" placeholder="<?php echo $rows['room']; ?>" class="box">
                     <span>Beds :</span>
                     <input type="text" name="beds" placeholder="<?php echo $rows['beds']; ?>" class="box">
                     <span>Image :</span>
                     <input type="file" id="img" name="image" class="box" required>
                  </div>
               </div>
               <input type="submit" value="submit" name="update_items" class="btn">
               <a href="beds.php" class="delete-btn">go back</a>
            </form>
         </div>
    </div>

</body>

</html>
<?php
    include 'config.php';
    if(isset($_POST['update_items'])){
        $phone = $_POST['phone'];
        $room = mysqli_real_escape_string($conn, $_POST['room']);
        $beds = mysqli_real_escape_string($conn, $_POST['beds']);
        $addr = mysqli_real_escape_string($conn, $_POST['addr']);
        $prize = mysqli_real_escape_string($conn, $_POST['prize']);
        $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
        $tmp_name =  $_FILES['image']['tmp_name'];
        $local_image = "upload/";
        $id = $_SESSION['id'];
        $hname1 = mysqli_real_escape_string($conn, $_POST['hname']);
        $query  = "UPDATE `beds` SET `hname`='$hname1',`prize`='$prize',`addr`='$addr',`phone`='$phone',`room`='$room',`beds`='$beds',`image`='$image',`did`='$id' WHERE `did`=$id";
        $query_run = mysqli_query($conn , $query);
        if($query_run){
            header('Location: beds.php');
        }else{
            printf("Wrong Details");
        }
    }
?>
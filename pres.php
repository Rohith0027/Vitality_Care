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
    <div style="margin-top: 85px; width: 83.3%; height: 100vh; float: right;" class="filter">
        <div class="update-profile">
            <form action="" method="post" enctype="multipart/form-data">
               <div class="flex">
                  <div class="inputBox">
                     <span>Issue :</span>
                     <input type="text" name="issue" value="" class="box" required>
                     <span>Tablets :</span>
                     <input type="text" name="tablets" value="" class="box" required>
                  </div>
                  <div class="inputBox">
                     <span>Timing :</span>
                     <input type="text" name="time" placeholder="" class="box" required>
                     <span>Food :</span>
                     <input type="text" name="food" placeholder="" class="box" required>
                  </div>
               </div>
               <input type="submit" value="submit" name="add" class="btn">
               <a href="mypatients.php" class="delete-btn">go back</a>
            </form>
         </div>
    </div>

</body>

</html>
<?php
    session_start();
    include 'config.php';
    if(isset($_POST['add'])){
        $did = $_SESSION['id'];
        $pid= $_GET['id'];
        $pname = $_GET['name'];
        $dname = $_SESSION['name'];
        $hname = $_GET['hname'];
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $tablets = mysqli_real_escape_string($conn, $_POST['tablets']);
        $issue = mysqli_real_escape_string($conn, $_POST['issue']);
        $food = mysqli_real_escape_string($conn, $_POST['food']);
        $query = mysqli_query($conn, "INSERT INTO `prescription`(`pid`, `did`, `pname`, `dname`, `hname`, `time`, `tablets`, `issue`, `food`) VALUES ('$pid','$did','$pname','$dname','$hname','$time','$tablets','$issue','$food')");
        if($query){
            header('Location: mypatients.php');
        }else{
            header('Location: pres.php');
        }
    }
?>
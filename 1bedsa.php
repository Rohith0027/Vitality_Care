<?php session_start(); ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body> <input type="checkbox" id="menu">
    <nav> <label>Patients Module</label>
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
        </center> <br> <a href="patienta.php"><i class="fa fa-envelope"></i><span>Appointments</span></a>
                        <a href="hospitalizationa.php"><i class="fa fa-user"></i><span>Hospitalizations</span></a> 
                        <a href="cunsa.php"><i class="fa-solid fa-bed"></i><span>Consultations</span></a> 
                        <a href="doctors.php"><i class="fa-solid fa-bed"></i><span>Doctors/Specialists</span></a> 
                        <a href="mydoctors.php"><i class="fa-solid fa-address-card"></i><span>My Doctors</span></a> 
                        <a href="bedsa.php"><i class="fa-solid fa-address-card"></i><span>Book Beds</span></a> 
                        <a href="profilea.php"><i class="fa-solid fa-address-card"></i><span>Profile</span></a>   
                        <a href="logout.php" class="Logout"><span>Logout</span></a>
    </div>
    <div style="margin-top: 85px; width: 83.3%; height: 100vh; float: right;" class="filter">
        <div class="update-profile">
        <?php
                require 'config.php';
                $id = $_GET['id'];
                $sql = mysqli_query($conn, "SELECT * FROM `beds` WHERE  did=$id ");
                $row = mysqli_fetch_array($sql);
                if($row){?>
            <form action="a.php" method="POST" enctype="multipart/form-data">
                <img src="upload/<?php echo $row['image']; ?>">
               <div class="flex">
                  <div class="inputBox">
                     <span>Hospital Name :</span>
                     <input type="text" disabled name="hname" value="<?php echo $row['hname'];?>" class="box">
                     <span>Address :</span>
                     <input type="text" disabled name="addr" value="<?php echo $row['addr'];?>" class="box">
                     <span>Room :</span>
                     <input type="text" disabled name="room" value="<?php echo $row['room'];?>" class="box">    
                     <span>Issue :</span>
                     <input type="text" name="issue" value="" class="box" required>
                  </div>
                  <div class="inputBox">
                     <span>Price :</span>
                     <input type="text" disabled name="prize" value="<?php echo $row['prize'];?>" class="box" required>
                     <span>Phone :</span>
                     <input type="text" disabled name="time" value="<?php echo $row['phone'];?>" class="box" required>
                     <span>Beds :</span>
                     <input type="text" disabled name="beds" value="<?php echo $row['beds'];?>" class="box" required>
                     <span>Time :</span>
                     <input type="text" name="time" value="" class="box" required>
                  </div>
                </div>
               <input type="submit" value="book beds" name="book_appointment" class="btn">
               <a href="bedsa.php" class="delete-btn">go back</a>
            </form>
            <?php } ?>
         </div>
    </div>

</body>

</html>

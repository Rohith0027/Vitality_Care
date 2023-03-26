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
        <form method="GET" action="">
        <div class="wrap">
            <div class="search">    
                <input type="text" class="searchTerm" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="What are you looking for?">
                <button type="submit" name="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
         </div>
        </form>
         <div class="row" style="margin-top: 4rem;">
                <?php 
                    require 'config.php';
                    $type = 'doctor';
                    if(isset($_GET['submit'])){
                    $filtervalues = $_GET['search'];
                    $que = "SELECT * FROM `login` WHERE CONCAT(name,addr,phone,speci,hospital) LIKE '%$filtervalues%' AND type='$type'";
                    $query_run1 = mysqli_query($conn,$que);
                    if(mysqli_num_rows($query_run1)>0){
                        foreach($query_run1 as $items){?>
                            <div class="column">
                            <div class="card">
                                <img src="upload/<?php echo $items['image']; ?>" alt="image" style="width: 30%">
                                    <div class="container">
                                        <h4><b><?php echo $items['name']; ?></b></h4>
                                        <p><?php echo $items['speci']; ?> (<?php echo $items['phone']; ?>)</p>
                                    </div>
                                <a href="<?php echo 'bappointment.php?id='.$items['id'].''; ?>" class="Logout"><span>Book Appointment</span></a>
                            </div>
                            </div>
                            <?php
                        }
                    }
                    }else{
                    $query = "SELECT * FROM `login` WHERE type='$type'";
                    $query_run = mysqli_query($conn , $query);
                    while($row = mysqli_fetch_array($query_run)){?>
                        <div class="column">
                            <div class="card">
                                <img src="upload/<?php echo $row['image']; ?>" alt="image" style="width: 50%">
                                    <div class="container">
                                        <h4><b><?php echo $row['name']; ?></b></h4>
                                        <p><?php echo $row['speci']; ?> (<?php echo $row['phone']; ?>)</p>
                                    </div>
                                <a href="<?php echo 'bappointment.php?id='.$row['id'].''; ?>" class="Logout"><span>Book Appointment</span></a>
                            </div>
                        </div>
                <?php } } ?>
         </div>
    </div>

</body>

</html>
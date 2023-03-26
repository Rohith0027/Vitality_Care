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
        <table>
            <tr>
                <th>Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Issue</th>
                <th>Status</th>
            </tr>
            <?php 
            include 'config.php';
            $id = $_SESSION['id'];
            $query = "SELECT * FROM `appointments` WHERE did='$id'";
            $query_run = mysqli_query($conn , $query);
            while($row=mysqli_fetch_array($query_run)){
            ?>
            <tr>
                <td><?php echo $row['pname'];?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['issue']; ?></td>
                <td>
                <?php
                  if($row['status']==0){
                    echo '<p> <a href="active.php?id='.$row['pid'].'&status=0&iid='.$row['did'].'" class="btn btn-danger">New</a></p> <br> <p> <a href="active2.php?id='.$row['pid'].'&status=0&iid='.$row['did'].'" class="btn btn-danger">Decline</a></p>';
                  }elseif($row['status']==1){
                    echo '<p> <a href="active.php?id='.$row['pid'].'&status=1&iid='.$row['did'].'" class="btn btn-success">On Going</a></p>';
                  }elseif($row['status']==2){
                    echo '<p> <a href="active.php?id='.$row['pid'].'&status=2&iid='.$row['did'].'" class="btn btn-success">Completed</a></p>';
                  }elseif($row['status']==3){
                    echo "Completed";
                  }
                ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>
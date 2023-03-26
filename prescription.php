<?php session_start(); ?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="profile.css">
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
        </center> <br> 
                        <a href="patienta.php"><i class="fa fa-envelope"></i><span>Appointments</span></a>
                        <a href="hospitalizationa.php"><i class="fa fa-user"></i><span>Hospitalizations</span></a> 
                        <a href="cunsa.php"><i class="fa-solid fa-bed"></i><span>Consultations</span></a> 
                        <a href="doctors.php"><i class="fa-solid fa-bed"></i><span>Doctors/Specialists</span></a> 
                        <a href="mydoctors.php"><i class="fa-solid fa-address-card"></i><span>My Doctors</span></a> 
                        <a href="bedsa.php"><i class="fa-solid fa-address-card"></i><span>Book Beds</span></a> 
                        <a href="profilea.php"><i class="fa-solid fa-address-card"></i><span>Profile</span></a>   
                        <a href="logout.php" class="Logout"><span>Logout</span></a>
    </div>
    <div style="margin-top: 85px; width: 83.3%; height: 100vh; float: right;" class="filter">
        <div class="main">
            <div class="card">
                <div class="card-body">
                    <?php 
                    require 'config.php';
                    $id=$_SESSION['id'];
                    $did=$_GET['id'];
                    $query = "SELECT * FROM `prescription` WHERE pid=$id AND did=$did";
                    $query_run = mysqli_query($conn , $query);
                    $check_product = mysqli_num_rows($query_run)>0;
                    if($check_product==1){
                        $row = mysqli_fetch_assoc($query_run);
                        ?>
                    <table>
                        <tbody>
                            <tr>
                                <td>Doctor</td>
                                <td>:</td>
                                <td><?php echo $row['dname']; ?></td>
                            </tr>
                            <tr>
                                <td>Issue</td>
                                <td>:</td>
                                <td><?php echo $row['issue']; ?></td>
                            </tr>
                            <tr>
                                <td>Tablets</td>
                                <td>:</td>
                                <td><?php echo $row['tablets']; ?></td>
                            </tr>
                            <tr>
                                <td>Food</td>
                                <td>:</td>
                                <td><?php echo $row['food']; ?></td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>:</td>
                                <td><?php echo $row['time']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                    <a href="mydoctors.php" class="delete-btn">go back</a>
                </div>
            </div>
    </div>

</body>

</html>
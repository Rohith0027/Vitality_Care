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
                    <a href="updateprofilea.php"><i class="fa fa-pen fa-xs edit"></i></a>
                    <?php 
                    require 'config.php';
                    $id=$_SESSION['id'];
                    $query = "SELECT * FROM `login` WHERE id=$id";
                    $query_run = mysqli_query($conn , $query);
                    $check_product = mysqli_num_rows($query_run)>0;
                    if($check_product==1){
                        $row = mysqli_fetch_assoc($query_run);
                        ?>
                    <table>
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><?php echo $row['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td>:</td>
                                <td><?php echo $row['age']; ?></td>
                            </tr>
                            <tr>
                                <td>BOD</td>
                                <td>:</td>
                                <td><?php echo $row['dob']; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?php echo $row['addr']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td><?php echo $row['phone']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
    </div>
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            call: "9848543980", // Call phone number
            call_to_action: "Emergency", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
</body>

</html>
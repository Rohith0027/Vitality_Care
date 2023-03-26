<?php include("config.php");
$id=$_GET['id'];
$stat=$_GET['status'];
$iid=$_GET['iid'];
$update = "DELETE FROM `appointments` WHERE pid=$id AND did=$iid";
$r = mysqli_query($conn,$update);
if($r){ 
echo "deleted successfully!";
}
?>
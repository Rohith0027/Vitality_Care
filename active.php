<?php include("config.php");
$id=$_GET['id'];
$stat=$_GET['status'];
$iid=$_GET['iid'];
if($stat==0){
$updatequery1 = "UPDATE appointments SET status=1 WHERE pid=$id AND did=$iid";
mysqli_query($conn,$updatequery1);
echo "successfully changed";
}elseif($stat==1){
    $updatequery1 = "UPDATE appointments SET status=2 WHERE pid=$id AND did=$iid";
    mysqli_query($conn,$updatequery1);
    echo "successfully changed";
}elseif($stat==2){
    $updatequery1 = "UPDATE appointments SET status=3 WHERE pid=$id AND did=$iid";
    mysqli_query($conn,$updatequery1);
    echo "successfully completed";
}
?>
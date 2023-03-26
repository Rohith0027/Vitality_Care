<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="updateprofile.css">
</head>
<body>
   <div class="hi">
      <h4><?php echo $_SESSION['name']; ?></h4>
   </div>
    <div class="update-profile">
        <form action="" method="post" enctype="multipart/form-data">
           <div class="flex">
              <div class="inputBox">
                 <span>Tile :</span>
                 <input type="text" name="title" value="" class="box" required>
                 <span>Description :</span>
                 <input type="text" name="description" value="" class="box" required>
                 <span>Catogery :</span>
                 <select name="catogery" id="format" class="box" required>
                    <option selected disabled>Choose an option</option>
                    <option value="Defibrillators">Defibrillators</option>
                    <option value="patient monitors">patient monitors</option>
                    <option value="surgical tables">surgical tables</option>
                    <option value="sterilizers, lights">sterilizers, lights</option>
                    <option value="ultrasounds">ultrasounds</option>
                    <option value="electrosurgical units">electrosurgical units</option>
                    <option value="blanket/fluid warmers">blanket/fluid warmers</option>
                    <option value="sterilizers">sterilizers</option>
                    <option value="washers/disinfectors">washers/disinfectors</option>
                    <option value="operating room tables">operating room tables</option>
                    <option value="anesthesia machines">anesthesia machines</option>
                    <option value="patient monitors">patient monitors</option>
                    <option value="defibrillators">defibrillators</option>
                    <option value="ESU">ESU</option>
                    <option value="rigid and flexible video systems">rigid and flexible video systems</option>
                </select>
              </div>
              <div class="inputBox">
                 <span>Total Quantity(in units) :</span>
                 <input type="text" name="quantity" placeholder="" class="box" required>
                 <span>Price Per Unit :</span>
                 <input type="text" name="price" placeholder="" class="box" required>
                 <span>Image :</span>
                 <input type="file" id="img" name="image" accept="image/*" class="box" required>
              </div>
           </div>
           <input type="submit" value="update product" name="update_product" class="btn">
           <a href="" class="delete-btn">go back</a>
        </form>
     
     </div>
    
</body>
</html>
<?php
    session_start();
    include 'config.php';
    $id = $_GET['edit'];
    if(isset($_POST['update_product'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $catogery = mysqli_real_escape_string($conn, $_POST['catogery']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
        $tmp_name =  $_FILES['image']['tmp_name'];
        $local_image = "upload/";
        $query  = "UPDATE `items` SET title = '$title',description = '$description', catogery = '$catogery', quantity = '$quantity', price = '$price', image = '$image' WHERE title = '$id'";
        $query_run = mysqli_query($conn , $query);
        if($query_run){
            $_SESSION['status'] = "Image stored successfully";
            move_uploaded_file($tmp_name,$local_image.$image);
            header('Location: merchant.php');
        }else{
            $_SESSION['status'] = "Image not stored";
            header('Location: update.php');
        }
    }
?>
<?php

  require("connection.php");

  require('function222.php');

  function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111,99999).$img['name'];

    $new_loc = UPLOAD_SRC.$new_name;

    if(!move_uploaded_file($tmp_loc,$new_loc)){
      header("location: index_merchant.php");
      exit;
    }
    else{
      return $new_name;
    }
  }

  function image_remove($img){
    if(!unlink(UPLOAD_SRC.$img)){
      header("location: index_merchant?alert=img_rem_fail");
      exit;
    }
   
  }

  if(isset($_POST['addproduct'])){
    foreach($_POST as $key => $value){
      $_POST[$key]=mysqli_real_escape_string($con, $value);
    }
    $imgpath = image_upload($_FILES['image']);

    $username = $_SESSION['user']['username'];
    $merchantID = $_SESSION['user']['merchantID'];
    $logoPath = $_SESSION['user']['logo'];
    
    $query="INSERT INTO `products`(`merchantID` ,`username`, `merchant_logo`,`tour_type`, `name`,`location`, `price`, `description`, `image`) 
            VALUES ('$merchantID','$username','$logoPath','$_POST[tour_type]','$_POST[name]','$_POST[location]','$_POST[price]','$_POST[desc]','$imgpath')";

    if(mysqli_query($con,$query)){
      header("location: index_merchant.php?success=added");
    }        
    else{
      header("location: index_merchant?alert=add_failed");
    }
  }

  if(isset($_GET['rem']) && $_GET['rem']>0)
  {
    $query="SELECT * FROM `products` WHERE  `id` ='$_GET[rem]'";
    $result=mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($result);

    image_remove($fetch['image']);

    $query="DELETE  FROM `products` WHERE `id`='$_GET[rem]'";
    if(mysqli_query($con,$query)){
      header("location: index_merchant.php?success=removed");
    }
    else{
      header("location: index_merchant?alert=remove_failed");
    }

  }

  if(isset($_POST['editproduct']))
  {
    foreach($_POST as $key => $value){
      $_POST[$key]=mysqli_real_escape_string($con, $value);
    }

    if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){
      $query="SELECT * FROM `products` WHERE `id` ='$_POST[editpid]'";
      $result=mysqli_query($con,$query);
      $fetch=mysqli_fetch_assoc($result);

      image_remove($fetch['image']);
      
      $imgpath = image_upload($_FILES['image']);

      $update="UPDATE `products` SET `tour_type`='$_POST[tour_type]',`name`='$_POST[name]', `location`='$_POST[location]', `price`='$_POST[price]',
            `description`='$_POST[desc]',`image`= '$imgpath' WHERE `id`='$_POST[editpid]'";
    }
    else{
      $update="UPDATE `products` SET `tour_type`='$_POST[tour_type]' ,`name`='$_POST[name]', `location`='$_POST[location]' ,`price`='$_POST[price]',
            `description`='$_POST[desc]' WHERE `id`='$_POST[editpid]'";
    }
    if(mysqli_query($con,$update)){
      header("location: index_merchant.php?success=updated");
    }
    else{
      header("location: index_merchant?alert=update_failed");
    }
  }


if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: index.php");
}

function calculateTotal($price) {
  $taxPercentage = 0.06; // 6%
  $tax = $price * $taxPercentage;
  $total = $price + $tax;
  return $total;
}

  
?>
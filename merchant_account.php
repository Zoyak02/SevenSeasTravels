<?php include('function222.php'); 
$registrationSuccess = isset($_SESSION['registrationSuccess']) ? $_SESSION['registrationSuccess'] : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Merchant Registration</title>
         <link rel="shortcut icon" href="img/favicon.png" type="image/png">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        
        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="css/merchant.css">
</head>
<body>
  <div class="container"> 
    <div class="title">Merchant Registration</div>
   
    <form method="post" action="merchant_account.php" enctype="multipart/form-data" >
    
    <?php
    if ($registrationSuccess) {
        echo '<div class="success" style="margin-top: 20px; padding: 10px;" >Registered successfully! You can now login.</div>';
    } else {
        foreach ($errors as $error) {
            echo display_error($error);
        }
    }
    ?>

      
      <div class="user-details">

      <input type="hidden" name="user_type" value="merchant">

      <input type="hidden" name="first_login" value=1>

        <div class="input-box">
          <span class="details">Merchant Name</span>
          <input type="text" name="username" value="<?php echo $username;?>" placeholder="Enter Name of Organistation" required>
        </div>

        <div class="input-box">
          <span class="details">Contact Number</span>
          <input type="tel" name="number" value="<?php echo $number;?>" placeholder="Enter your Contact Number" required>
        </div>

        <div class="input-box">
          <span class="details">E-mail</span>
          <input type="email"  name="email" value="<?php echo $email;?>" placeholder="Enter your E-mail" required>
        </div>

        <div class="input-box">
          <span class="details">Country</span>
          <input type="text" name="country" value="<?php echo $country;?>" placeholder="Enter your Country" required>
        </div>

        <div class="wrapper">
          <span class="details">Merchant Description</span>
          <textarea cols="60" name="description" value="<?php echo $description;?>" placeholder="Type something here...." required ></textarea>
        </div>

        <div class="wrapper">
          <span class="details">Company Logo</span>&nbsp;&nbsp;&nbsp;
          <input type="file" name="logo" value="<?php echo $logo;?>" accept=".jpg,.png,.svg,.jpeg" id="logoToUpload">
        </div>

        <div class="wrapper">
          <span class="details">Documents</span>&nbsp;&nbsp;&nbsp;
          <input type="file" name="document" value="<?php echo $document;?>"  accept=".jpg,.png,.svg,.jpeg" id="fileToUpload">
        </div>

  
      </div>

      <div class="button" style="display: inline-block; margin-left:25%;margin-right: 20px; width : 150px; ">
        <input type="submit" name="register_btn" value="Register">
       </div>
       <div class="button" style="display: inline-block;width : 150px; ">
          <a href="index.php">
              <input type="button" value="Go Home">
          </a>
       </div>
     
     
  
    </form>
  </div>

</body>
</html>
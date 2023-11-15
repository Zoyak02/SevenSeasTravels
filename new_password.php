<?php
if (isset($_GET['success'])) {
    $success_message = $_GET['success'];
}

?>


<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Password</title>
         <link rel="shortcut icon" href="img/favicon.png" type="image/png">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        
        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="css/merchant.css">
</head>
<body>
  <div class="container" style="height:600px;"> 

    <?php if (isset($success_message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
    <?php endif; ?>

    <div class="title">Set New Password</div>
   
    <center>
    <form method="post" action="function222.php" enctype="multipart/form-data" >
 
      <div class="user-details" style="display:block;">

        <div class="input-box">
          <span class="details" style="text-align:left;">User Name</span>
          <input type="text" name="username" placeholder="Your Username" required>
        </div>
 

        <div class="input-box">
          <span class="details" style="text-align:left;">Password</span>
          <input type="text" name="password_1" placeholder="New Password" required>
        </div>
      

        <div class="input-box">
          <span class="details" style="text-align:left;">Confirm password</span>
          <input type="text" name="password_2"placeholder="Confirm New Password" required>
        </div>

      </div>
 

       <div class="button" style="display: inline-block; margin-right: 10px;">
         <input type="submit" name="create_btn" value="Create" style="width:200px;">
        </div>

        <a href="index.php" style="text-decoration: none;">
            <div class="button" style="display: inline-block;">
                <input type="button" name="home_btn" value="Go to Home" style="width:200px; text-align:center;">
            </div>
        </a>

        
       </center>
   
  
    </form>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
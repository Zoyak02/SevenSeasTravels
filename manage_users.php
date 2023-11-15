<!--Manage Users Page-->
<?php
include_once("function222.php");
if (!isAdmin()) {
  // Display an alert if the user is not a merchant
  echo "<script>alert('Access denied. You need to be an Admin to access this page.');
  window.location.href = 'index.php'; // Redirect to index.php
  </script>";
  exit(); // Stop executing the current script
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin_css.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Libre+Franklin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
    <title>Seven Seas Management System</title>
    <link rel="icon" type="image/x-icon" href="admin_logos/favicon.png">

</head>
<body>
    <div id="adminSidebar" class="sidebar">
    <ul class="adminIcon">
        <!--many &nbsp for Admin to increase hover length-->
        <li class="adminBtnIcon"><a href="adminPage.php"><img src="admin_logos/admin logo.png" alt="homeLogo">&nbsp;&nbsp;Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        <li class="closeBtnIcon"><a href="javascript:void(0)" class="closeButton" onclick="closeNav()">☒</a></li>
        <br><br>
      </ul>
      <hr>
        <a href="home.php"><img src="admin_logos/home.png" alt="homeLogo">&nbsp;&nbsp;Home</a>
        <a href="manage_users.php"><img src="admin_logos/user logo.png" alt="userLogo">&nbsp;&nbsp;Manage Users</a>
        <a href="manage_merchants.php"><img src="admin_logos/listing logo.png" alt="listingLogo">&nbsp;&nbsp;Manage Merchants</a>
        <a href="review_ratings.php"><img src="admin_logos/review logo.png" alt="ratingLogo">&nbsp;&nbsp;Reviews & Ratings</a>
        <a href="settings.php"><img src="admin_logos/settings logo.png" alt="settingsLogo">&nbsp;&nbsp;Settings</a>

      <div id="sidebarFooter" class="sidebarFooter">
        <div id="logout_button" class="logout_button">
          <a href="index.php?logout=1"><img src="admin_logos/logout logo.png">&nbsp;&nbsp;Logout</a>
        </div><br>
        <p>&nbsp;&nbsp;&nbsp;© 2023 Seven Seas, All rights reserved.</p>
      </div>
    </div>

    <div id="header" class="header">
  
      <h3>
        <a href="index.php"><img src="admin_logos/Travel Website.png" ></a>
        <br>
        <button class="openButton" onclick="openNav()">☰</button>
        &nbsp;&nbsp;Manage Seven Seas Users
      </h3>
    </div>

    <div id="mainBody" class="mainBody">
      <br><br><br><br><br><br>
    <?php include "usersTable.php"; ?>
        <button onclick="topFunction()" id="topBtn" title="Go to top">&#9650;</button>
      </div>
  
  
      <script src="js/admin_js.js"></script>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
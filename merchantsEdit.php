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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        function updatePopUp() {
            alert("Merchant Record Updated Successfully");
        }
    </script>

    <!-- Bootstrap CSS -->
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
      <a href="home.php"><img src="admin_logos/home.png" alt="homeLogo">&nbsp;Home</a>
      <a href="manage_users.php"><img src="admin_logos/user logo.png" alt="userLogo">&nbsp;Manage Users</a>
      <a href="manage_merchants.php"><img src="admin_logos/listing logo.png" alt="listingLogo">&nbsp;Manage Merchants</a>
      <a href="review_ratings.php"><img src="admin_logos/review logo.png" alt="ratingLogo">&nbsp;Reviews & Ratings</a>
      <a href="settings.php"><img src="admin_logos/settings logo.png" alt="settingsLogo">&nbsp;Settings</a>

      

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
        &nbsp;&nbsp;Seven Seas Management System 
      </h3>
    </div>

    <div id="mainBody" class="mainBody">
        <br><br><br><br><br>
        <div class="container-fluid">

            <!-- Form Formatting & DB Connection to Call the Data into the Forms -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"> EDIT Merchant Profile </h5>
                </div>
                <div class="card-body">
                <?php

                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "login";

                  // Step 1: Connect to Database
                  $mysqli = new mysqli($servername, $username, $password, $dbname);

                  // Check Connection
                  if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                  }

                    if(isset($_POST['edit_btn'])) {
                        $merchantID = $_POST['edit_id'];
                
                        $sql = "SELECT * FROM merchant WHERE merchantID='$merchantID' ";
                        $result = $mysqli->query($sql);

                            foreach($result as $row)
                              {
                                ?>

                                  <form action="merchantsEditProcess.php" method="POST">

                                  <input type="hidden" name="user_type" value="merchant">

                                    <div class="form-group">
                                      <label>Merchant ID</label>
                                      <input type="text" name="edit_id" value="<?php echo $row['merchantID'] ?>"class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label> Merchant Username </label>
                                      <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label> Password </label>
                                      <input type="password" name="edit_password" onfocus="this.value=''" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" name="edit_email" value="<?php echo $row['email'] ?>"class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                      <label>Contact Number</label>
                                      <input type="number" name="edit_number" value="<?php echo $row['number'] ?>" class="form-control" placeholder="Enter Number">
                                    </div>
                                    <div class="form-group">
                                      <label>Description</label>
                                      <textarea name="edit_description" rows="6" class="form-control" placeholder="Enter Description"><?php echo $row['description'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label>Status</label>
                                      <input type="text" name="edit_status" value="<?php echo $row['status'] ?>" class="form-control" readonly>
                                    </div>
            

                                    <a href="manage_merchants.php" class="btn btn-danger"> CANCEL </a>
                                    <button onclick="updatePopUp()" type="submit" name="updateBtn" class="btn btn-primary"> Update </button>

                                  </form>
                                <?php
                              }
                      }
                  ?>
            </div>
          </div>
        </div>

      </div>
                
                

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
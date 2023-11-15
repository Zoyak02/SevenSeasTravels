<?php
include_once("function222.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        function updatePopUp() {
            alert("Reviews & Ratings Record Updated Successfully");
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
                    <h5 class="m-0 font-weight-bold text-primary"> EDIT Seven Seas Reviews </h5>
                </div>
                <div class="card-body">
                <?php

                  // function & switch statement to read convert rating number into rating stars
                  function to_stars($num){
                      
                  switch($num){

                      case 0: // 0 stars

                         echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          break;

                      case 1: // 1 star

                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          break;

                      case 2: // 2 stars

                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          break;

                      case 3: // 3 stars

                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          break;

                      case 4: // 4 stars

                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          break;

                      case 5: // 5 stars

                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                          break;

                      case null: // if rating = null in phpmyadmin, displays 0 stars

                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                          break;

                      default: // error message
                          
                          echo '<h5 style="color: red;"><i>Error in Retrieving User Ratings</i></h5>';
                      
                  }   
                  
                  }

                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "bookings";

                  // Step 1: Connect to Database
                  $mysqli = new mysqli($servername, $username, $password, $dbname);

                  // Check Connection
                  if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                  }

                    if(isset($_POST['edit_btn'])) {
                        $orderID = $_POST['edit_orderID'];
                
                        $sql = "SELECT * FROM purchases WHERE orderID='$orderID' ";
                        $result = $mysqli->query($sql);

                            foreach($result as $row)
                              {
                                ?>

                                  <form action="reviewsEditProcess.php" method="POST">

                                    <div class="form-group">
                                      <label>Order ID</label>
                                      <input type="text" name="edit_orderID" value="<?php echo $row['orderID'] ?>"class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label> User ID </label>
                                      <input type="text" name="edit_userID" value="<?php echo $row['userID'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Username</label>
                                      <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Tour Location</label>
                                      <input type="text" name="edit_tour_location" value="<?php echo $row['tour_location'] ?>"class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Product Name</label>
                                      <input type="text" name="edit_product_name" value="<?php echo $row['product_name'] ?>"class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Guests</label>
                                      <input type="number" name="edit_guests" value="<?php echo $row['guests'] ?>"class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Star Rating</label>
                                      <br>
                                      <?php echo to_stars($row['star_rating']); ?> <!--readonly--> <!--calls function to_stars-->
                                    </div>
                                    <div class="form-group">
                                      <label>Review</label>
                                      <textarea name="edit_review" rows="6" class="form-control" placeholder="Enter Customer Review"><?php echo $row['review'] ?></textarea>
                                    </div>
                                    

                                    <a href="review_ratings.php" class="btn btn-danger"> CANCEL </a>
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
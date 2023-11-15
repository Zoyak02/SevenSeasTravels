<!--Home Page Cards Content-->

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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookings";

// Step 1: Connect to Bookings Database
$bookingsmysqli = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($bookingsmysqli->connect_error) {
die("Connection failed: " . $bookingsmysqli->connect_error);
}


// policy table query for total users
$userssql = "SELECT * FROM user";

if ($result = $mysqli->query($userssql)) {

    // Return the number of rows in result set
    $usersrowcount = mysqli_num_rows( $result );
    
  }

// merchant sql for total merchants
$merchantsql = "SELECT * FROM merchant";

if ($result = $mysqli->query($merchantsql)) {

  // Return the number of rows in result set
  $merchantrowcount = mysqli_num_rows( $result );
  
}

// review sql for total reviews & ratings
$reviewsql = "SELECT * FROM purchases";

if ($result = $bookingsmysqli->query($reviewsql)) {

  // Return the number of rows in result set
  $reviewrowcount = mysqli_num_rows( $result );
  
}

// admin table query for Welcome message
$adminsql = "SELECT username FROM admin";
$result =  $mysqli->query($adminsql); 

if ($result->num_rows > 0) {

  $row = $result->fetch_assoc(); 


} else {

echo "0 results";

}
?>

    <!--Bootstrap Cards-->
    <div id="welcomeDiv" class="welcomeDiv">
    <h2 style="text-align:center;"><i>Welcome <?php echo $row["username"]; ?></i>!</h2>
    <br>
    <hr style="border-width: 3px; border-color: gray;">
    <br><br>
    <!--Total Users Card-->
    <div id="mainCardBody" class="row">
      <div id="card_1" class="card text-white bg-info mb-1 offset-md-1" style="max-width: 32rem;">
        <div class="card-body">
          <h4 class="card-title"><?php echo $usersrowcount;  ?><img src="admin_logos/total users logo.png" alt="card1Logo" class="card_1_img"></h4>
            <br>
            <h5 class="card-text">Total Registered Seven Seas Users</h5>
            <br>
            <a href="manage_users.php" class="stretched-link"></a>
          </div>
      </div>
    <!--Total Merchants Card-->
      <div id="card_2" class="card text-white mb-1 offset-md-1" style="max-width: 32rem;">
        <div class="card-body">
          <h4 class="card-title"><?php echo $merchantrowcount; ?><img src="admin_logos/total merchants logo.png" alt="card1Logo" class="card_1_img"></h4>
            <br>
            <h5 class="card-text">Total Registered Seven Seas Merchants</h5>
            <a href="manage_merchants.php" class="stretched-link"></a>
          </div>
      </div>
    <!--Total Reviews & Ratings Card-->
      <div id="card_3" class="card text-white mb-1 offset-md-1" style="max-width: 32rem;">
        <div class="card-body">
          <h4 class="card-title"><?php echo $reviewrowcount; ?><img src="admin_logos/total reviews logo.png" alt="card1Logo" class="card_1_img"></h4>
            <br>
            <h5 class="card-text">Total Seven Seas Reviews & Ratings Received</h5>
            <a href="review_ratings.php" class="stretched-link"></a>
          </div>
      </div>

    </div>
    </div>
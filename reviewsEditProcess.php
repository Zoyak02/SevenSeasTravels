<?php
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

if(isset($_POST['updateBtn']))
{
    $orderID = $_POST['edit_orderID'];
    $userID = $_POST['edit_userID'];
    $username = $_POST['edit_username'];
    $guests = $_POST['edit_guests'];
    $tour_location = $_POST['edit_tour_location'];
    $product_name = $_POST['edit_product_name'];
    $review = $_POST['edit_review'];

    
    $update_query = "UPDATE purchases SET userID='$userID', username='$username', guests='$guests', tour_location='$tour_location', product_name='$product_name', review='$review' WHERE orderID='$orderID' ";

    if($result = $mysqli->query($update_query) === TRUE)
    {

        
        header('Location: review_ratings.php'); 
    }
    else
    {
        
        header('Location: review_ratings.php'); 
    }
}

?>
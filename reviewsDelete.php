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

if(isset($_POST['delete_btn']))
{
    $orderID = $_POST['delete_id'];

    $sql = "DELETE FROM purchases WHERE orderID='$orderID' ";
    $result = $mysqli->query($sql);

    if($result)
    {

        
        header('Location: review_ratings.php'); 
    }
    else
    {
        
        header('Location: review_ratings.php'); 
    }
}

?>
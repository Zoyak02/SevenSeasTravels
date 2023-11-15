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

if(isset($_POST['delete_btn']))
{
    $merchantID = $_POST['delete_id'];

    $sql = "DELETE FROM merchant WHERE merchantID='$merchantID' ";
    $result = $mysqli->query($sql);

    if($result)
    {

 
        header('Location: manage_merchants.php'); 
    }
    else
    {
     
        header('Location: manage_merchants.php'); 
    }
}

?>
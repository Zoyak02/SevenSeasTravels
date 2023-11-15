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

if(isset($_POST['updateBtn']))
{
    $policyID = $_POST['edit_policyID'];
    $policyDescription = $_POST['edit_policyDescription'];
    $aboutUsDescription = $_POST['edit_aboutUsDescription'];
    
    $update_query = "UPDATE policy SET policyDescription='$policyDescription', aboutUsDescription='$aboutUsDescription' WHERE policyID='$policyID' ";

    if($result = $mysqli->query($update_query) === TRUE)
    {

        header('Location: settings.php'); 
    }
    else
    {
        header('Location: settings.php'); 
    }
}

?>
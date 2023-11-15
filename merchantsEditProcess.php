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
    $merchantID = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $password = password_hash($_POST['edit_password'], PASSWORD_BCRYPT);
    $email = $_POST['edit_email'];
    $number = $_POST['edit_number'];
    $description = $_POST['edit_description'];
    $user_type = $_POST['user_type'];
    
    $update_account_sql = "UPDATE accounts SET password = '$password' WHERE username = '$username'";
    mysqli_query($mysqli, $update_account_sql);

    if (mysqli_query($mysqli, $update_account_sql)) {
            // Update the password in the user table
            $update_merchant_sql = "UPDATE merchant SET password = '$password' WHERE merchantID = '$merchantID'";
            mysqli_query($mysqli, $update_merchant_sql);
            header("location:manage_merchants.php");
    }
    else {header("location:manage_merchants.php"); }
}

?>
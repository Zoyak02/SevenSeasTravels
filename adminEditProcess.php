

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
    $adminID = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $password = password_hash($_POST['edit_password'], PASSWORD_BCRYPT);
    $user_type = $_POST['user_type'];
    
    $update_account_sql = "UPDATE accounts SET password = '$password' WHERE username = '$username'";
    mysqli_query($mysqli, $update_account_sql);

    if (mysqli_query($mysqli, $update_account_sql)) {
            // Update the password in the user table
            $update_admin_sql = "UPDATE admin SET password = '$password' WHERE adminID = '$adminID'";
            mysqli_query($mysqli, $update_admin_sql);
            header("location:adminPage.php");
    }
    else {header("location:adminPage.php"); }
}


?>
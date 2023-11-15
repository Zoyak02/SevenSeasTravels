<?php
$db = mysqli_connect('localhost', 'root', '', 'login');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $merchantID = $_POST['merchantID'];
    $action = $_POST['action'];

    if ($action === 'approve') {
        // Handle approve logic
        function generateDefaultPassword() {
            $length = 10;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $password;
        }

         $fetchUsernameQuery = "SELECT username FROM merchant WHERE merchantID = '$merchantID'";
         $usernameResult = mysqli_query($db, $fetchUsernameQuery);


        if ($usernameResult) {
            $row = mysqli_fetch_assoc($usernameResult);
            $username = $row['username'];

            $originalPassword = generateDefaultPassword();
                
            // Hash the password for storage in the database
            $password = password_hash($originalPassword, PASSWORD_DEFAULT);
                
            $accountsQuery = "UPDATE accounts SET password = '$password' WHERE username = '$username'";

                if (mysqli_query($db, $accountsQuery)) {
                    // Update the merchant table with the new password and change the status
                    $merchantQuery = "UPDATE merchant SET status = 'APPROVED', password = '$password' WHERE merchantID = '$merchantID'";
                    
                    if (mysqli_query($db, $merchantQuery)) {
                        echo "Password: $originalPassword ";
                    } else {
                        echo "Error updating merchant record: " . mysqli_error($db);
                    }
                } else {
                    echo "Error updating accounts record: " . mysqli_error($db);
                }
            }


     } elseif ($action === 'reject') {
                // Handle reject logic
         $query = "UPDATE merchant SET status = 'REJECTED', password = '' WHERE merchantID = '$merchantID'";
                if (mysqli_query($db, $query)) {          
                    echo "You have rejected this application.<br>";
                    echo "Record updated successfully.";
                } else {
                    echo "Error updating record: " . mysqli_error($db);
                }
    }
}
?>
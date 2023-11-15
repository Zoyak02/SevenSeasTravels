<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'login');


// variable declaration
$user_type   = "";
$username    = "";
$email       = "";
$country     = "";
$number      = 0 ;
$description = "";
$document    = "";
$logo        = "";
$first_login = 0;
$errors      = array(); 

//Privacy Policy in the footer 

$sqlPolicy = "SELECT policyDescription FROM policy WHERE policyID = 1";
$result =  mysqli_query($db, $sqlPolicy);

if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $policyDescription = $row['policyDescription'];
} else {
        $policyDescription = "Privacy policy not found.";
}



// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
        register();
}

// REGISTER USER
function register(){
        // call these variables with the global keyword to make them available in function
        global $db, $errors, $username, $email, $country, $number , $description , $logo,
        $user_type, $document;

   // receive all input values from the form. Call the e() function
    // defined below to escape form values
        $user_type   =  e($_POST['user_type']);
        $username    =  e($_POST['username']);
        $password_1  =  e($_POST['password_1']);
        $password_2  =  e($_POST['password_2']);
        $email       =  e($_POST['email']);
        

        if ($user_type === 'merchant') {
        $country     =  e($_POST['country']);
        $number      =  e($_POST['number']);
        $description =  e($_POST['description']);
        $logo        =  e($_POST['logo']);
        $document    =  e($_POST['document']);
        $first_login =  e(($_POST['first_login']));
        }
        
        $userID= generateUserID();
        $merchantID = generateMerchantID();
        $status = 'PENDING' ;
        $registrationSuccess = false; 
        

    //validation: ensure that the form is correctly filled
        if (empty($username)) { 
                array_push($errors, "Username is required"); 
        }
        if (empty($email)) { 
                array_push($errors, "Email is required"); 
        }

        if ($user_type === 'user') {
                if (empty($password_1)) { 
                        array_push($errors, "Password is required"); 
                }
                if ($password_1 != $password_2) {
                        array_push($errors, "The two passwords do not match");
                }
        }
        
        if ($user_type === 'merchant') {
                // Validate merchant-specific fields
                if (empty($country)) { 
                        array_push($errors, "Country is required"); 
                }
                if (empty($description)) { 
                        array_push($errors, "Description is required"); 
                }
                if (empty($number)) { 
                        array_push($errors, "Contact Number is required"); 
                }
            }

        
        // register user if there are no errors in the form
        if (count($errors) == 0) {
                $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT); // Encrypt the password before saving it in the database
                // Check if the username already exists in the 'accounts' table
                $UsernameQuery = "SELECT username FROM accounts WHERE username = '$username'";
                $result = mysqli_query($db, $UsernameQuery);

                if (mysqli_num_rows($result) > 0) {
                        // Username already exists
                        array_push($errors, 'Username is already taken. Please choose a different username.');
                } else {
                        if ($user_type === 'merchant') {

                                $register = "INSERT INTO accounts (username, user_type) VALUES ('$username', '$user_type')";

                            } else {
                                    
                                $register = "INSERT INTO accounts (username, password, user_type) VALUES ('$username', '$password', '$user_type')";
                            }
                    

                        if (mysqli_query($db, $register)) {
                        // Continue with the rest of the registration process
                                if ($user_type == 'merchant') {
                                        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK &&
                                        isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
                                        
                                        $uploadDir = 'uploads/';

                                        // Create the upload directory if it doesn't exist
                                        if (!file_exists($uploadDir)) {
                                                mkdir($uploadDir, 0777, true);
                                        }

                                        // Upload the logo file
                                        $logoUploadFile = $uploadDir . basename($_FILES['logo']['name']);
                                        if (move_uploaded_file($_FILES['logo']['tmp_name'], $logoUploadFile)) {
                                                $logoPath = mysqli_real_escape_string($db, $logoUploadFile);

                                                // Upload the document file
                                                $documentUploadFile = $uploadDir . basename($_FILES['document']['name']);
                                                if (move_uploaded_file($_FILES['document']['tmp_name'], $documentUploadFile)) {
                                                $documentPath = mysqli_real_escape_string($db, $documentUploadFile);

                                                // Both files uploaded successfully; now, you can save the file paths to the database
                                                $sql = "INSERT INTO merchant (merchantID,first_login, username, user_type, email, number, description, logo, document, status) 
                                                        VALUES ('$merchantID', $first_login, '$username', '$user_type', '$email', '$number', '$description', '$logoPath', '$documentPath', '$status')";
                                                                                        

                                                } else {
                                                        array_push($errors, 'Upload failed Please Try Again' . mysqli_error($db));

                                                }
                                        }  
                                   } 
                                
                                 
                                
                        
                                } else {
                                        $sql = "INSERT INTO user (userID, username, password, user_type, email) 
                                                VALUES ('$userID','$username', '$password', '$user_type', '$email')";
                                }
                                
                                if (mysqli_query($db, $sql)) {
                                        // Successful Registration
                                        $registrationSuccess = true;
                                        
                                } else {
                                        array_push($errors, 'Registration failed: ' . mysqli_error($db));
                                }

                                $_SESSION['registrationSuccess'] = $registrationSuccess;
                       }
                }
        
        }
}

function generateMerchantID() {
    $prefix = 'M'; // Prefix for merchant IDs
    $uniqueNumbers = str_pad(mt_rand(1, 999999999), 9, '0', STR_PAD_LEFT); // Generate 9 random numbers

    // Combine the prefix and random numbers to create the merchant ID
    $merchantID = $prefix . $uniqueNumbers;

    return $merchantID;
}

function generateUserID() {
        global $db;
        $prefix = 'U';

        //$sql the database to find the highest existing user ID
        $sql = "SELECT MAX(userid) AS max_id FROM user";
        $result = mysqli_query($db, $sql);

        $row = mysqli_fetch_assoc($result);
        $maxID = $row['max_id'];
        
        if (empty($maxID)) {
            return $prefix . '1';
        } else {
            // Extract the numeric part, increment, and format the new user ID
            $numericPart = (int)str_replace($prefix, '', $maxID);
            $newNumericPart = $numericPart + 1;
            return $prefix . $newNumericPart;
        }
    }


// escape string
function e($val) {
    global $db;
    
    // Check if $val is not null
    if ($val !== null) {
        // Trim the string and then escape it
        return mysqli_real_escape_string($db, trim($val));
    }
}

    

function display_error() {
        global $errors;

        if (count($errors) > 0){
                echo '<div class="error">';
                        foreach ($errors as $error){
                                echo $error .'<br>';
                        }
                echo '</div>';
        }
}    

function isLoggedIn()
{
        if (isset($_SESSION['user'])) {
                return true;
        }else{
                return false;
        }
}

if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header("location:index.php");
        exit();
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
        login();
}

// LOGIN USER
function login(){
        global $db, $username, $user_type, $merchantID, $logoPath ,$errors;
    
        // grab form values
        $username  = e($_POST['username']);
        $password  = e($_POST['password']);
       
       

        // make sure form is filled properly
        if (empty($username)) {
                array_push($errors, "Username is required");
        }
        if (empty($password)) {
                array_push($errors, "Password is required");
        }

    
        // attempt login if no errors on form
        if (count($errors) == 0) {
                
                $sql = "SELECT * FROM accounts WHERE username = '$username' LIMIT 1";
                $result = mysqli_query($db, $sql);
            
                if (mysqli_num_rows($result) === 1) {
                    $user = mysqli_fetch_assoc($result);
            
                    if (password_verify($password, $user['password'])) {
                        // Password is correct
                        $_SESSION['user'] = $user;

                        $user_type = $user['user_type'];
                        
                        if ($user_type === 'admin') {
                            // Admin login
                            $_SESSION['success'] = 'Welcome, Admin!';
                            header('location: home.php'); // Directing to admin Page 
                        } else if ($user_type === 'merchant') {
                            // Merchant login
                            $username = $user['username'];
                            // Fetch merchant-specific data from the merchant table
                            $merchantQuery = "SELECT merchantID, logo , first_login FROM merchant WHERE username = '$username'";
                            $merchantResult = mysqli_query($db, $merchantQuery);
                            $merchantData = mysqli_fetch_assoc($merchantResult);
                
                            if ($merchantData) {
                                // Set merchant-specific session data
                                $_SESSION['user']['merchantID'] = $merchantData['merchantID'];  // Set merchantID
                                $_SESSION['user']['logo'] = $merchantData['logo'];   
                                $_SESSION['user']['first_login'] = $merchantData['first_login'];             // Set logo path
                            }
                            header('location: index_merchant.php');
                        } else if ($user_type === 'tourism_officer') {
                                // Admin login
                                $_SESSION['success'] = 'Welcome, Admin!';
                                header('location: pendingApplication.php'); // Directing to admin Page 
                        } else {
                            // User login
                            $userQuery = "SELECT userID, email FROM user WHERE username = '$username'";
                            $userResult = mysqli_query($db, $userQuery);
                            $userData = mysqli_fetch_assoc($userResult);
                            if ($userData) {
                                // Set merchant-specific session data
                                $username = $user['username'];
                                $_SESSION['user']['userID'] = $userData['userID'];  // Set merchantID
                                $_SESSION['user']['email'] = $userData['email'];             // Set logo path
                            }
                            header('location: index.php');
                        }
                    } else {
                        array_push($errors, 'Incorrect password');
                    }
                } else {
                    array_push($errors, 'User not found');
                }
            }
        }
    
function isMerchant()
{
        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'merchant' ) {
                return true;
        }else{
                return false;
        }
}

function isAdmin()
{
        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
                return true;
        }else{
                return false;
        }
}

function isOfficer()
{
        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'tourism_officer' ) {
                return true;
        }else{
                return false;
        }
}

if (isset($_POST['create_btn'])) {
        $username    =  e($_POST['username']);
        $password_1  =  e($_POST['password_1']);
        $password_2  =  e($_POST['password_2']);


        if (empty($password_1)) { 
                array_push($errors, "Password is required"); 
        }
        if ($password_1 != $password_2) {
                array_push($errors, "The two passwords do not match");
        }


        $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT);

        $sql = "SELECT * FROM accounts WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($db, $sql);
            
        if (mysqli_num_rows($result) === 1) {
         
                // Update the password in the accounts table
                $update_account_sql = "UPDATE accounts SET password = '$password' WHERE username = '$username'";
                mysqli_query($db, $update_account_sql);

                $sql1 = "SELECT user_type FROM accounts WHERE username = '$username' LIMIT 1";
                $result1 = mysqli_query($db, $sql1);

                if (mysqli_num_rows($result1) === 1) {
                        $row = mysqli_fetch_assoc($result1);
                        $user_type = $row['user_type'];

                        // Update the password in the respective table
                        if ($user_type === 'merchant') {
                                $update_sql = "UPDATE merchant SET password = '$password' WHERE username = '$username'";
                        } else if ($user_type === 'admin') {
                                $update_sql = "UPDATE admin SET password = '$password' WHERE username = '$username'";
                        }
                        else{
                                $update_sql = "UPDATE user SET password = '$password' WHERE username = '$username'"; 
                        }


                        if (mysqli_query($db, $update_sql)) {
                                $success_message = "Password updated successfully! You can now go Login In.";
                                header('location: new_password.php?success=' . urlencode($success_message));
                                exit;
                        } else {
                                // Handle the case where the password update query fails
                                array_push($errors, "Failed to update the password.");
                        }

                 } else {
                    // The username does not exist
                    array_push($errors, "Username does not exist");
                 }
                                
        }
 }
        


 if (isset($_POST['newPass'])) {

        $username = $_SESSION['user']['username'] ;
        $password_1  =  e($_POST['password_1']);
        $password_2  =  e($_POST['password_2']);


        if (empty($password_1)) { 
                array_push($errors, "Password is required"); 
        }
        if ($password_1 != $password_2) {
                array_push($errors, "The two passwords do not match");
        }


        $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT);
        $sql = "SELECT * FROM accounts WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($db, $sql);
            
        if (mysqli_num_rows($result) === 1) {
         
                // Update the password in the accounts table
                $update_account_sql = "UPDATE accounts SET password = '$password' WHERE username = '$username'";
                mysqli_query($db, $update_account_sql);
        
                if (mysqli_query($db, $update_account_sql)) {
                        // Update the password in the user table
                        $update_merchant_sql = "UPDATE merchant SET password = '$password',first_login = 0 WHERE username = '$username'";
                        mysqli_query($db, $update_merchant_sql);

                        $_SESSION['user']['first_login'] = 0;
                
                        $success_message = "Password updated successfully!.";
                        header("location: index_merchant.php?success=set");
                        exit;
                    } else {
                        // Handle the case where the account update query fails
                        array_push($errors, "Failed to update the account.");
                    }
                } else {
                    // The username does not exist
                    array_push($errors, "Failed To Update Password. Try Again");
                }




 }






mysqli_close ($db);




<?php
$con_bookings = mysqli_connect("localhost", "root", "", "bookings");

  if(mysqli_connect_errno()){
    die("Cannot Connect to the database".mysqli_connect_error());
  }

if (isset($_POST['process_booking'])) { 
    $orderID = generateOrderID(); 
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNo = $_POST['phoneNo'];
    $guests = $_POST['guests'];
    $idNo = $_POST['idNo'];
    $userID = $_POST['userID']; 
    $tour_type = $_POST['tour_type'];
    $tour_location = $_POST['tour_location'];
    $product_name = $_POST['product_name']; 
    $product_price = $_POST['product_price']; 
    $total_amount = $_POST['total_amount']; 

    // Insert data into the database
    $query = "INSERT INTO purchases (orderID,userID, username, firstName, lastName, phoneNo, idNo, guests ,tour_type,tour_location,product_name, product_price, total_amount)    
              VALUES ('$orderID','$userID','$username', '$firstName', '$lastName', '$phoneNo', '$idNo', '$guests','$tour_type','$tour_location','$product_name', '$product_price', '$total_amount')";

    if (mysqli_query($con_bookings, $query)) {
        // Data inserted successfully
        $_SESSION['success'] = 'Booking successful. You can proceed to payment.';
        header("location:payment.php?order_id=$orderID");        
    } else {
        // Handle the error if the data insertion fails
        echo 'Error: ' . mysqli_error($con_bookings);
    }
}

function generateOrderID() {
  $prefix = 'OD'; // Prefix for merchant IDs
  $uniqueNumbers = str_pad(mt_rand(1, 999999999), 8, '0', STR_PAD_LEFT); // Generate 8 random numbers

  // Combine the prefix and random numbers to create the merchant ID
  $orderID = $prefix . $uniqueNumbers;

  return $orderID;
}

if (isset($_POST['submit_review'])) {
  $orderID = $_POST['orderID'];
  $review = $_POST['review'];
  $starRating = $_POST['rating'];

  // Update the purchases table with review and star rating
  $updateQuery = "UPDATE purchases SET review = '$review', star_rating = $starRating WHERE orderID = '$orderID'";
  if (mysqli_query($con_bookings, $updateQuery)) {
    // The update was successful, set a success message
    header('Location: review.php?success=1');
    exit; 
  } else {
    // Handle errors if the update fails
    $errorMessage = "Error updating the database.";
  }


}

?>


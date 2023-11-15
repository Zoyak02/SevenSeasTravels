<?php

$con_pay = mysqli_connect("localhost", "root", "", "bookings");

  if(mysqli_connect_errno()){
    die("Cannot Connect to the database".mysqli_connect_error());
  }

require __DIR__ . "/vendor/autoload.php";


$orderID = $_GET['order_id'];

$stripe_secret_key = "sk_test_51O6wFiBYrdnHSWK9cewi89SdAqZuU93FoJXNL0T0ePR0I880YTK7PsC83He87MQNbwe9s7Y1EdDxdfZg0PMr14oL00T9RebvZt";

\Stripe\Stripe::setApiKey($stripe_secret_key);

    // Retrieve the purchase data from the database
    $query = "SELECT * FROM `purchases` WHERE `orderID` = '$orderID'";
    $result = mysqli_query($con_pay, $query);

    if (mysqli_num_rows($result) > 0) {
        $purchase = mysqli_fetch_assoc($result);
        $tourType = $purchase['tour_type'];
        $tourLocation = $purchase['tour_location'];
        $guests = intval($purchase['guests']);
        $price = $purchase['product_price'];
        $totalAmount = intval($purchase['total_amount']);
        $orderId = $purchase['orderID'];
        $firstName = $purchase['firstName'];
        $lastName = $purchase['lastName'];
        $bookingReferenceNo = generateBookingReferenceNo();
        $paymentStatus = 'SUCCESS';
        $paymentMethod = 'CARD';

        // Insert the data into the database
        $query = "INSERT INTO transaction (orderID, tour_type, tour_location, guests, firstName, lastName, total_amount, bookingRefNo, paymentMethod, paymentStatus)    
              VALUES ('$orderId', '$tourType', '$tourLocation', '$guests', '$firstName', '$lastName', '$totalAmount', '$bookingReferenceNo', '$paymentMethod', '$paymentStatus')";

        if (mysqli_query($con_pay, $query)) {
            header("location: success.php?order_id=$orderID");
            exit;
        } else {
            // Handle the error if the data insertion fails
            echo 'Error: ' . mysqli_error($con_pay);
        }
    }

function generateBookingReferenceNo() {
    $uniqueNumbers = str_pad(mt_rand(1, 999999999), 5, '0', STR_PAD_LEFT); // Generate 5 random numbers
  
    // Combine the prefix and random numbers to create the merchant ID
    $bookingReferenceNo = $uniqueNumbers;
  
    return $bookingReferenceNo;
}

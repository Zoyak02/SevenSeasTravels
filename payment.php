<?php

require_once("purchase_process.php");

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51O6wFiBYrdnHSWK9cewi89SdAqZuU93FoJXNL0T0ePR0I880YTK7PsC83He87MQNbwe9s7Y1EdDxdfZg0PMr14oL00T9RebvZt";

\Stripe\Stripe::setAPIKey($stripe_secret_key);

$orderID = $_GET['order_id'];

$query = "SELECT * FROM `purchases` WHERE `orderID` = '$orderID'";

// Execute the query to fetch the purchases details
$result = mysqli_query($con_bookings, $query);

// Check if there is a purchases to display
if (mysqli_num_rows($result) > 0) {
    $purchase = mysqli_fetch_assoc($result);
} 

$unitAmount = intval($purchase['product_price'] * 100);

// Calculate the tax amount
$taxRate = 0.06; // 6% tax rate
$taxAmount = $unitAmount * $taxRate;

// Add the tax amount to the unitAmount
$unitAmountWithTax = $unitAmount + $taxAmount;


$checkout_session = \Stripe\Checkout\Session::create([

    "mode" => "payment",
    "success_url" => "https://localhost/BIT210/transaction_process.php?order_id=$orderID",
    "line_items" => [

        [
            "quantity" => $purchase['guests'],
            "price_data" => [
                "currency" => "myr",
                "unit_amount" => $unitAmountWithTax,
                "product_data" =>[
                    "name" => $purchase['tour_location'],
                    "description" => $purchase['product_name']
                ]
            ]
        ]

    ]

 ]);

 http_response_code(303);
 header("location: " . $checkout_session->url);



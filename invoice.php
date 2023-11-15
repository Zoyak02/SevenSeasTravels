<?php

$con_pay = mysqli_connect("localhost", "root", "", "bookings");

  if(mysqli_connect_errno()){
    die("Cannot Connect to the database".mysqli_connect_error());
  }

$orderID = $_GET['order_id'];

$query = "SELECT p.product_name, p.product_price, t.*
          FROM purchases AS p
          JOIN transaction AS t ON p.orderID = t.orderID
          WHERE t.orderID = '$orderID'";

// Execute the query to fetch the purchases details
$result = mysqli_query($con_pay, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($con_pay));
}

// Check if there is a purchases to display
if (mysqli_num_rows($result) > 0) {
    $purchase = mysqli_fetch_assoc($result);


$currentDate = date('l, F j, Y'); // Outputs the date in 'YYYY-MM-DD' format
$totalPrice = $purchase['product_price'] * $purchase['guests'];

$taxRate = 0.06; // 6% tax rate

// Calculate tax and total
$tax = $totalPrice * $taxRate;

$total_amount = $totalPrice + $tax;
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Booking Invoice</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/invoices.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
<body>

<div class="container">
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-15">Booking #<?php echo $purchase['bookingRefNo']; ?><span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                        <div class="d-flex align-items-center mb-4">
                            <div class="logo-container">
                                <img src="img/favicon.png" alt="Logo" class="logo-img">
                            </div>
                            <h2 class="mb-0 text-muted">Seven Seas Travels</h2>

                        </div>
                        <div class="text-muted">
                            <p class="mb-1">3184 Spruce Drive Malaysia, PA 15201</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> xyz@987.com</p>
                            <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                <h5 class="font-size-15 mb-2"><?php echo ucfirst($purchase['firstName']); ?> <?php echo ucfirst ($purchase['lastName']); ?></h5>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                    <p><?php echo $currentDate; ?></p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Order No:</h5>
                                    <p><?php echo $purchase['orderID']; ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    
                    <div class="py-2">
                        <h5 class="font-size-15">Order Summary</h5>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 80px;">No.</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th style="width: 25px;">Quantity</th>
                                        <th class="text-end" style="width: 170px;">Total</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    <tr>
                                        <th scope="row">01</th>
                                        <td>
                                            <div>
                                                <h6 class="font-size-10 mb-1"><?php echo $purchase['product_name']; ?></h6>
                                                <p class="text-muted mb-0"><?php echo $purchase['tour_location']; ?></p>
                                            </div>
                                        </td>
                                        <td> RM <?php echo number_format($purchase['product_price'],2); ?></td>
                                        <td><?php echo $purchase['guests']; ?></td>
                                        <td class="text-end">RM <?php echo number_format($totalPrice,2); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                        <td class="text-end">RM <?php echo number_format($totalPrice,2); ?></td>
                                    </tr>
                       
                                    <tr>
                                        <th scope="row" colspan="4" class="text-end">
                                            Tax 6%</th>
                                        <td class="text-end">RM <?php echo number_format($tax,2);  ?></td>
                                    </tr>
                            
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                        <td class="border-0 text-end"><h5 class="m-0" >RM <?php echo number_format($purchase['total_amount'] ,2); ?></h5></td>
                                    </tr>
                               
                                </tbody>
                            </table>

                        </div>
                        <br>
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="generatePDF.php?order_id=<?php echo $orderID; ?>"  class="btn btn-success me-1"><i class="fa fa-download"></i></a>
                                <a href="index.php" class="btn btn-primary w-md">Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
</div>

</body>
</html>
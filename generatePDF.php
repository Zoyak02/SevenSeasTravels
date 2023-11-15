<?php

require __DIR__ . "/vendor/autoload.php";

$con_pay = mysqli_connect("localhost", "root", "", "bookings");

if(mysqli_connect_errno()) {
    die("Cannot Connect to the database" . mysqli_connect_error());
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

// Check if there is a purchase to display
if (mysqli_num_rows($result) > 0) {
    $purchase = mysqli_fetch_assoc($result);

    $currentDate = date('l, F j, Y'); // Outputs the date in 'YYYY-MM-DD' format
    $totalPrice = $purchase['product_price'] * $purchase['guests'];

    $taxRate = 0.06; // 6% tax rate

    // Calculate tax and total
    $tax = $totalPrice * $taxRate;


    $directoryPath = __DIR__ . '/tmp'; // Specify the path to your directory

    // Check if the directory exists, and if not, create it
    if (!is_dir($directoryPath)) {
        if (!mkdir($directoryPath, 0755, true)) {
            die('Failed to create the directory for PDF files.');
        }
    }


    // Initialize the $html variable
    $html = '<html>
    <head>
    <style>
      body {
        font-family: Arial, sans-serif;
      }

      .space-between-border {
        padding: 10px; /* Adjust the value as needed */
       }

      .badge{
        color:green;
      }

      .container {
        max-width: 800px;
        margin: 0 auto;
      }

      .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 20px;
      }

      .invoice-title {
        padding: 20px;
        background-color: #f5f5f5;
        border-bottom: 1px solid #ddd;
      }

      .invoice-title h4 {
        margin: 0;
        font-size: 18px;
        color: #333;
      }

      .invoice-title .badge {
        font-size: 12px;
      }

      .text-muted {
        color: #777;
      }

      .mb-4 {
        margin-bottom: 20px;
      }

      .mb-2{
        margin-bottom: 0px;
      }

      .text-muted p {
        margin: 5px 0;
      }

      .invoice-date {
        font-size: 15px;
      }

      .order-no {
        font-size: 15px;
      }

      .py-2 h5 {
        font-size: 18px;
        margin-bottom: 10px;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      th,
      td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }

      th {
        background-color: #f5f5f5;
      }

      .total-row {
        font-weight: bold;
      }

      .text-end {
        text-align: right;
      }
    </style>
  </head>
    <body>

    <div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            <h4 class="float-end font-size-15">Booking #' . $purchase['bookingRefNo'] . ' <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                            <div class="d-flex align-items-center mb-4">
                               <h2 class="mb-0 text-muted">Seven Seas Travels</h2>
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">3184 Spruce Drive Malaysia, PA 15201</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> xyz@987.com</p>
                                <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row space-between-border">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-20 mb-2">Billed To:</h5>
                                    <p class="font-size-15 mb-3">' . ucfirst($purchase['firstName']) . ' ' . ucfirst($purchase['lastName']) . '<p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <h5 class="font-size-20 mb-2">Invoice Date:</h5>
                                        <p class="mb-3">' . $currentDate . '</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-20 mb-2">Order No:</h5>
                                        <p class="mb-3">' . $purchase['orderID'] . '</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                        <div class="py-2 space-between-border">
                            <h5 class="font-size-15">Order Summary</h5>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 60px;">No.</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th class="text-end" style="width: 120px;">Total</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>
                                                <div>
                                                    <h4 class="font-size-10 mb-1">' . $purchase['product_name'] . '</h4>
                                                    <p class="text-muted mb-0">' . $purchase['tour_location'] . '</p>
                                                </div>
                                            </td>
                                            <td> RM ' . number_format($purchase['product_price'], 2) . '</td>
                                            <td>' . $purchase['guests'] . '</td>
                                            <td class="text-end">RM ' . number_format($totalPrice, 2) . '</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                            <td class="text-end">RM ' . number_format($totalPrice, 2) .  '</td>
                                        </tr>
                           
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">
                                                Tax 6%</th>
                                            <td class="border-0 text-end">RM ' . number_format($tax, 2) .  '</td>
                                        </tr>
                                
                                        <tr>
                                            <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                            <td class="border-0 text-end"><h5 class="m-0">RM ' . number_format($purchase['total_amount'], 2) . '</h5></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </body>
    </html>';
    


    $dompdf = new  \Dompdf\Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper("A4", "potrait");

    $dompdf->render();

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="invoice.pdf"');
    $dompdf->stream("invoice.pdf");
    
    

  
}
   

   


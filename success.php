<?php

$orderID = $_GET['order_id'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Montserrat' rel='stylesheet' type='text/css'>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="css/payment.css">
    </head>
    <body>
    <div class="success-container">
	<div class="row">
		<div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
        <div class="icon">
            <span class="fas fa-check" style="margin: 0 20px; display: block;"></span>
        </div>
			<h1> Payment Success!</h1>
			<p>We've sent a booking confirmation to your e-mail for verification. 
                <br>You may proceed to see your official Receipt.</p>
            
           <a href="invoice.php?order_id=<?php echo $orderID; ?>" id="contBtn">Continue</a>

          
		</div>
</div>
</div>
	</div>
</div>
    </body>
</html>
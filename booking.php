<?php  
require("purchase_process.php");
include("crud.php");


$productId = $_GET['product_id'];

// Construct the SQL query to select a specific product based on the product ID
$query = "SELECT * FROM `products` WHERE `id` = $productId";

// Execute the query to fetch the product details
$result = mysqli_query($con, $query);

// Check if there is a product to display
if (mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking</title>
         <link rel="shortcut icon" href="img/favicon.png" type="image/png">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        
        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="css/booking_process.css">
        <link rel="stylesheet" href="css/styles.css">
</head>
<body style="height:1400px">
<main class="main">
            <section class="home" id="home">
                <div class = hero-banner >
                    <img src="img/hero_banner1@2x.png" >
                </div>
            
                <div class="hero__container container grid"></div>
           </section>
</main>

<div class="content">
  <!--content inner-->
  <div class="content__inner">
    <div class="container overflow-hidden">
      <!--multisteps-form-->
      <div class="multisteps-form">
        <!--progress bar-->
        <div class="row">
          <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">User Info</button>
              <button class="multisteps-form__progress-btn" type="button" title="Address">Pickup Address</button>
              <button class="multisteps-form__progress-btn" type="button" title="Order Info">Booking Info</button>
            </div>
          </div>
        </div>
        <!--form panels-->
        <div class="row">
          <div class="col-12 col-lg-8 m-auto">
          <form class="multisteps-form__form" method="post" action="booking.php" enctype="multipart/form-data">
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Your User Info</h3>
                <div class="multisteps-form__content">
                <div class="form-row mt-4">
                  
                <input class="multisteps-form__input form-control" type="hidden" name="userID" value="<?php echo $_SESSION['user']['userID']; ?>"/>

                    <div class="col-12 col-sm-6">
                      <input class="multisteps-form__input form-control" type="text" name="username" value="<?php echo $_SESSION['user']['username']; ?>" readonly/>
                    </div>
                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                      <input class="multisteps-form__input form-control" type="email"name="email" value="<?php echo $_SESSION['user']['email']; ?>" readonly/>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-6">
                      <input class="multisteps-form__input form-control" type="text" name="firstName" placeholder="First Name" required/>
                      <div class="invalid-feedback" id="error-firstName">Please provide your First name.</div>
                    </div>
                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                      <input class="multisteps-form__input form-control" type="text" name="lastName"  placeholder="Last Name" required />
                      <div class="invalid-feedback" id="error-lastName" >Please provide your Last name.</div>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-6">
                      <input class="multisteps-form__input form-control" type="text" name="phoneNo"  placeholder="Contact Number" required />
                      <div class="invalid-feedback" id="error-phoneNo" >Please provide your Contact Number.</div>
                    </div>
                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                      <input class="multisteps-form__input form-control" type="text" name="idNo" placeholder="MYKAD/Passport Number" required />
                      <div class="invalid-feedback" id="error-idNo" >Please provide your Identification Number.</div>
                    </div>
                    <div class="col-12 col-sm-6">
                    <label for="exampleFormControlSelect1"></label>
                    <select class="form-control" id="guests" name="guests">
                    <option>Number of People Joining</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                    <div class="invalid-feedback" id="error-guests" >Please provide the number of guests joining you .</div>
                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                    <input type="hidden" name="tour_type" value="<?php echo $product['tour_type']; ?>">
                    <input type="hidden" name="tour_location" value="<?php echo $product['location']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                    <input type="hidden" name="total_amount" value="" id="total-amount">
                  </div>
                  </div>
                  <div class="button-row d-flex mt-4">
                  <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button> 
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Pickup Address for your Tour</h3>
                <div class="multisteps-form__content" >
                  <div class="form-row mt-4">
                    <div class="col">
                      <input class="multisteps-form__input form-control" type="text" placeholder="Address 1"/>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col">
                      <input class="multisteps-form__input form-control" type="text" placeholder="Address 2"/>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-6">
                      <input class="multisteps-form__input form-control" type="text" placeholder="City"/>
                    </div>
                    <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                      <select class="multisteps-form__select form-control">
                        <option selected="selected">State</option>
                        <option>Johor</option>
                        <option>Kedah</option>
                        <option>Kelantan</option>
                        <option>Malacca</option>
                        <option>Negeri Sembilan</option>
                        <option>Pahang</option>
                        <option>Perak</option>
                        <option>Perlis</option>
                        <option>Penang</option>
                        <option>Sabah</option>
                        <option>Sarawak</option>
                        <option>Selangor</option>
                        <option>Terengganu</option>
                        <option>Kuala Lumpur</option>
                        <option>Labuan</option>
                        <option>Putrajaya</option>
                      </select>
                    </div>
                    <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                      <input class="multisteps-form__input form-control" type="text" placeholder="Post Code"/>
                    </div>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Your Booking Info</h3>
                <div class="multisteps-form__content">
                  <div class="row">
                  <div class="col-12 d-flex justify-content-center">
                      <div class="card shadow-sm" style=background:#ededed;>
                       <div class="card-body" style=width:500px;>
               
                             <center>
          
                                  <h4 class="card-title"><?php echo $product['tour_type']; ?></h4> 
                                  <h7 class="card-title"><?php echo $product['location']; ?></h7>  <br>
                                  <img src="<?php echo FETCH_SRC . $product['image'];?>" style=width:350px;height:350px; alt="Product Image"> <br>
                                  <h7 class="card-title"><?php echo $product['name']; ?></h7>
                                  <center>
                                  <div>
                                    <br>
                                          <h4>Booking Bill</h4>

                                          <table>
                                              <tbody>
                                                <tr>
                                                  <td>Price</td>
                                                  <td align="right">RM <?php echo $product['price']; ?></td>
                                                </tr>
                                                <tr>
                                                  <td>Tax (6%)</td>
                                                  <td align="right" id="tax-amount">RM 0</td>
                                                </tr>
                                                <tr>
                                                  <td>No. of People</td>
                                                  <td align="right" id="selected-guests">0</td>
                                                </tr>
                                              </tbody>
                                              <tfoot>
                                                <tr>
                                                  <td>Total</td>
                                                  <td align="right" id="total-price">RM 0</td>
                                                </tr>
                                              </tfoot>
                                            </table>
                                     </div>

                                          <script>
                                            const guestsSelect = document.getElementById("guests");
                                            const selectedGuests = document.getElementById("selected-guests");
                                            const totalPriceDisplay = document.getElementById("total-price");
                                            const taxAmount = document.getElementById("tax-amount");
                                            const totalAmountInput = document.getElementById("total-amount");

                                            guestsSelect.addEventListener("change", function () {
                                              const guests = parseInt(guestsSelect.value);
                                              const pricePerPerson = <?php echo $product['price']; ?>; // Get the price per person from PHP
                                              const taxRate = 0.06; // 6% tax rate

                                              // Calculate tax and total
                                              const tax = guests * pricePerPerson * taxRate;
                                              const total = (guests * pricePerPerson) + tax;

                                                // Set the calculated total amount in the hidden input field
                                              totalAmountInput.value = total.toFixed(2);

                                              
                                              // Display the calculated values
                                              selectedGuests.textContent = guests;
                                              totalPriceDisplay.textContent = "RM " + total.toFixed(2);
                                              taxAmount.textContent = "RM " + tax.toFixed(2);
                                            });
                                          </script>
                                
                           <?php

                            } else {
                                // Handle the case where the product with the specified ID was not found.
                                echo "Product not found.";
                            }
                           ?>
                      </div>
                     </div>
                    </div>
                   </div>
                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>

                      <input class="btn btn-success ml-auto" type="submit" name="process_booking"  value="Procced to Payment"></input> 
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

document.querySelector('.js-btn-next').addEventListener('click', () => {
  const isValid = validateCurrentPanel();

  if (!isValid) {
    alert('Please go back and review all fields .');
  
      
  } else {
    const nextButton = document.querySelector('.js-btn-next');
    nextButton.click();
  }
});

document.addEventListener('click', (event) => {
  // Check if the clicked element has the specific text "Close"
        if (event.target.innerText.toLowerCase() === 'close') {
          event.preventDefault(); // Prevent the default behavior of the close button
        }

});


function validateCurrentPanel() {
  const activePanel = getActivePanel();
  const firstName = activePanel.querySelector('input[name="firstName"]').value;
  const lastName = activePanel.querySelector('input[name="lastName"]').value;
  const phoneNo = activePanel.querySelector('input[name="phoneNo"]').value;
  const idNo = activePanel.querySelector('input[name="idNo"]').value;
  const guests = activePanel.querySelector('select[name="guests"]').value;

  // Resetting previous error messages
  document.getElementById('error-firstName').style.display = 'none';
  document.getElementById('error-lastName').style.display = 'none';
  document.getElementById('error-phoneNo').style.display = 'none';
  document.getElementById('error-idNo').style.display = 'none';
  document.getElementById('error-guests').style.display = 'none';

  let isValid = true;

  // Check each field
  if (firstName.trim() === '') {
    document.getElementById('error-firstName').style.display = 'block';
    isValid = false;
  }

  if (lastName.trim() === '') {
    document.getElementById('error-lastName').style.display = 'block';
    isValid = false;
  }

  if (phoneNo.trim() === '') {
    document.getElementById('error-phoneNo').style.display = 'block';
    isValid = false;
  }

  if (idNo.trim() === '') {
    document.getElementById('error-idNo').style.display = 'block';
    isValid = false;
  }

  if (guests === '') {
    document.getElementById('error-guests').style.display = 'block';
    isValid = false;
  }

  return isValid;
}

</script>
<script src="js/booking.js"> </script>
<script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"></script>
</body>
</html>
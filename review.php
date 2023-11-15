<?php 
require_once("purchase_process.php");
include("function222.php");

$con_bookings = mysqli_connect("localhost", "root", "", "bookings");

  if(mysqli_connect_errno()){
    die("Cannot Connect to the database".mysqli_connect_error());
  }

  if (!isLoggedIn()) {
    // Display an alert if the user is not a merchant
    echo "<script>alert('Access denied. You need to log in to access this page.');
    window.location.href = 'index.php'; // Redirect to index.php
    </script>";
    exit(); // Stop executing the current script
}


$user_order = $_SESSION['user']['username'];

?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Seven Seas Travel</title>
        <link rel="shortcut icon" href="img/favicon.png" type="image/png">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/tour.css">
        <link rel="stylesheet" href="css/review.css">
 
    </head>
    <body>

    
    <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo" >
                    <img src="img/Travel Website.png" >
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.php" class="nav__link ">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="index.php#about" class="nav__link">About</a>
                        </li>
                        <li class="nav__item">
                            <a href="tours.php" class="nav__link">Discover</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ) {
                            // User is logged in, show a "Logged In" button 
                            echo '<li class="nav__item">
                                    <a href="review.php" class="nav__link active-link">Review</a>
                                  </li>';
                                  
                            echo '<li class="login__item">
                                    <a href="asia_tours.php?logout=1" class="cd-signin">Logout</a>
                                  </li>';
                        } else {
                            echo '<li class="login__item">
                                    <a class="cd-signin" href="#0">Login </a>
                                  </li>';
                        }
                        ?>
                    </ul>
                  
                    <div class="nav__dark">
                        <!-- Theme change button -->
                        <span class="change-theme-name">Dark mode</span>
                        <i class="ri-moon-line change-theme" id="theme-button"></i>
                    </div>

                    <i class="ri-close-line nav__close" id="nav-close"></i>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-function-line"></i>
            </div>


          
                   
                <!---------------------- LOGIN ---------------------------->
                    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
                        <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
                            <ul class="cd-switcher">
                                <li><a href="#0">Sign in</a></li>
                                <li><a href="#0">New account</a></li>
                            </ul>
                
                            <div id="cd-login"> <!-- log in form -->
                                <form class="cd-form" method="post" action="index.php">
                                <?php echo display_error(); ?>
                      

                                    <p class="fieldset">
                                        <label class="image-replace cd-username" for="signin-username">Username</label>
                                        <input class="full-width has-padding has-border" id="signin-username" name="username" type="text" placeholder="Username">
                       
                                    </p>
                
                                    <p class="fieldset">
                                        <label class="image-replace cd-password" for="signin-password">Password</label>
                                        <input class="full-width has-padding has-border" id="signin-password" name= "password" type="text"  placeholder="Password">
                                        <a href="#0" class="hide-password">Hide</a>
                                  
                                    </p>
                
                                    <p class="fieldset">
                                        <input type="checkbox" id="remember-me" checked>
                                        <label for="remember-me">Remember me</label>
                                    </p>
                
                                    <p class="fieldset">
                                        <input class="full-width" type="submit" name="login_btn" value="Login">
                                    </p>
                                    <span class="separator">OR</span>
                                        <ul class="social-links">
                                            <li><a href=""><i class="fab fa-google"></i> Login with Google</a></li>
                                            <li><a href=""><i class="fab fa-facebook-f"></i> Login with Facebook</a></li>
                                        </ul>
                                </form>
                                
                                <p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
                                <!-- <a href="#0" class="cd-close-form">Close</a> -->
                            </div> <!-- cd-login -->
                
                            <div id="cd-signup"> <!-- sign up form -->
                                <form class="cd-form" method="post" action="index.php">
                                    <?php echo display_error(); ?>
                                    
                                    <input type="hidden" name="user_type" value="user">

                                    <p class="fieldset">
                                        <label class="image-replace cd-username" for="signup-username">Username</label>
                                        <input class="full-width has-padding has-border" id="signup-username" name="username" value="<?php echo $username;?>" type="text" placeholder="Username"  >
                                    
                                    </p>
                
                                    <p class="fieldset">
                                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                                        <input class="full-width has-padding has-border" id="signup-email" name="email" value="<?php echo $email; ?>" type="email" placeholder="E-mail"  >
                                    </p>
                
                                    <p class="fieldset">
                                        <label class="image-replace cd-password" for="signup-password">Password</label>
                                        <input class="full-width has-padding has-border" id="signup-password" name="password_1" type="text"  placeholder="Password">
                                        <a href="#0" class="hide-password">Hide</a>
                                    </p>
                
                                    <p class="fieldset">
                                        <label class="image-replace cd-password" for="signup-password">Confirm Password</label>
                                        <input class="full-width has-padding has-border" id="signup-password" name="password_2" type="text"  placeholder="Confirm Password">
                                        <a href="#0" class="hide-password">Hide</a>
                                    </p>

                                  

                                    <p class="fieldset">
                                        <input type="checkbox" id="accept-terms">
                                        <label for="accept-terms">I agree to the 
                                        <a href="#0">Terms & Conditions</a>
                                        </label>
                                    </p>
                
                                    <p class="fieldset">
                                        <input class="full-width has-padding" type="submit" name="register_btn" value="Create account">
                                    </p>

                                    <span class="separator">OR</span>
                                        <ul class="social-links">
                                            <li><a href="merchant_account.php"> Register as Merchant</a></li>
                                            <li><a href="#"> Register as Tourism Officer</a></li>
                                        </ul>
                                </form>
                
                                <!-- <a href="#0" class="cd-close-form">Close</a> -->
                            </div> <!-- cd-signup -->
                
                            <div id="cd-reset-password"> <!-- reset password form -->
                                <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
                
                                <form class="cd-form">
                                    <p class="fieldset">
                                        <label class="image-replace cd-email" for="reset-email">E-mail</label>
                                        <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                                    </p>
                
                                    <p class="fieldset">
                                        <input class="full-width has-padding" type="submit" value="Reset password">
                                    </p>
                                </form>
                
                                <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
                            </div> <!-- cd-reset-password -->
                            <a href="#0" class="cd-close-form">Close</a>
                        </div> <!-- cd-user-modal-container -->
                    </div> <!-- cd-user-modal -->
                

            </nav>        
        </header>
<!--==================== HOME ====================-->
            <main class="main">
            <section class="home" id="home">
                <div class = hero-banner >
                    <img src="img/hero-banner@2x.png" >
                </div>
            
           <div class="hero__container container grid"></div>
           </section>

           <div class="container">
            <h1 class="section__title" style="font-size: 30px;">Review Your Trip</h1>
            <a href="filterRatings.php" style="margin-left:80%;">
                <button class="button">See all Reviews</button>
            </a>
          
           <section class="package" id="package">
            <div class="container">
    
              <ul class="package-list" >

                   <?php
                    // Check if the 'success' query parameter is set
                    if (isset($_GET['success']) && $_GET['success'] == 1) {
                        echo '<div id="successMessage" class="alert alert-success">Review submitted successfully!</div>';
                    }
                    ?>


              <?php
                            $query = "SELECT * FROM `purchases` WHERE `username` = '$user_order' AND `review` IS NULL ";
                            // Execute the query and fetch the product details
                            $result = mysqli_query($con_bookings, $query);

                            // Check if there are products to display
                            if (mysqli_num_rows($result) > 0) {
                                while ($purchases = mysqli_fetch_assoc($result)) {
                                    // Now you have the product details in the $product variable.
                                    // You can proceed to display them in the HTML structure.
                            ?>
    
    <li>
    <center>
    <div class="package-card" style="border: 1px solid #ddd; padding: 10px;margin: 10px;width:750px">
      
        <div class="card-content" style="text-align: left;" >

            <br>
            <h3 class="h3 card-title" style="color: #333; font-size: 1.5rem;width:440px">
                <?php echo $purchases['tour_location']; ?>
            </h3>

            <p class="card-text" style="color: #888;">
                <?php echo $purchases['product_name']; ?>
            </p>

            <ul class="card-meta-list">

                <li class="card-meta-item">
                    <div class="meta-box">
                        <ion-icon name="pricetag" style="color: #FFA500;"></ion-icon>

                        <p class="text" style="color: #333; font-weight: bold;">
                           RM  <?php echo $purchases['product_price']; ?>
                        </p>
                    </div>
                </li>

            </ul>
 
        </div>
       
     
        <div class="card-price" style="text-align: center; margin-top: 10px;margin-bottom: 10px; width:180px; border-radius:5px;">
            <a class="btn btn-secondary" name="book_tour" data-toggle="modal" data-target="#reviewModal_<?php echo $purchases['orderID']; ?>">Review</a>
        </div>
        

    </div>
   </center>

</li>
<div class="modal fade" id="reviewModal_<?php echo $purchases['orderID']; ?>" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your form contents go here -->
                <div class="wrapper">
                    <h3>How Was Your Trip ?</h3>
                    <form id="reviewForm" action="purchase_process.php" method="post">
                    <input type="hidden" name="orderID" value="<?php echo $purchases['orderID']; ?>">
                        <div class="rating">
                            <input type="number" name="rating" hidden>
                            <i class='bx bx-star star' style="--i: 0;"></i>
                            <i class='bx bx-star star' style="--i: 1;"></i>
                            <i class='bx bx-star star' style="--i: 2;"></i>
                            <i class='bx bx-star star' style="--i: 3;"></i>
                            <i class='bx bx-star star' style="--i: 4;"></i>
                        </div>
                        <textarea name="review" cols="30" rows="5" placeholder="Your opinion..."></textarea>
                        <div class="btn-group">
                            <input type="submit" class="btn submit" name="submit_review" ></input>

                            <script>
                            // Automatically dismiss the success message after a few seconds
                            var successMessage = document.getElementById('successMessage');
                            if (successMessage) {
                                setTimeout(function() {
                                successMessage.style.display = 'none';
                                }, 3000); // 5000 milliseconds (5 seconds)
                            }
                            </script>

                            <input class="btn cancel" data-dismiss="modal" value="Cancel"></input>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  


                        <?php
                        } // End of the while loop
                    } else {
                        echo "No Tours available.";
                    }
                    ?>
                           
                </ul>


             <a href="tours.php">
             <button class="button" style="margin-left: 44%;">Go Back</button>
            </a>
            </div>
        </section>
    </main>


     <?php include('footer.php');?>
  
         <!--========== SCROLL UP ==========-->
         <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>
        <!--=============== SCROLL REVEAL===============-->
        <script src="js/scrollreveal.min.js"></script>
        
        <!--=============== SWIPER JS ===============-->
        <script src="js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="js/star.js"></script>
        <script src="js/main.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!--=============== ICONS ===============-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>
</html>
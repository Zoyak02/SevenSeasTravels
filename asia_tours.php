<?php 
require('crud.php');

$tour_type = "Asia";

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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/tour.css">
        <link rel="stylesheet" href="css/policy.css">
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
                            <a href="#" class="nav__link active-link">Discover</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ) {
                            // User is logged in, show a "Logged In" button 
                            echo '<li class="nav__item">
                                    <a href="review.php" class="nav__link">Review</a>
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
            <div class="row">
                <div class="col-7">
                    <div class="p-2"> <img src="https://images.unsplash.com/photo-1493780474015-ba834fd0ce2f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8YXNpYXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=900&q=60"></div>
                </div>
                <div class="col-5">
                    <div class="p-2 "><h2 class="section__title"> Asia </h2> 
                        <p class="about__description">From the bustling streets of Tokyo to the serene temples of Bali, our tour website is your passport to an array of Asian destinations that will leave you spellbound. Dive into the vibrant colors of India's festivals, hike the pristine mountains of Nepal, or unwind on the pristine beaches of Thailand - Asia has it all.
                            Asia is a treasure trove of cultural wonders waiting to be explored. Join us as we take you on a journey to appreciate the beauty of Asian culture in all its glory.
                        </p></div>
                </div>
            </div>
           </div>

           <h2 class="section__title" style="font-size: 30px;"> Packages </h2> 

           <section class="package" id="package">
            <div class="container">
    
              <ul class="package-list">

              <?php
                            $query = "SELECT * FROM `products` WHERE `tour_type` = 'asia'";
                            // Execute the query and fetch the product details
                            $result = mysqli_query($con, $query);

                            // Check if there are products to display
                            if (mysqli_num_rows($result) > 0) {
                                while ($product = mysqli_fetch_assoc($result)) {
                                    // Now you have the product details in the $product variable.
                                    // You can proceed to display them in the HTML structure.
                            ?>
    
                      <li>
                        <div class="package-card">
    
                                <figure class="card-banner">
                                <img src= "<?php echo FETCH_SRC . $product['image']; ?>" alt="Experience The Great Holiday On Beach" loading="lazy">
                                </figure>
                
                                <div class="card-content">

                                <img class="card__thumb" src= "<?php echo $product['merchant_logo']; ?>" alt="" />
                                <div class="card__header-text">
                                <p class="card_title"> <?php echo $product['username']; ?> </p>
                                </div>
                                
                                <br>
                                <h3 class="h3 card-title"> <?php echo $product['name']; ?></h3>
                
                                <p class="card-text">
                                    <?php echo $product['description']; ?>
                                </p>
                
                                <ul class="card-meta-list">
                
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="time"></ion-icon>
                
                                        <p class="text">7D/6N</p>
                                    </div>
                                    </li>
                
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="people"></ion-icon>
                
                                        <p class="text">pax: 10</p>
                                    </div>
                                    </li>
                
                                    <li class="card-meta-item">
                                    <div class="meta-box">
                                        <ion-icon name="location"></ion-icon>
                
                                        <p class="text"> <?php echo $product['location']; ?> </p>
                                    </div>
                                    </li>
                
                                </ul>
                
                                </div>
                
                                <div class="card-price">
                
                                <div class="wrapper">
                
                                    <p class="reviews">(25 reviews)</p>
                
                                    <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    </div>
                
                                </div>
                
                                <p class="price">
                                      RM <?php echo $product['price']; ?>
                                    <span style="display: block;">Per person</span>
                                </p>
                
                                <a class="btn btn-secondary" name="book_tour" onclick="userAuthentication(<?php echo $product['id']; ?>)">Book Now</a>
                
                                </div>
                
                            </div>
                        </li>

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

        <script>
        
           function userAuthentication(productId) {
                // Check if the customer is not logged in (you can use a PHP variable)
                var customerNotLoggedIn = <?php echo isset($_SESSION['user']) ? 'false' : 'true'; ?>;

                if (customerNotLoggedIn) {
                    // Customer is not logged in, display a pop-up
                    alert("Please log in or register to book this tour."); 
                } 
                else{
                    window.location.href = "booking.php?product_id=" + productId;;
                }
            }
            
                    
        
        </script>
        <!--=============== SCROLL REVEAL===============-->
        <script src="js/scrollreveal.min.js"></script>
        
        <!--=============== SWIPER JS ===============-->
        <script src="js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="js/main.js"></script>
         
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="js/login.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

        <!--=============== ICONS ===============-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>
</html>
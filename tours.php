<?php 
include("crud.php");

$productCounts = array();

// SQL query to count products based on tour_type
$sql = "SELECT tour_type, COUNT(*) AS product_count FROM products GROUP BY tour_type";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Fetch product counts for each tour type
    while ($row = $result->fetch_assoc()) {
        $tourType = $row["tour_type"];
        $productCount = $row["product_count"];
        $productCounts[$tourType] = $productCount;
    }
}

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="img/favicon.png" type="image/png">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        
        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="css/styles.css" >
        <link rel="stylesheet" href="css/tour.css"  >
        <link rel="stylesheet" href="css/policy.css">


       
        <title> Seven Seas Travel</title>
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
                            <a href="#0" class="nav__link active-link">Discover</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ) {
                            // User is logged in, show a "Logged In" button 
                            echo '<li class="nav__item">
                                    <a href="review.php" class="nav__link">Review</a>
                                  </li>';
                                  
                            echo '<li class="login__item">
                                    <a href="tours.php?logout=1" class="cd-signin">Logout</a>
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

           
     

    <!--==================== Search Bar ====================-->
    <section class="tour-search" style="margin-bottom:80px;">
        <div class="container">

          <form action="" class="tour-search-form">

            <div class="input-wrapper">
              <label for="destination" class="input-label">Search Destination*</label>

              <input type="text" name="destination" id="destination" required placeholder="Enter Destination"
                class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="people" class="input-label">Pax Number*</label>

              <input type="number" name="people" id="people" required placeholder="No.of People" class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="checkin" class="input-label">Checkin Date*</label>

              <input type="date" name="checkin" id="checkin" required class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="checkout" class="input-label">Checkout Date*</label>

              <input type="date" name="checkout" id="checkout" required class="input-field">
            </div>

            <button type="submit" class="btn btn-secondary">Inquire Now </button>

          </form>

        </div>
      </section>

<!--==================== Destination Cards ====================-->
<h2 class="section__title" style="font-size: 30px;">Tours</h2>
      <ul class="cards">
        <li>
          <a href="asia_tours.php" class="card">
            <img src="https://images.unsplash.com/photo-1532572204213-a43b97556045?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODh8fEFzaWF8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=800&q=60" class="card__image" alt="" />
            <div class="card__overlay">
              <div class="card__header">
                
                <div class="card__header-text">
                  <h3 class="card__title">Asia</h3>
      
                 <span class='card__status'><?php echo isset($productCounts['Asia']) ? $productCounts['Asia'] : 0; ?> Tours Available</span>
                </div>
              </div>
      
              <p class="card__description">Explore the vibrant cultures and ancient wonders of Asia. From the bustling streets of Tokyo to the serene temples of Bali, embark on a journey that blends tradition and modernity.</p>
              <br>
      
            </div>
          </a>
        </li>

        <li>
          <a href="europe_tours.php" class="card">
            <img src="https://images.unsplash.com/photo-1516483638261-f4dbaf036963?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fEV1cm9wZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=800&q=60" class="card__image" alt="" />
            <div class="card__overlay">
              <div class="card__header">
                <div class="card__header-text">

                  <h3 class="card__title">Europe</h3>

                  <span class='card__status'><?php echo isset($productCounts['Europe']) ? $productCounts['Europe'] : 0; ?> Tours Available</span>

                </div>
              </div>
              <p class="card__description">Dive into the rich history and diverse landscapes of Europe. Whether strolling through charming medieval towns or indulging in the arts of Paris, your European adventure promises a tapestry of experiences.</p>
              <br>
            </div>
          </a>
        </li>

        <li>
          <a href="" class="card">
            <img src="https://images.unsplash.com/photo-1575650693902-8ead804c0732?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDF8fE1pZGRsZSUyMGVhc3R8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=700&q=40" class="card__image" alt="" />
            <div class="card__overlay">
              <div class="card__header">

                <div class="card__header-text">
                  <h3 class="card__title">Middle East</h3>
                  <span class="card__status">4 Tours Available</span>
                </div>
              </div>
              <p class="card__description">Immerse yourself in the enchanting tales of the Middle East. Discover the ancient ruins of Petra, traverse the deserts of Dubai, and experience the warm hospitality that defines this culturally rich region.</p>
              <br>
            </div>
          </a>
        </li>

        <li>
          <a href="" class="card">
            <img src="https://images.unsplash.com/photo-1667254650752-34cdd1106dc9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MnxaRktyLWlYS2p0a3x8ZW58MHx8fHx8&auto=format&fit=crop&w=700&q=40" class="card__image" alt="" />
            <div class="card__overlay">
              <div class="card__header">
                <img class="card__thumb" src="https://i.imgur.com/sjLMNDM.png" alt="" />
                <div class="card__header-text">
                  <h3 class="card__title">Africa</h3>
                  <span class="card__status">1 Tours Available</span>
                </div>
              </div>
              <p class="card__description">Safari through the vast landscapes of Africa, where the majestic wildlife roams freely. Be captivated by the rhythms of tribal cultures and unwind on pristine beaches along the stunning coastline.</p>
              <br>
            </div>
          </a>
        </li>

       <li>
        <a href="" class="card">
          <img src="https://images.unsplash.com/photo-1461863109726-246fa9598dc3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzl8fFNvdXRoJTIwYW1lcmljYXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=800&q=60" class="card__image" alt="" />
          <div class="card__overlay">
            <div class="card__header">
              <img class="card__thumb" src="https://i.imgur.com/sjLMNDM.png" alt="" />
              <div class="card__header-text">
                <h3 class="card__title">South America</h3>
                <span class="card__status">3 Tours Available</span>
              </div>
            </div>
            <p class="card__description">From the Amazon rainforest to the Andean peaks, South America beckons with its natural wonders. Delve into the vibrant festivals of Rio de Janeiro and savor the flavors of Peruvian cuisine on an unforgettable journey.</p>
            <br>
          </div>
        </a>
      </li>

      <li>
        <a href="" class="card">
          <img src="https://images.unsplash.com/photo-1575139488320-2ac1da68a4a7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDR8fE5ldyUyMHlvcmt8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=800&q=60" class="card__image" alt="" />
          <div class="card__overlay">
            <div class="card__header">
              <img class="card__thumb" src="https://i.imgur.com/sjLMNDM.png" alt="" />
              <div class="card__header-text">
                <h3 class="card__title">North America</h3>
                <span class="card__status">5 Tours Available</span>
              </div>
            </div>
            <p class="card__description">Embark on a North American adventure that spans from the cosmopolitan cities of New York and Los Angeles to the breathtaking natural wonders of Yellowstone. Experience the diversity and allure of this vast continent.</p>
            <br>
          </div>
        </a>
      </li>

      </ul>
    </main>   

    <?php include("footer.php");?>
      

         <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>

        <!--=============== SCROLL REVEAL===============-->
        <script src="js/scrollreveal.min.js"></script>
        
        <!--=============== SWIPER JS ===============-->
        <script src="js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="js/main.js"></script>
         
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="js/login_script.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

       </body>
    </html>
<?php include('function222.php');?>


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
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/policy.css">



       
        <title> Seven Seas Travel</title>
    </head>
    <body>

    <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo" >
                <img src = "img/Travel Website.png ">
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">About</a>
                        </li>
                        <li class="nav__item">
                            <a href="tours.php" class="nav__link">Discover</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ) {
                            // User is logged in, show a "Logged In" button 
                            echo '<li class="nav__item">
                                    <a href="review.php" class="nav__link">Review</a>
                                  </li>';

                            echo '<li class="login__item">
                                    <a href="index.php?logout=1" class="cd-signin" >Logout</a>
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
                                        <a href="#">Terms & Conditions</a>
                                        </label>
                                    </p>
                
                                    <p class="fieldset">
                                        <input class="full-width has-padding" type="submit" name="register_btn" value="Create account">
                                    </p>

                                    <span class="separator">OR</span>
                                        <ul class="social-links">
                                            <li><a href="merchant_account.php"> Register as Merchant</a></li>
                                        </ul>
                                </form>
                
                                <!-- <a href="#0" class="cd-close-form">Close</a> -->
                            </div> <!-- cd-signup -->
                
                            <div id="cd-reset-password"> <!-- reset password form -->
                                <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
                
                                <form class="cd-form" method="post" action="forgot.php">
                                    <p class="fieldset">
                                        <label class="image-replace cd-email" for="reset-email">E-mail</label>
                                        <input class="full-width has-padding has-border" id="reset-email" type="email" name="email" placeholder="E-mail" required>
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

            <main class="main">
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                <div class = home__img >
                <video autoplay muted loop >
                    <source src="video/video (2160p).mp4" type="video/mp4">
                  </video>
                </div>

                <div class="home__container container grid">
                    <div class="home__data">
                        <span class="home__data-subtitle">Discover your place</span>
                        <h1 class="home__data-title"> <b >Explore, Dream, Discover: </b> <br> Your Journey Begins Here.. </h1>
                        <form class="header-form">
                            <input type="text" placeholder="Search for your adventure..." />
                            <button class="btn"><i class="ri-search-line"></i>Search</button>
                        </form>

                    </div>

                    <div class="home__social">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </div>

                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <div class="about__container container grid">
                    <div class="about__data">
                        <h2 class="section__title about__title">Discover the Wonders of the Seven Seas</h2>
                        <p class="about__description" style="line-height: 20px;">Embark on a journey to explore the world's most breathtaking destinations with Seven Seas Travels. 
                            We bring you exclusive experiences at unbeatable prices, offering special discounts to make your dream vacations a reality. 
                            Whether it's a tropical paradise, a historic city, or an adventurous expedition, you choose the destination, and we'll guide you every step of the way. 
                            Secure your spot now and set sail with Seven Seas Travels. Your extraordinary voyage awaits!
                            <br>
                        <a href="tours.php" >
                            <br>
                        <button class="button"> Reserve a place
                        </a>
                    </div>

                    <div class="about__img">
                        <div class="about__img-overlay">
                            <img src="img/about1.jpg" alt="" class="about__img-one">
                        </div>

                        <div class="about__img-overlay">
                            <img src="img/about2.jpg" alt="" class="about__img-two">
                        </div>
                    </div>
                </div>
            </section>
            
            <!--==================== DISCOVER ====================-->
            <section class="discover section" id="discover">
                <h2 class="section__title">Discover the most <br> attractive places</h2>
                
                <div class="discover__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== DISCOVER 1 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="img/discover1.jpg" alt="" class="discover__img">
                            <div class="discover__data">
                                <h2 class="discover__title">Bali</h2>
                                <span class="discover__description">24 tours available</span>
                            </div>
                        </div>

                        <!--==================== DISCOVER 2 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="img/discover2.jpg" alt="" class="discover__img">
                            <div class="discover__data">
                                <h2 class="discover__title">France</h2>
                                <span class="discover__description">15 tours available</span>
                            </div>
                        </div>

                        <!--==================== DISCOVER 3 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="img/discover3.jpg" alt="" class="discover__img">
                            <div class="discover__data">
                                <h2 class="discover__title">Dubia</h2>
                                <span class="discover__description">18 tours available</span>
                            </div>
                        </div>

                        <!--==================== DISCOVER 4 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="img/discover4.jpg" alt="" class="discover__img">
                            <div class="discover__data">
                                <h2 class="discover__title">Japan</h2>
                                <span class="discover__description">10 tours available</span>
                            </div>
                        </div>
 
                        <!--==================== DISCOVER 5 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="img/discover5.jpg" alt="" class="discover__img">
                            <div class="discover__data">
                                <h2 class="discover__title">Korea</h2>
                                <span class="discover__description">16 tours available</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== EXPERIENCE ====================-->
            <section class="experience section">
                <h2 class="section__title">With Our Experience <br> We Will Serve You</h2>

                <div class="experience__container container grid">
                    <div class="experience__content grid">
                        <div class="experience__data">
                            <h2 class="experience__number">20</h2>
                            <span class="experience__description">Year <br> Experience</span>
                        </div>

                        <div class="experience__data">
                            <h2 class="experience__number">75</h2>
                            <span class="experience__description">Complete <br> tours</span>
                        </div>

                        <div class="experience__data">
                            <h2 class="experience__number">650+</h2>
                            <span class="experience__description">Tourist <br> Destination</span>
                        </div>
                    </div>

                    <div class="experience__img grid">
                        <div class="experience__overlay">
                            <img src="img/experience1.jpg" alt="" class="experience__img-one">
                        </div>
                        
                        <div class="experience__overlay">
                            <img src="img/experience2.jpg" alt="" class="experience__img-two">
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== VIDEO ====================-->
            <section class="video section">
                <h2 class="section__title">Video Tour</h2>

                <div class="video__container container">
                    <p class="video__description">Find out more with our video of the most beautiful and 
                        pleasant places for you and your family.
                    </p>

                    <div class="video__content">
                        <video id="video-file">
                            <source src="video/video.mov" type="video/mp4">
                        </video>

                        <button class="button button--flex video__button" id="video-button">
                            <i class="ri-play-line video__button-icon" id="video-icon"></i>
                        </button>
                    </div>
                </div>
            </section>

            <!--==================== GALLERY ====================-->
            <section class="gallery section" id="gallery">
                <h2 class="section__title"> Gallery </h2>


                    <div class="grid-wrapper">
                        <div class="none">
                            <img src="https://images.unsplash.com/photo-1695693919930-a4bc379cb748?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDIxOHxGem8zenVPSE42d3x8ZW58MHx8fHx8&auto=format&fit=crop&w=700&q=60" alt="" />
                        </div>
                        <div class="none">
                            <img src="https://images.unsplash.com/photo-1597254512641-c0141c25f32c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8Ym9yYSUyMGJvcmF8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=800&q=60" alt="" />
                        </div>
                        <div class="tall">
                            <img src="https://images.unsplash.com/photo-1697104733109-a92cda3560a7?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDE5fEZ6bzN6dU9ITjZ3fHxlbnwwfHx8fHw%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" alt="">
                        </div>
                        <div class="wide">
                            <img src="https://images.unsplash.com/photo-1685566765455-e70c0dfdb68a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDEzM3xGem8zenVPSE42d3x8ZW58MHx8fHx8&auto=format&fit=crop&w=700&q=60" alt="" />
                        </div>
                        <div class="none">
                            <img src="https://images.unsplash.com/photo-1519677100203-a0e668c92439?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8ZXVyb3BlfGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt="" />
                        </div>
                        <div class="tall">
                            <img src="https://images.unsplash.com/photo-1697168248031-7a8333f70930?ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDExfEZ6bzN6dU9ITjZ3fHxlbnwwfHx8fHw%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" alt="" />
                        </div>
                        <div class="big">
                            <img src="https://images.unsplash.com/photo-1506929562872-bb421503ef21?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2568&q=80" alt="" />
                        </div>
                        <div class="none">
                            <img src="https://images.unsplash.com/photo-1588247866001-68fa8c438dd7?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=564&amp;q=80" alt="" />
                        </div>
                        <div class="wide">
                            <img src="https://images.unsplash.com/photo-1586521995568-39abaa0c2311?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1350&amp;q=80" alt="" />
                        </div>
                        <div class="big">
                            <img src="https://images.unsplash.com/photo-1501555088652-021faa106b9b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8dHJhdmVsZXJ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=700&q=60" alt="" />
                        </div>
                        <div class="tall">
                            <img src="https://images.unsplash.com/photo-1696960594920-1ca9a1f250bc?ixlib=rb-4.0.3&amp;&ixid=M3wxMjA3fDB8MHx0b3BpYy1mZWVkfDR8RnpvM3p1T0hONnd8fGVufDB8fHx8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60" alt="" />
                        </div>
                        <div class="none">
                            <img src="https://images.unsplash.com/photo-1506877339221-ede41280a7a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTZ8fGdyZWVjZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=700&q=60" alt="" />
                        </div>
                        <div class="none">
                            <img src="https://images.unsplash.com/photo-1682687220975-7b2df674d3ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxzZWFyY2h8MjJ8fG1pZGRsZSUyMGVhc3R8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=700&q=60" alt="" />
                        </div>
                        <div class="none">
                            <img src="https://images.unsplash.com/photo-1507475380673-1246fa72eeea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODZ8fGdyZWVjZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=700&q=60" alt="" />
                        </div>
                        <div class="none">
                            <img src="https://images.unsplash.com/photo-1586861635167-e5223aadc9fe?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fG1hbGRpdmVzfGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" alt="" />
                        </div>
                        <div class="wide">
                            <img src="https://images.unsplash.com/photo-1514890547357-a9ee288728e0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDV8fGl0YWx5fGVufDB8fDB8fHww&auto=format&fit=crop&w=700&q=60" alt="" />
                        </div>
                        
                    </div>


            <!--==================== SUBSCRIBE ====================-->
            <section class="subscribe section" style="border-radius:60px;">
                <div class="subscribe__bg">
                    <div class="subscribe__container container">
                        <h2 class="section__title subscribe__title">Subscribe Our <br> Newsletter</h2>
                        <p class="subscribe__description">Subscribe to our newsletter and get a 
                            special 30% discount.
                        </p>
    
                        <form action="" class="subscribe__form">
                            <input type="text" placeholder="Enter email" class="subscribe__input">
    
                            <button class="button">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            
            <!--==================== SPONSORS ====================-->
            <section class="sponsor section">
                <div class="sponsor__container container grid">
                    <div class="sponsor__content">
                        <img src="img/sponsors1.png" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="img/sponsors2.png" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="img/sponsors3.png" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="img/sponsors4.png" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="img/sponsors5.png" alt="" class="sponsor__img">
                    </div>
                </div>
            </section>
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
        <script  src="js/login.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    </body>
</html>
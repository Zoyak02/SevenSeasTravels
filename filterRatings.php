<?php
    require("connection.php");
    include("function222.php");
    $con = mysqli_connect("localhost", "root", "", "bookings");
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
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/ratings.css">
    <link rel="stylesheet" href="css/policy.css">


    <title>Tourism Reviews</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
    }

    .reviews {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .filter {
        text-align: center;
        margin: 20px 0;
    }

    .rating {
        margin: 0 5px;
        cursor: pointer;
    }

    .rating:hover {
        color: gold;
    }

    .review {
        margin: 10px 0;
        border: 1px solid #ccc;
        padding: 10px;
        background-color: #f9f9f9;
    }

    .no-reviews {
        display: none;
    }
    </style>
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="img/Travel Website.png">
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
            <div class="cd-user-modal">
                <!-- this is the entire modal form, including the background -->
                <div class="cd-user-modal-container">
                    <!-- this is the container wrapper -->
                    <ul class="cd-switcher">
                        <li><a href="#0">Sign in</a></li>
                        <li><a href="#0">New account</a></li>
                    </ul>

                    <div id="cd-login">
                        <!-- log in form -->
                        <form class="cd-form">
                            <p class="fieldset">
                                <label class="image-replace cd-email" for="signin-email">E-mail</label>
                                <input class="full-width has-padding has-border" id="signin-email" type="email"
                                    placeholder="E-mail">
                                <span class="cd-error-message">Error message here!</span>
                            </p>

                            <p class="fieldset">
                                <label class="image-replace cd-password" for="signin-password">Password</label>
                                <input class="full-width has-padding has-border" id="signin-password" type="text"
                                    placeholder="Password">
                                <a href="#0" class="hide-password">Hide</a>
                                <span class="cd-error-message">Error message here!</span>
                            </p>

                            <p class="fieldset">
                                <input type="checkbox" id="remember-me" checked>
                                <label for="remember-me">Remember me</label>
                            </p>

                            <p class="fieldset">
                                <input class="full-width" type="submit" value="Login">
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

                    <div id="cd-signup">
                        <!-- sign up form -->
                        <form class="cd-form">
                            <p class="fieldset">
                                <label class="image-replace cd-username" for="signup-username">Username</label>
                                <input class="full-width has-padding has-border" id="signup-username" type="text"
                                    placeholder="Username">
                                <span class="cd-error-message">Error message here!</span>
                            </p>

                            <p class="fieldset">
                                <label class="image-replace cd-email" for="signup-email">E-mail</label>
                                <input class="full-width has-padding has-border" id="signup-email" type="email"
                                    placeholder="E-mail">
                                <span class="cd-error-message">Error message here!</span>
                            </p>

                            <p class="fieldset">
                                <label class="image-replace cd-password" for="signup-password">Password</label>
                                <input class="full-width has-padding has-border" id="signup-password" type="text"
                                    placeholder="Password">
                                <a href="#0" class="hide-password">Hide</a>
                                <span class="cd-error-message">Error message here!</span>
                            </p>

                            <p class="fieldset">
                                <input type="checkbox" id="accept-terms">
                                <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                            </p>

                            <p class="fieldset">
                                <input class="full-width has-padding" type="submit" value="Create account">
                            </p>
                        </form>

                        <!-- <a href="#0" class="cd-close-form">Close</a> -->
                    </div> <!-- cd-signup -->

                    <div id="cd-reset-password">
                        <!-- reset password form -->
                        <p class="cd-form-message">Lost your password? Please enter your email address. You will receive
                            a link to create a new password.</p>

                        <form class="cd-form">
                            <p class="fieldset">
                                <label class="image-replace cd-email" for="reset-email">E-mail</label>
                                <input class="full-width has-padding has-border" id="reset-email" type="email"
                                    placeholder="E-mail">
                                <span class="cd-error-message">Error message here!</span>
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
        <section class="home" id="home">
            <div class=hero-banner>
                <img src="img/hero-banner@2x.png">
            </div>

            <div class="hero__container container grid"></div>
        </section>



        <br>
        <h1 style="font-size: 30px;">Tourism Reviews</h1>
        <br>

        <div class="reviews">
            <div class="filter">
                <span>Filter by Rating:</span>
                <span class="rating" data-rating="1">★</span>
                <span class="rating" data-rating="2">★</span>
                <span class="rating" data-rating="3">★</span>
                <span class="rating" data-rating="4">★</span>
                <span class="rating" data-rating="5">★</span>
            </div>
            <?php
                $query = "SELECT * FROM purchases WHERE star_rating = '5'";
                $result=mysqli_query($con,$query);
                $fetch_src = FETCH_SRC;
      
                while($fetch=mysqli_fetch_assoc($result))
                {
                    echo '<div class="review" data-rating="5">';
                    echo "<h3>Star Ratings: ★★★★★</h3><br>";
                    echo "<p>Tour Name: $fetch[product_name]</p><br>";
                    echo "<p>Name: $fetch[firstName] - $fetch[review]</p><br></div>";
                }
            ?>

            <?php
                $query = "SELECT * FROM purchases WHERE star_rating = '4'";
                $result=mysqli_query($con,$query);
                $fetch_src = FETCH_SRC;
      
                while($fetch=mysqli_fetch_assoc($result))
                {
                    echo '<div class="review" data-rating="4">';
                    echo "<h3>Star Ratings: ★★★★</h3><br>";
                    echo "<p>Tour Name: $fetch[product_name]</p><br>";
                    echo "<p>Name: $fetch[firstName] - $fetch[review]</p><br></div>";                 
                }
            ?>

            <?php
                $query = "SELECT * FROM purchases WHERE star_rating = '3'";
                $result=mysqli_query($con,$query);
                $fetch_src = FETCH_SRC;
      
                while($fetch=mysqli_fetch_assoc($result))
                {
                    echo '<div class="review" data-rating="3">';
                    echo "<h3>Star Ratings: ★★★</h3><br>";
                    echo "<p>Tour Name: $fetch[product_name]</p><br>"   ;                              
                    echo "<p>Name: $fetch[firstName] - $fetch[review]</p><br></div>";
                }
            ?>

            <?php
                $query = "SELECT * FROM purchases WHERE star_rating = '2'";
                $result=mysqli_query($con,$query);
                $fetch_src = FETCH_SRC;
      
                while($fetch=mysqli_fetch_assoc($result))
                {
                    echo '<div class="review" data-rating="2">';
                    echo "<h3>Star Ratings: ★★</h3><br>";
                    echo "<p>Tour Name: $fetch[product_name]</p><br>";
                    echo "<p>Name: $fetch[firstName] - $fetch[review]</p><br></div>";
                }
            ?>

            <?php
                $query = "SELECT * FROM purchases WHERE star_rating = '1'";
                $result=mysqli_query($con,$query);
                $fetch_src = FETCH_SRC;
                $i = 0;
                while($fetch=mysqli_fetch_assoc($result))
                {
                    echo '<div class="review" data-rating="1">';
                    echo "<h3>Star Ratings: ★</h3><br>";
                    echo "<p>Tour Name: $fetch[product_name]</p><br>";
                    echo "<p>Name: $fetch[firstName] - $fetch[review]</p><br></div>";
                    $i++;
                }
                if($i === 0){
                    echo "<p class='no-reviews'>No other reviews for this star rating.</p>";
                }
            ?>
        </div>
        <a href="review.php">
             <button class="button" style="margin-left: 44%;margin-top:10px;">Go Back</button>
            </a>
        <script>
        // JavaScript to filter reviews by rating
        const ratings = document.querySelectorAll('.rating');
        const reviews = document.querySelectorAll('.review');

        ratings.forEach(rating => {
            rating.addEventListener('click', () => {
                const selectedRating = rating.getAttribute('data-rating');
                reviews.forEach(review => {
                    const reviewRating = review.getAttribute('data-rating');
                    review.style.display = reviewRating === selectedRating ? 'block' :
                        'none';
                });
            });
        });
        </script>

    </main>







    <!--==================== FOOTER ====================-->
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
    <script src="js/main.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/login_script.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript">
    </script>

</body>

</html>
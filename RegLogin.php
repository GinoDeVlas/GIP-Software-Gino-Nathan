<?php
session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $Client = $_POST['ClientN'];
    $Card = $_POST['CardN'];

    if(!empty($Client) && !empty($Card) && is_numeric($Client) && is_numeric($Card))
    {

    }
    else{
        echo "Please enter valid information!";
    }

  }
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $Name = $_POST['name'];
    $Lname = $_POST['lName'];
    $pass = $_POST['pass'];
    $rPass = $_POST['rPass'];

    if(!empty($Name) && !empty($Lname) && !empty($pass) && !empty($rPass))
    {
      if($pass == $rPass)
      {

      }else{
        echo "Pasword invalid!";
      }
    }
    else{
        echo "Please enter valid information!";
    }

  }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Banking met GEC</title>
    


    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/RegLogin.css">
  </head>
  <body>
<!--header-->
<header id="site-header" class="fixed-top">
  <div class="container">
  <nav class="navbar navbar-expand-lg stroke px-0">
          <h1> <a class="navbar-brand" href="index.php">
                  <span class="fa fa-cc-visa"></span> GAC
              </a></h1>
          <!-- if logo is image enable this   
  <a class="navbar-brand" href="#index.html">
      <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
  </a> -->
          <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
              data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
              <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item @@about__active">
                      <a class="nav-link" href="about.php">Over</a>
                  </li>
                  <li class="nav-item @@services__active">
                      <a class="nav-link" href="services.php">Services</a>
                  </li>
                  <li class="nav-item @@contact__active">
                      <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                  <!--/search-right-->
                  <div class="search mr-3">
                      <input class="search_box" type="checkbox" id="search_box">
                      <label class="fa fa-search" for="search_box"></label>
                      <div class="search_form">
                          <form action="#" method="GET">
                              <input type="text" placeholder="Search"><input type="submit" value="search">
                          </form>
                      </div>
                  </div>
                  <!--//search-right-->
              </ul>
          </div>
          <!-- toggle switch for light and dark theme -->
          <div class="mobile-position">
              <nav class="navigation">
                  <div class="theme-switch-wrapper">
                      <label class="theme-switch" for="checkbox">
                          <input type="checkbox" id="checkbox">
                          <div class="mode-container">
                              <i class="gg-sun"></i>
                              <i class="gg-moon"></i>
                          </div>
                      </label>
                  </div>
              </nav>
          </div>
          <!-- //toggle switch for light and dark theme -->
      </nav>
  </div>
</header>
<!--/header-->
<div class="inner-banner">
</div>
<section class="w3l-breadcrumb">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="index.html">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>Login</li>
        </ul>
    </div>
</section>
<!-- home page about section deleted -->
     
<section class="sall sbody">
<h2>Welcome to GEC
</h2>
<div class="scontainer" id="scontainer">
	<div class="form-container sign-up-container">
		<form action="connect.php" method='post'>
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Jhon Doe" name="name" />
			<input type="text" placeholder="Waar je huis woont" name="Adres"/>
			<input type="text" placeholder="test@voorbeeld.be" name="mail"/>
      <input type="text" placeholder="04 12 34 56 78" name="Tele"/>
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="number" placeholder="Card number" name="CardN"/>
			<input type="number" placeholder="Client number" name="ClientN"/>
      
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


</section>



<!-- services section deleted -->
<!-- //testimonials -->
 <!-- footer -->
 <section class="w3l-footer-29-main">
  <div class="footer-29 py-5">
    <div class="container py-lg-4">
      <div class="row footer-top-29">
        <div class="col-lg-4 col-md-6 footer-list-29 footer-1 pr-lg-5">
          <div class="footer-logo mb-4">
            <a class="navbar-brand" href="index.html">
              <span class="fa fa-cc-visa"></span> Bank Card</a>
          </div>
          <p>It is the leading financial establishment providing high-quality international banking services. Our
            success
            is attributed to our loyal customers. We provide reliable services for you.</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-5 col-5 footer-list-29 footer-2 mt-md-0 mt-5">

          <ul>
            <h6 class="footer-title-29">Quick Links</h6>
            <li><a href="registreren.html">Registreren</a></li>
            <li><a href="#blog"> Blog posts</a></li>
            <li><a href="#pricing"> Pricing plans</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="contact.html">Contact us</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-7 col-7 footer-list-29 footer-3 mt-lg-0 mt-5">
          <h6 class="footer-title-29">Head Office</h6>
          <p class="mb-3"> Bank Card, 343 banking lane, #2214 cravel street, NY.</p>
          <p class="mb-2"> <span class="fa fa-phone"></span> <a href="tel:+1(21) 234 4567">+1(21) 234 4567</a></p>
          <p class="mb-2"><span class="fa fa-envelope-o"></span> <a href="mailto:info@mail.com">info@mail.com</a></p>
          <p><span class="fa fa-support"></span> <a href="mailto:info@support.com">info@support.com</a></p>
        </div>
        <div class="col-lg-3 col-md-6 footer-list-29 footer-4 mt-lg-0 mt-5">
          <h6 class="footer-title-29">Latest posts</h6>
          <div class="post1">
            <a href="#url" class="post-title">7 Banking Services That Can Save Retirees Money</a>
            <p class="small">September 28, 2020</p>
          </div>
          <div class="post1 mt-4">
            <a href="#url" class="post-title">Stocks Could Surge 10% between Now And 2020</a>
            <p class="small">September 28, 2020</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- copyright -->
  <section class="w3l-copyright text-center">
    <div class="container">
      <p class="copy-footer-29">© 2020 Bank Cards. All rights reserved.</p>
    </div>

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      &#10548;
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- /move top -->
  </section>
  <!-- //copyright -->
</section>
<!-- //footer -->

<!--  javascripts file here -->
<script src="assets/js/jquery-3.3.1.min.js"></script>

<script src="assets/js/theme-change.js"></script> <!-- //light and dark mode switch js -->

<script src="assets/js/circles.js"></script>

<!-- stats number counter-->
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
  $('.counter').countUp();
</script>
<!-- //stats number counter -->

<!-- owl carousel -->
<script src="assets/js/owl.carousel.js"></script>
<!-- script for banner slider-->
<script>
  $(document).ready(function () {
    $('.owl-one').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      responsiveClass: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 1
        },
        667: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
  })
</script>
<!-- //script -->
<!-- owl carousel -->

<!-- script for tesimonials carousel slider -->
<script>
  $(document).ready(function () {
    $("#owl-demo2").owlCarousel({
      loop: true,
      margin: 20,
      nav: false,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        1000: {
          items: 1,
          nav: false,
          loop: false
        }
      }
    })
  })
</script>
<!-- //script for tesimonials carousel slider -->

<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->

<!--/MENU-JS-->
<script>
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
      $("#site-header").addClass("nav-fixed");
    } else {
      $("#site-header").removeClass("nav-fixed");
    }
  });

  //Main navigation Active Class Add Remove
  $(".navbar-toggler").on("click", function () {
    $("header").toggleClass("active");
  });
  $(document).on("ready", function () {
    if ($(window).width() > 991) {
      $("header").removeClass("active");
    }
    $(window).on("resize", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
    });
  });
</script>
<!--//MENU-JS-->

<script src="assets/js/bootstrap.min.js"></script><!-- //bootstrap js -->
<script src="assets/js/RegLogin.js"></script> <!-- //database connectie-->
</body>

</html>
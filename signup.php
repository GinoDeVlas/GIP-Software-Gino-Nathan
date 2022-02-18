<?php
session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) $$ !empty($password) && !is_numeric($user_name))
    {

    }else{
        echo "Please enter some valid information!"
    }

  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Bank Cards - Banking Category Bootstrap Responsive Website Template | About : W3layouts</title>
    


    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
  </head>
  <body>
<!--header-->
<header id="site-header" class="fixed-top">
  <div class="container">
      <nav class="navbar navbar-expand-lg stroke px-0">
          <h1> <a class="navbar-brand" href="index.html">
                  <span class="fa fa-cc-visa"></span> Bank Cards
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
                  <li class="nav-item @@home__active">
                      <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="about.html">About</a>
                  </li>
                  <li class="nav-item @@services__active">
                      <a class="nav-link" href="services.html">Services</a>
                  </li>
                  <li class="nav-item @@contact__active">
                      <a class="nav-link" href="contact.html">Contact</a>
                  </li>
                  <!--/search-right-->
                  <div class="search mr-3">
                      <input class="search_box" type="checkbox" id="search_box">
                      <label class="fa fa-search" for="search_box"></label>
                      <div class="search_form">
                          <form action="error.html" method="GET">
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
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>Registreren</li>
        </ul>
    </div>
</section>
<!-- home page about section deleted -->
          <div class="item">
                <li>
                    <div class="slider-info  banner-view banner-top1 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 banner-info-bg">
                                        <h5>Registreren</h5>
                                        <p class="mt-md-4 mt-3">Registreer je nu bij GeC vul hieronder je gegevens in</p>
                                        <div>
                                          <label for="username">Vooraam:</label>
                                          <input type="text" id="username" name="Voor_Naam">
                                        </div>
                                        <div>
                                          <label for="username">Achternaam:</label>
                                          <input type="text" id="username" name="Achter_Naam">
                                        </div>
                                        <div>
                                          <label for="username">Achternaam:</label>
                                          <input type="text" id="username" name="Achter_Naam">
                                        </div>
                                        <div>
                                          <label for="pass">Password (8 characters minimum):</label>
                                          <input type="password" id="pass" name="password"
                                                 minlength="8" required>
                                      </div>
                                      
                                      <input type="submit" value="Sign in">
                                        <div>
                                        
                                        </div>
                                      </div>
                                 </div>
                             </div>
                         </div>
                      </div>
                  </li>
            </div>
        <div class="item">
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
<script src="../databaseconnect.js"></script> <!-- //database connectie-->
</body>

</html>
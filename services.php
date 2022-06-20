<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Banking met GEC</title>
    
  </head>
  <body>
<!--header-->
<header>
<?php include 'menu.php' ?>
</header>
<!--/header-->

<section class="w3l-breadcrumb">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="index.php">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>Services</li>
        </ul>
    </div>
</section>
<!-- services page block grids -->
<section class="w3l-services py-5">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="row bottom-ab-grids">
            <div class="col-lg-6 bottom-ab-left align-self">
                <h3 class="title-big mb-4">Wij hebben professionele service voor onze klanten</h3>
                <p class="">Onze service wordt aangeboden door ervaren werkenmers. De tevredenheid van onze klant staat prioriteit en klantloyaliteit is ook een groot onderdeel in ons bedrijf.</p>
                <div class="cont-4 mt-lg-5 mt-4">
                    <div class="list mb-4">
                        <span class="fa fa-check"></span>
                        <div class="list-info">
                            <h4>Klantvriendelijkheid</h4>
                            <p>Wij bieden hulp aan onze klanten via onze contact pagina. Vaak voorkomende problemen kunnen gemakkelijk opgelost worden</p>
                        </div>
                    </div>
                    <div class="list">
                        <span class="fa fa-check"></span>
                        <div class="list-info">
                            <h4>Gerichte hulp</h4>
                            <p>Alle klanten worden gericht geholpen op basis van wat hun probleem is.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 bottom-right-grids mt-lg-0 mt-5">
                <img src="assets/images/services.jpg" alt="" class="radius-image img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- //bottom-grids-->
<!-- middle -->
<div class="middle py-5" id="call">
    <div class="container py-lg-3">
        <div class="welcome-left text-center py-md-5 py-3">
            <h3 class="title-big">Vragen of meer informatie?</h3>
            <h3 class="mt-4">Bel ons : <a href="tel:+1 123 456 789">(+32)9 225 89 07 </a> </h3>
            <p class="mt-4">Contacteer ons via e-mail of telefoon!</p>
            <a href="contact.php" class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2">Contacteer ons</a>
        </div>
    </div>
</div>
<!-- //middle -->
<?php include 'footer.php'?>
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
</body>

</html>
<?php
session_start();

include("connection.php");
include("functions.php");

//$user_data = check_login($con);
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
<!-- main-slider -->
<section class="w3l-main-slider" id="home">
    <div class="companies20-content">
        <div class="owl-one owl-carousel owl-theme">
            <div class="item">
                <li>
                    <div class="slider-info banner-view bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 banner-info-bg">
                                        <h5>Open een rekening</h5>
                                        <p class="mt-md-4 mt-3"> Hier kunt u zich registreren en een rekening openen op uw naam</p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="RegLogin.php">Registreren</a>
                                    </div>
                                    <div class="col-lg-5 col-md-8 img offset-lg-1 mt-lg-0 mt-4">
                                        <img src="assets/images/card1.png" alt="img"
                                            class="img-fluid radius-image-curve" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            <!-- <div class="item">
                <li>
                    <div class="slider-info  banner-view banner-top1 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 banner-info-bg">
                                        <h5>#1 Choice for your banking needs </h5>
                                        <p class="mt-md-4 mt-3">Our Card is the best option if you are looking for
                                            high-quality and reliable banking services. We provide reliable services for
                                            you
                                        </p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="#book"> Book a
                                            card</a>
                                        <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="about.html">
                                            Read More</a>
                                    </div>
                                    <div class="col-lg-5 col-md-8 img offset-lg-1 mt-lg-0 mt-4">
                                        <img src="assets/images/card2.png" alt="img"
                                            class="img-fluid radius-image-curve" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            <div class="item">
                <li>
                    <div class="slider-info banner-view banner-top2 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 banner-info-bg">
                                        <h5>The Britest bank card in your wallet </h5>
                                        <p class="mt-md-4 mt-3">Our Card is the best option if you are looking for
                                            high-quality and reliable banking services. We provide reliable services for
                                            you
                                        </p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="#book"> Book a
                                            card</a>
                                        <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="about.html">
                                            Read More</a>
                                    </div>
                                    <div class="col-lg-5 col-md-8 img offset-lg-1 mt-lg-0 mt-4">
                                        <img src="assets/images/card3.png" alt="img"
                                            class="img-fluid radius-image-curve" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            <div class="item">
                <li>
                    <div class="slider-info banner-view banner-top3 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 banner-info-bg">
                                        <h5>#1 Choice for your banking needs </h5>
                                        <p class="mt-md-4 mt-3">Our Card is the best option if you are looking for
                                            high-quality and reliable banking services. We provide reliable services for
                                            you
                                        </p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="#book"> Book a
                                            card</a>
                                        <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="about.html">
                                            Read More</a>
                                    </div>
                                    <div class="col-lg-5 col-md-8 img offset-lg-1 mt-lg-0 mt-4">
                                        <img src="assets/images/card4.png" alt="img"
                                            class="img-fluid radius-image-curve" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div> -->
        </div>
    </div>
</section>
<!-- /main-slider -->
<!-- home page block1 -->
<section id="about" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-cc-visa"></span>
                        </div>
                        <div class="info">
                            <p>Gemakkelijk</p>
                            <h4>Online</h4>
                            <h5>Bankieren</h5>
                        </div>
                    </div>
                    <p class="mt-4">Bij onze bank kunt u gemakkelijk overal online bankieren op een veillige manier. U kunt gemakkelijk geld oveschrijven naar vrienden of famillie via onze website. Kies een rekeningnummer schrijf over.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-money"></span>
                        </div>
                        <div class="info">
                            <p>Limiet</p>
                            <h4>??? 5.000</h4>
                            <h5>instellen</h5>
                        </div>
                    </div>
                    <p class="mt-4">Bekijk en wijzig je limiet tot maximaal ??? 5.000 per dag voor het opnemen van contant geld. Je limiet op je bankrekening per dag kan verschillen van grootte met welk betaalmiddel u betaalt.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-line-chart"></span>
                        </div>
                        <div class="info">
                            <p>Up-to-date</p>
                            <h4>Beveilliging</h4>
                            <h5></h5>
                        </div>
                    </div>
                    <p class="mt-4">We zorgen bijvoorbeeld voor een veilige verbinding. We werken continu aan verbetering: we houden onze systemen up-to-date en we gebruiken de nieuwste technieken om verdachte zaken te ontdekken.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //home page block1 -->
<!-- about page about section -->
<section class="w3l-index3" id="about">
    <div class="midd-w3 py-5">
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-7 mb-lg-0 mb-md-5 mb-4 align-self">
                    <h3 class="title-left mx-0">Ontdek hoe je je rekening kan beveilligen</h3>
                    <p class="mt-md-4 mt-3">Naar de toekomst toe gaan we beveiligings methodes blijven toevoegen aan onze website zodat we altijd up-to-date blijven. Bijvoorbeeld: het beveiligen van uw acount en transacties beveiligd en gemakkelijk laten gebeuren. Hierbij kan je limieten instellen en automatische afmelding na een bepaalde periode. Zodat wanneer je aangemeld ga je na een bepaalde tijd automatisch worden uitgelogd</p>
                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="about.php">Ontdek</a>
                </div>
                <div class="col-lg-5">
                    <div class="position-relative">
                        <img src="assets/images/about.jpg" alt="" class="radius-image img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //about page about section -->
<!-- /mobile section --->
<!-- <section class="w3l-mobile-content-6 py-5">
    <div class="mobile-info py-lg-5 py-md-4 py-2">
        /mobile-info-->
   
<!-- //mobile section --->
<!-- /bottom-grids-->
<!-- <!-- <section class="w3l-bottom-grids-6 py-5" id="advantages"> -->
    <!-- <div class="container py-lg-5 py-md-4 py-2">
        <h6 class="title-small text-center">Our Services</h6>
        <h3 class="title-big mb-md-5 mb-4 text-center">Advantages and Details</h3>
        <div class="grids-area-hny main-cont-wthree-fea row pt-3">
            <div class="col-lg-3 ceo-text mb-lg-0 mb-4">
                <div class="">
                    <span class="fa fa-quote-left"></span>
                    <p>Vivamus a et ut justo, init in. Ut eurt leo non. Duis sed dolor et amet. Sed blandit at mi vel
                        set hendrerit. Sed nisl justo, init id purus vitae, nibh sed et</p>
                    <div class="author align-items-center mt-4 mb-1">
                        <div class="img-circle">
                            <img src="assets/images/team2.jpg" class="mr-3 img-fluid" alt="...">
                        </div>
                        <div class="author-info">
                            <a href="#author">Maxwell ker</a> <br> <span class="meta-value">Sep 28, 2020 </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 grids-feature">
                <div class="area-box">
                    <span class="fa fa-laptop"></span>
                    <h4><a href="#feature" class="title-head">Detailed Statistics</a></h4>
                    <p>Vivamus a et ut justo, init in. Ut eurt leo non. Duis sed dolor et.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 grids-feature mt-md-0 mt-4">
                <div class="area-box">
                    <span class="fa fa-envelope-open-o"></span>
                    <h4><a href="#feature" class="title-head">Email Newsletter </a></h4>
                    <p>Vivamus a et ut justo, init in. Ut eurt leo non. Duis sed dolor et.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 grids-feature mt-lg-0 mt-4">
                <div class="area-box">
                    <span class="fa fa-line-chart"></span>
                    <h4><a href="#feature" class="title-head">FInancial Goals</a></h4>
                    <p>Vivamus a et ut justo, init in. Ut eu leo non. Duis sed dolor et.</p>
                </div>
            </div>
        </div>
    </div>
</section> --> -->
<!-- //bottom-grids-->
<!-- section -->
<!-- <section class="w3l-statistics" id="statistical">
    <div class="midd-w3 py-5">
        <div class="container py-lg-5 py-md-3 py-2">
            <h6 class="title-small text-center">Banking statistics.</h6>
            <h3 class="title-big mb-md-5 mb-4 text-center">Statistical information</h3>
            <div class="row">
                <div class="col-lg-4 align-self w3l-progressblock pr-lg-4">
                    <p class="mb-4">Our financial services deeply rely on certain banking procedures that have been
                        perfected over
                        the years and helped us get prestigious awards.</p>
                    <div class="progress-info info1">
                        <h6 class="progress-tittle">Financial consulting <span class="">80%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 80%"
                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="progress-info info2">
                        <h6 class="progress-tittle">Online Bank cards <span class="">95%</span>
                        </h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 95%"
                                aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="progress-info info3">
                        <h6 class="progress-tittle">Online reporting <span class="">90%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 90%"
                                aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="progress-info info4">
                        <h6 class="progress-tittle">Online banking <span class="">75%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 75%"
                                aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="progress-info info2 mb-0">
                        <h6 class="progress-tittle">24/7 support <span class="">95%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 95%"
                                aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-5 align-self">
                    <div class="position-relative">
                        <div class="progress-circles">
                            <div class="circle1">
                                <div id="progress" data-dimension="170" data-text="65%" data-fontsize="30"
                                    data-percent="65" data-fgcolor="#1d0d44" data-bgcolor="#eee" data-width="15"
                                    data-bordersize="5" data-animationstep="2"></div>
                                <h4>Economy</h4>
                            </div>
                            <div class="circle1">
                                <div id="progress1" data-dimension="170" data-text="75%" data-fontsize="30"
                                    data-percent="75" data-fgcolor="#1d0d44" data-bgcolor="#eee" data-width="15"
                                    data-bordersize="5" data-animationstep="2"></div>
                                <h4>Stability</h4>
                            </div>
                            <div class="circle1">
                                <div id="progress2" data-dimension="170" data-text="90%" data-fontsize="30"
                                    data-percent="90" data-fgcolor="#1d0d44" data-bgcolor="#eee" data-width="15"
                                    data-bordersize="5" data-animationstep="2"></div>
                                <h4>Cashback</h4>
                            </div>
                            <div class="circle1">
                                <div id="progress3" data-dimension="170" data-text="100%" data-fontsize="30"
                                    data-percent="100" data-fgcolor="#1d0d44" data-bgcolor="#eee" data-width="15"
                                    data-bordersize="5" data-animationstep="2"></div>
                                <h4>Guarantee</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-md-5 mt-4">
                    <img src="assets/images/stats.jpg" alt="" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- // about section -->
 <!-- forms -->
 <section class="w3l-forms-9 py-5">
     <div class="container py-lg-3">
         <div class="row align-items-center">
             <div class="main-midd col-lg-7 text-lg-right">
                 <h4 class="title-big">Open uw rekening nog vandaag!</h4>
             </div>
             <div class="col-lg-5 mt-lg-0 mt-4">
                 <a class="btn btn-style btn-dark" href="RegLogin.php">Open rekening</a>
             </div>
         </div>
     </div>
 </section>
 <!-- //forms -->
<div class="w3l-ordercard py-5">
    <div class="container py-lg-5 py-md-4 py-2">
        <h3 class="title-big mb-5 text-center">Hoe open ik mijn rekening?</h3>
        <div class="row text-center">
            <div class="col-lg-3 col-sm-6">
                <div class="work-grids">
                    <div class="icon">
                        <span class="fa fa-sign-in"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Online Registratie</h4>
                        <p class="desc">Registreer u online op onze website.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-sm-0 mt-5">
                <div class="work-grids">
                    <div class="icon">
                        <span class="fa fa-file-text-o"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Gegevens confirmeren</h4>
                        <p class="desc">Bij het registreren moet er nog bevestigd worden via mail .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
                <div class="work-grids">
                    <div class="icon">
                        <span class="fa fa-pencil"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Rekening openen</h4>
                        <p class="desc">In deze fase word uw rekening geopend op uw naam en worden alle gegevens verwerkt.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
                <div class="work-grids">
                    <div class="icon">
                        <span class="fa fa-credit-card"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Eerste overschrijving</h4>
                        <p class="desc">Wanneer alles in orde is kunt u uw bankrekening activeren door een te overschrijven of aanmelden.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  News section -->
<!-- <div class="w3l-news" id="news">
    <section id="grids5-block" class="py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <h3 class="title-big text-center">Latest blog posts</h3>
            <div class="row mt-lg-5 mt-4">
                <div class="col-lg-4 col-md-6">
                    <div class="grids5-info">
                        <a href="#blog-single" class="d-block zoom"><img src="assets/images/blog1.jpg" alt=""
                                class="img-fluid news-image" /></a>
                        <div class="blog-info">
                            <h4><a href="#blog-single">7 Banking services that can save retirees money</a></h4>
                            <p class="date"><span class="fa fa-calendar mr-2"></span> September 17, 2020</p>
                            <p>Lorem ipsum dolor sit amet ad minus libero ullam ipsam quas earum!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
                    <div class="grids5-info">
                        <a href="#blog-single" class="d-block zoom"><img src="assets/images/blog2.jpg" alt=""
                                class="img-fluid news-image" /></a>
                        <div class="blog-info">
                            <h4><a href="#blog-single">8 Ways to Drive Adoption of Your Banking App</a></h4>
                            <p class="date"><span class="fa fa-calendar mr-2"></span> September 17, 2020</p>
                            <p>Lorem ipsum dolor sit amet ad minus libero ullam ipsam quas earum!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
                    <div class="grids5-info">
                        <a href="#blog-single" class="d-block zoom"><img src="assets/images/blog3.jpg" alt=""
                                class="img-fluid news-image" /></a>
                        <div class="blog-info">
                            <h4><a href="#blog-single">How is it progressing and what will 2020 bring?</a></h4>
                            <p class="date"><span class="fa fa-calendar mr-2"></span> September 17, 2020</p>
                            <p>Lorem ipsum dolor sit amet ad minus libero ullam ipsam quas earum!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-style btn-primary mt-sm-5 mt-4" href="#blog">View all blog posts</a>
            </div>
            
        </div>
    </section>
</div> -->
<!--  //News section -->
 <!-- footer -->
 <section class="w3l-footer-29-main">
  <div class="footer-29 py-5">
    <div class="container py-lg-4">
      <div class="row footer-top-29">
        <div class="col-lg-4 col-md-6 footer-list-29 footer-1 pr-lg-5">
          <div class="footer-logo mb-4">
            <a class="navbar-brand" href="index.php">
              <span class="fa fa-cc-visa"></span>GAC</a>
          </div>
          <p>Wij zorgen voor een beveiligde en gemakkelijke ervaring voor uw banking op onze website.</p>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-5 col-5 footer-list-29 footer-2 mt-md-0 mt-5">

          <ul>
            <h6 class="footer-title-29">Extra links</h6>
            <li><a href="about.php">Over ons</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contacteer ons</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-7 col-7 footer-list-29 footer-3 mt-lg-0 mt-5">
          <h6 class="footer-title-29">Contact informatie</h6>
          <p class="mb-3"> GAC, 343 Schoenstraat, Grakker, GE.</p>
          <p class="mb-2"> <span class="fa fa-phone"></span> <a href="tel:+1(21) 234 4567">+(32)467 25 02 80 </a></p>
          <p class="mb-2"><span class="fa fa-envelope-o"></span> <a href="mailto:info@mail.com">info@GACbanking.com</a></p>
          <p><span class="fa fa-support"></span> <a href="mailto:info@support.com">info@GACsupport.com</a></p>
        </div>
        <div class="col-lg-3 col-md-6 footer-list-29 footer-4 mt-lg-0 mt-5">
          <h6 class="footer-title-29">Recente updates</h6>
          <div class="post1">
            <a href="#url" class="post-title">Log in systeem en registratie systeem</a>
            <p class="small">Januari 06, 2022</p>
          </div>
          <div class="post1 mt-4">
            <a href="#url" class="post-title">Hoofdpagina compleet</a>
            <p class="small">Januari 13, 2022</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- copyright -->
  <section class="w3l-copyright text-center">
    <div class="container">
      <p class="copy-footer-29">Gino en Nathan hun banking website</p>
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
      autoplayTimeout: 100000,
      autoplaySpeed: 300,
      autoplayHoverPause: false,
      responsive: {
        0: {
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
<?php

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
    <link rel="stylesheet" href="assets/css/style.css">

  </head>
  <body>

<!--header-->
<header>
<?php include 'menu.php' ?>
</header>
<!--/header-->

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
                                        <h5>Open vandaag nog een rekening!</h5>
                                        <p class="mt-md-4 mt-3">Registreer u hieronder! U kunt zich registreren en een rekening openen op uw naam.</p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="./signup.php"> Open een rekening</a>
                                        <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="./signup.php">Aanmelden</a>
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
            <div class="item">
                <li>
                    <div class="slider-info  banner-view banner-top1 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 banner-info-bg">
                                        <h5>Gebruiksvriendelijk platform</h5>
                                        <p class="mt-md-4 mt-3">Maak gebruik van ons gebruiksvriendelijke beheerpagina. Op deze pagina kunt u overzichtelijk alles zien in verband met uw rekening.
                                        </p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="./signup.php"> Open een rekening</a>
                                        <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="./signup.php">Aanmelden</a>
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
                                        <h5>Beste bank voor veilligheid</h5>
                                        <p class="mt-md-4 mt-3">Onze bank biedt extra beveiligingsmethodes aan voor uw rekening. U kunt dit terug vinden in de instellingen pagina van uw dashboard.
                                        </p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="./signup.php"> Open een rekening</a>
                                        <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="./signup.php">Aanmelden</a>
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
                                        <h5>Banken met betrouwbaarheid</h5>
                                        <p class="mt-md-4 mt-3">Onze website zorgt ervoor dat u betrouwbaar kunt bankieren.
                                        </p>
                                        <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="./signup.php"> Open een rekening</a>
                                        <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="./signup.php">Aanmelden</a>
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
            </div> 
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
                    <p class="mt-4">Bij onze bank kunt u gemakkelijk overal online bankieren op een veillige manier. U kunt gemakkelijk geld oveschrijven naar famillie of vrienden via onze website. Kies een rekeningnummer en schrijf over.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-money"></span>
                        </div>
                        <div class="info">
                            <p>Transacties</p>
                            <h4>Gemakkelijk</h4>
                            <h5>Bekijken</h5>
                        </div>
                    </div>
                    <p class="mt-4">Nadat u een transactie heeft uitgevoerd kunt u gemakkelijk bekijken en hoeveel en wanneer je het geld hebt overgeschreven. Op de overschrijvings pagina kunt ook zien wat voor commentaar dat er is toegevoegd aan de overschrijving</p>
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
                    <p class="mt-4">We zorgen voor een veilige verbinding met onze website. Onze systemen worden up-to-date gehouden gebruikers krijgen de nieuwste technieken om hun rekening te beveilligen.</p>
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
                    <p class="mt-md-4 mt-3">Als u bent ingelogd gaat u naar de instellingen pagina en kunt u daar verschillende opties aanklikken voor extra beveilliging. Naar de toekomst toe gaan we beveiligings methodes blijven toevoegen aan onze website zodat we altijd up-to-date blijven. Na een bepaalde periode wordt je automatisch afgemeld zodat niemand anders dan jij op je rekening kan.</p>
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
<!-- <section class="w3l-bottom-grids-6 py-5" id="advantages"> -->
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
</section> --> 
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
                 <a class="btn btn-style btn-dark" href="./signup.php">Open rekening</a>
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
                        <p class="desc">Bij het registreren moet er nog bevestigd worden via mail.</p>
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
                        <p class="desc">Wanneer alles in orde is kunt u beginnen met bankieren door uw eerste overschrijving te doen.</p>
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
<?php include 'footer.php'?>
</body>
</html>
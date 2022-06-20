<?php
  include 'connection.php';
  include 'functions.php';
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
  <?php include 'menu.php' ?>
</div>
<section class="w3l-breadcrumb">
    <div class="container">
        <ul class="breadcrumbs-custom-path">
            <li><a href="index.php">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span>Contacteer ons</li>
        </ul>
    </div>
</section>
<div class="w3l-contact-info py-5" id="contact">
    <div class="container py-lg-5 py-md-4">
        <div class="title text-center">
            <h3 class="title-big">Neem contact met ons op</h3>
            <p class="mt-2 mx-lg-5">Heeft u vragen over onze service of wilt u meer informatie ? Contacteer ons dan meteen.</p>
        </div>
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="align-self mt-lg-0 mt-md-5 mt-4">
                <div class="contact-infos">
                    <div class="single-contact-infos">
                        <div class="icon-box"> <span class="fa fa-map-marker"></span></div>
                        <div class="text-box">
                            <h3 class="mb-1">Adres info</h3>
                            <p>SLCB, Steendam 27, 9000 Gent</p>
                        </div>
                    </div>
                    <div class="single-contact-infos">
                        <div class="icon-box"> <span class="fa fa-phone"></span></div>
                        <div class="text-box">
                            <h3 class="mb-1">Bel ons</h3>
                            <p><a href="tel:+1(21) 234 4567">(+32)9 225 89 07</a></p>
                        </div>
                    </div>
                    <div class="single-contact-infos">
                        <div class="icon-box"> <span class="fa fa-envelope"></span></div>
                        <div class="text-box">
                            <h3 class="mb-1">Email ons</h3>
                            <p> <a href="mailto:info@support.com">info@GECbanking.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 map">
                
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10031.103233436736!2d3.7295898!3d51.0572273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf81310ae149dae63!2sSint-Lievenscollege%20Business!5e0!3m2!1snl!2sbe!4v1648033017022!5m2!1snl!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>"
                    
            </div>
            <div class="col-lg-6 form-inner-cont mt-lg-0 mt-sm-5 mt-4">
                <form  method="post" class="signin-form">
                    <div class="form-input">
                        <input type="text" name="Name" id="w3lName" placeholder="Naam" required>
                    </div>
                    <div class="form-input">
                        <input type="email" name="Sender" id="w3lSender" placeholder="e-mailadres"
                            required="">
                    </div>
                    <div class="form-input">
                        <textarea name="Message" id="w3lMessage" placeholder="Bericht" required=""></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="verzenden" class="btn btn-style btn-primary">Verzenden</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 <!-- footer -->
 <?php include 'footer.php'?>
</body>

</html>
<?php
if (isset($_POST['verzenden'])) {
    $onderwerp = "GAC Support";
    $bericht = "Dag " . $_POST['Name'] . " \n\n Wij hebben uw aanvraag succesvol ontvangen. \n Aarzel niet om deze e-mail te beantwoorden indien u nog met vragen zit. Hieronder is een kopie van uw bericht te zien: \n\n  " . $_POST['Message'] . "\n\n  Het GAC Team";
    verstuurMail($_POST['Name'], $_POST['Sender'], $bericht, $onderwerp);
    verstuurMail($_POST['Name'], "gac_banking@yahoo.com", $_POST['Message'], $onderwerp);
}
?>
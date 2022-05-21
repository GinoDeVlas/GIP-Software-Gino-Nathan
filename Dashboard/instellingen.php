<?php
include("../connection.php");
include("../functions.php");
$user_data = check_login($conn);

$fout = "*";
  if (isset($_POST["oudww"])) {

    $query = "select * FROM `tblklantengegevens` where IDKlantenummer  = '" .$_SESSION['id']. "' LIMIT 1; ";
    $result = mysqli_query($conn,$query);
    $info = mysqli_fetch_array($result);
    $id = $info['IDKlantenummer'];
    $passhash = $info['Wachtwoord'];
    $pass = $_POST["oudww"];
    $Passw = "GEC" . $id . $pass;
    if (password_verify($Passw, $passhash)) {
      VeranderAlgemeneInstellingen($_POST["Vnaam"], $_POST["Anaam"], $_POST["Email"], $_POST["nieuwww"], $conn);
    }else {
      $fout = "Onjuist wachtwoord";
    }
  }
  $query = "select * FROM `tblklantengegevens` where IDKlantenummer  = '" .$_SESSION['id']. "' LIMIT 1; ";
  $result = $conn->query($query);
  $info = mysqli_fetch_array($result);
  if ($info['Activaite2FA']=='1') {
    $_SESSION['2fa'] = "1";
    $actiefofnie="2FA is geactiveerd!";
    $stylel = "pointer-events: none;background: white;color: #614da7;border: 10;border: 2px solid #614da7;";
    $styler = "";
}else {
  $_SESSION['2fa'] = "0";
  $actiefofnie="2FA is nog niet geactiveerd!";
  $stylel = "";
  $styler = "pointer-events: none;background: white;color: #614da7;border: 10;border: 2px solid #614da7;";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard overview | Instellingen </title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <!-- Boxicons CDN Link -->
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name"> GAC</span>
    </div>
      <ul class="nav-links">
      <li>
          <a href="../dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Mijn Rekeningen</span>
          </a>
        </li>
        <li>
          <a href="./transacties.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Transacties</span>
          </a>
        </li>
        <li>
          <a href="./overschrijven.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Overschrijven</span>
          </a>
        </li>
        <li>
          <a href="./leningen.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Leningen</span>
          </a>
        </li>
        <li>
          <a href="./beleggen.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Beleggen</span>
          </a>
        </li>
        <li>
          <a href="./instellingen.php" class="active">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Instellingen</span>
          </a>
        </li>
        <li class="log_out">
        <a href="../Dashboard/logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Uitloggen</span>
          </a>
        </li>
      </ul>
  </div>
<section class="home-section">
  <nav>
    <div class="sidebar-button">
      <i class='bx bx-menu sidebarBtn'></i>  
      <!-- Script voor de welkom message (bv:goeie avond) -->
      <?php
        // I'm India so my timezone is Asia/Calcutta
        date_default_timezone_set('Europe/Brussels');

        // 24-hour format of an hour without leading zeros (0 through 23)
        $Hour = date('G');
        $id =  $_SESSION['id'];
        $query = "select * FROM `tblklantengegevens` where IDKlantenummer = ". $id ." LIMIT 1; ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $voornaam = $row['Voornaam'];

      if ( $Hour >= 5 && $Hour <= 11 ) {
    echo "Goede morgen " . $row['Voornaam'];
      } else if ( $Hour >= 12 && $Hour <= 18 ) {
    echo "Goede middag ". $row['Voornaam'];
      } else if ( $Hour >= 19 || $Hour <= 4 ) {
    echo "Goede avond " . $row['Voornaam'];
  }
  ?>
    <span class="dashboard"></span>
      </div>
    </nav>
    <div class="home-content">
      <div class="sales-boxes">
        <div class="transactions box">
          <div class="title">Account</div>
          <div class="sales-details">
            <ul class="details">
              <form action="" method="POST">
              <li>Voornaam:</li>
              <li><input type="text" name="Vnaam" value="<?php echo $row['Voornaam'];?>"></li>
              <li>Achternaam:</li>
              <li><input  type="text" name="Anaam" value="<?php echo $row['Achternaam'];?>"></li>
              <li><input class="instbutton" type="submit" name="btnbevestig" style="padding-inline: 138px;" value="Verander"></li>
            </ul>
            <ul class="details">
              <li>Nieuw wachtwoord:</li>
              <li><input  type="password" name="nieuwww" value=""></li>
              <li>Bevestig met huidig Wachtwoord:</li> 
              <li><input type="password" name="oudww" value=""></li> <?php echo $fout; ?>
          </ul>
          </div>
        </div>
      </div></form>
      <br></br>
      <div class="sales-boxes">
        <div class="transactions box">
          <div class="title">Beveiliging</div>
          <div class="sales-details">
            <ul class="details">
            <form action="" method="POST">
              <li id="stand0"><b><?php echo $actiefofnie ?></b></li>
              <li id="stand">Twee factor authenticatie (2FA) is een extra beveiliging die je aan je account toevoegd wanneer je inlogt.</li>
              <li><input class="instbutton" type="submit" <?php echo "style='padding-inline: 35px;$stylel'"?> name="btnactivate2FA" value="Activeer 2FA" onclick="" > &nbsp;&nbsp; <input class="instbutton" type="submit" <?php echo "style='padding-inline: 35px;$styler'"?> name="btndeactivate2FA" value="Deactiveer 2FA" onclick="" ></li>
              <!-- Er moet hier nog iets kome of te check of de user 2FA als heeft ne keer geactiveerd of niet of het de eerste keer is -->
              <?php 
              if ($_SESSION['2fa']=='1') {
                  $actiefofnie="2FA is geactiveerd!";
              }
              else  {
                  $actiefofnie="2FA is nog niet geactiveerd!";
              
                    if (isset($_POST["btnactivate2FA"])) {
                    echo "<script> document.getElementById('stand').style.display='none'; </script>";
                    echo "<li id='stand1' class='topic'>De koppeling van 2FA met uw account</li>";
                    echo "<li id='stand1'>Volg onderstaande stappen om 2FA te koppelen met uw account.</li>";
                    ShowQR();
                    echo "<li id='stand1'>1. Open uw Google Authenticator App. <br> 2. Druk op het '+' icoon in de rechter bovenhoek. <br> 3. En kies dan voor 'Scan Barcode'.</li>";
                    echo "<li id='stand1'> <br> <input class='instbutton' type='submit' style='padding-inline: 35px;' name='btnvalidate2FA' value='Valideer' onclick=''></li>";
                    }
                    elseif (isset($_POST["btndeactivate2FA"])) {
                      echo "<script> document.getElementById('stand1').style.display='none'; </script>";
                      echo "<script> document.getElementById('stand').style.display='none'; </script>";
                      echo "<li id='stand2'>Twee factor authenticatie is gedeactiveerd.</li>";
                    }
                    elseif (isset($_POST["btnvalidate2FA"])) {
                      echo "<script> document.getElementById('stand2').style.display='none'; </script>";
                      echo "<script> document.getElementById('stand1').style.display='none'; </script>";
                      echo "<script> document.getElementById('stand').style.display='none'; </script>";
                      echo "<li id='stand3' class='topic'>Valideer 2FA</li>";
                      echo "<li id='stand3'>Vul hier de code van zes cijfers in";
                      echo "<li><input type='number' name='pin' min='000000' max='999999' placeholder='Pin'></li>";
                      echo "<li id='stand3'> <input class='instbutton' type='submit' style='padding-inline: 15px;' name='submit-pin' value='Valideer'> &nbsp;&nbsp;  <input class='instbutton' type='submit' style='padding-inline: 15px;' name='btncancel2FAval' value='Annuleer'></li>";
                      if (isset($_POST['submit-pin'])) {
                        ValiQR($_POST['submit-pin']);

                      }
                      elseif (isset($_POST['btncancel2FAval'])) {
                        echo "<script> document.getElementById('stand3').style.display='none'; </script>";
                        echo "<script> document.getElementById('stand2').style.display='none'; </script>";
                        echo "<script> document.getElementById('stand1').style.display='none'; </script>";
                        echo "CANCEL BUTTON IS GEACTIVEERD";
                      }
                    }}
               ?>
            </ul>
            <ul class="details">
            <li class="topic"></li>
            <li></li>
          </ul>
          <ul class="details">
            <li class="topic"></li>
            <li></li>
          </ul>
          <ul class="details">
            <li class="topic"></li>
            <li></li>
          </ul>
          </div>
        </div>
      </div></form>
      <br></br>
    </div>
    <br></br>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

<?php
if (isset($_POST['submit-pin'])) {
  if (ValiQR($_POST["pin"], $_SESSION['id'], $conn)) {
    activeer2FA($conn);
    echo '<script type="text/javascript">
    $(document).ready(function() {
    swal({
        title: "goed!",
        text: "2FA in ingeschakeld",
        icon: "success",
        button: "Ok",
        timer: 200000
        });
    });
</script>' ;
echo "<script>
setTimeout(function () {    
    window.location.href = 'https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/Dashboard/instellingen.php'; 
},3000); // 5 seconds
</script>";
}else {
  echo '<script type="text/javascript">
  $(document).ready(function() {
  swal({
      title: "fout!",
      text: "pin is verkeerd of er is iets fout gelopen!",
      icon: "error",
      button: "Ok",
      timer: 200000
      });
  });
</script>' ;
}
}

if (isset($_POST['btndeactivate2FA'])) {
  deActiveer2FA($conn);
  echo '<script type="text/javascript">
  $(document).ready(function() {
  swal({
      title: "2FA!",
      text: "p2FA is gedactiveerd!",
      icon: "succes",
      button: "Ok",
      timer: 200000
      });
  });
</script>' ;
  echo "<script>
  setTimeout(function () {    
      window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/Dashboard/instellingen.php'; 
  },4000); // 5 seconds
  </script>";
}

?>

<?php


include("../connection.php");
include("../functions.php");
$user_data = check_login($conn);
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard overview | Banking met GAC </title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <!-- Boxicons CDN Link -->
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
          <a href="./stock.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li>
          <a href="./beleggen.php" class="active">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Beleggen</span>
          </a>
        </li>
        <li>
          <a href="./instellingen.php">
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
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Rekeningsnummer</div>
            <?php
              $query = "select * FROM `tblrekening` where IDKlantenummer = ". $id ." LIMIT 1; ";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_array($result);
            ?>
            <div class="indicator">
            <span class="textspecial"> <?php echo $row['IDRekeningnummer']; ?> </span>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
          <div class="box-topic"> Saldo: </div>
            <div class="box-topic"><?php echo $row['saldo']; ?> euro</div>
            <div class="indicator">
            <span class="textspecial"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="sales-boxes">
        <div class="transactions box" style="width: 100%;">
          <div class="title">Beleggen?</div>
          <div class="sales-details">
            <ul class="details">
              <li>Wilt u jaarlijks een vast bedrag beleggen? Dat kan al vanaf 500 euro per jaar.</li>
              <li>De belegging gaat op lang termijn tonen hoeveel je rendement hebt. U krijgt jaarlijks een gemiddeld rendement van 10%.</li>
              <li><input class="instbutton" style="position: relative;padding-inline:20px;" type="submit" name="btnlening" value="Start met beleggen"></li>
            </ul>
          </div>
        </div>
      </div>
    <div class="home-content" style="padding-top: 10px;">
      <div class="sales-boxes" style="justify-content:normal;">
      <div class="transactions box" >
          <!-- Zet hier if statement voor als ge wilt beleggen door op volgende button de duwen -->
          <div class="title">Beleggen</div>
          <div class="sales-details">
            <ul class="details">
              <form action="" method="POST">
              <li>Stel je beleggingsopdracht in:</li>
              <li><input type="number" min="500" style="width:50%;text-align:right" name="Krediet" placeholder="EUR" required></li>
              <li><input class="instbutton" style="position: relative;padding-inline:30px;" type="submit" name="btnlening" value="Begin"></li>
              <li>Bovenstaande bedrag wordt van uw rekening gerekend.</li>
            </ul>
            </form>
          </div>
        </div>
        <div class="transactions box" style="height:fit-content;">
          <!-- Zet hier if statement voor als ge wilt beleggen door op volgende button de duwen -->
          <div class="title">Uw actieve belegging</div>
          <div class="sales-details">
            <ul class="details">
              <form action="" method="POST">
              <li font="">U heeft een actieve belegging van</li>
              <div class="bedragmaandelijks">
              <!-- Plaats hier php variable voor berekening aantal geld per maand -->
              <li style="font-size:30px;"><img style="max-width:60px;left:110px;position:relative;" src="../assets/images/cash.png" align="left" alt=""> <b>469,97 EUR</b></li>
              </div>
              <li>Text</li>
              <div class="range-wrap">
              <li></li>
            </ul>
            </form>
          </div>
        </div>
      </div>
    </div>

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

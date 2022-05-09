<?php


include("../connection.php");
include("../functions.php");
$user_data = check_login($conn);
?>
<!DOCTYPE html>
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
          <a href="./leningen.php" class="active">
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
          <a href="./beleggen.php">
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
    echo "Goede morgen " . $row['Voornaam'] . " " . $row['Achternaam'];
      } else if ( $Hour >= 12 && $Hour <= 18 ) {
    echo "Goede middag ". $row['Voornaam'] . " " . $row['Achternaam'];
      } else if ( $Hour >= 19 || $Hour <= 4 ) {
    echo "Goede avond " . $row['Voornaam'] . " " . $row['Achternaam'];
  }
  
      ?>
<span class="dashboard"></span>
      </div>
    </nav>
    <div class="home-content">
      <div class="sales-boxes">
        <div class="transactions box">
          <div class="title">Leen bij ons</div>
          <div class="sales-details">
            <ul class="details">
              <li>Ga een lening aan bij onze bank</li>
              <li>Kies bij uw lening de looptijd en krijg een overzicht met alle relevante informatie.</li>
            </ul>
          </div>
        </div>
      </div>
    <div class="home-content" style="padding-top: 10px;">
      <div class="sales-boxes">
        <div class="transactions box">
          <div class="title">Hoeveel wil je lenen?</div>
          <div class="sales-details">
            <ul class="details">
              <form action="" method="POST">
              <li>Totaal kredietbedrag:</li>
              <!-- Maak hier een functie voor alleen nummer en erros show wanneer niet getal is! -->
              <li><input type="text" style="width:50%;text-align:right" name="Krediet" placeholder="EUR"></li>
              <li>Looptijd in jaren</li>
              <br>
              <li>
              <div class="range-wrap">
                <div class="range-value" id="rangeV"></div>
                <input id="range" type="range" min="5" max="25" value="15" step="1">
                  <p style="float:left;color:grey">5 jaar</p>
                  <p style="float:right;color:grey">25 jaar</p>
                  </div>
                <script>
              const  range = document.getElementById('range'),
  rangeV = document.getElementById('rangeV'),
  setValue = ()=>{
    const  newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) ),
      newPosition = 10 - (newValue * 0.2);
    rangeV.innerHTML = `<span>${range.value}</span>`;
    rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
  };
document.addEventListener("DOMContentLoaded", setValue);
range.addEventListener('input', setValue);
                </script>
              </li>
            </ul>
            <ul class="details">
            <li>TEST</li>
            <li>TEST</li>
              
          </ul>
          <ul class="details">
            <li>Random text</li>
          </ul></form>
          </div>
        </div>
      </div>
      <br></br>

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

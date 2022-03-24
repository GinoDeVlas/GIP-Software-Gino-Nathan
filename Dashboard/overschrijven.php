<?php


include("../connection.php");
include("../functions.php");
$user_data = check_login($conn);
$fout = "*";
  if (isset($_POST['ontvanger']) && isset($_POST['Bedrag']) && isset($_POST['Communicatie'])) {
    $ontvanger = $_POST['ontvanger'];
    $Bedrag = $_POST['Bedrag'];
    $communicatie = $_POST['Communicatie'];
    Verrichting($Bedrag, $ontvanger, $communicatie, $conn);
  
      $query = "select * FROM `tblmyklant` where IDRekekingnummer  = '" . $ontvanger . "' LIMIT 1; ";
      $result = mysqli_query($conn,$query);
      while ($data = mysqli_fetch_array($result)) {
          $receiverid = $data['IDKlantenummer'];
      }
      $id = $_SESSION['id'];
      if (isset($receiverid)) {
          if ($id == $receiverid) {
              $fout = "Je kan geen geld naar jezelf sturen";
          }
        }
      }
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
          <a href="./overschrijven.php" class="active">
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
        <a href="../logout.php">
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
    echo "Goede morgen " . $row['Klantennaam'];
      } else if ( $Hour >= 12 && $Hour <= 18 ) {
    echo "Goede middag " . $row['Klantennaam'];
      } else if ( $Hour >= 19 || $Hour <= 4 ) {
    echo "Goede avond " . $row['Klantennaam'];
  }
  
      ?>
<span class="dashboard"></span>
  </div>
    </nav>
    <div class="home-content">
    <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic"> Mijn Rekeningsnummer</div>
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
            <span class="textspecial">  </span>
            </div>
          </div>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="transactions box">
          <div class="title">Nieuwe overschrijving</div> <br>
          <div style="margin: auto;">
          <form method="POST" >
            <input type="text" name="ontvanger" placeholder="Rekeningsnummer ontvanger" size="60vw" style='font-size: 15pt' required> <?php echo $fout  ?><br><br>
            <input type="text" name="Bedrag" placeholder="Bedrag" size="60%" style='font-size: 15pt' required><br><br>
            <textarea id="w3review" name="Communicatie" rows="4" cols="59" size="60%" placeholder="Communicatie" style='font-size: 15pt'> communicatie </textarea>
            <div class="button">
            <button type="submit" class="overschrijvingbutton">verzend</button>

          </div>
          </form>
          </div>
        </div>
      </div>
    </div>
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

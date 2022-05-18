<?php


include("../connection.php");
include("../functions.php");
$user_data = check_login($conn);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard overview | Transacties </title>
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
          <a href="./transacties.php" class="active">
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
          <a class="transactielink" href="./overschrijven.php">
          <div class="right-side">
            <div class="box-topic">Nieuwe overschrijving</div>
            <div class="indicator">
            <span class="textspecial">  </span>
            </div>
          </div></a>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="transactions box" style="width:100%">
          <div class="title">Recente transacties</div>
          <div class="sales-details">
            <ul class="details">
            <li class="topic">Datum</li>
              <?php
                $query = "select * FROM `tbloverschrijving` where IDKlantenummer = ". $id ." OR Ontvanger = ". $id ." ORDER BY `Datum`  DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                  if ($row['Ontvanger'] == $id) {
                    echo "<li><a style='color: green;'>" . $row['Datum'] . "</a></li>";
                  }else {
                    echo "<li><a style='color: red;'>" . $row['Datum'] . "</a></li>";
                  }                  
                } 
              ?>
            </ul>
            <ul class="details">
            <!-- Hier moet er een script komen voor alle overschrijven te printen -->
            <li class="topic">Naam ontvanger</li>
            <?php
                $query = "select * FROM `tbloverschrijving` where IDKlantenummer = ". $id ." OR Ontvanger = ". $id ." ORDER BY `Datum`  DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                  $ontvangerid = $row['IDKlantenummer'];
                  $queryy = "select * FROM `tblklantengegevens` where IDKlantenummer = ". $ontvangerid. " LIMIT 1; ";
                  $resultt = mysqli_query($conn, $queryy);
                  $rij = mysqli_fetch_array($resultt);
                  if ($row['Ontvanger'] == $id) {
                    echo "<li><a style='color: green;'>" . ucfirst($rij['Voornaam']) . " " . ucfirst($rij['Achternaam']) .  "</a></li>";
                  }else {
                    echo "<li><a style='color: red;'>". ucfirst($rij['Voornaam']) . " " . ucfirst($rij['Achternaam']) .  "</a></li>";
                  }
                } 
              ?>
          </ul>
            <ul class="details">
            <!-- Hier moet er een script komen voor alle overschrijven te printen -->
            <li class="topic">Naam ontvanger</li>
            <?php
                $query = "select * FROM `tbloverschrijving` where IDKlantenummer = ". $id ." OR Ontvanger = ". $id ." ORDER BY `Datum`  DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                  $ontvangerid = $row['Ontvanger'];
                  $queryy = "select * FROM `tblklantengegevens` where IDKlantenummer = ". $ontvangerid. " LIMIT 1; ";
                  $resultt = mysqli_query($conn, $queryy);
                  $rij = mysqli_fetch_array($resultt);
                  if ($row['Ontvanger'] == $id) {
                    echo "<li><a style='color: green;'>" . ucfirst($rij['Voornaam']) . " " . ucfirst($rij['Achternaam']) .  "</a></li>";
                  }else {
                    echo "<li><a style='color: red;'>". ucfirst($rij['Voornaam']) . " " . ucfirst($rij['Achternaam']) .  "</a></li>";
                  }
                } 
              ?>
          </ul>
          <ul class="details">
            <li class="topic">Bedrag</li>
            <?php
                $query = "select * FROM `tbloverschrijving` where IDKlantenummer = ". $id ." OR Ontvanger = ". $id ." ORDER BY `Datum`  DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                  if ($row['Ontvanger'] == $id) {
                    echo "<li><a style='color: green;'>" . $row['Hoeveelheid'] . "</a></li>";
                  }else {
                    echo "<li><a style='color: red;'>" . $row['Hoeveelheid'] . "</a></li>";
                  }
                } 
              ?>
          </ul>
          <ul class="details">
            <li class="topic">Communicatie</li>
            <?php
                $query = "select * FROM `tbloverschrijving` where IDKlantenummer = ". $id ." OR Ontvanger = ". $id ." ORDER BY `Datum`  DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                  if ($row['Ontvanger'] == $id) {
                    echo "<li><a style='color: green;'>" . $row['Comunicatie'] . "</a></li>";
                  }else {
                    echo "<li><a style='color: red;'>" . $row['Comunicatie'] . "</a></li>";
                  }
                } 
              ?>
          </ul>
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

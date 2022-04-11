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
          <a href="./instellingen.php" class="active">
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
        $voornaam = $row['Voornaam'];

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
          <div class="title">Account</div>
          <div class="sales-details">
            <ul class="details">

              <li class="topic">Profiel</li>
              <li>Voornaam:</li>
              <li><input type="text" name="txtvoor" value="<?php echo $row['Voornaam'];?>"></li>
              <li>Achternaam:</li>
              <li><input type="text" name="txtachter" value="<?php echo $row['Achternaam'];?>"></li>
            </ul>
            <ul class="details">
              <li class="topic"><br></li>
            <!-- Hier moet er een script komen voor alle overschrijven te printen -->
              <li>Nieuw wachtwoord:</li>
              <li><input type="password" name="txtww" value=""></li>
              <li>Bevestig met huidig Wachtwoord:</li>
              <li><input type="password" name="txtww" value=""></li>
              
          </ul>
          <ul class="details">
            <li class="topic"><br></li>
            <li>Email:</li>
            <li><input type="text" name="txtmail" value="<?php echo $row['Email'];?>"></li>
            <li><br></li>
            <input class="instbutton" type="submit" name="btncancel" value="Annuleer"><input class="instbutton" type="submit" name="btnbevestig" value="Bevestig">
          </ul>
          </div>
        </div>
      </div>
      <br></br>
      <div class="sales-boxes">
        <div class="transactions box">
          <div class="title"></div>
          <div class="sales-details">
            <ul class="details">
              <!-- Hier moet er een script komen voor alle overschrijven te printen -->
              <li class="topic">Beveiliging</li>
              <li></li>
            </ul>
            <ul class="details">
            <!-- Hier moet er een script komen voor alle overschrijven te printen -->
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
      </div>
      <br></br>
      <div class="sales-boxes">
        <div class="transactions box">
          <div class="title"></div>
          <div class="sales-details">
            <ul class="details">
              <!-- Hier moet er een script komen voor alle overschrijven te printen -->
              <li class="topic">Account</li>
              <li>Email:</li>
              <li><input type="text" name="txtmail" value="variable@example.be"></li>
              <li>Naam:</li>
              <li><input type="text" name="txtusr" value="variable"></li>
              <li>Wachtwoord:</li>
              <li><input type="password" name="txtww" value=""></li>
              <li>Bevestig Wachtwoord:</li>
              <li><input type="password" name="txtww" value=""></li>
              <input type="submit" name="btncancel" value="Annuleer"> <input type="submit" name="btnbevestig" value="Bevestig">
            </ul>
            <ul class="details">
            <!-- Hier moet er een script komen voor alle overschrijven te printen -->
            <li class="topic">Naam</li>
            <li><a href="#">Alex Doe</a></li>
            <li><a href="#">David Mart</a></li>
            <li><a href="#">Roe Parter</a></li>
            <li><a href="#">Diana Penty</a></li>
            <li><a href="#">Martin Paw</a></li>
            <li><a href="#">Doe Alex</a></li>
            <li><a href="#">Aiana Lexa</a></li>
            <li><a href="#">Rexel Mags</a></li>
             <li><a href="#">Tiana Loths</a></li>
          </ul>
          <ul class="details">
            <li class="topic">bedrag</li>
            <li><a href="#">$204.98</a></li>
            <li><a href="#">$24.55</a></li>
            <li><a href="#">$25.88</a></li>
            <li><a href="#">$170.66</a></li>
            <li><a href="#">$56.56</a></li>
            <li><a href="#">$44.95</a></li>
            <li><a href="#">$67.33</a></li>
             <li><a href="#">$23.53</a></li>
             <li><a href="#">$46.52</a></li>
          </ul>
          <ul class="details">
            <li class="topic">comunicatie</li>
            <li><a href="#">$204.98</a></li>
            <li><a href="#">$24.55</a></li>
            <li><a href="#">$25.88</a></li>
            <li><a href="#">$170.66</a></li>
            <li><a href="#">$56.56</a></li>
            <li><a href="#">$44.95</a></li>
            <li><a href="#">$67.33</a></li>
             <li><a href="#">$23.53</a></li>
             <li><a href="#">$46.52</a></li>
          </ul>
          </div>
        </div>
      </div>
      <br></br>
      <div class="sales-boxes">
        <div class="transactions box">
          <div class="title"></div>
          <div class="sales-details">
            <ul class="details">
              <!-- Hier moet er een script komen voor alle overschrijven te printen -->
              <li class="topic">Account</li>
              <li>Email:</li>
              <li><input type="text" name="txtmail" value="variable@example.be"></li>
              <li>Naam:</li>
              <li><input type="text" name="txtusr" value="variable"></li>
              <li>Wachtwoord:</li>
              <li><input type="password" name="txtww" value=""></li>
              <li>Bevestig Wachtwoord:</li>
              <li><input type="password" name="txtww" value=""></li>
              <input type="submit" name="btncancel" value="Annuleer"> <input type="submit" name="btnbevestig" value="Bevestig">
            </ul>
            <ul class="details">
            <!-- Hier moet er een script komen voor alle overschrijven te printen -->
            <li class="topic">Naam</li>
            <li><a href="#">Alex Doe</a></li>
            <li><a href="#">David Mart</a></li>
            <li><a href="#">Roe Parter</a></li>
            <li><a href="#">Diana Penty</a></li>
            <li><a href="#">Martin Paw</a></li>
            <li><a href="#">Doe Alex</a></li>
            <li><a href="#">Aiana Lexa</a></li>
            <li><a href="#">Rexel Mags</a></li>
             <li><a href="#">Tiana Loths</a></li>
          </ul>
          <ul class="details">
            <li class="topic">bedrag</li>
            <li><a href="#">$204.98</a></li>
            <li><a href="#">$24.55</a></li>
            <li><a href="#">$25.88</a></li>
            <li><a href="#">$170.66</a></li>
            <li><a href="#">$56.56</a></li>
            <li><a href="#">$44.95</a></li>
            <li><a href="#">$67.33</a></li>
             <li><a href="#">$23.53</a></li>
             <li><a href="#">$46.52</a></li>
          </ul>
          <ul class="details">
            <li class="topic">comunicatie</li>
            <li><a href="#">$204.98</a></li>
            <li><a href="#">$24.55</a></li>
            <li><a href="#">$25.88</a></li>
            <li><a href="#">$170.66</a></li>
            <li><a href="#">$56.56</a></li>
            <li><a href="#">$44.95</a></li>
            <li><a href="#">$67.33</a></li>
             <li><a href="#">$23.53</a></li>
             <li><a href="#">$46.52</a></li>
          </ul>
          </div>
        </div>
      </div>
      <br></br>
      <div class="sales-boxes">
        <div class="transactions box">
          <div class="title"></div>
          <div class="sales-details">
            <ul class="details">
              <!-- Hier moet er een script komen voor alle overschrijven te printen -->
              <li class="topic">Account</li>
              <li>Email:</li>
              <li><input type="text" name="txtmail" value="variable@example.be"></li>
              <li>Naam:</li>
              <li><input type="text" name="txtusr" value="variable"></li>
              <li>Wachtwoord:</li>
              <li><input type="password" name="txtww" value=""></li>
              <li>Bevestig Wachtwoord:</li>
              <li><input type="password" name="txtww" value=""></li>
              <input type="submit" name="btncancel" value="Annuleer"> <input type="submit" name="btnbevestig" value="Bevestig">
            </ul>
            <ul class="details">
            <!-- Hier moet er een script komen voor alle overschrijven te printen -->
            <li class="topic">Naam</li>
            <li><a href="#">Alex Doe</a></li>
            <li><a href="#">David Mart</a></li>
            <li><a href="#">Roe Parter</a></li>
            <li><a href="#">Diana Penty</a></li>
            <li><a href="#">Martin Paw</a></li>
            <li><a href="#">Doe Alex</a></li>
            <li><a href="#">Aiana Lexa</a></li>
            <li><a href="#">Rexel Mags</a></li>
             <li><a href="#">Tiana Loths</a></li>
          </ul>
          <ul class="details">
            <li class="topic">bedrag</li>
            <li><a href="#">$204.98</a></li>
            <li><a href="#">$24.55</a></li>
            <li><a href="#">$25.88</a></li>
            <li><a href="#">$170.66</a></li>
            <li><a href="#">$56.56</a></li>
            <li><a href="#">$44.95</a></li>
            <li><a href="#">$67.33</a></li>
             <li><a href="#">$23.53</a></li>
             <li><a href="#">$46.52</a></li>
          </ul>
          <ul class="details">
            <li class="topic">comunicatie</li>
            <li><a href="#">$204.98</a></li>
            <li><a href="#">$24.55</a></li>
            <li><a href="#">$25.88</a></li>
            <li><a href="#">$170.66</a></li>
            <li><a href="#">$56.56</a></li>
            <li><a href="#">$44.95</a></li>
            <li><a href="#">$67.33</a></li>
             <li><a href="#">$23.53</a></li>
             <li><a href="#">$46.52</a></li>
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

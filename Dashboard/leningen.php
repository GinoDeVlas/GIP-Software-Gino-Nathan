<?php
session_start();
include("../connection.php");
include("../functions.php");
$user_data = check_login($conn);

$termijnbedrag = $interesten = $verschuldigd = "0,00 EUR";
$lblur = $rblur  = 0;
$textT = $TextB = "";

  $id = $_SESSION['id'];
  $query = "select * FROM `tblrekening` where IDKlantenummer = '" .$id. "';";
  $result = mysqli_query($conn,$query);
  $info = mysqli_fetch_array($result);


if (isset($_POST['leningstarten'])) {
  if ($info['saldo']> -1) {
  $ID = $_SESSION['id'];
  $termijnbedrag = berkenTermijnBedrag($_POST['Krediet'], $_POST['range'], $_POST['uitstel']);
  $looptijd =$_POST['range'];
  $Leenbedrag =$_POST['Krediet'];
  Leningstarten($ID, $termijnbedrag, $looptijd, $Leenbedrag, $conn);
  $Lstyle='filter: blur(10px);pointer-events: none;';
  $Rstyle='';
  $textT = "<div>";
  $TextB = "</div>";}
}

if (isset($_POST['btnlening'])) {
  $Leenbedrag = $_POST['Krediet'];
  $uitstel = $_POST['uitstel'];
  $looptijd = $_POST['range'];
  $nn = $looptijd *12;
  $termijnbedrag = berkenTermijnBedrag($Leenbedrag, $looptijd, $uitstel);
  $einbedrag = berekenEindbedrag($termijnbedrag,$looptijd);
  $interest = ($termijnbedrag * $nn-$Leenbedrag);
}else{
$Leenbedrag = "1000";
$uitstel = "0";
$looptijd = "15";}
$id = $_SESSION['id'];
$query = "select * FROM `tblLeningen` where IDKlantennummer = '".$id."';";
 $result = mysqli_query($conn,$query);
 $count =mysqli_num_rows($result);
if($count > 0)
{
$Lstyle='filter: blur(10px);pointer-events: none;';
$Rstyle='';
$textT = "<div>";
$TextB = "</div>";
$ltextT = "<div style='position: relative;'><div style='text-align: center;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);z-index: 99;max-width: 34rem;text-align: center;font-size: 30px;'><b>U heeft al een openstaande lening</b></div>";
$lTextB = "</div></div>";
}else {
$Lstyle='';
$Rstyle='filter: blur(10px);pointer-events: none;';
$textT = "<div style='position: relative;'><div style='text-align: center;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);z-index: 99;max-width: 34rem;text-align: center;font-size: 30px;'><b>U heeft nog geen openstaande lening</b></div>";
$TextB = "</div></div>"; 
$ltextT = "<div>";
$lTextB = "</div>";
}

if (isset($_POST['leningstop'])) {
  $id = $_SESSION['id'];
  $query = "select * FROM `tblLeningen` where `IDKlantennummer`  = '" . $id . "' LIMIT 1; ";
  $result = mysqli_query($conn,$query);
  $data = mysqli_fetch_array($result);
    $aantalmaanden = maandenverschil($data['Leendatum'], $conn);
    $termijnbedrag = $data['Termijnbedrag']; 
    $nogverschuldigd = berekenEindbedrag($termijnbedrag, $data['Looptijd']) - ($termijnbedrag * $aantalmaanden);
  Leningstop($nogverschuldigd, $conn);
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard overview | Leningen </title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <!-- Boxicons CDN Link -->
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php   
  if ($info['saldo']<"0") {
    echo '<script type="text/javascript">
    $(document).ready(function() {
    swal({
        title: "fout!",
        text: "u kunt geen lening aangaan als u negatief staat!!",
        icon: "error",
        button: "Ok",
        timer: 200000
        });
    });
</script>' ;
echo "<script>
setTimeout(function () {    
    window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/dashboard.php'; 
},2500); // 5 seconds
</script>";
  } ?>
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
        <div class="overview-boxes">
        <div class="box">
            <?php
              $query = "select * FROM `tblrekening` where IDKlantenummer = ". $id ." LIMIT 1; ";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_array($result);
            ?>
          <div class="right-side">
          <div class="box-topic"> Saldo: </div>
            <div class="box-topic"><?php echo $row['saldo']; ?> euro</div>
            <div class="indicator">
            <span class="textspecial"></span>
            </div>
          </div>
        </div>
      </div>
      </div>

    <div class="home-content" style="padding-top: 10px;">
      <div class="sales-boxes">
          <?php
          echo $ltextT;
          echo "<div class='transactions box' style='".$Lstyle."'>"; ?>
          <div class="title">Hoeveel wil je lenen?</div>
          <div class="sales-details">
            <ul class="details">
              <form action="" method="POST">
              <li>Totaal kredietbedrag:</li>
              <!-- Maak hier een functie voor alleen nummer en erros show wanneer niet getal is! -->
              <li><input type="number" min="500" style="width:50%;text-align:right" name="Krediet" placeholder="EUR" Value=<?php echo $Leenbedrag; ?> required></li>
              <li>Aantal maanden uitstel:</li>
              <li><input type="number" min="0" max="10" style="width:50%;text-align:right" name="uitstel" placeholder="EUR" value=<?php echo $uitstel;?> required></li>
              <li>Looptijd in jaren</li>
              <li>
              <div class="range-wrap">
                <div class="range-value" id="rangeV"></div>
                <input id="range" type="range" name="range" min="5" max="25" value= <?php echo $looptijd; ?> step="1">
                  <p style="float:left;color:grey">5 jaar</p>
                  <p style="float:right;color:grey">25 jaar</p>
                  </div>
                <script>
                const  range = document.getElementById('range'),
                rangeV = document.getElementById('rangeV'),
                setValue = ()=>{
                  const  newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) ),
                    newPosition = 10 - (newValue * 0.2);
                    
                  rangeV.innerHTML = `<span>${range.value}&nbsp;jaar</span>`;
                  rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
                };
              document.addEventListener("DOMContentLoaded", setValue);
              range.addEventListener('input', setValue);
                </script>
              </li>
              <br>
              <li><input class="instbutton" style="position: relative;padding-inline:149px;" type="submit" name="btnlening" value="Simuleer je lening"></li>
              <li><br></li>
              <?php
              
              if (isset($_POST['btnlening'])) {

                echo "<div class='bedragmaandelijks'>";
                echo "<li>Uw maandelijk termijnbedrag</li>";
                echo "<!-- Plaats hier php variable voor berekening aantal geld per maand -->";
                echo "<li style='font-size:30px;'><img style='max-width:60px;left:125px;position:relative;' src='../assets/images/cash.png' align='left' alt=''> <b>$termijnbedrag EUR</b></li>";
                echo "<li>Maandelijkse terugbetaling</li>";
                echo "</div>";
                echo "<li>Vast Rentevoet = <b> 2%</b> per jaar</li>";
                echo "<li>totale interesten  = <b>  $interest EUR</b></li>";
                echo "<li>totaal terug aan de bank = <b>$einbedrag EUR</b></li>";
                echo "<li><input class='instbutton' style='position: relative;padding-inline:149px;'' type='submit' name='leningstarten' value='Start je aanvraag'></li>";
              }else {
                echo "<div style='position: relative;'>";
                echo "<div style='text-align: center;position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);z-index: 99;max-width: 34rem;text-align: center;font-size: 30px;'><b>Simuleer eerst je Lening</b></div>";
                echo "<div style='filter: blur(10px);pointer-events: none;'>";
                echo "<div class='bedragmaandelijks'>";
                echo "<li>Uw maandelijk termijnbedrag</li>";
                echo "<!-- Plaats hier php variable voor berekening aantal geld per maand -->";
                echo "<li style='font-size:30px;'><img style='max-width:60px;left:125px;position:relative;' src='../assets/images/cash.png' align='left' alt=''> <b>$termijnbedrag</b></li>";
                echo "<li>Maandelijkse terugbetaling</li>";
                echo "</div>";
                echo "<li>Vast Rentevoet = <b> 2%</b> per jaar</li>";
                echo "<li>totale interesten  = <b> $interesten </b></li>";
                echo "<li>totaal terug aan de bank = <b>$verschuldigd </b></li>";
                echo "<li><input class='instbutton' style='position: relative;padding-inline:149px;'' type='submit' name='leningstarten' value='Start je aanvraag'></li>";
                echo "</div>";
                echo "</div>";
              }
              
              ?>  

            </ul>
            </form>
          </div>
        </div>
        </div>
        <?php

        $id = $_SESSION['id'];
        $query = "select * FROM `tblLeningen` where `IDKlantennummer`  = '" . $id . "' LIMIT 1; ";
        $result = mysqli_query($conn,$query);
        
        if (mysqli_num_rows($result) > 0) {
          $data = mysqli_fetch_array($result);
        
        $aantalmaanden = maandenverschil($data['Leendatum'], $conn);
        $termijnbedrag = $data['Termijnbedrag']; 
        $nogverschuldigd = berekenEindbedrag($termijnbedrag, $data['Looptijd']) - ($termijnbedrag * $aantalmaanden);
        }else {
          $aantalmaanden = $termijnbedrag = $nogverschuldigd = 0;
        }
        echo "<div>";
        echo $textT;
        echo "<div class='transactions box' style='".$Rstyle."'>";?>
              
          <div class="title">Hoeveel wil je lenen?</div>
          <div class="sales-details">
            <ul class="details">
              <form action="" method="POST">
              <li>Start kapitaal lening:</li>
              <!-- Maak hier een functie voor alleen nummer en erros show wanneer niet getal is! -->
              <li><input type="text" in="500" style="width:50%;text-align:right" value="<?php echo $data['Geleend bedrag'] ?> EUR" readonly></li>
              <li> jaarlijkse Rentevoet = <b> 2%</b></li>
              <div class="bedragmaandelijks">
              <li><b>Uw maandelijk termijnbedrag</b></li>
              <li style="font-size:30px;"><img style="max-width:60px;left:125px;position:relative;" src="../assets/images/cash.png" align="left" alt=""> <b><?php echo $termijnbedrag ?> EUR</b></li>
              <li><b> nog verschuldigd bedrag:</b></li>
              <li style="font-size:30px;"><img style="max-width:60px;left:125px;position:relative;" src="../assets/images/cash.png" align="left" alt=""> <b><?php echo $nogverschuldigd ?> EUR</b></li>
              <li>Maandelijkse terugbetaling</li>
              </div>
              <li><input class="instbutton" style="position: relative;padding-inline:149px;" type="submit" name="leningstop" value="Lening stop zetten"></li>
            </ul>
            </form>
            <?php echo $TextB; ?>
          </div>
          
        </div>
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

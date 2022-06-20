<?php

    include 'connection.php';


function check_login($con)
{
    if(isset($_SESSION['id']))
    {
        $id = $_SESSION['id'];
        $query = "select * FROM `tblklantengegevens` where IDKlantenummer = '".$id."' AND Confirmatie = '1' LIMIT 1  ";
        $result = mysqli_query($con,$query);
        $count =mysqli_num_rows($result);
        if($count > 0)
        {
            
            $user_data = mysqli_fetch_assoc($result);
            
        }else {
            echo "<script>
            setTimeout(function () {    
                window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/index.php'; 
            },); // 5 seconds
            </script>";

        }
    }else {
    //redirect naar login
    echo "<script>
    setTimeout(function () {    
        window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/index.php'; 
    },); // 5 seconds
    </script>";
    die;
    }

}
function verstuurMail($name, $mail, $bericht, $onderwerp){
    require_once './vendor/autoload.php';
    // Create the Transport
$transport = (new Swift_SmtpTransport('smtp.mail.yahoo.com', 587, 'tls'))
->setUsername('gac_banking@yahoo.com')
->setPassword('iylfvpphpapvsmfd')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message("$onderwerp"))
->setFrom(['gac_banking@yahoo.com' => "$onderwerp"])
->setTo(["$mail"=> "$name"])
->setBody($bericht)
;

// Send the message
if($mailer->send($message))
{
  echo 'mails verstuurd';
}
}
function AantlalRijen($database, $con)
{
    $sql = "select * FROM " . $database . "";
    if ($result=mysqli_query($con,$sql)) {
        $rowcount=mysqli_num_rows($result);
        return $rowcount; 
    }
}

function Register($id, $vname, $lname, $mail, $Tel, $pass, $con){

    $name = $vname . " " . $lname;
    //Token creation
        $Token = md5(time() . $name);
    //Verrificatie mail versturen
        $message = "<a href='https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/verify.php?Token=$Token'>Register account</a>";
        verstuurMail($name, $mail, $message, "Email verrificatie GAC");
    //account creation in tblKlantengegevens
        $stmst = $con->prepare("insert INTO tblklantengegevens (IDKlantenummer, Voornaam, Achternaam, Email, Telefoon, Wachtwoord, Token) VALUES ('".$id."', '". $vname."', '". $lname."', '". $mail."', '". $Tel."', '".$pass."', '".$Token."');");
        $stmst->execute();
    //declaratie van session ID
        $_SESSION['id'] = $id;
    //rekeningsnummer creation    
        $rekeningnummer = "BE69 " . chunk_split(hexdec(crc32($name . $id)), 4, ' ');
        $stmst = $con->prepare("insert INTO tblmyklant (IDKlantenummer, IDRekekingnummer) VALUES ('".$id."' , '". $rekeningnummer."');");
        $stmst->execute();
        $stmsts= $con->prepare("insert INTO tblrekening (IDKlantenummer, IDRekeningnummer, saldo) VALUES ('".$id."' , '". $rekeningnummer."' , 0);");
        $stmsts->execute();
}

function login($mail, $pass, $con)
{
    $query = "select * FROM `tblklantengegevens` where Email = '" .$mail. "' AND Confirmatie = '1' LIMIT 1;";
    $result = mysqli_query($con,$query);
    $count =mysqli_num_rows($result);
        $info = mysqli_fetch_array($result);
        $passhash = $info['Wachtwoord'];
        if (password_verify($pass, $passhash)) {
            if ($info['Activaite2FA'] == "1") {
                
                echo "<script>
                setTimeout(function () {    
                    window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/loginVerfy.php?id=$id'; 
                },0); // 5 seconds
                </script>";
            }else {
                $_SESSION['id'] = $id;
                GenQR();
                  echo "<script>
            setTimeout(function () {    
            window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/dashboard.php'; 
            },20); // 5 seconds
            </script>";
            }

        }else {
            echo '<script type="text/javascript">
        $(document).ready(function() {
        swal({
            title: "Fout!",
            text: "Ongeldig Wachtwoord!!",
            icon: "error",
            button: "Ok",
            timer: 200000
            });
        });
</script>' ;

        }
    
}

function Verrichting($bedrag, $rekeningnummer, $communicatie, $con)
{
    //verichting toevoegen aan de database
    $query = "select * FROM `tblmyklant` where IDRekekingnummer  = '" . $rekeningnummer . "' LIMIT 1; ";
    $result = mysqli_query($con,$query);
    while ($data = mysqli_fetch_array($result)) {
        $receiverid = $data['IDKlantenummer'];
    }
    $id = $_SESSION['id'];
    if (isset($receiverid)) {
        if ($id == $receiverid) {
            echo "fout";
        }else {
            $stmst = $con->prepare("insert INTO `tbloverschrijving` (IDKlantenummer, Ontvanger, Hoeveelheid, Datum, Comunicatie) VALUES ('".$id."' , '". $receiverid."', '".$bedrag."', '". date("d/m/Y") ."', '".$communicatie."');");
            $stmst->execute();
            //bedrag toevoegen bij de ontvanger
            $query = "select * FROM `tblrekening` where `IDRekeningnummer`  = '" . $rekeningnummer . "' LIMIT 1; ";
            $result = mysqli_query($con,$query);
            while ($data = mysqli_fetch_array($result)) {
                $beginsaldo = $data['saldo'];
            }
            $eindsaldo = $beginsaldo + $bedrag;
            $stmst = $con->prepare("update `tblrekening` SET `saldo` = $eindsaldo where IDKlantenummer = $receiverid;");
            $stmst->execute();
            //bedrag van de verzender zijn saldo halen
            $query = "select * FROM `tblrekening` where `IDKlantenummer`  = '" . $id  . "' LIMIT 1; ";
            $result = mysqli_query($con,$query);
            while ($data = mysqli_fetch_array($result)) {
                $beginsaldo = $data['saldo'];
            }
            $eindsaldo = $beginsaldo - $bedrag;
            $stmst = $con->prepare("update `tblrekening` SET `saldo` = $eindsaldo where IDKlantenummer = $id;");
            $stmst->execute();
        }   
    }
    
}
function OntvangenDezeMaand($con)
{
    $maand = date("M");
    $maandGetal = '/01';
switch ($maand) {
    case 'Jan':
        $maandGetal = '/01';
        break;
    case 'Feb':
        $maandGetal = '/02';
        break;
    case 'Mar':
        $maandGetal = '/03';
        break;
    case 'Apr':
        $maandGetal = '/04';
        break;
    case 'May':
        $maandGetal = '/05';
        break;
    case 'JuN':
        $maandGetal = '/06';
          break;
    case 'Jul':
        $maandGetal = '/07';
        break;
    case 'Aug':
        $maandGetal = '/08';
        break;
    case 'Sep':
        $maandGetal = '/09';
         break;
    case 'Oct':
        $maandGetal = '/10';
        break;
    case 'Nov':
        $maandGetal = '/11';
        break;
    case 'Dec':
        $maandGetal = '/12';
        break;

        default:
        # code...
        break;
}
$id = $_SESSION['id'];
$bedrag = 0;
$query = "select * FROM `tbloverschrijving` where `Ontvanger`  = '" . $id . "'";
$result = mysqli_query($con,$query);
while ($data = mysqli_fetch_array($result)) {
    if (strpos($data['Datum'], $maandGetal)) {
        $bedrag = $bedrag + $data['Hoeveelheid'];
    }
}
echo $bedrag;
}


function UitgaveDezeMaand($con)
{
    $maand = date("M");
    $maandGetal = '/01';
    switch ($maand) {
        case 'Jan':
            $maandGetal = '/01';
            break;
        case 'Feb':
            $maandGetal = '/02';
            break;
        case 'Mar':
            $maandGetal = '/03';
            break;
        case 'Apr':
            $maandGetal = '/04';
            break;
        case 'May':
            $maandGetal = '/05';
            break;
        case 'JuN':
            $maandGetal = '/06';
              break;
        case 'Jul':
            $maandGetal = '/07';
            break;
        case 'Aug':
            $maandGetal = '/08';
            break;
        case 'Sep':
            $maandGetal = '/09';
             break;
        case 'Oct':
            $maandGetal = '/10';
            break;
        case 'Nov':
            $maandGetal = '/11';
            break;
        case 'Dec':
            $maandGetal = '/12';
            break;
    
            default:
            # code...
            break;
    }  
$id = $_SESSION['id'];
$bedrag = 0;
$query = "select * FROM `tbloverschrijving` where `IDKlantenummer`  = '" . $id . "'";
$result = mysqli_query($con,$query);
while ($data = mysqli_fetch_array($result)) {
    if (strpos($data['Datum'], $maandGetal)) {
        $bedrag = $bedrag + $data['Hoeveelheid'];    }
}
echo $bedrag;
}


function VeranderAlgemeneInstellingen($Vnaam, $Anaam, $NewPass, $con)
{
    $id = $_SESSION['id'];
    $stmst = $con->prepare("update `tblklantengegevens` SET `Voornaam` = '$Vnaam' WHERE `tblklantengegevens`.`IDKlantenummer` = $id;");
    $stmst->execute();
    $stmst = $con->prepare("update `tblklantengegevens` SET `Achternaam` = '$Anaam' WHERE `tblklantengegevens`.`IDKlantenummer` = $id;");
    $stmst->execute();
    $Passw = "GEC" . $id . $NewPass;
    $password = password_hash($Passw, PASSWORD_DEFAULT);
    $stmst = $con->prepare("update `tblklantengegevens` SET `Wachtwoord` = '$password' WHERE `tblklantengegevens`.`IDKlantenummer` = $id;");
    $stmst->execute();
}


function berkenTermijnBedrag($beginbedrag, $looptijd, $uitstel)
{
    $A0 = $beginbedrag;
    $n = $looptijd * 12;
    $us = $uitstel;
    $i = 0.001652;
    $u = 1.001652;
    if ($us == 0) {
        $a = ($A0 * $i * (pow($u,$n)))/
        ( (pow($u,$n)) - 1 );
    }else {
        $nuitstel = $n - $us;
        $a = ($A0 * $i * (pow($u,$n)))/
        ( (pow($u, $nuitstel) - 1)) ;
    }
    return round($a,2);
}

function berekenEindbedrag($a, $n)
{
    $nn = $n * 12;

$tot = $a * $nn ;
return $tot;
}

function Leningstarten($ID, $termijnbedrag, $looptijd, $A,$con){
    $stmst = $con->prepare("insert INTO `tblLeningen` (`IDKlantennummer`, `Termijnbedrag`, `Looptijd`, `Geleend bedrag`, Leendatum) VALUES ('18524230711' , '". $termijnbedrag."', '".$looptijd."', '".$A."', '".date("Y-m-d H:i:s")."');");
    $stmst->execute();
    $query = "select * FROM `tblrekening` where `IDKlantenummer`  = '" . $ID . "' LIMIT 1; ";
    $result = mysqli_query($con,$query);
    $data = mysqli_fetch_array($result);
    $beginsaldo = $data['saldo'];
    $eindsaldo = (double)$beginsaldo + (double)$A;
    $stmst = $con->prepare("update `tblrekening` SET `saldo` = $eindsaldo where IDKlantenummer = $ID;");
    $stmst->execute();
    $communicatie = "GAC Lening van " . $A;
    $stmst = $con->prepare("insert INTO `tbloverschrijving` (IDKlantenummer, Ontvanger, Hoeveelheid, Datum, Comunicatie) VALUES ('".$ID."' , '". $ID."', '".$A."', '". date("d/m/Y") ."', '".$communicatie."');");
    $stmst->execute();
}

function maandenverschil($begindatum, $conn)
{
$date1 = $begindatum;
$date2 = date("Y-m-d H:i:s");  

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);

$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
return $diff;
}

function Leningstop($bedrag, $con){
    $id = $_SESSION['id'];
    $query = "select * FROM `tblrekening` where `IDKlantenummer`  = '" . $id . "' LIMIT 1; ";
    $result = mysqli_query($con,$query);
    $data = mysqli_fetch_array($result);
    $beginsaldo = $data['saldo'];
    $eindsaldo = $beginsaldo - $bedrag;
    $stmst = $con->prepare("update `tblrekening` SET `saldo` = $eindsaldo where IDKlantenummer = $id;");
    $stmst->execute();
    $communicatie = "GAC afbetaling lening van " . ($eindsaldo . $beginsaldo);
    $stmst = $con->prepare("insert INTO `tbloverschrijving` (IDKlantenummer, Ontvanger, Hoeveelheid, Datum, Comunicatie) VALUES ('".$id."' , '18524230711', '".$eindsaldo."', '". date("d/m/Y") ."', '".$communicatie."');");
    $stmst->execute();
    $stmst = $con->prepare("delete FROM tblLeningen WHERE IDKlantennummer = '".$id."';");
    $stmst->execute();
    echo "<script>
    setTimeout(function () {    
        window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/leningen.php'; 
    },1); // 5 seconds
    </script>";
}

function GenQR(){
    //A random Code for the request to the API
    $str=rand() . time();
    $result=md5($str);
    $_SESSION['2fa_str'] = $result;
    // echo $result;
    //Random Code can be anything static, or you can generate it through //built-in random functions//The below url accepts AppName, AppInfo & SecretCode
    $cURLConnection = curl_init("https://www.authenticatorapi.com/pair.aspx?AppName=GAC&AppInfo=Onlinebanking&SecretCode=$result");//Setting Options for the cURL Request
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//Execute the Request
    $apiResponse = curl_exec($cURLConnection);//Close
    curl_close($cURLConnection);//Displaying the QR Code
    #echo $apiResponse;
}

function ValiQR($pin, $id,$con){
        $pin = (int)$pin;
        $query = "select * FROM `tblklantengegevens` where IDKlantenummer = '" .$id. "';";
        $result = mysqli_query($con,$query);
        $info = mysqli_fetch_array($result);
        if ($info['Activaite2FA'] == "1") {
            $code = $info['QR'];
            $secret_code = $code;
        }else {
            $secret_code = $_SESSION['2fa_str'];
        }
      //The secret code will be the same code that you specified while displaying the QR Code 
        $cURLConnection = curl_init('https://www.authenticatorApi.com/Validate.aspx?Pin='.$pin.'&SecretCode='.$secret_code);curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);$apiRes = curl_exec($cURLConnection);
        curl_close($cURLConnection);$jsonArrayResponse = json_decode($apiRes);
    if ($apiRes == 'True') {
        return true;
        $_SESSION['2fa']=1;
      }
      else {
          return false;
          echo "<br> Code is fout ";
      }
}

function ShowQR(){
    $result=$_SESSION['2fa_str'];
    $cURLConnection = curl_init("https://www.authenticatorapi.com/pair.aspx?AppName=GAC&AppInfo=Onlinebanking&SecretCode=$result");//Setting Options for the cURL Request
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);//Execute the Request
    $apiResponse = curl_exec($cURLConnection);//Close
    curl_close($cURLConnection);//Displaying the QR Code
    echo $apiResponse;
}

function activeer2FA($con){
    $id = $_SESSION['id'];
    $stmst = $con->prepare("update `tblklantengegevens` SET `QR` = '".$_SESSION['2fa_str']."' where IDKlantenummer = $id;");
    $stmst->execute();
    $stmst = $con->prepare("update `tblklantengegevens` SET `Activaite2FA` = '1' where IDKlantenummer = $id;");
    $stmst->execute();
}

function deActiveer2FA($con){
    GenQR();
    $id = $_SESSION['id'];
    $stmst = $con->prepare("update `tblklantengegevens` SET `Activaite2FA` = '0' where IDKlantenummer = $id;");
    $stmst->execute();
    $stmst = $con->prepare("update `tblklantengegevens` SET `QR` = '' where IDKlantenummer = $id;");
    $stmst->execute();
}

function Beleggen($id, $bedrag, $con){
    $query = "select * FROM `tblrekening` where IDKlantenummer = '" .$id. "';";
    $result = mysqli_query($con,$query);
    $info = mysqli_fetch_array($result);
    $nieuwSaldo = (double)$info['saldo'] - (double)$bedrag;
    $stmst = $con->prepare("update `tblrekening` SET `saldo` = '".$nieuwSaldo."' where IDKlantenummer = $id;");
    $stmst->execute();
    $stmst = $con->prepare("insert INTO tblBeleggingen (IDKlantenummer, Bedrag, Startdatum) VALUES ('".$id."', '". $bedrag ."', '". date('d-m-Y') ."');");
    $stmst->execute();
}

function TelAlleBeleggingen($id, $con){
    $query = "select * FROM `tblBeleggingen` where IDKlantenummer = '" .$id. "';";
    $result = mysqli_query($con,$query);
    $totaal = "0";
    while ($info = mysqli_fetch_array($result)) {
       $totaal = $totaal + (double)$info['Bedrag'];
    }
    return $totaal;
}

?>
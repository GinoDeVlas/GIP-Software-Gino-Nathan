<?php
session_start();
include 'connection.php';
include 'sendmail.php';

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
            return $user_data;
        }else {
            header("Location: index.php");

        }
    }else {
    //redirect naar login
    header("Location: index.php");
    die;
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
        sendMail($name, $mail, $message);
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
    $query = "select * FROM `tblklantengegevens` where Email = '" .$mail. "' AND Confirmatie = 1 LIMIT 1;";
    $result = mysqli_query($con,$query);
    $count =mysqli_num_rows($result);
    if($count > 0)
    {
        $info = mysqli_fetch_array($result);
        $id = $info['IDKlantenummer'];
        $passhash = $info['Wachtwoord'];
        $Passw = "GEC" . $id . $pass;
        if (password_verify($Passw, $passhash)) {
            $_SESSION['id'] = $id;
            header("Location: dashboard.php");
        }else {
            echo '<script type="text/javascript">
        $(document).ready(function() {
        swal({
            title: "fout!",
            text: "Ongeldig Wachtwoord!!",
            icon: "error",
            button: "Ok",
            timer: 200000
            });
        });
</script>' ;

        }
    }else {
        echo '<script type="text/javascript">
        $(document).ready(function() {
        swal({
            title: "fout!",
            text: "Er bestaat geen account met dit E-mail adres!!",
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


function VeranderAlgemeneInstellingen($Vnaam, $Anaam, $Email, $NewPass, $con)
{
    $id = $_SESSION['id'];
    $stmst = $con->prepare("update `tblklantengegevens` SET `Voornaam` = '$Vnaam' WHERE `tblklantengegevens`.`IDKlantenummer` = $id;");
    $stmst->execute();
    $stmst = $con->prepare("update `tblklantengegevens` SET `Achternaam` = '$Anaam' WHERE `tblklantengegevens`.`IDKlantenummer` = $id;");
    $stmst->execute();
    $stmst = $con->prepare("update `tblklantengegevens` SET `Email` = '$Email' WHERE `tblklantengegevens`.`IDKlantenummer` = $id;");
    $stmst->execute();
    $Passw = "GEC" . $id . $NewPass;
    $password = password_hash($Passw, PASSWORD_DEFAULT);
    $stmst = $con->prepare("update `tblklantengegevens` SET `Wachtwoord` = '$password' WHERE `tblklantengegevens`.`IDKlantenummer` = $id;");
    $stmst->execute();
}



?>
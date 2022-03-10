<?php
session_start();
include 'connection.php';
function check_login($con)
{
    if(isset($_SESSION['id']))
    {
        $id = $_SESSION['id'];
        $query = "select * FROM `tblklantengegevens` where IDKlantenummer = ".$id." LIMIT 1; ";
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

function Register($name, $mail, $Tel, $pass, $con){
    $id = hexdec(crc32(AantlalRijen("tblklantengegevens", $con) + 1));
    $Passw = "GEC" . $id . $pass;
    $password = password_hash($Passw, PASSWORD_DEFAULT);
    $stmst = $con->prepare("insert INTO tblklantengegevens (IDKlantenummer, Klantennaam, Email, Telefoon, Wachtwoord) VALUES ('".$id."', '". $name."', '". $mail."', '". $Tel."', '".$password."');");
    $stmst->execute();
    $_SESSION['id'] = $id;
    $rekeningnummer = "BE69 " . chunk_split(hexdec(crc32($name)), 4, ' ');
    $stmst = $con->prepare("insert INTO tblmyklant (IDKlantenummer, IDRekekingnummer) VALUES ('".$id."' , '". $rekeningnummer."');");
    $stmst->execute();
    $stmsts= $con->prepare("insert INTO tblrekening (IDKlantenummer, IDRekeningnummer, saldo) VALUES ('".$id."' , '". $rekeningnummer."' , 0);");
    $stmsts->execute();
}

function login($mail, $pass, $con)
{
    $query = "select * FROM `tblklantengegevens` where Email  = '" .$mail. "' LIMIT 1; ";
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
        }
    }
}
?>
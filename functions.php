<?php
include 'connection.php';
function check_login($con)
{
    if(isset($_SESSION['IDKlantenummer']))
    {
        $id = $_SESSION['IDKlantenummer'];
        $query = "Select * From tblklantengegevens where IDKlantenummer = '$id' limit 1";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }else {
    //redirect naar login
    header("Location: RegLogin.php");
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
function Tets($database, $con)
{
    AantlalRijen($database, $con);
}

function Register($name, $mail, $Tel, $pass, $con){
    $id = hexdec(crc32(AantlalRijen("tblklantengegevens", $con) + 1));
    echo AantlalRijen("tblklantengegevens", $con). "<br>";
    echo crc32(AantlalRijen("tblklantengegevens", $con) + 1) . "<br>";
    echo $id. "<br>";
    $Passw = "GEC" . $id . $pass;
    $password = password_hash($Passw, PASSWORD_DEFAULT);
    $stmst = $con->prepare("insert INTO tblklantengegevens (IDKlantenummer, Klantennaam, Email, Telefoon, Wachtwoord) VALUES ('".$id."', '". $name."', '". $mail."', '". $Tel."', '".$password."');");
    $stmst->execute();
}
?>
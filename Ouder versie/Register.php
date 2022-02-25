<?php
include("connection.php");
$name = $_POST['name'];
$Email = $_POST['mail'];
$Tel = $_POST['Tele'];
$pass = $_POST['pass'];
$rpass = $_POST['rpass'];
$namehash = password_hash($name.$pass,PASSWORD_DEFAULT);
$Emailhash = password_hash($Email.$pass,PASSWORD_DEFAULT);
$Telhash = password_hash($Tel.$pass,PASSWORD_DEFAULT);
$passhash = password_hash($pass.$namehash.$Emailhash,PASSWORD_DEFAULT);




if($Con->connect_error)
{
    die("failed to connect!".$con->connect_error);
}
else 
{
    if ($pass == $rpass) {
    $stmt = $Con->prepare("insert into tblklantengegevens(Klantennaam, Email,Telefoon,wachtwoord)
        values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $namehash, $Emailhash, $Telhash, $passhash);
    $stmt->execute();
    echo "Registration Successfully...";
    $stmt->close();
    $Con->close();
    }

}
?>
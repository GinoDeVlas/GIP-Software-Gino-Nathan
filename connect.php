<?php
include("connection.php");
$name = $_POST['name'];
$Adres = $_POST['Adres'];
$Email = $_POST['mail'];
$Tel = $_POST['Tele'];

$num = 1;

if($Con->connect_error)
{
    die("failed to connect!".$con->connect_error);
}
else 
{
    $stmt = $Con->prepare("insert into tblklantengegevens(Voornaam, Adres,Email,Telefoon)
        values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $Adres, $Email, $Tel);
    $stmt->execute();
    echo "Registration Successfully...";
    $stmt->close();
    $Con->close();
}
?>
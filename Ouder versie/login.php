<?php
include("connection.php");

$Email = $_POST['mail'];
$pass = $_POST['pass'];
$Emailhash = password_hash($Email.$pass,PASSWORD_DEFAULT);
$passhash = password_hash($pass.$namehash.$Emailhash,PASSWORD_DEFAULT);
?>
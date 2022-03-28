<?php
/*$dbServername = "ID191774_6itngip12.db.webhosting.be";
$dbUserName = "ID191774_6itngip12";
$dbPassword = "wIF48QTS";
$dbName = "ID191774_6itngip12";
$Con = mysqli_connect($dbServername, $dbUserName, $dbPassword, $dbName);*/
$host ="ID191774_6itngip12.db.webhosting.be"; 
$username ="ID191774_6itngip12";
$password ="wIF48QTS";
$database ="ID191774_6itngip12";
$conn = new mysqli($host, $username, $password, $database/*, 3306*/) or die ("<p>Er is iets mis gegaan</p>");
$conn->query("SET character_set_results=utf8");
?>

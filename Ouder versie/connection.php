<?php

$dbServername = "ID191774_6itngip12.db.webhosting.be";
$dbUserName = "ID191774_6itngip12";
$dbPassword = "wIF48QTS";
$dbName = "ID191774_6itngip12";

if(!$Con = mysqli_connect($dbServername, $dbUserName, $dbPassword, $dbName,3306))
{

    die("failed to connect!");
}
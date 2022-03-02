<?php
session_start();

include("connection.php");
include("functions.php");
echo $_SESSION['id'];
?>
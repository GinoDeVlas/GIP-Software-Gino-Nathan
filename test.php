<?php
include 'functions.php';
include 'connection.php';
echo AantlalRijen("tblklantengegevens", $conn) . "<br>";
echo hexdec(crc32(AantlalRijen("tblklantengegevens", $conn))) . "<br>";
echo hexdec(crc32(AantlalRijen("tblklantengegevens", $conn) + 1));
?>
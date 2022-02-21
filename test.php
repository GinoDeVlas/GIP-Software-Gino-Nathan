<?php
include "connection.php";
include "functions.php" ;
echo hexdec(crc32((Tets("tblklantengegevens", $conn) + 1)));
?>
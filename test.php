<?php
include("connection.php");
include("functions.php");
?>

<form action="" method="POST">
<input type="text" name="ontvanger"><br>
<input type="text" name="Bedrag"><br>
<input type="text" name="Communicatie"><br>
<button type="submit">verzend</button>
</form>

<?php
$ontvanger = $_POST['ontvanger'];
$Bedrag = $_POST['Bedrag'];
$communicatie = $_POST['Communicatie'];
Verrichting($Bedrag, $ontvanger, $communicatie, $conn);
echo $_SESSION['id'];
echo date("d/m/Y");
?>
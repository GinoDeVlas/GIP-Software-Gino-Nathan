<?php
//voeg de connection code toe aan deze code
include 'functions.php';

?>
<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <title>Login Verify</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/resetpass.css">

</head>
<body>
<input type='checkbox' id='toggle'>
<div class='wrapper'>
<div class='content'>
<header>Twee factor authenticatie (2FA)</header>
<p>Vul hier onder uw code in die te vinden is op uw Google Authenticator app</p>
</div>
<form action='' method='POST'>
<div class='field'>
<input type='text' class='email' name='pin' placeholder='000000' pattern="[0-9]{3}[0-9]{3}" required>
</div>
<div class='field btn'>
<div class='layer'></div>
<button type='submit' name='submit-pin'>Valideer</button>
</div>
</form>
</div>


</body>
</html>
<?php
if (isset($_POST['submit-pin'])) {
    echo "isset";
    if (ValiQR($_POST['pin'], $_GET['id'], $conn)) {
        $_SESSION['id'] = $_GET['id'];
        echo $_SESSION['id'];
        echo "<script>
        setTimeout(function () {    
            window.location.href = 'https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/dashboard.php'; 
        },1); // 5 seconds
        </script>";
    }  else {
        echo '<script type="text/javascript">
        $(document).ready(function() {
        swal({
            title: "Fout!",
            text: "Onjuiste code, probeer opnieuw.",
            icon: "error",
            button: "Ok",
            timer: 200000
            });
        });
</script>' ;
    }  
}
?>
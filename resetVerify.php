<?php
//voeg de connection code toe aan deze code
include 'functions.php';

?>
<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/resetpass.css">

</head>
<body>
<input type='checkbox' id='toggle'>
<div class='wrapper'>
<div class='content'>
<header>Reset password verrificatie</header>
<p>vul hier onder je code in die te zien is op je Google Authenticator app</p>
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
            $info = mysqli_fetch_array($result);
        $id = $info['IDKlantenummer'];
        $passhash = $info['Wachtwoord'];
        $Passw = "GEC" . $id . $pass;
        if (password_verify($Passw, $passhash)) {
            if ($info['Activaite2FA'] == "1") {
                
                echo "<script>
                setTimeout(function () {    
                    window.location.href = '/GIP-Software-Gino-Nathan/loginVerfy.php?id=$id'; 
                },0); // 5 seconds
                </script>";
            }else {
                $_SESSION['id'] = $id;
                GenQR();
                  echo "<script>
            setTimeout(function () {    
            window.location.href = '/GIP-Software-Gino-Nathan/dashboard.php'; 
            },0); // 5 seconds
            </script>";
            }













    if (ValiQR($_POST['pin'], $_GET['id'], $conn)) {
        $_SESSION['id'] = $_GET['id'];
        echo "<script>
        setTimeout(function () {    
            window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/dashboard.php'; 
        },1); // 5 seconds
        </script>";
    }  else {
        echo '<script type="text/javascript">
        $(document).ready(function() {
        swal({
            title: "fout!",
            text: "onjuiste code, probeer het opnieuw!!",
            icon: "error",
            button: "Ok",
            timer: 200000
            });
        });
</script>' ;
    }  
}
?>
<?php

//voeg de connection code toe aan deze code
include 'functions.php';
$userEmail = ''; //first we leave email field blank
$form = "  <input type='checkbox' id='toggle'>
<div class='wrapper'>
  <div class='content'>
    <header>Wachtwoord vergeten?</header>
    <p>Vul hieronder je E-mailadres in en we zullen je een wachtwoord reset mail versturen.</p>
  </div>
  <form method='POST'>

    <div class='field'>
      <input type='text' class='email' name='email' placeholder='Email Address' required value='".$userEmail."'>
    </div>
    <div class='field btn'>
      <div class='layer'></div>
      <button type='submit'>reset paswoord</button>
    </div>
  </form>
</div>";

if (isset($_POST['email'])) {   
  $mail = $_POST['email'];
  $_SESSION['mail'] = $mail;
  $query = "select * FROM `tblklantengegevens` where Email = '" .$mail."' LIMIT 1  ";
  $result = mysqli_query($conn,$query);
  $count =mysqli_num_rows($result);
  $info = mysqli_fetch_array($result);
  $_SESSION['info'] = $info['IDKlantenummer'];
  if($count > 0)
  {
    if ($info['Activaite2FA'] == 1) {
        $form ="  <input type='checkbox' id='toggle'>
        <div class='wrapper'>
          <div class='content'>
            <header>Paswoord vergeten?</header>
            <p>vul de verrificatie code in die te zien is op je google authenticator app</p>
          </div>
          <form method='POST'>
        
            <div class='field'>
            <input type='text' class='email' name='pin' placeholder='000000' pattern='[0-9]{3}[0-9]{3}' required>
            </div>
            <div class='field btn'>
              <div class='layer'></div>
              <button type='submit' name='submit-pin'>Valideer</button>
            </div>
          </form>
        </div>";
        
      }
      }else {
        $passToken = md5(time() . "GAC");
        $message = "<a href='http://localhost/GIP-Software-Gino-Nathan/Reset-Password.php?Token=$passToken'>Reset password</a>";
        sendMail("Reset password", $mail, $message, "GAC Password Reset");
        $stmst = $conn->prepare("update `tblklantengegevens` SET `PassResetToken` = '" .$passToken."' where Email = '" .$mail. "';");
        $stmst->execute();
        echo '<script type="text/javascript">
        $(document).ready(function() {
        swal({
            title: "Paswoord reset mail is verstuurd!",
            text: "Check je mailbox!!",
            icon: "success",
            button: "Ok",
            timer: 200000
            });
        });
</script>';
        echo "<script>
        setTimeout(function () {    
            window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/signup.php'; 
        },3000); // 5 seconds
        </script>";
      }


}
?>
<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/resetpass.css">
    <title>Passwoord vergeten</title>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
<?php
echo $form;
?>
</body>
</html>

<?php
if (isset($_POST['submit-pin'])) {
  if (ValiQR($_POST['pin'], $_SESSION['info'], $conn)) {
    $passToken = md5(time() . "GAC");
    $message = "<a href='http://localhost/GIP-Software-Gino-Nathan/Reset-Password.php?Token=$passToken'>Reset password</a>";
    sendMail("Reset password", $_SESSION['mail'], $message, "GAC Password Reset");
    $stmst = $conn->prepare("update `tblklantengegevens` SET `PassResetToken` = '" .$passToken."' where Email = '" .$_SESSION['mail']. "';");
    $stmst->execute();
    echo '<script type="text/javascript">
$(document).ready(function() {
swal({
    title: "Paswoord reset mail is verstuurd!",
    text: "Check je mailbox!!",
    icon: "success",
    button: "Ok",
    timer: 200000
    });
});
</script>';
echo "<script>
setTimeout(function () {    
    window.location.href = 'http://localhost/GIP-Software-Gino-Nathan/signup.php'; 
},3000); // 5 seconds
</script>";
  }  else {
      echo '<script type="text/javascript">
      $(document).ready(function() {
      swal({
          title: "fout!",
          text: "Onjuiste code, probeer opnieuw!!",
          icon: "error",
          button: "Ok",
          timer: 200000
          });
      });
</script>' ;

  }  
}
?>

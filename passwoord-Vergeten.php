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
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
  <input type="checkbox" id="toggle">
  <div class="wrapper">
    <div class="content">
      <header>Paswoord vergeten?</header>
      <p>Vul hier onder je E-Mail adress in en we zullen je een password reset mail versturen.</p>
    </div>
    <form action="" method="POST">
    <?php 
    $userEmail = ""; //first we leave email field blank
    ?>
      <div class="field">
        <input type="text" class="email" name="email" placeholder="Email Address" required value="<?php $userEmail ?>">
      </div>
      <div class="field btn">
        <div class="layer"></div>
        <button type="submit" name="subscribe">reset paswoord</button>
      </div>
    </form>
  </div>
</body>
</html>

<?php

    if (isset($_POST['email'])) {
        
        $mail = $_POST['email'];
        $query = "select * FROM `tblklantengegevens` where Email = '" .$mail."' LIMIT 1  ";
        $result = mysqli_query($conn,$query);
        $count =mysqli_num_rows($result);
        if($count > 0)
        {

        $passToken = md5(time() . "GAC");
        $message = "<a href='https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/Reset-Password.php?Token=$passToken'>Reset password</a>";
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
        header('Refresh: 3; URL=http://localhost/GIP-Software-Gino-Nathan/signup.php');

}}
?>

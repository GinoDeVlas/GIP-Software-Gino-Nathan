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
    	<!-- alert css -->
	 <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
<?php
if (isset($_GET['Token']) OR isset($_POST['Token'])) {
    $Token = '';  
    $Token = $_GET['Token'];
    $query = "select * FROM `tblklantengegevens` where PassResetToken = '" .$Token."' LIMIT 1";
    $result = mysqli_query($conn,$query);
    $count =mysqli_num_rows($result);
    if($count > 0)
    {
      $newpass = $rNewPass ="";
      echo "<input type='checkbox' id='toggle'>";
      echo " <div class='wrapper'>";
      echo "    <div class='content'>";
      echo "      <header>Paswoord vergeten?</header>";
      echo "      <p>Vul hier onder je E-Mail adress in en we zullen je een password reset mail versturen.</p>";
      echo "    </div>";
      echo "    <form action='' method='POST'>";
      echo "      <div class='field'>";
      echo "      <input type='password' class='email' name='pass' placeholder='Nieuw wachtwoord' required value='".$newpass."'>";
      echo "      </div>";
      echo "      <div class='field'>";
      echo "      <input type='password' class='email' name='rpass' placeholder='Herhaal wachtwoord' required value='".$rNewPass."'>";
      echo "      </div>";
      echo "      <div class='field'>";
      echo "      <input type=text' class='email' name='Token' placeholder='Nieuw wachtwoord' required value='fa37ad3fdf3b403f513727e4c1822fd6' readonly>";
      echo "      </div>";
      echo "      <div class='field btn'>";
      echo "        <div class='layer'></div>";
      echo "        <button type='submit' name='subscribe'>reset paswoord</button>";
      echo "      </div>";
      echo "    </form>";
      echo "  </div>";
        if (isset($_POST['pass'])) {
          if ($_POST['pass'] == $_POST['rpass']) {

            $row = mysqli_fetch_array($result);
            $id = $row['IDKlantenummer'];
            $pass = $_POST['pass'];
            $Passw = "GEC" . $id . $pass;
		    $password = password_hash($Passw, PASSWORD_DEFAULT);
            $stmst = $conn->prepare("update `tblklantengegevens` SET Wachtwoord = '" .$password."' where PassResetToken = '" .$Token. "';");
            if($stmst->execute()){
            echo '<script type="text/javascript">
            $(document).ready(function() {
            swal({
                title: "Paswoord veranderd!",
                text: "U kunt nu uw nieuw wachtwoord gebruiken om in te loggen!!",
                icon: "success",
                button: "Ok",
                timer: 200000
                });
            });
    </script>' ;}
    $passToken = md5(time() . "GAC");
    $stmst = $conn->prepare("update `tblklantengegevens` SET `PassResetToken` = '" .$passToken."' where Email = '" .$row['Email']. "';");
    $stmst->execute();
    echo "<script>
    setTimeout(function () {    
        window.location.href = 'https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/signup.php'; 
    },3000); // 5 seconds
    </script>";
          }
        }

    }else {
        echo '<script type="text/javascript">
        $(document).ready(function() {
        swal({
            title: "Er is een probleem opgelopen!",
            text: "Ongeldige token.",
            icon: "error",
            button: "Ok",
            timer: 200000
            });
        });
</script>' ;
echo "<script>
setTimeout(function () {    
    window.location.href = 'https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/signup.php'; 
},3000); // 5 seconds
</script>";
    }
}else {
  echo '<script type="text/javascript">
  $(document).ready(function() {
  swal({
      title: "Er is een probleem opgelopen!",
      text: "Als dit blijft voorkomen contacteer dan de beheerder.",
      icon: "error",
      button: "Ok",
      timer: 200000
      });
  });
</script>' ;
echo "<script>
setTimeout(function () {    
    window.location.href = 'https://archief.vhsj.be/websites/6itn/gip12/GIP-Software-Gino-Nathan/signup.php'; 
},3000); // 5 seconds
</script>";

}

?>

</body>
</html>
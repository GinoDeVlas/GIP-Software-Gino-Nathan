<?php
session_start();
	//voeg de connection code toe aan deze code
	include 'functions.php';
	$error = NULL;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/css/RegLogin.css">
	<!-- alert css -->
	 <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Login</title>
</head>
<body>

<!-- login pagina -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST">
			<h1>Registreer</h1>
			<span>Maak een account aan en open een rekening.</span>
			<input type="text" placeholder="Jhon" name="first" required/>
			<input type="text" placeholder="Doe" name="last" required/>
			<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="test@voorbeeld.be" name="mail" required/>
			<!-- <input type="tel" placeholder="0123 45 67 89" name= "Tele" pattern="[0-9]{4} [0-9]{2} [0-9]{2} [0-9]{2}" required/>-->
			<input type="tel" placeholder="123-456-7890" name="Tele" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required/>
			<input type="password" placeholder="Wachtwoord" name="pass" required/>
			<input type="password" placeholder="Herhaal wachtwoord" name="rPass" required/>
			<button>Registreer</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST">
			<h1>Log in</h1>
			<span>Gebruik uw email en wachtwoord in te loggen</span>
			<input type="email" placeholder="E-mailadres" name="LoginEmail" required/>
			<input type="password" placeholder="Wachtwoord" name="LoginPass"required/>
			<a href="passwoord-Vergeten.php">Wachtwoord vergeten?</a>
			<button>Log in</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welkom terug!</h1>
				<p>Log terug in met uw persoonlijke gegevens.</p>
				<button class="ghost" id="signIn">Log in</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hallo!</h1>
				<p>Registreer met uw persoonlijke gegevens en open vandaag nog een rekening!</p>
				<button class="ghost" id="signUp">Registreer</button>
			</div>
		</div>
	</div>
</div>
<center>
	<?php $error; ?>
</center>
</body>


<script src="./assets/js/RegLogin.js"></script>
</html>

<?php
if (isset($_POST['LoginEmail']) && isset($_POST['LoginPass']) ) {
	$query = "select * FROM `tblklantengegevens` where Email = '" .$_POST['LoginEmail']. "' AND Confirmatie = '1' LIMIT 1;";
    $result = mysqli_query($conn,$query);
	$count =mysqli_num_rows($result);
	if($count > 0)
    {
	$info = mysqli_fetch_array($result);
	$id = $info['IDKlantenummer'];
	$Passw = "GEC" . $id . $_POST['LoginPass'];
	login($_POST['LoginEmail'], $Passw, $conn);
	}else {
        echo '<script type="text/javascript">
        $(document).ready(function() {
        swal({
            title: "fout!",
            text: "Er bestaat geen account met dit E-mail adres!!",
            icon: "error",
            button: "Ok",
            timer: 200000
            });
        });
</script>' ;
    }
	
}
if (isset($_POST['first']) && isset($_POST['mail']) && isset($_POST['Tele'])) {
	if ($_POST['pass'] == $_POST['rPass']) {
		    //id creation
			$id = hexdec(crc32(AantlalRijen("tblklantengegevens", $conn) + 1));
			//pass creation
				 $Passw = "GEC" . $id . $_POST['pass'];
				$password = password_hash($Passw, PASSWORD_DEFAULT);
			//check als email al bestaat
				$query = "select * FROM `tblklantengegevens` where Email = '" .$_POST['mail']. "';";
				$result = mysqli_query($conn,$query);
				if(mysqli_num_rows($result)) {
					echo '<script type="text/javascript">
					$(document).ready(function() {
					swal({
						title: "Fout!",
						text: "Dit E-mail is al in gebruik!",
						icon: "error",
						button: "Ok",
						timer: 200000
						});
					});
			</script>' ;
				}else {
					Register($id, ucfirst($_POST['first']), ucfirst($_POST['last']), $_POST['mail'], $_POST['Tele'], $password, $conn);
				
		
?>	
<script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "Registratie succesvol!",
            text: "Log nu in om naar je account te gaan.",
            icon: "success",
            button: "Ok",
            timer: 200000
        });
    });

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<?php
}
	}
}
?>
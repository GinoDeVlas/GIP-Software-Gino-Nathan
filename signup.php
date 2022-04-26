<?php
//voeg de connection code toe aan deze code
include 'connection.php';
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
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Jhon" name="first" required/>
			<input type="text" placeholder="Doe" name="last" required/>
			<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="test@voorbeeld.be" name="mail" required/>
			<!-- <input type="tel" placeholder="0123 45 67 89" name= "Tele" pattern="[0-9]{4} [0-9]{2} [0-9]{2} [0-9]{2}" required/>-->
			<input type="tel" placeholder="123-456-7890" name="Tele" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required/>
			<input type="password" placeholder="choose a password" name="pass" required/>
			<input type="password" placeholder="repeat password" name="rPass" required/>
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST">
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="email" placeholder="E-mail adres" name="LoginEmail" required/>
			<input type="password" placeholder="Password" name="LoginPass"required/>
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" name="signIn" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
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
if (isset($_POST['first']) && isset($_POST['mail']) && isset($_POST['Tele'])) {
	if ($_POST['pass'] == $_POST['rPass']) {

		Register(ucfirst($_POST['first']), ucfirst($_POST['last']), $_POST['mail'], $_POST['Tele'], $_POST['pass'], $conn);	
?>	
<script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "Registratie succesvol!",
            text: "Log nu in om naar je account te gaan!!",
            icon: "success",
            button: "Ok",
            timer: 200000
        });
    });
</script>
<?php
	}
}
if (isset($_POST['LoginEmail']) && isset($_POST['LoginPass']) ) {
	login($_POST['LoginEmail'], $_POST['LoginPass'], $conn);
}
?>
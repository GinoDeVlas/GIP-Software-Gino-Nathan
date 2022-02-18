<?php
//voeg de connection code toe aan deze code
session_abort();
include 'functions.php';
include 'connection.php';


if (isset($_POST['IDCode'])) {

  $code = $_POST['IDCode'];

  $_SESSION['code'] = $code;
  echo $_SESSION['code'];
  $Querry = "select * FROM `leerkracht codes` where Code = ".$code." LIMIT 1; ";
  $res = mysqli_query($conn, $Querry);

  if ($res && mysqli_num_rows($res) > 0) {
      
      $row = mysqli_fetch_array($res);
      
      //echo  $row['Code'];
      header("Location: Ipads.php");
      
  }

}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<!-- css toevoegen  --> 
<link rel="stylesheet" href="./assets/css/RegLogin.css">

<!-- login pagina -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p>
</footer> 

</body>
<script src="./assets/js/RegLogin.js"></script>
</html>
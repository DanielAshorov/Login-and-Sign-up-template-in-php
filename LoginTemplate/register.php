<?php
include("includes/config.php");

include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account($con);
include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name) {
	if(isset($_POST[$name])) {
		echo $_POST[$name];
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Spotify!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php
	if(isset($_POST['registerButton'])) {
		echo '<script >
		$(document).ready(function(){

			$("#loginForm").hide();
			$("#registerForm").show();
			});
			</script>';
		}
		else {
			echo '<script >
			$(document).ready(function(){

				$("#loginForm").show();
				$("#registerForm").hide();

				});
				</script>';
			}
			?>

			<div id="background">
				<div id="loginContainer">
					<div id = "inputContainer">
						<form id="loginForm" action="register.php" method="POST">
							<h2>Login to your account</h2>
							<p>
								<?php echo $account->getError(Constants::$loginFailed); ?>				
								<label for="loginUsername">Username </label>
								<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g NatiShimoni" value = "<?php getInputValue('loginUsername') ?>"required>
							</p>
							<p>
								<label for="loginPassword">Password </label>
								<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
							</p>
							<button type="submit" name="loginButton">Log in</button>

							<div class="hasAccountText">
								<span id="hideLogin">Don't have an account yet? Signup for free.</span>
							</div>
						</form>


						<form id="registerForm" action="register.php" method="POST">
							<h2>Create your free account!</h2>
							<p>
								<?php echo $account->getError(Constants::$usernameCharacters); ?>
								<?php echo $account->getError(Constants::$usernameTaken); ?>
								<label for="username">Username </label>
								<input id="username" name="username" type="text" placeholder="e.g NatiShimoni" value="<?php getInputValue('username') ?>" required>
							</p>

							<p>
								<?php echo $account->getError(Constants::$firstNameCharacters); ?>
								<label for="firstName">First name </label>
								<input id="firstName" name="firstName" type="text" placeholder="e.g Nati" value="<?php getInputValue('firstName') ?>" required>
							</p>

							<p>
								<?php echo $account->getError(Constants::$lastNameCharacters); ?>	
								<label for="lastName">Last name </label>
								<input id="lastName" name="lastName" type="text" placeholder="e.g Shimoni" value="<?php getInputValue('lastName') ?>" required>
							</p>

							<p>
								<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
								<?php echo $account->getError(Constants::$emailInvalid); ?>
								<?php echo $account->getError(Constants::$emailTaken); ?>

								<label for="email">Email </label>
								<input id="email" name="email" type="email" placeholder="e.g NatiShimoni@gmail.com" value="<?php getInputValue('email') ?>" required>
							</p>

							<p>
								<label for="email2">Confirm email </label>
								<input id="email2" name="email2" type="email" placeholder="e.g NatiShimoni@gmail.com" value="<?php getInputValue('email2') ?>" required>
							</p>


							<p>
								<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
								<?php echo $account->getError(Constants::$passwordNotAlfhanumeric); ?>
								<?php echo $account->getError(Constants::$passwordsCharacters); ?>

								<label for="password">Password </label>
								<input id="password" name="password" type="password" placeholder="Your password" required>
							</p>
							<p>
								<label for="password2">Confirm password </label>
								<input id="password2" name="password2" type="password" placeholder="Confirm your password" required>
							</p>
							<button type="submit" name="registerButton">Sign up</button>

							<div class="hasAccountText">
								<span id="hideRegister">Already have an account? Log in here.</span>
							</div>

						</form>
					</div>

					<div id="loginText">
						<h1>Get your favorite music, right now!</h1>
						<h2>Listen to loads of songs for free!</h1>
							<ul>
								<li>Discover music you will fall in love with</li>
								<li>Follow artists to kkep up to date</li>
								<li>Create your own playlists</li>

							</ul>

						</div>

					</div>
				</div>

			</body>
			</html>
<?php
include("includes/config.php");

//logout manually
//session_destroy();

if(isset($_SESSION['userLoggedIn'])){
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Spotify!</title>
</head>

<body>
	Hello!
</body>

</html>
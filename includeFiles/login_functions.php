<?php 


function check_login($dbc, $email= '', $pass = ''){
	$errors = [];

	//Checks for email and removes any MySQL characters
	if (empty($email)) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($email));
	}
	//Checks for password and removes any MySQL characters
	if (empty($pass)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($pass));
	}
	if (empty($errors)) {
		// Retrieve the user_id for that email/password combination:
		$q = "SELECT userid FROM users WHERE email='$e' AND password=SHA1('$p')";
		$r = mysqli_query($dbc, $q); 
		// Check the result:
		if (mysqli_num_rows($r) == 1) {
			// Fetch the record:
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			return [true, $row];
		} else { 
			$errors[] = 'The email address and password entered do not match those on file.';
		}
		return [false, $errors];
	}
}

//Dynamic redirect defined in book
function redirect_user($page = 'index.php') {
	// URL is http:// plus the host name plus the current directory:
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	// Remove any trailing slashes:
	$url = rtrim($url, '/\\');
	// Add the page:
	$url .= '/' . $page;
	// Redirect the user:
	header("Location: $url");
	exit(); // Quit the script.
}

?>
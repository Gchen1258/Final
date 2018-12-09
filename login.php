<header>
	<?php include_once("./includeFiles/header.html");?>
	
</header>
<body>	
	<?php
		if(isset($_POST['submit'])){
			require_once("./includeFiles/login_functions.php");
			$email = $_POST['email'];
			$pass = $_POST['password'];
			require ('../../connection.php');
			$check = check_login($dbc, $email, $pass);
			if($check[0] === true){
				$_SESSION['user_id'] = $check[1]['userid'];
				$_SESSION['user_level'] = 1;
				redirect_user();
			}
			else{
				echo "Invalid email or password!";
			}
		}
	?>
	<div>

	<!-- htmlentities( $_SERVER['PHP_SELF'] ) is used to prevent XSS -->
	<form method = "post" action = "<?php echo htmlentities( $_SERVER['PHP_SELF'] ); ?>">
		Email: <input type = "email" name="email"><br><br>
		Password: <input type = "password" name="password"><br><br>
		<input type = "submit" name = 'submit' value = "Submit">
	</form>
	</div>
</body>
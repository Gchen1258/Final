<?php 
include('./includeFiles/header.html');
require('./includeFiles/db_functions.php');
require('../../connection.php');

if (isset($_GET['index'])){
	get_posts($dbc, $_GET['index']);
	$index = $_GET['index'];
}
else{
	$index = 0;
	get_posts($dbc, 0);
}

function generatePage($i){
	$page = "?index={$i}";
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	return($url);
}

?>
<div id="Menu">
	<a href="index.php" title="Home Page">Home</a><br>
	<?php 
	$a = $index;
	$a++;
	$b = $index;
	$b--;
	
	$pageup = generatePage($a);
	$pagedown = generatePage($b);
	// Display links based upon the login status:
	if (isset($_SESSION['user_id'])) 
	{
		echo '<a href="logout.php" title="Logout">Logout</a><br>
		<a href="change_password.php" title="Change Your Password">Change Password</a><br>
		<a href="'. $pageup .'">Next 5 Posts</a><br>';
	if($index > 0){
		echo'<a href="'.$pagedown.'">Previous</a><br>';
	}
	}
	else { //  Not logged in.
	echo '<a href="login.php" title="Login">Login</a><br>';
	}
?>
</div>
<!-- Menu -->

<?php
include('./includeFiles/footer.html');
?>
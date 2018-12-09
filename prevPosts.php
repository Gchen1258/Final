<?php
if(isset($_GET['index'])){
	$index = $_GET['index'];
	$index --;
}else{
	$index = 0;
}
require_once("./includeFiles/login_functions.php");
$page = "index.php?index={$index}";
redirect_user($page);
?>
<?php
include('./includeFiles/login_functions.php');
session_start();
unset($_SESSION['user_id']);
session_destroy();
redirect_user();
?>
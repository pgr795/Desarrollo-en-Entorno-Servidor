<?php
	session_start();
	setcookie('cesta',false, time() - (86400), "/");
	unset($_SESSION);
	session_unset();	
	session_destroy();
	header("location: movlogin.php");
?>
<?php
	unset($_SESSION['Usuario']);
	unset($_SESSION['id']);
	session_unset();	
	session_destroy();
	header("location: movlogin.php");
?>
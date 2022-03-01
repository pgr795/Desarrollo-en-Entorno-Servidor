<?php
	//Si no existe las variables de sesion vuelves al index
	session_start();
	var_dump($_SESSION);
	if(!isset($_SESSION['email'])){
		header("Location:../index.php");
	}
	
	include_once ('../views/Welcome_views.php');
	
?>
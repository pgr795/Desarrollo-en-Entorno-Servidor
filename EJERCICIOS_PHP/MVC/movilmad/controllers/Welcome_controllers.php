<?php
	//Si no existe las variables de sesion vuelves al index
	session_start();
		
	if(!isset($_SESSION['email'])){
		header("Location:../index.php");
	}
	else{
		unset($_SESSION['datos']);
	}
	var_dump($_SESSION);
	
	include_once ('../models/Welcome_model.php');
	include_once ('../views/Welcome_views.php');
	include_once ('Funciones/funciones.php');
?>
<?php
session_start();
unset($_SESSION['combinacion']);
if(!isset($_SESSION['id']) && !isset($_SESSION['usuario'])){
		header("Location:../index.php");
}
var_dump($_SESSION);

include_once '../views/Inicio_Hacienda_views.php';

?>

<?php
session_start();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['saldo'])){
		header("Location:../index.php");
}
var_dump($_SESSION);

include_once '../views/Inicio_views.php';

?>
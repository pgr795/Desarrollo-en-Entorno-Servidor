<?php
session_start();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['saldo'])){
	header("Location:../index.php");
}

include_once '../db/db.php';
include_once '../models/RealizarSorteo_model.php';
include_once '../views/RealizarSorteo_views.php';

var_dump($_SESSION);

$conexion=conexion();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		var_dump($_POST);
	}
?>
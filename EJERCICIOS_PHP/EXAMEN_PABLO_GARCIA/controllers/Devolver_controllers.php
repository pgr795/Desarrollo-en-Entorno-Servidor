<?php
session_start();
    if(!isset($_SESSION["email"]))
    header("location: ../index.php");

    include_once "../db/db.php";
    $conexion=conexion();
   
    include_once "../models/Devolver_model.php";
    include_once "../views/Devolver_views.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST["rental"])) {
		
		$pelicula=$_POST["rental"];
	  
		if(isset($_POST["devolver"])) {
			devolverPelicula($conexion,$pelicula);
		}
		else if(isset($_POST["volver"])){
			header("location: ../Controllers/Welcome_controllers.php");
		}
    }
?>


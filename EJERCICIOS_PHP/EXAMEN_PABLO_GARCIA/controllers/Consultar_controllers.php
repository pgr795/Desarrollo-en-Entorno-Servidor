<?php
    session_start();

    if(!isset($_SESSION["email"]))
    header("location: ../index.php");

    include_once "../db/db.php";
    $conexion=conexion();
   
    include_once "../models/Consultar_model.php";
    include_once "../views/Consultar_views.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tematica= $_POST["tematica"];
      
        if(isset($_POST["consultar"])) {
			$peliculasTematica=consultarAlquileres($conexion,$tematica);
			mostrarTematica($peliculasTematica);
		}
        else if(isset($_POST["Volver"])){
            header("location: Welcome_controllers.php");
		}
    }
?>
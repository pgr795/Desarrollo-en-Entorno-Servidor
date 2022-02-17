<?php
//REDIRIGIENDO A MOVWELCOME
//header("location: movwelcome.php");

//INICIANDO SESSIONS

//VERIFICANDO SESSIONS
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['id'])){
		header("location: movlogin.php");
}

//RECOGIENDO DATOS
$usuario=$_SESSION['Usuario'];
$id=$_SESSION['id'];


?>
<?php

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["caja1"])) {
    $validar = "Error Nombre";
  }
  if (empty($_POST["caja2"])) {
    $validar = "Error Apellido";
  } 
  if (empty($_POST["caja3"])) {
    $validar = "Error";
  } 
}

echo $validar; */

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["caja1"])) {
    $validar = "Error Nombre";
  }
  if (isset($_POST["caja2"])) {
    $validar = "Error Apellido";
  } 
  if (isset($_POST["caja3"])) {
    $validar = "Error";
  } 
}

echo $validar; */



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["caja1"]);
  $valor2 = limpieza($_POST["caja2"]);
  $valor3 = limpieza($_POST["caja3"]);
  $valor4 = limpieza($_POST["caja4"]);
  $valor5 = limpieza($_POST["caja5"]);
}

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

var_dump($_POST);

$fichero =fopen("alumnos1.txt","x");

$nombre=str_pad($valor1,39);
var_dump($nombre);


$apellido=str_pad($valor2,40);
var_dump($apellido);


$apellido2=str_pad($valor3,42);
var_dump($apellido2);


$fecha=str_pad($valor4,11);
var_dump($fecha);


$localidad=str_pad($valor5,27);
var_dump($localidad);

$escritura=$nombre.$apellido.$apellido2.$fecha.$localidad;

fwrite($fichero,$escritura);

fclose($fichero);




?>

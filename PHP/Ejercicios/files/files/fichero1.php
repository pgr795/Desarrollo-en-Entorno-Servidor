<?php

var_dump($_POST);
$valor1;
$valor2;
$valor3;
$valor4;
$valor5;

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










?>

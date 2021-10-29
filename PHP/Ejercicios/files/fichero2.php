<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = limpieza($_POST["caja1"]);
  $apellido = limpieza($_POST["caja2"]);
  $apellido2 = limpieza($_POST["caja3"]);
  $fecha = limpieza($_POST["caja4"]);
  $localidad = limpieza($_POST["caja5"]);
}

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

var_dump($_POST);

$fichero =fopen("alumnos2.txt","a");

$escritura=$nombre."##".$apellido."##".$apellido2."##".$fecha."##".$localidad."##"."\n";

fwrite($fichero,$escritura);

fclose($fichero);

?>

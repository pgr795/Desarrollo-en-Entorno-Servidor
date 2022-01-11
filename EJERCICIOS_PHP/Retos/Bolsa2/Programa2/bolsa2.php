<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty($_POST["caja1"])) {
    $validar = "Error";
	echo $validar;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["caja1"]);
}

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

$nombre=$valor1;

$archivo=file("ibex35.txt");

foreach($archivo as $indice => $valor) {
		$aux=substr($valor,0,17);
		$nombre=strtoupper($nombre);
		$aux=trim($aux," ");

		if($aux==$nombre){
			$valores=substr($valor,0,97);
			echo "<h3>".$valores."</h3>";
		}	
}


 //trim()
 //str_split()
 //str_replace
 //parse_str — Convierte el string en variables
 //explode

?>
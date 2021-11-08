<?php
var_dump($_POST);

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

$Valor=array();
$Ultimo=array();

$archivo=file("ibex35.txt");

foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor." ";
			$Valor[$indice]=substr($aux,0,17);
			echo substr($Valor[$indice],0,17)."<br>";
		}	
}

foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor." ";
			$Ultimo[$indice]=substr($aux,23,6);
			echo substr($Ultimo[$indice],23,6)."<br>";
		}	
}





 //trim()
 //str_split()
 //str_replace
 //parse_str — Convierte el string en variables
 //explode
var_dump($Valor);
var_dump($Ultimo);

?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["caja1"]);
  $valor2 = limpieza($_POST["caja2"]);
  $valor3 = limpieza($_POST["caja3"]);
  $valor4 = limpieza($_POST["fichero"]);
}

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

$validar="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["caja1"])) {
    echo $validar = "Error: No se ha introducido ningun fichero <br>";
  }
  if (empty($_POST["caja2"]) && $valor4=="MostrarLinea") {
    echo $validar = "Error: No se ha introducido ningun numero <br>";
  } 
  if (empty($_POST["caja3"])&& $valor4=="MostrarPrimeraLineas") {
   echo $validar = "Error: No se ha introducido ningun numero <br>";
  } 
  if (empty($_POST["fichero"])) {
   echo $validar = "Error: No se ha seleccionado ninguna operacion <br>";
  } 
}

/* var_dump($_POST); */

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
} */

$nombre_fichero = $valor1;

	if (file_exists($nombre_fichero)) {
	   
	   if($valor4=="MostrarFichero" ){
			$fichero=readfile("$nombre_fichero");
			echo "<br>";
			readfile("$nombre_fichero");
	   }
	   
	   if($valor4=="MostrarLinea" && !empty($valor2)){
			$fichero=file($nombre_fichero);
			// var_dump($fichero);
			$valor2=(int)$valor2;
			foreach($fichero as $linea=>$texto) {
				if($linea==$valor2){
					echo "<b>Linea ".$linea."</b><br>".$texto;
					// var_dump($texto);
				}
			}
	   }
	   if($valor4=="MostrarPrimeraLineas"){
			$fichero=file($nombre_fichero);
			$valor3=(int)$valor3;
			foreach($fichero as $linea=>$texto) {
				if($linea<$valor3){
					echo "<b>"."Linea ".$linea.":</b> ".$texto."<br>";
					/* var_dump($texto); */
				}
			}
	   }
	} 
	else {
		echo "El fichero $nombre_fichero no existe";
	}

?>

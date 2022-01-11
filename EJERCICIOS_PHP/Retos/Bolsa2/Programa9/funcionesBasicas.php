<?php

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

function limpieza2($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  $datos = strtoupper($datos);
  return $datos;
}

function nombres($fichero){
	$Nombres=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
			if($indice!=0){
				$aux=$valor." ";
				$Nombres[$indice]=substr($aux,0,17);
				$Nombres[$indice]=trim($Nombres[$indice]," ");
			}	
	}
	return $Nombres;
}

function ultimo($fichero){
	$Ultimo=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor." ";
			$Ultimo[$indice]=substr($aux,23,6);
			$Ultimo[$indice]=trim($Ultimo[$indice]," ");
		}	
	}
	return $Ultimo;
}

function varacion1($fichero){
	$Varacion1=array();
	$archivo=file($fichero);
		foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor."";
			$Varacion1[$indice]=substr($aux,32,5);
			$Varacion1[$indice]=trim($Varacion1[$indice]," ");
		}	
	}
	return $Varacion1;
}


function varacion2($fichero){
	$Varacion2=array();
	$archivo=file($fichero);
		foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor." ";
			$Varacion2[$indice]=substr($aux,40,5);
			$Varacion2[$indice]=trim($Varacion2[$indice]," ");
		}	
	}
	return $Varacion2;
}

function accAño($fichero){
	$AccAño=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor." ";
			$AccAño[$indice]=substr($aux,48,6);
			$AccAño[$indice]=trim($AccAño[$indice]," ");
		}	
	}
	return $AccAño;
}

function maximo($fichero){
	$Maximo=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor." ";
			$Maximo[$indice]=substr($aux,60,6);
			$Maximo[$indice]=trim($Maximo[$indice]," ");
		}	
	}
	return $Maximo;
}

function minimo($fichero){
	$Minimo=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor." ";
			$Minimo[$indice]=substr($aux,69,6);
			$Minimo[$indice]=trim($Minimo[$indice]," ");
		}	
	}
	return $Minimo;
}

function volumen($fichero){
	$volumen=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor." ";
			$volumen[$indice]=substr($aux,78,10);
			$volumen[$indice]=trim($volumen[$indice]," ");
		}	
	}
	return $volumen;
}
 
function capitalizacion($fichero){
	$capital=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
		if($indice!=0){
			$aux=$valor." ";
			$capital[$indice]=substr($aux,91,6);
			$capital[$indice]=trim($capital[$indice]," ");
		}	
	}
	return $capital;
}

/* for($i=0;$i<count($Nombres);i++){
	echo '<option value="$Nombres[$i]">$Nombres[$i]</option>' ;
}	 */

/* <?php
			include('funcionesBasicas.php');
			include('bolsa4.php');
			$fichero="ibex35.txt";
			$Nombres=nombres($fichero);
			foreach($Nombres as $indice => $valor) {
				echo "<option value='$valor'>$valor</option>";  
			}	
?>
 */


?>
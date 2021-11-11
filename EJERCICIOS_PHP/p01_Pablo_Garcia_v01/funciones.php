<?php
function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

function dado(){
	$dado=rand(1,6);
	return $dado;
}

function jugada($numDados){
	 $aux=array();
	 $numdados=(int)$numDados;
	 $contador=0;
	 for($i=0;$i<$numdados;$i++){
		$aux[$i]=dado();
	 }
	 return $aux;
}

function resultadoSuma($tiradaJug){
	$resultado=array_sum($tiradaJug);
	return $resultado;
}

function numerosIguales($tiradaJug){
	$contador=0;
	$elementosArray=count($tiradaJug);
	$resultado=0;
	$num=0;
	foreach($tiradaJug as $indice => $valor) {
		$num=$tiradaJug[0];
		if($num==$valor){
		 $contador++;
		}
		if($contador==$elementosArray){
			$resultado=100;
		}
	}
	return $resultado;
}

function mostrarTiradas($tiradaJug){
	foreach($tiradaJug as $indice => $valor) {
		echo $valor." ";
		}
	}



function mostrarGanadores($ganadores){
	foreach($ganadores as $indice => $valor) {
		if($indice==4){
			echo "Ganadores=".$valor;
		}
		if($indice!=4){
		echo "Jugador $indice =".$valor;
		echo "<br>";
		}
	}
}


?>
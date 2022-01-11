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

function resultado($tiradaJug1,$tiradaJug2,$tiradaJug3,$tiradaJug4,$numDados){
	
	//Comprobar si se repiten los numeros
	$contador100=0;
	$contador=0;
	var_dump($numDados);
	if($numDados >= 2 && $numDados<=10){	
		$resultado1=numerosIguales($tiradaJug1);
		$resultado2=numerosIguales($tiradaJug2);
		$resultado3=numerosIguales($tiradaJug3);
		$resultado4=numerosIguales($tiradaJug4);
		
		if($resultado1==100){
			$contador100++;
		}
		else{
			$resultado1=resultadoSuma($tiradaJug1);	
		}
		if($resultado2==100){
			$contador100++;
		}	
		else{
			$resultado2=resultadoSuma($tiradaJug2);
			
		}
		if($resultado3==100){
			$contador100++;
		}
		else{
			$resultado3=resultadoSuma($tiradaJug3);
		}
		if($resultado4==100){
			$contador100++;	
		}
		else{
			$resultado4=resultadoSuma($tiradaJug4);	
		}
		
		if($contador100!=0){
			$resultados=array();
			$resultados[0]=$resultado1;
			$resultados[1]=$resultado2;
			$resultados[2]=$resultado3;
			$resultados[3]=$resultado4;
			$resultados[4]=$contador100;
			return $resultados;
		}
		else{
			$resultados2=array($resultado1,$resultado2,$resultado3,$resultado4,$contador);
			$aux=max($resultados2);
			foreach($resultados2 as $indice => $valor) {
				if($aux==$valor){
					$contador++;
				}
			}
			$resultados2[4]=$contador;
			return $resultados2;
		}	
	}
	else if($numDados==1){
		$resultados3=array($tiradaJug1,$tiradaJug2,$tiradaJug3,$tiradaJug4);
		return $resultados3;
	}
	else{
		return 0;
	}	
}

function jugada($jugador,$numDados){
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
	$celdas=count($tiradaJug);
	foreach($tiradaJug as $indice => $valor) {
		if($celdas!=$indice){
			echo "<td><img src=./images/".$valor.".PNG width=90px height=90px></td>";
		}
	}
}

function mostrarGanadores($resultados,$partida){
	$aux=$resultados;
	$aux2=$partida;
	$maxPuntuacion=max($aux);
	foreach($resultados as $indice => $valor) {
		if($aux[$indice]==$maxPuntuacion){
			echo "<b>".key($aux2)."</b><br>";
			echo "<br>";
		}
		if($indice==4){
			echo "<b>"."Total de Ganadores: </b> ".$valor;
		}
		next($aux2);
	}
}


?>
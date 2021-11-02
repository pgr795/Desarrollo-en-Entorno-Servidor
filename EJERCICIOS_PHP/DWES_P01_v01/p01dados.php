<?php
include('funciones.php');
var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre1"])) {
    $valor1 = " ";
  }
  if (empty($_POST["nombre2"])) {
    $valor2 = " ";
  } 
  if (empty($_POST["nombre3"])) {
    $valor3 = " ";
  } 
  if (empty($_POST["nombre4"])) {
    $valor4 = " ";
  } 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["nombre1"]);
  $valor2 = limpieza($_POST["nombre2"]);
  $valor3 = limpieza($_POST["nombre3"]);
  $valor4 = limpieza($_POST["nombre4"]);
  $numDados = limpieza($_POST["numdados"]);
  $tirar = limpieza($_POST["tirar"]);
}



$jugador1=$valor1;
$jugador2=$valor2;
$jugador3=$valor3;
$jugador4=$valor4;

$tiradaJug1=jugada($numDados);
$tiradaJug2=jugada($numDados);
$tiradaJug3=jugada($numDados);
$tiradaJug4=jugada($numDados);

echo "Jugador1: ";
mostrarTiradas($tiradaJug1);
echo "<br>";
echo "Jugador2: ";
mostrarTiradas($tiradaJug2);
echo "<br>";
echo "Jugador3: ";
mostrarTiradas($tiradaJug3);
echo "<br>";
echo "Jugador4: ";
mostrarTiradas($tiradaJug4);

var_dump($tiradaJug1);
var_dump($tiradaJug2);
var_dump($tiradaJug3);
var_dump($tiradaJug4);



$ganadores=ganador($tiradaJug1,$tiradaJug2,$tiradaJug3,$tiradaJug4);
var_dump($ganadores);

echo mostrarGanadores($ganadores);

function ganador($tiradaJug1,$tiradaJug2,$tiradaJug3,$tiradaJug4){
	
	//Comprobar si se repiten los numeros
	$resultado1=numerosIguales($tiradaJug1);
	$resultado2=numerosIguales($tiradaJug2);
	$resultado3=numerosIguales($tiradaJug3);
	$resultado4=numerosIguales($tiradaJug4);
	$contador100=0;
	$contador=0;
	$resultado=array();
	$ganador=array();
		
	if($resultado1==100){
		$contador100++;
	}
	else{
		$resultado1=resultadoSuma($tiradaJug1);
		$ganador[0]=$resultado1;
	}
	if($resultado2==100){
		$contador100++;
	}	
	else{
		$resultado2=resultadoSuma($tiradaJug2);
		$ganador[1]=$resultado2;
	}
	if($resultado3==100){
		$contador100++;
	}
	else{
		$resultado3=resultadoSuma($tiradaJug3);
		$ganador[2]=$resultado3;
	}
	if($resultado4==100){
		$contador100++;	
	}
	else{
		$resultado4=resultadoSuma($tiradaJug4);
		$ganador[3]=$resultado4;	
	}

	if($contador100!=0){
		$ganador[0]=$resultado1;
		$ganador[1]=$resultado2;
		$ganador[2]=$resultado3;
		$ganador[3]=$resultado4;
		$ganador[4]=$contador100;
		return $ganador;
	}
	else{
		$resultado=array($resultado1,$resultado2,$resultado3,$resultado4,$contador);
		$aux=max($resultado);
		var_dump($aux);
		foreach($resultado as $indice => $valor) {
			var_dump($valor);
			if($aux==$valor){
				$contador++;
			}
		}
		$resultado[4]=$contador;
		$ganador=$resultado;
		
		return $ganador ;
	}
/* 	var_dump($resultado);
	var_dump($resultado1);
	var_dump($resultado2);
	var_dump($resultado3);
	var_dump($resultado4);
	var_dump($ganador);
	var_dump($ganador1); */	
}



//Array Asociativo con el nombre del jugador y un array donde estarán las tiradas.
$partida=array("$jugador1" => $tiradaJug1,"$jugador2" => $tiradaJug2, "$jugador3" => $tiradaJug3, "$jugador4" => $tiradaJug4);
		

var_dump($partida);
?>
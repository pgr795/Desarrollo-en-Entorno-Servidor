<?php
include('funciones.php');
/* var_dump($_POST); */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre1"])) {
    $valor1 ="";
  }
  if (empty($_POST["nombre2"])) {
    $valor2 ="";
  } 
  if (empty($_POST["nombre3"])) {
    $valor3 ="";
  } 
  if (empty($_POST["nombre4"])) {
    $valor4 ="";
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


$tiradaJug1;
$tiradaJug2;
$tiradaJug3;
$tiradaJug4;
//Array Asociativo con el nombre del jugador y un array donde estarán las tiradas.
$partida=array("$jugador1" => $tiradaJug1=jugada($jugador1,$numDados),
			   "$jugador2" => $tiradaJug2=jugada($jugador2,$numDados),
			   "$jugador3" => $tiradaJug3=jugada($jugador3,$numDados), 
			   "$jugador4" => $tiradaJug4=jugada($jugador4,$numDados)
			   );

if($numDados<11){
echo "<table border='1px'>";
echo "<tr>";
echo "<td width=90px height=90px><h2>$jugador1</h2></td>";
	mostrarTiradas($tiradaJug1);
echo "</tr>";
echo "<tr>";
echo "<td width=90px height=90px><h2>$jugador2</h2></td>";
	mostrarTiradas($tiradaJug2);
echo "</tr>";
echo "<tr>";
echo "<td width=90px height=90px><h2>$jugador3</h2></td>";
	mostrarTiradas($tiradaJug3);
echo "</tr>";
echo "<td width=90px height=90px><h2>$jugador4</h2></td>";
	mostrarTiradas($tiradaJug4);
echo "</tr>";
echo "</table>";


$resultados=resultado($tiradaJug1,$tiradaJug2,$tiradaJug3,$tiradaJug4,$numDados);

}

$resultados=0; 
if($resultados==0){
	echo "<br>";
	echo "El numero de dados debe ser entre 1 y 10";
}
else{
	echo "<div>";
	echo "<h3>Ganadores</h3>";
	echo mostrarGanadores($resultados,$partida);
	echo "</div>";
}

/* var_dump($partida);
var_dump($resultados); */



?>
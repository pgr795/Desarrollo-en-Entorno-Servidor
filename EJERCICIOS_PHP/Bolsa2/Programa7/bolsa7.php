<?php
include('funcionesBasicas.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza2($_POST["caja1"]);
  $valor2 = limpieza2($_POST["caja2"]);
}
/* var_dump($_POST); */
$fichero="ibex35.txt";

$nombresValor=nombres($fichero);
$vol=volumen($fichero);
$cap=capitalizacion($fichero);
$nombre1=$valor1;
$nombre2=$valor2;

echo "<table border=1px>";
echo "<tr>";
echo "<td>VALOR</td>";
echo "<td>VOLUMEN NEGOCIADO</td>";
echo "<td>TOTAL CAPITALIZADO</td>";
echo "</tr>";

if(in_array("$nombre1",$nombresValor)){
		$clave = array_search("$nombre1", $nombresValor); 
	echo "<tr>";
		echo "<td>".$nombresValor[$clave]."</td>";
		echo "<td>".$vol[$clave]."</td>";
		echo "<td>".$cap[$clave]."</td>";
	echo "</tr>";
}	
if(in_array("$nombre2",$nombresValor)){
		$clave2 = array_search("$nombre2", $nombresValor); 
	echo "<tr>";
		echo "<td>".$nombresValor[$clave2]."</td>";
		echo "<td>".$vol[$clave2]."</td>";
		echo "<td>".$cap[$clave2]."</td>";
	echo "</tr>";
}	

echo "</table>";

?>
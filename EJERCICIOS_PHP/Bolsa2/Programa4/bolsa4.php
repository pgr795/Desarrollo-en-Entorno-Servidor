<?php
include('funcionesBasicas.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza2($_POST["caja1"]);
  $valor2 = limpieza2($_POST["caja2"]);
}

$fichero="ibex35.txt";

$nombresValor=nombres($fichero);
$Ultimo=ultimo($fichero);
$max=maximo($fichero);
$min=minimo($fichero);
$capital=capitalizacion($fichero);
$nombre1=$valor1;
$nombre2=$valor2;

echo "<table border=1px>";
echo "<tr>";
echo "<td>VALOR</td>";
echo "<td>ULTIMO</td>";
echo "<td>MAX</td>";
echo "<td>MINIMO</td>";
echo "<td>CAPITALIZACION</td>";
echo "</tr>";

if(in_array("$nombre1",$nombresValor)){
		$clave = array_search("$nombre1", $nombresValor); 
	echo "<tr>";
		echo "<td>".$nombresValor[$clave]."</td>";
		echo "<td>".$Ultimo[$clave]."</td>";
		echo "<td>".$max[$clave]."</td>";
		echo "<td>".$min[$clave]."</td>";
		echo "<td>".$capital[$clave]."</td>";
	echo "</tr>";
}	
if(in_array("$nombre2",$nombresValor)){
		$clave2 = array_search("$nombre2", $nombresValor); 
	echo "<tr>";
		echo "<td>".$nombresValor[$clave2]."</td>";
		echo "<td>".$Ultimo[$clave2]."</td>";
		echo "<td>".$max[$clave2]."</td>";
		echo "<td>".$min[$clave2]."</td>";
		echo "<td>".$capital[$clave2]."</td>";
	echo "</tr>";
}	
echo "</table>";

?>
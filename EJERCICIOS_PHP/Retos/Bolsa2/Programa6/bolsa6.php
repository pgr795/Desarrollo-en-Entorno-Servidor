<?php
include('funcionesBasicas.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza2($_POST["caja1"]);
  $valor2 = limpieza2($_POST["caja2"]);
}
/* var_dump($_POST); */
$fichero="ibex35.txt";

$nombresValor=nombres($fichero);
$min=minimo($fichero);
$nombre1=$valor1;
$nombre2=$valor2;

$numero;
$numero2;
$resultado;
echo "<table border=1px>";
echo "<tr>";
echo "<td>VALOR</td>";
echo "<td>MINIMO</td>";
echo "</tr>";

if(in_array("$nombre1",$nombresValor)){
		$clave = array_search("$nombre1", $nombresValor); 
	echo "<tr>";
		echo "<td>".$nombresValor[$clave]."</td>";
		echo "<td>".$min[$clave]."</td>";
		$numero=floatval($min[$clave]);
	echo "</tr>";
}	
if(in_array("$nombre2",$nombresValor)){
		$clave2 = array_search("$nombre2", $nombresValor); 
	echo "<tr>";
		echo "<td>".$nombresValor[$clave2]."</td>";
		echo "<td>".$min[$clave2]."</td>";
		$numero2=floatval($min[$clave2]);
	echo "</tr>";
}	

$resultado=($numero+$numero2)/2;

echo "<tr>
		<td>VALOR MEDIO</td>
		<td>".$resultado."</td>
	</tr>";
echo "</table>";

?>
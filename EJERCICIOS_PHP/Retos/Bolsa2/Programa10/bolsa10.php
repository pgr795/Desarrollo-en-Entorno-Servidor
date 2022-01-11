<?php
include('funcionesBasicas.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["caja1"]);
}
/* var_dump($_POST); */

$fichero="ibex35.txt";

$vol=volumen($fichero);

$cap=capitalizacion($fichero);

/* var_dump($vol);
var_dump($cap); */

$nombre1=$valor1;

$aux=0;

if($nombre1=="TotalVolumen"){
	foreach($vol as $indice => $valor) {
			$num=floatval($valor);
			$aux+=$num;
			$aux2="Total Volumen";
	}	
}

if($nombre1=="TotalCapitalizacion"){
	foreach($cap as $indice => $valor) {
			$num=floatval($valor);
			$aux+=$num;
			$aux2="Total Capitalizacion";

	}	
}
echo "<h1><b>Valores Bursatiles</b></h1>
						<div>
							<label for='Caja1'>$aux2</label>
							<input type='text' value='$aux' /> <br />
						</div>
						<br />
						<input type='submit' value='Realizar Otra Consulta' />
						<input type='reset' value='Borrar' />";
?>
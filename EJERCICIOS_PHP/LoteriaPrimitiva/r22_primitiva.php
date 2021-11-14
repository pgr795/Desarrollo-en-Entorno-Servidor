<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Primitiva HTML</title>
</head>
<body>
	<img src="primitiva.jpg">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<p>Fecha del sorteo <input type='date' name='fechasorteo' size=15><br>
	<p>Recaudación Sorteo <input type='text' name='recaudacion' size=10><br>
	<p>Pulsa para generar combinación ganadora: <input type="submit" value="Combinacion" name="combinacion"></p>
	</form>
</body>
</html>

<?php
	include 'r22_funciones.php';
	// echo "<h1>Resultados</h1>";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["fechasorteo"]);
		$valor2 = limpieza($_POST["recaudacion"]);
		$valor3 = combinacionGanadora($_POST["combinacion"]);
	}
	
	$fechaSorteo=$valor1;
	$recaudacion=$valor2;
	$combinacionGanadora=$valor3;
	// var_dump($combinacionGanadora);

	$fichero="r22_primitiva.txt";
	//Para mostrar el resultado de la combinacion Ganadora
	echo mostrarResultado($combinacionGanadora,$fechaSorteo);

	//Con esta funcion extraeremos del fichero r_22primitiva.txt todos los numeros
	//con un array de 100 posiciones donde se guardaran los numeros
	
	$numerosPrimitiva=numeros($fichero);

	//Con esta funcion nos sacara un array de 100 posiciones con 4 indices
	// [0] numeros acertados, [1] complementario, [2] reintegro, [3] fallos.  
	$acertantes=Acertantes(numeros($fichero),$combinacionGanadora);

	echo mostrarAcertantes($acertantes);

 	$premios=premios($recaudacion,$fechaSorteo);
	
	// var_dump($numerosPrimitiva);
	// var_dump($acertantes);


//
// $aux=clasificacionAcertantes($jug);
// var_dump($aux);

	
?>

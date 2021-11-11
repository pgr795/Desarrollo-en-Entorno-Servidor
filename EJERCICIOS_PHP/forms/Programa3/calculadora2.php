<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h1><b>Conversor Binario</b></h1>
						<div>
							<label for="Caja1">Numero Decimal</label>
							<input type="text" name="caja1" /> <br />
						</div>
						<br />
						<input type="submit" value="Enviar" />
						<input type="reset" value="Borrar" />
</form>


<?php
var_dump($_POST);
$valor1;
$resultado;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["caja1"]);
}

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}


	echo "<h1><b>Conversor Binario</b></h1>";
	echo "<div>
			<label for='Caja1'>Numero Decimal</label>
			<input type='text' name='caja1' value='$valor1' /> <br />
		</div>
		<br />
		<br />";
		
	$resultado=decbin($valor1);
	echo "<div>
			<label for='Caja1'>Numero Binario</label>
			<input type='text' name='binario' value='$resultado'/> <br />
		</div>";

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["caja1"]);
  $valor2 = limpieza($_POST["caja2"]);
  $operando = limpieza($_POST["operando"]);
} */

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($valor1)) {
    $valor1Err = "Error";
  }
  if (empty($valor2)) {
    $valor2Err = "Error";
  } 
  if (empty($operando)) {
    $operandoError = "Error";
  } 
} */

?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<h1><b>Cambio de Base</b></h1>
						<div>
							<label for="Caja1">Numero</label>
							<input type="text" name="Numero" /> <br />
						</div>
						<br />
						<div>
							<label for="Caja2">Nueva Base</label>
							<input type="text" name="Base" /> <br />
						</div>
						<br />
						<input type="submit" value="Enviar" />
						<input type="reset" value="Borrar" />
</form>


<?php
var_dump($_POST);
$valor1;
$base;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["Numero"]);
  $base = limpieza($_POST["Base"]);
}

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

$array = explode("/",$valor1);
var_dump($array);

$num1=$array[0];
$num2=$array[1];

var_dump($num1);
var_dump($num2);
$resultado= base_convert($num1,$num2,$base);

var_dump($resultado);


echo "<h1><b>Cambio de Base</b></h1>";
	echo "<div>
			<p>Numero $array[0] en base $array[1] = $resultado en base $base</p>
		</div>
		<br />
		<br />";
		
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

<?php
var_dump($_POST);
$valor1;
$operando;
$resultado;
$resultado2;
$resultado3;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["caja1"]);
  $operando = limpieza($_POST["operando"]);
}

echo "<h1><b>Conversor numerico</b></h1>";
function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

	if($operando=="Binario"){
	$resultado=decbin($valor1);
	echo "<div>
			<label for='Caja1'>Numero Decimal</label>
			<input type='text' name='caja1' value='$valor1'/> <br/>
			<br/>
		</div>";
	echo	
		"<table>
			<tr>
				<td style=''border:solid 1px''>Binario</td>
				<td style=''border:solid 1px''>$resultado</td>
			</tr>
		</table>";
	}
	else if($operando=="Octal"){
	$resultado=decoct($valor1);
	echo "<div>
			<label for='Caja1'>Numero Decimal</label>
			<input type='text' name='caja1' value='$valor1'/> <br/>
			<br/>
		</div>";
	echo	
		"<table>
			<tr>
				<td style='border:solid 1px'>Octal</td>
				<td style='border:solid 1px'>$resultado</td>
			</tr>
		</table>";	
	}
	else if($operando=="Hexadecimal"){
		$resultado=decbin($valor1);
		$resultado2=decoct($valor1);
		$resultado3=dechex($valor1);
	echo "<div>
			<label for='Caja1'>Numero Decimal</label>
			<input type='text' name='caja1' value='$valor1'/> <br/>
			<br/>
		</div>";
	echo	
		"<table>
			<tr>
				<td style='border:solid 1px'>Hexadecimal</td>
				<td style='border:solid 1px'>$resultado</td>
			</tr>
		</table>";	
	}
	else if($operando=="Todos"){
		$resultado=decbin($valor1);
		$resultado2=decoct($valor1);
		$resultado3=dechex($valor1);
	echo "<div>
			<label for='Caja1'>Numero Decimal</label>
			<input type='text' name='caja1' value='$valor1'/> <br/>
			<br/>
		</div>";
	echo	
		"<table>
			<tr>
				<td style='border:solid 1px'>Binario</td>
				<td style='border:solid 1px'>$resultado</td>
			</tr>
			<tr>
				<td style='border:solid 1px'>Octal</td>
				<td style='border:solid 1px'>$resultado2</td>
			</tr>
			<tr>
				<td style='border:solid 1px'>Hexadecimal</td>
				<td style='border:solid 1px'>$resultado3</td>
			</tr>
		</table>";	
	}

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
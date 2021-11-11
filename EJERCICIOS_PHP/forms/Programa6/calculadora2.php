<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<h1><b>IP</b></h1>
						<div>
							<label for="Caja1">IP notacion decimal</label>
							<input type="text" name="caja1" /> <br />
						</div>
						<br />
						<input type="submit" value="Notacion Binaria" />
						<input type="reset" value="Borrar" />
</form>

<?php
$valor1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["caja1"]);
}

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

$separar = explode(".",$valor1);


$num1=binarios($separar[0]);
$num2=binarios($separar[1]);
$num3=binarios($separar[2]);
$num4=binarios($separar[3]);  //($array[3]);

$array = array($num1,$num2,$num3,$num4);
$resultadoFinal = implode(".", $array);


function binarios($numero){
$aux=decbin($numero);
// var_dump($aux);
	
	if($numero<=127){
		$length = 8;
		$binario = substr(str_repeat(0, $length).$aux, - $length);
		$aux=$binario;
	}
	return $aux;
}

echo	"<h1><b>IP</b></h1>
			<div>
				<label for='Caja1'>IP notacion decimal</label>
					<input type='text' name='caja1' value='$valor1'/> <br />
			</div>
			<br />
			<div>
				<label for='Caja2'>IP Binario</label>
					<input type='textarea' name='caja2' value='$resultadoFinal' /> <br />
			</div>"
			;


// var_dump($_POST);
// var_dump($separar);
// var_dump($num1);
// var_dump($num2);
// var_dump($num3);
// var_dump($num4);
// var_dump($array);
// var_dump($resultadoFinal);

?>
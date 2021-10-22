<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div>
							<label for="Caja1">Operando1</label>
							<input type="text" name="caja1" /> <br />
							<label for="Caja2">Operando2</label>
							<input type="text" name="caja2" /> <br />
						</div>
						<br/>
						<div>
							<fieldset>
								<legend>Selecciona operación</legend>
								<input type="radio" value="Suma" name="operando" /> Suma </br>
								<input type="radio" value="Resta" name="operando" /> Resta </br>
								<input type="radio" value="Producto" name="operando" /> Producto </br>
								<input type="radio" value="Division" name="operando" /> Division </br>
							</fieldset>
						</div>
						<br />
						<input type="submit" value="Enviar" />
						<input type="reset" value="Borrar" />
</form>


<?php
var_dump($_POST);
$valor1/* =$_POST["caja1"] */;
$valor2/* =$_POST["caja2"] */; 
$operando/* =$_POST["operando"] */;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza($_POST["caja1"]);
  $valor2 = limpieza($_POST["caja2"]);
  $operando = limpieza($_POST["operando"]);
}

function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

$resultado;

if($operando=="Suma"){
	$resultado=suma($valor1,$valor2);
	echo "La suma de $valor1 y $valor2 es: ".$resultado;
}
else if($operando=="Resta"){
	$resultado=resta($valor1,$valor2);
	echo "La resta de $valor1 y $valor2 es: ".$resultado;
}
else if($operando=="Producto"){
	$resultado=producto($valor1,$valor2);
	echo "El producto de $valor1 y $valor2 es: ".$resultado;
}
else if($operando=="Division"){
	$resultado=division($valor1,$valor2);
	echo "La division de $valor1 y $valor2 es: ".$resultado;
}


function suma($valor1,$valor2){
	return $valor1+$valor2;
}
function resta($valor1,$valor2){
	return $valor1-$valor2;
}
function producto($valor1,$valor2){
	return $valor1*$valor2;
}
function division($valor1,$valor2){
	return $valor1/$valor2;
}
?>
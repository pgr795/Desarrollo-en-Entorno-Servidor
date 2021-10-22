<?php
var_dump($_POST);
$valor1;
$valor2; 
$operando;

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
echo "<h1><b>Calculadora</b></h1>";
if($operando=="Suma"){
	$resultado=suma($valor1,$valor2);
	echo "<label for='Caja1'>Operando1</label>
			<input type='text' name='caja1' value='$valor1'/> 
			<br />
			<label for='Caja2'>Operando2</label>
			<input type='text' name='caja2' value='$valor2'/> <br/>";
	echo "El resultado de $valor1 y $valor2 es: $resultado";
}
else if($operando=="Resta"){
	$resultado=resta($valor1,$valor2);
	echo "<label for='Caja1'>Operando1</label>
			<input type='text' name='caja1' value='$valor1'/> 
			<br />
			<label for='Caja2'>Operando2</label>
			<input type='text' name='caja2' value='$valor2'/> <br/>";
	echo "El resultado de $valor1 y $valor2 es: $resultado";
}
else if($operando=="Producto"){
	$resultado=producto($valor1,$valor2);
	echo "<label for='Caja1'>Operando1</label>
			<input type='text' name='caja1' value='$valor1'/> 
			<br />
			<label for='Caja2'>Operando2</label>
			<input type='text' name='caja2' value='$valor2'/> <br/>";
	echo "El resultado de $valor1 y $valor2 es: $resultado";
}
else if($operando=="Division"){
	$resultado=division($valor1,$valor2);
	echo "<label for='Caja1'>Operando1</label>
			<input type='text' name='caja1' value='$valor1'/> 
			<br />
			<label for='Caja2'>Operando2</label>
			<input type='text' name='caja2' value='$valor2'/> <br/>";
	echo "El resultado de $valor1 y $valor2 es: $resultado";
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
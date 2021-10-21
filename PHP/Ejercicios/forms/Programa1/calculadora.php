<?php
var_dump($_POST);
$valor1=$_POST["caja1"];
$valor2=$_POST["caja2"]; 
$operando=$_POST["operando"];
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
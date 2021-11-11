<?php
include('funcionesBasicas.php');

/* var_dump($_POST); */

$fichero="ibex35.txt";

$ultimo=ultimo($fichero);
$var=variacion1($fichero);
$var2=variacion2($fichero);
$accaño=accAño($fichero);
$max=maximo($fichero);
$min=minimo($fichero);
$cap=capitalizacion($fichero);
$vol=volumen($fichero);
$cap=capitalizacion($fichero);

/*
var_dump($ultimo); 
var_dump($cap); 
var_dump($cap); 
var_dump($cap); 
var_dump($cap); 
var_dump($cap);  
var_dump($vol);
var_dump($cap); */


echo "Valor maximo de Ultimo: ".max($ultimo)."<br>";
echo "Valor maximo de Var.%: ".max($var)."<br>";
echo "Valor maximo de Var: ".max($var2)."<br>";
echo "Valor maximo de Ac.%año: ".max($accaño)."<br>";
echo "Valor maximo de Max.: ".max($max)."<br>";
echo "Valor maximo de Min.: ".max($min)."<br>";
echo "Valor maximo de Vol.: ".max($vol)."<br>";
echo "Valor maximo de Capit.: ".max($cap)."<br>";
?>
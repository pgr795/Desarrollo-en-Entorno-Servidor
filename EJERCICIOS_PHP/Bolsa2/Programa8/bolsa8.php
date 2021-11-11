<?php
include('funcionesBasicas.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor1 = limpieza2($_POST["caja1"]);
  $valor2 = limpieza($_POST["caja2"]);
}

var_dump($_POST);
$fichero="ibex35.txt";

$nombresValor=nombres($fichero);
$ultimo=ultimo($fichero);
$var1=variacion1($fichero);
$var2=variacion2($fichero);
$acAnual= accAño($fichero);
$max=maximo($fichero);
$min=minimo($fichero);
$vol=volumen($fichero);
$cap=capitalizacion($fichero);


$nombre1=$valor1;
$nombre2=$valor2;

if($nombre2=="UltimoValor"){
	if(in_array("$nombre1",$nombresValor)){
			$clave = array_search("$nombre1", $nombresValor); 
			$aux=$ultimo[$clave];
			$aux2="Ultimo valor";
	}	
}

if($nombre2=="Variacion"){
	if(in_array("$nombre1",$nombresValor)){
				$clave = array_search("$nombre1", $nombresValor); 
				$aux=$var1[$clave];
				$aux2="Variacion %";
		}
}

if($nombre2=="Variacion2"){
	if(in_array("$nombre1",$nombresValor)){
				$clave = array_search("$nombre1", $nombresValor);  
				$aux=$var2[$clave];
				$aux2="Variacion";
	}
}

if($nombre2=="AcAnual"){
	if(in_array("$nombre1",$nombresValor)){
				$clave = array_search("$nombre1", $nombresValor); 
				$aux=$acAnual[$clave];
				$aux2="Ac%Anual";
	}
}

if($nombre2=="Maximo"){
	if(in_array("$nombre1",$nombresValor)){
				$clave = array_search("$nombre1", $nombresValor); 
				$aux=$max[$clave];
				$aux2="Maximo";
	}
}

if($nombre2=="Minimo"){
	if(in_array("$nombre1",$nombresValor)){
				$clave = array_search("$nombre1", $nombresValor); 
				$aux=$min[$clave];
				$aux2="Minimo";
	}
}

if($nombre2=="Volumen"){
	if(in_array("$nombre1",$nombresValor)){
				$clave = array_search("$nombre1", $nombresValor); 
				$aux=$vol[$clave];
				$aux2="Volumen";	
				
	}
}

if($nombre2=="Capital"){
	if(in_array("$nombre1",$nombresValor)){
				$clave = array_search("$nombre1", $nombresValor); 
				$aux=$cap[$clave];
				$aux2="Capitalizacion";
	}
}
var_dump($aux);


echo "<h1><b>Valores Bursatiles</b></h1>
						<div>
							<label for='Caja1'>Valor</label>
							<input type='text' name='caja1' value='$valor1'/> <br />
							<label for='Caja2'>$aux2</label>
							<input type='text' name='caja' value='$aux'/> <br />
						</div>
						<br />
						<input type='submit' value='Realizar Otra Consulta' />
						<input type='reset' value='Borrar' />";
?>
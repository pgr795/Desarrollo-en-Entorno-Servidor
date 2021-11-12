<?php

var_dump($_POST);

function combinacionGanadora(){
    $combinacionGanadora=array(8);
    $contador=0;
    while($contador != 7){
        $bola=bolas();
        if(!in_array($bola,$combinacionGanadora)){
            $combinacionGanadora[$contador]=$bola;
            $contador++;
         }
         else{
            $bola=bolas();
         }
    }   
    $combinacionGanadora[7]=reintegro();
    return $combinacionGanadora;
}


function bolas(){
    $bola=rand(1,49);
    return $bola;
}

function reintegro(){
    $reintegro=rand(0,9);
    return $reintegro;
}

function mostrarResultado($combinacion,$fecha){
    $aux=$combinacion;
    var_dump($aux);
    $aux2=$fecha;
    echo "<b>Loteria Primitiva/Sorteo</b>"."      "."$aux2";
    echo "<div>";
    foreach ($aux as $indice => $valor) {
      
        if($indice!=7 && $indice!=6)
        echo "$valor"." ";
        if($indice==6){
            echo "<br>";
            echo "<br>";
            echo "Complementario: $valor";
            echo "<br>";
        }
        if($indice==7){
            echo "<br>";
            echo "Reintegro: $valor";
            echo "<br>";
        }
        

    }
}

function id($fichero){
	$id=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
			if($indice!=0){
				$aux=$valor." ";
				$id[$indice]=substr($aux,0,5);
				$id[$indice]=trim($id[$indice]," ");
			}	
	}
	return $id;
}

$fichero="r22_primitiva.txt";
$aux=id($fichero);
var_dump($aux);



function numeros($fichero){
	$numero;
    $numeros=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
			if($indice!=0){
				$aux=$valor." ";
                $numero=explode("-",$valor);
                $numeros[$indice]=$numero[1]." ".$numero[2]." ".$numero[3]." ".$numero[4]." ".$numero[5]." ".$numero[6];
            }	
	}
	return $numeros;
}

$aux2=numeros($fichero);
var_dump($aux2);



// function mostrarAcertantes(){


// }


function limpieza($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}


?>
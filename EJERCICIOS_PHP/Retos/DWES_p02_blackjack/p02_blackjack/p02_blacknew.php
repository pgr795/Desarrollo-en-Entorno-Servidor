<?php	
var_dump($_POST);				 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$valor1 = limpieza($_POST["nombre1"]);
		$valor2 = limpieza($_POST["nombre2"]);
		$valor3 = limpieza($_POST["nombre3"]);
		$valor4 = limpieza($_POST["nombre4"]);
		$valor5 = limpieza($_POST["numcartas"]);
		$valor6 = limpieza($_POST["apuesta"]);
		$valor7 = limpieza($_POST["submit"]);
}

$jugador1=$valor1;
$jugador2=$valor2;
$jugador3=$valor3;
$jugador4=$valor4;
$jugador5="Banca";
$numCarta=$valor5;
$Premio=$valor6;



/* $baraja=array(1,2,3,4,5,6,7,10,11,12,
			  1,2,3,4,5,6,7,10,11,12,
			  1,2,3,4,5,6,7,10,11,12,
			  1,2,3,4,5,6,7,10,11,12); */
			  
$baraja=array(1,2,3,4,5,6,7,10,11,12);		  
			  

$partida=array("$jugador1" => $tiradaJug1=jugada($numCarta,$baraja),
			   "$jugador2" => $tiradaJug2=jugada($numCarta,$baraja),
			   "$jugador3" => $tiradaJug3=jugada($numCarta,$baraja), 
			   "$jugador4" => $tiradaJug4=jugada($numCarta,$baraja),
			   "$jugador5" => $tiradaJug5=jugada($numCarta,$baraja)
			   );
var_dump($partida);


function jugada($numCarta,$Baraja){
$aux=array();
$baraja=$Baraja;
$numcartas=(int)$numCarta;
$contador=0;
$carta=cartaAleatoria();
	while($contador != $numcartas){
		$carta=cartaAleatoria();
		if(in_array($carta,$baraja)){
			$aux[$contador]=$carta;					
			$contador++;
		}
	}
return $aux;
}

$puntuaciones=sumarPuntuaciones($partida);
$mostrarCartas=mostrarCartas($partida);

function cartaAleatoria(){
$aux=rand(1,2);
$aux2=rand(1,7);
$carta;
	if($aux==1){
		$carta=$aux2;
	}
	else if($aux==2){
		$carta=10;
	}
	return $carta;
}

function sumarPuntuaciones($partida){
	$aux=$partida;
	$aux2=array();
	echo "<table border=1px>";
	foreach($aux as $indice => $valor){
		echo "<tr>";
		$aux2[$indice]=array_sum($valor);
		echo "<td>".$indice.": ".$aux2[$indice]."</td>";
		echo "</tr>";
	}
	echo "</table>";	
}

function mostrarCartas($partida){
	echo "<table border=1px>";
	$contador=0;
	foreach($partida as $indice => $valor2){
		foreach($valor2 as $indice2 => $valor){
			echo "<tr>";
			if($contador!=4){
			echo "<td><img src=./images/".$valor."C.PNG width=90px height=90px></td>";
			$contador++;
			echo "</tr>";
			}
			else{
				$contador=0;
				echo "<tr></tr>";
			}	
			
		}
	}
	echo "</table>";
}

   
function limpieza($datos) {
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
} 




?>
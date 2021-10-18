<?php
 
echo "Bingo";
$contador=0;
echo "<br>";
echo "<br>";

function CrearCarton(){
	$contador=0;
	$carton = array();
	while (count($carton)<15)
	{
	$bola=rand(1,60);	
	if (!(in_array($bola,$carton)))
		$carton[$contador++]=$bola;
	}
	sort($carton);
	return $carton;
}
	$carton1 = CrearCarton();
	$carton2 = CrearCarton();
	$carton3 = CrearCarton();
	$carton4 = CrearCarton();
	$carton5 = CrearCarton();
	$carton6 = CrearCarton();
	$carton7 = CrearCarton();
	$carton8 = CrearCarton();
	$carton9 =CrearCarton();
	
$jugador = array (
	$carton1,
	$carton2,
	$carton3
);

$jugador2 = array (
	$carton4,
	$carton5,
	$carton6
);

$jugador3 = array (
	$carton7,
	$carton8,
	$carton9
);

//Jugador1
	echo "Jugador1";
	echo "<br>";
	echo "<br>";
	
foreach($jugador as $clave => $valor){
    echo "Carton $clave:";
	foreach ($valor as $indice => $numeros)
		echo " ".$numeros;
		echo "<br>";
 }
 
//Jugador2
	echo "<br>";
	echo "<br>";
 	echo "Jugador2";
	echo "<br>";
	echo "<br>";
	
foreach($jugador2 as $clave => $valor){
    echo "Carton $clave:";
	foreach ($valor as $indice => $numeros)
		echo " ".$numeros;  
		echo "<br>";
 }
 
//Jugador3
	echo "<br>";
	echo "<br>";
 	echo "Jugador3";
	echo "<br>";
	echo "<br>";
	
foreach($jugador3 as $clave => $valor){
    echo "Carton $clave:";
		foreach ($valor as $indice => $numeros)
		 echo " ".$numeros;
		 echo "<br>";
	}
 
//CREAR BOMBO
$bombo[1]=1;
for($i=2; $i<61;$i++) {
	$bombo[$i]=$i;
}

//BOMBO
	echo "<br>";
	echo "<br>";
 	echo "Bombo";
	echo "<br>";

foreach($bombo as $clave => $valor){
    echo $valor;
	echo "<br>"; 
 }
 
//JUGAR
$sacados= array();
$posicionSacados=0;
$bolaExtraida;
$aciertos=0;
$aciertos2=0;
$aciertos3=0;
$aciertos4=0;
$aciertos5=0;
$aciertos6=0;
$aciertos7=0;
$aciertos8=0;
$aciertos9=0;
	
//BOMBO
$contador=0;
/* $ganador=true; */
while($contador != 60){
	$bolaExtraida=rand(1,60);
	if(in_array($bolaExtraida,$bombo)){
		$aux=$bombo[$bolaExtraida]=0;
		$sacados[$posicionSacados++]=$bolaExtraida;
		$contador++;
	}
	elseif($bombo[$bolaExtraida]==0 || in_array($bolaExtraida,$sacados)){
		$bolaExtraida=rand(1,60);
	}


//Jugador1
	if(in_array($bolaExtraida,$jugador[0])){
	  $jugador[0][array_search($bolaExtraida,$jugador[0])]=0;
	  $aciertos++;
	  if($aciertos==15){
		  echo "Ha ganado el jugador 1 con el carton1";
		 break;
		 // $ganador=true;
	  }
	}

	
	if(in_array($bolaExtraida,$jugador[1]) ){
	  $aciertos2++;
	  $jugador[1][array_search($bolaExtraida,$jugador[1])]=0;
		  if($aciertos2==15){
		  echo "Ha ganado el jugador1 con el carton2";
		  break;
		 // $ganador=true;
	  }
	}
		
	if(in_array($bolaExtraida,$jugador[2]) ){
	  $aciertos3++;
	  $jugador[2][array_search($bolaExtraida,$jugador[2])]=0;
	  if($aciertos3==15){
		  echo "Ha ganado el jugador 1 con el carton3";
		  break;
		  // $ganador=true; 
	  }
	}

//Jugador2

	if(in_array($bolaExtraida,$jugador2[0])){
	  $jugador2[0][array_search($bolaExtraida,$jugador2[0])]=0;
	  $aciertos4++;
	  if($aciertos4==15){
		 echo "Ha ganado el jugador 2 con el carton1";
		 break;
		 // $ganador=true;
	  }
	}

	
	if(in_array($bolaExtraida,$jugador2[1]) ){
	  $aciertos5++;
	  $jugador2[1][array_search($bolaExtraida,$jugador2[1])]=0;
		  if($aciertos5==15){
		  echo "Ha ganado el jugador 2 con el carton2";
		  break;
		 // $ganador=true;
	  }
	}
		
	if(in_array($bolaExtraida,$jugador2[2]) ){
	  $aciertos6++;
	  $jugador2[2][array_search($bolaExtraida,$jugador2[2])]=0;
	  if($aciertos6==15){
		  echo "Ha ganado el jugador 2 con el carton3";
		  break;
		  // $ganador=true; 
	  }
	}


//Jugador3

	if(in_array($bolaExtraida,$jugador3[0])){
	  $jugador3[0][array_search($bolaExtraida,$jugador3[0])]=0;
	  $aciertos7++;
	  if($aciertos7==15){
		 echo "Ha ganado el jugador 3 con el carton1";
		 break;
		 // $ganador=true;
	  }
	}

	
	if(in_array($bolaExtraida,$jugador3[1]) ){
	  $aciertos8++;
	  $jugador3[1][array_search($bolaExtraida,$jugador3[1])]=0;
		  if($aciertos8==15){
		  echo "Ha ganado el jugador 3 con el carton2";
		  break;
		 // $ganador=true;
	  }
	}
		
	if(in_array($bolaExtraida,$jugador3[2]) ){
	  $aciertos9++;
	  $jugador3[2][array_search($bolaExtraida,$jugador3[2])]=0;
	  if($aciertos9==15){
		  echo "Ha ganado el jugador 3 con el carton3";
		  break;
		  // $ganador=true; 
	  }
	}
}
/* 	
Cartones 		0	1	2 
Jugadores
		0 	* 	*	*
		1	*	*	*
		2	*	*	*
		*/
		
var_dump($aciertos);
var_dump($aciertos2);
var_dump($aciertos3);
var_dump($aciertos4);
var_dump($aciertos5);
var_dump($aciertos6);
var_dump($aciertos7);
var_dump($aciertos8);
var_dump($aciertos9);
var_dump($bombo);
var_dump($sacados);
var_dump($jugador);
var_dump($jugador2);
var_dump($jugador3);
?>

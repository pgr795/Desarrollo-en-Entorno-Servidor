  <?php
/* 4 jugadores
3 cartones
15 numeros cada uno
3 repartidos en 3 lineas
 */


/* Si hay linea  */

/* 0 1 2 3 4 5 6
0 	
1
2 */
/* $array //cartones   */

echo "<br>";
//CREAR Y COMPROBAR SI SE REPITE UN NUMERO Y EN CASO DE QUE SE REPITA CAMBIARLO
$contador=0;
$carton = array();
	while (count($carton)<15)
	{
		$bola=rand(1,60);	
		if (!(in_array($bola,$carton)))
			$carton[$contador++]=$bola;
	}

sort($carton);

foreach ($carton as $clave => $valor) {
    echo "carton[" . $clave . "] = " . $valor . "\n <br>";
}

//CREAR BOMBO
$bombo[1]=1;
for($i=2; $i<61;$i++) {
	$bombo[$i]=$i;
}
//JUGAR
$sacados= array();
$tachados= array();
$posicionCarton=0;
$posicionSacados=0;
$bolaExtraida=rand(1,60);

for($i=0;$i<61;$i++){
	/* $aciertos=0;
	$limiteAcierto=15; */
	
//BOMBO

	if(in_array($bolaExtraida,$bombo)){
		$aux=$bombo[$bolaExtraida]=0;
		$aux2=$bolaExtraida=rand(1,60);
		$sacados[$posicionSacados++]=$bolaExtraida;
	}
	else if($bombo[$bolaExtraida]==0){
		$aux3=$bolaExtraida=rand(1,60);
		
	}

//Jugador

	if(in_array($bolaExtraida,$carton)){
		$tachados[$posicionCarton++]=$bolaExtraida;
		$bola=array_search($bolaExtraida,$carton);
		
		$carton[$bola]=0;
		
		echo "acierto<br>";
	}
	else if (!(in_array($bolaExtraida,$carton))){
		echo "jodete<br>";
	}

	
}	
	

//array_search — Busca un valor determinado en un array y devuelve la primera clave correspondiente en caso de éxito
//array_replace — Reemplaza los elementos del array original con elementos de array adicionales 

var_dump($bombo);
var_dump($sacados);
var_dump($carton);
var_dump($tachados);



/* numeros ramdom del 1 al 60 */
/* //in_array */
?>


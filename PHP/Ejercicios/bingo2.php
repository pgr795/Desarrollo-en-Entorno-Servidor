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
$contador2=0;



	$carton1 = array();
	while (count($carton1)<15)
	{
		$bola=rand(1,60);	
		if (!(in_array($bola,$carton1)))
			$carton1[$contador++]=$bola;
	}
	

	
	sort($carton1);
	
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

$jugador2 = array (
	$carton7,
	$carton8,
	$carton9
);

/* while (count($carton)<3)
	{
		$jugador[$contador++]=$carton;
	} */

/* function generarCarton(){
	$contador=0;
	$carton = array();
		while (count($carton)<15)
		{
			$bola=rand(1,60);	
			if (!(in_array($bola,$carton)))
				$carton[$contador++]=$bola;
		}
	sort($carton);
}

$jugador = array();

while (count($jugador)<3)
	{
		$jugador[$contador++]=generarCarton();
	} */

foreach ($carton1 as $clave => $valor) {
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
$bolaExtraida;
$aciertos=0;

	/* $aciertos=0;
	$limiteAcierto=15; */
	
//BOMBO
$contador=0;
while($contador !=60){
	$bolaExtraida=rand(1,60);
	if(in_array($bolaExtraida,$bombo)){
		$aux=$bombo[$bolaExtraida]=0;
		$sacados[$posicionSacados++]=$bolaExtraida;
		$contador++;
	}
	elseif($bombo[$bolaExtraida]==0 || in_array($bolaExtraida,$sacados)){
		$bolaExtraida=rand(1,60);
	}


//Jugador

	if(in_array($bolaExtraida,$carton1)){
		$tachados[$posicionCarton++]=$bolaExtraida;
		$bola=array_search($bolaExtraida,$carton1);
		$carton1[$bola]=0;
		echo "acierto<br>";
		$aciertos++;
		if($aciertos==15){
			echo "Has ganado";
			break;
		}	
	}
	else if (!(in_array($bolaExtraida,$carton1))){
		echo "No te ha tocado<br>";
	}
}
	

//array_search — Busca un valor determinado en un array y devuelve la primera clave correspondiente en caso de éxito
//array_replace — Reemplaza los elementos del array original con elementos de array adicionales 

var_dump($bombo);
var_dump($sacados);
var_dump($carton1);
var_dump($tachados);
var_dump($jugador);



/* numeros ramdom del 1 al 60 */
/* //in_array */
?>

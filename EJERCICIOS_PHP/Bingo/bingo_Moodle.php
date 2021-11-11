  <?php
/* 4 jugadores
3 cartones
15 numeros cada uno
3 repartidos en 3 lineas
 */


/* 0 1 2 3 4 5 6
0 	
1
2 */
/* $array cartones   */

echo "<br>";
//CREAR Y COMPROBAR SI SE REPITE UN NUMERO Y EN CASO DE QUE SE REPITA CAMBIARLO
$contador=0;
//Generar con un for y Asignar a cada jugador sus tres cartones
//Intentado primero hacerlo el programa con uno para hacerlo con tres
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
//Las variables sacados y tachados es para control de errores
$sacados= array();
$tachados= array();
$posicionCarton=0;
$posicionSacados=0;

//BOMBO
		//Sacar una bola, vaya a la posicion del bombo y ponga 0.
		// No he conseguido que todos los numeros del bombo se ponga a cero.
		// Se repite los numeros y por eso no se me pone a cero todos los valores
	for($i=0;$i<60;$i++)
	{
		$bolaExtraida=rand(1,60);	
			if((in_array($bolaExtraida,$bombo)))
			{
				$aux=array_search($bolaExtraida,$bombo);
				$bombo[$aux]=0;
				$sacados[$posicionSacados++]=$bolaExtraida;
			}
			else if(in_array($bolaExtraida,$bombo))
				{
					$bolaExtraida=rand(1,60);
				}
		


	//Jugador
	//Cuando extrae la bola busca en el carton, va a esa posicion y cambia su valor a 0. 
	//Sumaria 1 al variable acierto para saber cuantos aciertos tengo;
	//Funciona a medias porque se repite los numeros del bombo por lo cual nunca se pone a 0.
		if(in_array($bolaExtraida,$carton)){
			$tachados[$posicionCarton++]=$bolaExtraida;
			$bola=array_search($bolaExtraida,$carton);
			$carton[$bola]=0;
			/* $acierto++; */
			echo "acierto<br>";
		}
		else if (!(in_array($bolaExtraida,$carton))){
			echo "No te ha tocado<br>";
		}
	}
	
//Si el jugador ha llegado a los 15 aciertos a ganado
//En caso de que sea 4 jugadores pondria $acierto1,$acierto2,$acierto3,$acierto4 
// Dentro del If
	
	//if($acierto1==15 || $acierto2==15 || $acierto3== 15 || $acierto4==15)
	// if($acierto==15){
		// echo "Has ganado";
	// }
	// else{
		// echo "No has ganado"; 
	// }




var_dump($bombo);
var_dump($sacados);
var_dump($carton);
var_dump($tachados); 


//array_search — Busca un valor determinado en un array y devuelve la primera clave correspondiente en caso de éxito
//array_replace — Reemplaza los elementos del array original con elementos de array adicionales 
?>
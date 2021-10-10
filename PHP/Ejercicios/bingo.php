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
$aciertos=0;
$limiteAcierto=15;
$carton = array();


foreach ($carton as $clave => $valor) {
    echo "carton[" . $clave . "] = " . $valor . "\n <br>";
}

echo "<br>";
//Comprobar si se repite un numero y en caso de que se repita cambiarlo
$contador=0;
	while (count($carton)<15)
	{
		$bola=rand(1,60);	
		if (! (in_array($bola,$carton)))
			$carton[$contador++]=$bola;
	}

sort($carton);

foreach ($carton as $clave => $valor) {
    echo "carton[" . $clave . "] = " . $valor . "\n <br>";
}

//BOMBO
$bombo[1]=1;
for($i=2; $i<61;$i++) {
	$bombo[$i]=$i;
}

//JUGAR
$bolaExtraida=rand(1,60);
echo $bolaExtraida."<br>";

//Jugador
$tachados= array();
if(in_array($bolaExtraida,$carton)){
	$tachados=$bolaExtraida;
	echo $tachadoComprobacion."<br>";
	$bola=array_search($bolaExtraida,$carton);
	echo $bola."<br>";
	$tachoDelcarton=$carton[$bola]=0;
	echo $tachoDelcarton;
	echo "acierto";
}
else if (!(in_array($bolaExtraida,$carton))){
	echo "jodete";

}
//BOMBO



if(in_array($bolaExtraida,$bombo)){
	$aux=$bombo[$bolaExtraida]=0;
	echo $aux;
	
}
else if($bombo[$bolaExtraida]==0){
    $aux2=$bolaExtraida=rand(1,60);
    echo $aux2;
}
	
	

//array_search — Busca un valor determinado en un array y devuelve la primera clave correspondiente en caso de éxito
//array_replace — Reemplaza los elementos del array original con elementos de array adicionales 
echo "<br>";
echo "<br>";

var_dump($tachados);
var_dump($carton);
var_dump($bombo);
/* numeros ramdom del 1 al 60 */
/* //in_array */
?>


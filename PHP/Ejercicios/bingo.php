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
$carton = array (random_int(1, 60),random_int(1, 60),random_int(1, 60),random_int(1, 60),random_int(1, 60),random_int(1, 60),
random_int(1, 60),random_int(1, 60),random_int(1, 60),random_int(1, 60),random_int(1, 60),random_int(1, 60),random_int(1, 60),
random_int(1, 60),random_int(1, 60));


foreach ($carton as $clave => $valor) {
    echo "carton[" . $clave . "] = " . $valor . "\n <br>";
}

echo "<br>";
//Comprobar si se repite un numero y en caso de que se repita cambiarlo
for($i=0;$i<14;$i++){
	/* while($carton[$i]==$carton[$i+1]){
		$carton[$i]=random_int(1,60);
	} */
	$valor1=$carton[$i];
	/* echo "<p style=color:blue>".$valor1."</p>"; */
	for($y=1;$y<14;$y++){
		$valor2=$carton[$y];
	/* 	echo "<p style=color:red>".$valor2."</p>"; */
		if($valor1==$valor2){
			while($valor1!=$valor2){
				$carton[$i]=random_int(1,60);
			}
		}
	}
echo $carton[$i]."<br>";
}

foreach ($carton as $clave => $valor) {
    echo "carton[" . $clave . "] = " . $valor . "\n <br>";
}



/* $bombo= array ( 
10=>array(0,1,2,3,4,5,6,7,8,9,10),
20=>array(11,12,13,14,15,16,17,18,19,20),
30=>array(21,22,23,24,25,26,27,28,29,30),
); */

//BOMBO
for($i=0; $i<60;$i++) {
    $bombo[$i]=$i+1;
}
 

var_dump($carton);
var_dump($bombo);
/* numeros ramdom del 1 al 60 */
/* //in_array */
?>


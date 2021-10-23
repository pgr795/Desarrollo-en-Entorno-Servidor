<?php 
$contador=0;
echo "Bingo";
echo "<br>";
/* 	Cartones 		0	1	2 
	Jugadores
				0 	* 	*	*
				1	*	*	*
				2	*	*	*					*/

//CREAR BOMBO
	$bombo=crearBombo();
	echo "<br>";
 	echo "Bombo";
	echo "<br>";
	mostrarBombo($bombo);
	echo "<br>";

//Creando los cartones yJugadores
	$carton1 = CrearCarton();
	$carton2 = CrearCarton();
	$carton3 = CrearCarton();
	$carton4 = CrearCarton();
	$carton5 = CrearCarton();
	$carton6 = CrearCarton();
	$carton7 = CrearCarton();
	$carton8 = CrearCarton();
	$carton9 =CrearCarton();
		
	//Jugador1	
	echo "Jugador1";
	echo "<br>";
	$jugador = array (
		$carton1,
		$carton2,
		$carton3
	);
	mostrarCartones($jugador);	

	//Jugador2
	echo "<br>";
 	echo "Jugador2";
	echo "<br>";
	$jugador2 = array (
		$carton4,
		$carton5,
		$carton6
	);
	mostrarCartones($jugador2);	
	
	//Jugador3
	
	echo "<br>";
 	echo "Jugador3";
	echo "<br>";
	$jugador3 = array (
		$carton7,
		$carton8,
		$carton9
	);
	mostrarCartones($jugador3);

//JUGAR
	$sacados= array();
	$posicionSacados=0;
	$bolaExtraida;
	$contador=0;
	$aciertosJugador1=array(
				array(),
				array(),
				array()
				);
	$aciertosJugador2=array(
				array(),
				array(),
				array()
				);
	$aciertosJugador3=array(
				array(),
				array(),
				array()
				);
	$ganador=false;			

	while($contador != 60 && $ganador!=true){
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
		$aux1=carton1Tachados($bolaExtraida,$jugador);
		$aux2=carton2Tachados($bolaExtraida,$jugador);
		$aux3=carton3Tachados($bolaExtraida,$jugador);
			
		if($aux1!=null){
			array_push($aciertosJugador1[0],$aux1);
		}
		if($aux2!=null){
			array_push($aciertosJugador1[1],$aux2);
		}
		if($aux3!=null){
			array_push($aciertosJugador1[2],$aux3);
		}
			
	//Jugador2
		$aux4=carton1Tachados($bolaExtraida,$jugador2);
		$aux5=carton2Tachados($bolaExtraida,$jugador2);
		$aux6=carton3Tachados($bolaExtraida,$jugador2);
				
		if($aux4!=null){
			array_push($aciertosJugador2[0],$aux4);
		}
		if($aux5!=null){
			array_push($aciertosJugador2[1],$aux5);
		}
		if($aux6!=null){
			array_push($aciertosJugador2[2],$aux6);
		}

	//Jugador3	
		$aux7=carton1Tachados($bolaExtraida,$jugador3);
		$aux8=carton2Tachados($bolaExtraida,$jugador3);
		$aux9=carton3Tachados($bolaExtraida,$jugador3);
				
		if($aux7!=null){
			array_push($aciertosJugador3[0],$aux7);
		}
		if($aux8!=null){
			array_push($aciertosJugador3[1],$aux8);
		}
		if($aux9!=null){
			array_push($aciertosJugador3[2],$aux9);
		}
	
	//Ganadores
	
		$ganador1=ganadores($aciertosJugador1[0]);
		
		if($ganador1){
			$ganador=true;
			echo "<br>";
			echo "J1 C1";
		}
			
		$ganador2=ganadores($aciertosJugador1[1]);
		
		if($ganador2){
			$ganador=true;
			echo "<br>";
			echo "J1 C2";
		}
		
		$ganador3=ganadores($aciertosJugador1[2]);
		
		if($ganador3){
			$ganador=true;
			echo "<br>";
			echo "J1 C3";
		}
		
		$ganador4=ganadores($aciertosJugador2[0]);
		
		if($ganador4){
			$ganador=true;
			echo "<br>";
			echo "J2 C1";
		}
		
		$ganador5=ganadores($aciertosJugador2[1]);
		
		if($ganador5){
			$ganador=true;
			echo "<br>";
			echo "J2 C2";
		}
		
		$ganador6=ganadores($aciertosJugador2[2]);
		
		if($ganador6){
			$ganador=true;
			echo "<br>";
			echo "J2 C3";
		}
		
		
		$ganador7=ganadores($aciertosJugador3[0]);
		
		if($ganador7){
			$ganador=true;
			echo "<br>";
			echo "J3 C1";
		}
		
		$ganador8=ganadores($aciertosJugador3[1]);
		
		if($ganador8){
			$ganador=true;
			echo "<br>";
			echo "J3 C2";
		}
		
		$ganador9=ganadores($aciertosJugador3[2]);
		
		if($ganador9){
			$ganador=true;
			echo "<br>";
			echo "J3 C3";
		}
	}
		/* var_dump("");
		var_dump($ganador1);
		var_dump($ganador2);
		var_dump($ganador3);
		var_dump($ganador4);
		var_dump($ganador5);
		var_dump($ganador6);
		var_dump($ganador7);
		var_dump($ganador8);
		var_dump($ganador9); */
		/* var_dump($aux1); 
		var_dump($aux2); 
		var_dump($aux3);
		var_dump($aux4); 
		var_dump($aux5); 
		var_dump($aux6);
		var_dump($aux7); 
		var_dump($aux8); 
		var_dump($aux9);	 */

	
/* var_dump($aciertosJugador1); 
var_dump($aciertosJugador2); 
var_dump($aciertosJugador3);
var_dump($bombo);
var_dump($sacados);
var_dump($jugador);
var_dump($jugador2);
var_dump($jugador3); */
	
	function ganadores($aciertos){
		$aux=count($aciertos);
		/* var_dump($aux);
		var_dump($aciertos); */
		if($aux==15){
			return true;
		}
		else{
			return false;
		}
	}

	function carton1Tachados($bolaExtraida,$jugador){
		$aux=0;		
			if(in_array($bolaExtraida,$jugador[0])){
				$aux=$bolaExtraida;
				return $aux;
			}
	}
	
	function carton2Tachados($bolaExtraida,$jugador){
		$aux=0;		
			if(in_array($bolaExtraida,$jugador[1])){
				$aux=$bolaExtraida;
				return $aux;
			}
	}

	function carton3Tachados($bolaExtraida,$jugador){
		$aux=0;		
			if(in_array($bolaExtraida,$jugador[2])){
				$aux=$bolaExtraida;
				return $aux;
			}	
	}
	
	function CrearCarton(){
		$contador=0;
		$carton = array();
		while (count($carton)<15){
		$bola=rand(1,60);	
			if (!(in_array($bola,$carton)))
				$carton[$contador++]=$bola;
		}
		sort($carton);
		return $carton;
	}

	function crearBombo(){
		$bombo[1]=1;
		for($i=2; $i<61;$i++) {
			$bombo[$i]=$i;
		}
		return $bombo;
	}

	function mostrarCartones($jugador){
		foreach($jugador as $clave => $valor){
			echo "Carton $clave:";
			foreach ($valor as $indice => $numeros)
				echo " ".$numeros;
				echo "<br>";
		}	
	}

	function mostrarBombo($bombo){
		foreach($bombo as $clave => $valor){
			echo $valor.",";		
		}
		echo "<br>";
	}
?>

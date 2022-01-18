<?php 
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

	function cartonTachados($bolaExtraida,$jugador){
		$aux=0;		
			if(in_array($bolaExtraida,$jugador)){
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
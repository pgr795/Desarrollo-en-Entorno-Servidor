<?php
	// var_dump($_POST);
	// Ayuda: propuesta de baraja. No es obligatorio usarla, se admite cualquier otra propuesta


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $valor1 = limpieza($_POST["nombre1"]);
	  $valor2 = limpieza($_POST["nombre2"]);
	  $valor3 = limpieza($_POST["nombre3"]);
	  $valor4 = limpieza($_POST["nombre4"]);
	  $valor5 = limpieza($_POST["numcartas"]);
	  $valor6 = limpieza($_POST["apuesta"]);
	  $tirar = limpieza($_POST["submit"]);
	}
	
	//Este es el ejemplo que segui y a partir de esto hice el ejercicio
	$baraja=array("AC","2C","3C","4C","5C","6C","7C","10C","11C","12C",
		"AD","2D","3D","4D","5D","6D","7D","10D","11D","12D",
		"AP","2P","3P","4P","5P","6P","7P","10P","11P","12P",
		"AT","2T","3T","4T","5T","6T","7T","10T","11T","12T");

	//Recojo todos los valores que voy a necesitar para hacer el ejercicio
	$jugador1=$valor1;
	$jugador2=$valor2;
	$jugador3=$valor3;
	$jugador4=$valor4;
	$jugador5="Banca";
	$numCartas=$valor5;
	$premio=$valor6;

	//He preferido hacer un array asociativo porque mas tarde me resultara mas facil
	//Sacar los nombres de los ganadores
	$partida=array("$jugador1" => $tiradaJug1=jugada($numCartas,$baraja),
				   "$jugador2" => $tiradaJug2=jugada($numCartas,$baraja),
				   "$jugador3" => $tiradaJug3=jugada($numCartas,$baraja), 
				   "$jugador4" => $tiradaJug4=jugada($numCartas,$baraja),
				   "$jugador5" => $tiradaJug5=jugada($numCartas,$baraja)
				   );
				   
	// var_dump($partida);
	
	echo "<h1>BLACKJACK</h1>";
	//Funcion para mostrar los participantes
	mostrarParticipantes($partida);
	
	//Funcion para sacar los resultados que va a ser un array de tres tipos
	//Uno que tenga el valor 21, dos valores menos de 21 y tercero mayores de 21.
	$resultados=resultados($partida);
	// var_dump($resultados);
	// mostrarResultados($resultados);
	
	// Esta funcion guardara los nombres de los ganadores
	$ganador=ganadores($resultados);
	// var_dump($ganador);
	
	//Mostrara los ganadores
	mostrarGanadores($ganador);
	
	// Y entre los ganadores se repartira el premio entre los ganadores.
	repartirPremios($ganador,$premio);
	
	
	
//------------------------------------------------------------	
	function cartaAleatoria(){
		$aux=rand(1,2);
		$aux2=rand(1,4);
		$aux3=rand(1,7);
		$aux4=rand(10,12);
		$carta;
		if($aux==1){
			if($aux2==1){
				$carta=$aux3."C";
			}
			else if($aux2==2){
				$carta=$aux3."D";
			}
			else if($aux2==3){
				$carta=$aux3."P";
			}
			else if($aux2==4){
				$carta=$aux3."T";
			}
		}
		else if($aux==2){
			if($aux2==1){
				$carta=$aux4."C";
			}
			else if($aux2==2){
				$carta=$aux4."D";
			}
			else if($aux2==3){
				$carta=$aux4."P";
			}
			else if($aux2==4){
				$carta=$aux4."T";
			}
		}
		return $carta;
	}

	function jugada($numCartas,$baraja){
		$numcarta=(int)$numCartas;
		$jugada=array();
		$contador=0;
		if($numcarta >=2 && $numcarta<=6){
			while($contador != $numcarta){
				$carta=cartaAleatoria();
				$jugada[$contador]=$carta;
				$contador++;
			}
		}
		else{
			echo "No se puede repartir ni menos de 2 cartas y mas de 6 cartas <br>";
		}
		return $jugada;
	}
	
	function mostrarParticipantes($partida){
		echo "<table border='1px'>";
		foreach($partida as $indice2 => $valor2){
		echo "<tr>";
		echo "<td><h3>$indice2</h3></td>";
			foreach($valor2 as $indice => $valor){
				echo "<td><img src=./images/".$valor.".PNG width=90px height=90px></td>";
			}
		}
		echo "</tr>";
		echo "</table>";
	}
	
	function resultados($partida){
		$aux=0;
		$aux2=0;
		$resultados;
		$jugador1=$partida[$_POST["nombre1"]];
		$jugador2=$partida[$_POST["nombre2"]];
		$jugador3=$partida[$_POST["nombre3"]];
		$jugador4=$partida[$_POST["nombre4"]];
		$jugador5=$partida["Banca"];

		$resultado=puntuacion($jugador1);
		$resultado2=puntuacion($jugador2);
		$resultado3=puntuacion($jugador3);
		$resultado4=puntuacion($jugador4);
		$resultado5=puntuacion($jugador5);
		
		$resultados=array(
		$_POST["nombre1"] => array_sum($resultado),
		$_POST["nombre2"] =>array_sum($resultado2),
		$_POST["nombre3"] => array_sum($resultado3),
		$_POST["nombre4"] => array_sum($resultado4),
		"Banca" => array_sum($resultado5));
		
		return $resultados;
	}
	
	
	function puntuacion($jugador){
		$puntuacion=array();
		foreach($jugador as $indice => $valor){
	/* 		var_dump($indice);
			var_dump($valor); */
				$aux=$valor;
				$num=strlen($valor);
				if($num==2){
					$aux=substr($valor,0,1);
					$aux2=(int)$aux;
					$puntuacion[$indice]=$aux2;
				}
				else if($num==3){
					$aux2=10;
					$puntuacion[$indice]=$aux2;
				}
		}
		$resultado=array_sum($puntuacion);
		return $puntuacion;
	}
	
	
	// function mostrarResultados($resultados){
		// echo "<table border='1px'>";
		// foreach($resultados as $indice2 => $valor2){
			// echo "<tr>";
			// echo "<td><h3>$indice2</h3></td>";
			// if($valor2==21){
				// echo "<td>BlackJack</td>";
			// }
			// else{
				// echo "<td>$valor2</td>";
			// }
			// echo "</tr>";
		// }
		// echo "</table>";
	// }
	
	function ganadores($resultados){
		$ganador;
		$ganadores21=array();
		$jugadores=array();
		$noGanadores=array();
		foreach($resultados as $indice => $valor){
			if($valor==21){
					$ganadores21[$indice]=$valor;
			}
			else if($valor<21){
					$jugadores[$indice]=$valor;
			}
			else{
				$noGanadores[$indice]=$valor;
			}
		}
		if(!empty($ganadores21)){
			ksort($ganadores21);
			$ganador=$ganadores21;
			// var_dump($ganadores21);
		}
		else if(!empty($jugadores)){
			$valorMax=max($jugadores);
			$ganadores=array();
			foreach($jugadores as $indice => $valor){
				if($valorMax==$valor){
					$ganadores[$indice]=$valor;
				}
			}
			// var_dump($ganadores);
			ksort($ganadores);
			$ganador=$ganadores;
		}
		else{
			$ganador=null;
		}
		return $ganador;
		var_dump($ganador);
	}
		

		
	function mostrarGanadores($ganador){
		$ganadores=$ganador;
		ksort($ganadores);
		echo "<h2>Ganadores</h2>";
		echo "<table border='1px'>";
			foreach($ganador as $indice => $valor){
				echo "<tr>";
				echo "<td>$indice</td>";
				echo "<td>$valor</td>";
				echo "</tr>";
			}
		echo "</table>";
	}
	
	function repartirPremios($ganador,$premio){
		$ganadores=count($ganador);
		// var_dump($ganadores);
		$contador=0;
		$premioRepartir=$premio/$ganadores;
		
		foreach($ganador as $indice => $valor){
				if($ganadores==1 && $indice=="Banca"){
					echo "No se reparte ningun premio";
					echo "<br>";
				}
				else{
					echo "<br>";
					echo "$indice le corresponde $premioRepartir<br>";
				}
		}
	}

	function limpieza($datos) {
		$datos = trim($datos);
		$datos = stripslashes($datos);
		$datos = htmlspecialchars($datos);
		return $datos;
	}
	

	
?>
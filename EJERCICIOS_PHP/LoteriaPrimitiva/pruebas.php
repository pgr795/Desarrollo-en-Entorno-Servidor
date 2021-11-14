<?php

function datos($fichero){
	$dato;
    $datos2=array();

	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
			if($indice!=0){
				$aux=trim($valor," ");
                $dato=explode("-",$aux);
                $datos[$indice]=$dato;    
            }
    }   
    /* var_dump($numero2);   */
	return $datos;
}

function numeros($fichero){
	$numero=array();
    $numero2;
    $numeros=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
			if($indice!=0){
                $numero=substr($valor,6,17);
                $numero2=explode("-",$numero);
                $numeros[$indice]=$numero2[0]." ".$numero2[1]." ".$numero2[2]." ".$numero2[3]." ".$numero2[4]." ".$numero2[5];
            }	
            
            // var_dump($numero);
            // var_dump($numero2);
            // var_dump($numeros);
	}
    // var_dump($numeros);
	return $numeros;
}

function numeros2($aux2){
    $numero=array();
    foreach($aux2 as $indice => $valor){
        foreach($valor as $indice2 => $valor2){
            if($indice2!=0){
                $numero[$indice2]=$valor2;
            }
        }
    }
    return $numero;
}

$aux3=numeros($aux2);
var_dump($aux3);

function complementario($fichero){
	$complementario=array();
    $aux;
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
			if($indice!=0){
                $aux=substr($valor,7,20);
                $aux2=explode("-",trim($aux," "));
                $complementario[$indice]=$aux2[6];
            }	

	}

	return $complementario;
}

$aux3=complementario($fichero);
// var_dump($aux2);

function numeros($fichero){
	$numero;
    $numero2=array();

	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
			if($indice!=0){
				$aux=$valor." ";
                $numero=explode("-",$valor);
              
                foreach ($numero as $indice2 => $valor) {
                   if($indice2!=0 && $indice2!=8){
                    $numeros=array(
                        array($numero2[$indice2]=trim($valor," "))
                        );  
                   }
                }
            }	     
	}
    var_dump($numero2);
	return $numeros;
}

$jug="17-25-32-14-15-1-32-5";
$jug2="17-25-32-14-15-1-32-5";
$fichero="r22_primitiva.txt";

function Acertantes($idprimitiva,$numerosPrimitiva,$combinacionGanadora){
    $aux=$idprimitiva;
    $aux2=$numerosPrimitiva;
    $aux3=$combinacionGanadora;
    $resultados=array();
    $acertantes=array();

    foreach ($aux2 as $indice => $valor) {
        // var_dump($valor);
        $aux4=aciertos($valor,$combinacionGanadora);
        $resultados[$indice]=$aux4;
         
    }
        // var_dump($resultados);
    foreach ($resultados as $indice => $valor) {
        $num=$valor;
        // var_dump($valor);
        // var_dump($num);
        $acertantes[$indice]=clasificacionAciertos($num);

        // var_dump($indice);
    }
    var_dump($acertantes);
    return $acertantes;

}

$aux=Acertantes(id($fichero),numeros($fichero),combinacionGanadora());
var_dump($aux);

function aciertos($jug,$combinacionGanadora){
    $aux=explode("-",$jug);
    $aux2=$combinacionGanadora; 
    // var_dump($aux);
    // var_dump($aux2);
    $contador=0;
    $aciertos=array();
    foreach ($aux2 as $indice => $valor) {
        $num=$valor;
      
        if(in_array($num,$aux)){
            $aciertos[$indice]=1;
        }
        else{
            $aciertos[$indice]=0;
        }
        if(in_array($num,$aux) && $indice==6 ){
            $aciertos[$indice]=2;
        }
        if(in_array($num,$aux) && $indice==7){
            $aciertos[$indice]=3;
        }
        // var_dump($num);
        // var_dump($aciertos);
        // var_dump($indice);
    }
    return $aciertos;
}
// $aux=aciertos($jug,combinacionGanadora());
// var_dump($aux);


$jug=array(1,1,1,1,0,1,2,3);
function clasificacionAciertos($jug){
    $aux=$jug;
    $aux2=count($jug);
    $numeros=0;
    $complementario=0;
    $reintegro=0;
    $fallos=0;
    var_dump($aux);
    foreach ($aux as $key => $value) {
    $numero=$value;
        // var_dump($numero);
        if($numero==1){
            $numeros++;
        }
        if($numero==2){
            $complementario++;
        }
        if($numero==3){
            $reintegro++;  
        }
        if($numero==0){
            $fallos++;
        }
    }
$aciertos=array(
    $numeros,
    $complementario,
    $reintegro,
    $fallos,
);
return $aciertos;
}




$jug=array(1,1,1,1,0,1,2,3);
function clasificacionAciertos($jug){
    $aux=$jug;
    $aux2=count($jug);
    $numeros=0;
    $complementario=0;
    $reintegro=0;
    $fallos=0;
    var_dump($aux);
    foreach ($aux as $key => $value) {
    $numero=$value;
        // var_dump($numero);
        if($numero==1){
            $numeros++;
        }
        if($numero==2){
            $complementario++;
        }
        if($numero==3){
            $reintegro++;  
        }
        if($numero==0){
            $fallos++;
        }
    }
$aciertos=array(
    $numeros,
    $complementario,
    $reintegro,
    $fallos,
);
return $aciertos;
        // var_dump($numeros);
        // var_dump($complementario);
        // var_dump($reintegro);
        // var_dump( $fallos);
        // var_dump( $aux);
        // var_dump($aciertos);
}

$aux=clasificacionAciertos($jug);
var_dump($aux);
?>
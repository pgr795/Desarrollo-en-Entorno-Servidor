<?php
var_dump($_POST);

$fichero="r22_primitiva.txt";

//Funciones que utilizo para la combinacion Ganadora
function combinacionGanadora(){
    $combinacionGanadora=array(8);
    $contador=0;
    while($contador != 7){
        $bola=bolas();
        if(!in_array($bola,$combinacionGanadora)){
            $combinacionGanadora[$contador]=$bola;
            $contador++;
         }
         else{
            $bola=bolas();
         }
    }   
    $combinacionGanadora[7]=reintegro();
    
    return $combinacionGanadora;
}
function bolas(){
    $bola=rand(1,49);
    return $bola;
}
function reintegro(){
    $reintegro=rand(0,9);
    return $reintegro;
}
//--------------------------------------------------------------------
//Las funciones que utilizo para la funcion Acertantes
function numeros($fichero){
	$numero=array();
    $numero2;
    $numeros=array();
	$archivo=file($fichero);
	foreach($archivo as $indice => $valor) {
			if($indice!=0){
                $numero=substr($valor,6,21);
                $numero=limpieza($numero);
                $numeros[$indice]= trim($numero,"-");
            }	
	}
	return $numeros;
}
function Acertantes($numerosPrimitiva,$combinacionGanadora){
    $aux2=$numerosPrimitiva;
    $aux3=$combinacionGanadora;
    $resultados=array();
    $acertantes=array();

    foreach ($aux2 as $indice => $valor) {
        $aux4=aciertos($valor,$combinacionGanadora);
        $resultados[$indice]=$aux4;   
    }
    foreach ($resultados as $indice => $valor) {
        $num=$valor;
        $acertantes[$indice]=clasificacionAciertos($num);
    }
    // var_dump($acertantes);
    return $acertantes;
}
function aciertos($jug,$combinacionGanadora){
    $aux=explode("-",$jug);
    $aux2=$combinacionGanadora; 
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
    }
    return $aciertos;
}
function clasificacionAciertos($num){
    $aux=$num;
    $numeros=0;
    $complementario=0;
    $reintegro=0;
    $fallos=0;
    foreach ($aux as $indice => $valor) {
    $numero=$valor;
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
        $fallos);
    return $aciertos;
}
//------------------------------------------------------------------------------
//Funciones para mostrar los resultados

function mostrarResultado($combinacion,$fecha){
    $aux=$combinacion;
    $aux2=$fecha;
    echo "<b>Loteria Primitiva de España/Sorteo</b>"." "."$aux2";
    echo "<div>";
    foreach ($aux as $indice => $valor) {
        if($indice!=7 && $indice!=6)
        echo "$valor"." ";
        if($indice==6){
            echo "<br>";
            echo "<br>";
            echo "Complementario: $valor";
            echo "<br>";
        }
        if($indice==7){
            echo "<br>";
            echo "Reintegro: $valor";
            echo "<br>";
        }
    }
}

function mostrarAcertantes($acertantes){
    $aux=$acertantes;
    var_dump($acertantes);
    $jugadas=count($aux);
    $contador0=0;
    $contador1=0;
    $contador2=0;
    $contador3=0;
    $contador4=0;
    $contador5=0;
    $contador6=0;
    $contador7=0;
    $contador8=0;
    foreach ($aux as $indice => $valor) {
            $num=$valor;
            $aux3=clasificacionAcertantes($num);
            var_dump($aux3);
            if($aux3==8){
                $contador8++;
            }
            if($aux3==7){
                $contador7++;
            }
            if($aux3==6){
                $contador6++;
            }
            if($aux3==5){
                $contador5++;
            }
            if($aux3==4){
                $contador4++;
            }
            if($aux3==3){
                $contador3++;
            }
            if($aux3==2){
                $contador2++;
            }
            if($aux3==1){
                $contador1++;
            }
            if($aux3==0){
                $contador0++;
            }
    }

    echo "<p>Apuestas jugadas:$jugadas</p>";
    echo "<ul>";
    echo "<li>Acertantes de 6 numeros:$contador8</li>";
    echo "<li>Acertantes de 5 numeros + Complementario:$contador7</li>";
    echo "<li>Acertantes de 5 numeros:$contador6</li>";
    echo "<li>Acertantes de 4 numeros:$contador5</li>";
    echo "<li>Acertantes de 3 numeros:$contador4</li>";
    echo "<li>Acertantes Reintegro:$contador3</li>";
    echo "<li>Sin premio 2 numeros:$contador2</li>";
    echo "<li>Sin premio 1 numeros:$contador1</li>";
    echo "<li>Sin premio 0 numeros:$contador0</li>";
    echo "</ul>";
    // var_dump($contador8);
    // var_dump($contador7);
    // var_dump($contador6);
    // var_dump($contador5);
    // var_dump($contador4);
    // var_dump($contador3);
    // var_dump($contador2);
    // var_dump($contador1);
    // var_dump($contador0);
}

function clasificacionAcertantes($num){
    $acertante2=implode("",$num);
    $acertante2=substr($acertante2,0,3);
    $acertante="";
    // var_dump($num);
    if($acertante2=="600" || $acertante2=="611"|| $acertante2=="601"){ //6 aciertos
        $acertante="8";
    }
    if($acertante2=="510"){ //5 aciertos + complementario
        $acertante="7";
    }
    if($acertante2=="500"||$acertante2=="501"){ //5 aciertos
        $acertante="6";
    }
    if($acertante2=="400"||$acertante2=="410"|| $acertante2=="401"|| $acertante2=="411"){ //4 aciertos
        $acertante="5";
    }
    if($acertante2=="300"||$acertante2=="310"|| $acertante2=="301"|| $acertante2=="311"){ //3 aciertos 
        $acertante="4";
    }
    if($acertante2=="001"||$acertante2=="011"){ //Reintegro
        $acertante="3";
    }
    if($acertante2=="200"||$acertante2=="210"|| $acertante2=="201"|| $acertante2=="211"){ //2 aciertos
        $acertante="2";
    }
    if($acertante2=="100"||$acertante2=="110"|| $acertante2=="101"|| $acertante2=="111"){ //1 aciertos
        $acertante="1";
    }
    if($acertante2=="000"||$acertante2=="010"){  //0 aciertos o otros casos
        $acertante="0";
    }
    return $acertante;
}
//600 =8
//510 =7
//500 =6
//400 =5
//300 =4
//001 =3
//200 =2
//100 =1
//000 =0




function limpieza($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}


?>
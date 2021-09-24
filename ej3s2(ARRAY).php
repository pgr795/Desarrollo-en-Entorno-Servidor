<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
	$ip="192.168.16.100/16";
	//1110010100011001001011000100100

	//IP
	echo "<b>IP: 192.168.16.100</b> <br>";
	$array = [];
	$array[0]=decbin(192).".";
	$array[1]=decbin(168).".";
	$array[3]=decbin(204);
	
	
	$numero =128;
	$array2 = [8];
	
		for($i=0;$i<8;$i++) {
			if($numero==16){
				$array2[$i]=1;
			}
			else{
				$array2[$i]=0;
			}
			$numero=$numero/2;
		}
	$array[2]= implode($array2)."."; 
	
	for($i=0; $i<=3; $i++){
		echo $array[$i];
	}
	
	echo "<br><br>";
	
	//MASCARA
	//11111111.11111111.00000000.00000000
	echo "<b>MASCARA:16</b><br>";
	$mascara = [];
	for($i=0;$i<=32;$i++){
		if($i<16){
			$mascara[$i]=1;
		}
		else{
			$mascara[$i]=0;
		}
	}
	
	for ($i=0; $i<32; $i++) {
		 if($i==8){
			 echo ".";
		 }
		 elseif ($i==16){
			 echo ".";
		 }
		 elseif ($i==24){
			 echo ".";
		 }
		  elseif ($i==32){
			 echo ".";
		 }
		 echo $mascara[$i];
		}
	
//Direccion de RED
	
	echo "<br><br>";
	
	$red = $array;
	
	echo "<b>Direccion de Red:</b> <br>";
	echo $red[0]=bindec($red[0]).".";
	echo $red[1]=bindec($red[1]).".";
	echo $red[2]=(0).".";
	echo $red[3]=(0);
	
//Primera direccion IP
	
	echo "<br><br>";
	$host = $array;
	echo "<b>Primera direccion IP: 192.168.0.1</b> <br>";
	
	echo $host[0]=bindec($host[0]).".";
	echo $host[1]=bindec($host[1]).".";
	echo $host[2]=(0).".";
	echo $host[3]=(1);
	

			
	// array_chunk () Divide una matriz en trozos de matrices
	//array_splice () Elimina y reemplaza elementos especificados de una matriz
	// array_fill () Rellena una matriz con valores
	// array_fill_keys () Rellena una matriz con valores, especificando claves
	//array_flip () Voltea / Intercambia todas las claves con sus valores asociados en una matriz
	//array_pad () Inserta un número específico de elementos, con un valor especificado, en una matriz
	//array_push () Inserta uno o más elementos al final de una matriz
	//array_replace () Reemplaza los valores de la primera matriz con los valores de las siguientes matrices
	//array_replace_recursive () Reemplaza los valores de la primera matriz con los valores de las siguientes matrices de forma recursiva
	//array_unshift () Agrega uno o más elementos al comienzo de una matriz
	//compact () Crea una matriz que contiene variables y sus valores
	//range () Crea una matriz que contiene un rango de elementos

?>
</BODY>
</HTML>


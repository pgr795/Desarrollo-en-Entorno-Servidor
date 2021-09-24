<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

	//IP //1110010100011001001011000100100
	$ip="192.168.16.100";
	$mascara="16";
	$direccion = explode(".",$ip);
	
	echo $direccion[0].".".$direccion[1].".".$direccion[2].".".$direccion[3];

	
	echo "<br><br>";
	/* $var=0;
	$var1=0;
	$var2=0;
	$var3=0;
	$mascara=0; */
	
	
//MASCARA	//11111111.11111111.00000000.00000000
	echo "<b>MASCARA:16</b><br>";
	$mascara=decbin($mascara);
	echo "<br>";
	echo $mascara."<br>";
	echo gettype($mascara);
	
	for($i=0;$i<8;$i++){
		if($mascara[$i]==1){
			echo $mascara[$i];
		}
		else{
			$mascara[$i]=0;
			echo $mascara[$i];
		}
	}

	
//Direccion de RED
	
	echo "<br><br>";
	
	
	echo "<b>Direccion de Red: 192.168.0.0</b> <br>";

	
//Primera direccion de HOST
	
	echo "<br><br>";
	
	echo "<b>Primera direccion IP: 192.168.0.1</b> <br>";
	
// Ultima direccion de HOST



//Broadcast








			
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

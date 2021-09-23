<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
	//IP //1110010100011001001011000100100
	$ip="192.168.16.100";
	$mascara=16;
	$bits=32;
	$binario="";
	$ipbinario;
	$direccion = explode(".",$ip);
	
	echo "IP:".$direccion[0].".".$direccion[1].".".$direccion[2].".".$direccion[3];

	//PASAR LA IP A BINARIO
	for($i=0;$i<4;$i++) {
		$ipbinario= sprintf("%b", $direccion[$i]);
		while(strlen($ipbinario)<8) { 
			$ipbinario= "0".$ipbinario;
		}
		$binario= $binario.$ipbinario.".";
	}
	//PASAR LA IP A BINARIO
	
	
	//MASCARA
	$mascaraBinario="";
	for($i=0;$i<$bits;$i++){
		if($i>$mascara){
			$mascaraBinario="1".$mascaraBinario;
		}
		else{
			$mascaraBinario="0".$mascaraBinario;
		}
	}
	
	$tar="";
	$tar2="";
	$tar3="";
	$tar4="";
	
	
	for($i=0;$i<strlen($mascaraBinario);$i++){
		if($i<=7){
			$tar = $tar.$mascaraBinario[$i];
		}
	}
	for($i=8;$i<strlen($mascaraBinario);$i++){
		if($i<=15){
			$tar2 = $tar2.$mascaraBinario[$i];
		}
	}
	for($i=16;$i<strlen($mascaraBinario);$i++){
		if($i<=23){
			$tar3 = $tar3.$mascaraBinario[$i];
		}
	}
	for($i=24;$i<strlen($mascaraBinario);$i++){
		if($i<=32){
			$tar4 = $tar4.$mascaraBinario[$i];
		}
	}
	
	echo "<br>Mascara <br>";
	$Mask= bindec($tar).".".bindec($tar2).".".bindec($tar3).".".bindec($tar4);
	echo $Mask;
	
	
	//MASCARA

	
//DIRECCION DE RED
	$a=str_replace(".","",$binario);
	$b=$mascaraBinario;
	
	$red=$a;
	$var2;
	for($i=0;$i<strlen($a);$i++){
		for($i=0;$i<strlen($b);$i++){
			$var2=$b[$i];
			if($var2==0){
				$red[$i]=0;
			}
			else{
				$red[$i]=$a[$i];
			}
		}
	}
	
	$bar="";
	$bar2="";
	$bar3="";
	$bar4="";
	
	
	for($i=0;$i<strlen($red);$i++){
		if($i<=7){
			$bar = $bar.$red[$i];
		}
	}
	for($i=8;$i<strlen($red);$i++){
		if($i<=15){
			$bar2 = $bar2.$red[$i];
		}
	}
	for($i=16;$i<strlen($red);$i++){
		if($i<=23){
			$bar3 = $bar3.$red[$i];
		}
	}
	for($i=24;$i<strlen($red);$i++){
		if($i<=32){
			$bar4 = $bar4.$red[$i];
		}
	}
	
	$DireccionRed= bindec($bar).".".bindec($bar2).".".bindec($bar3).".".bindec($bar4);
	echo "<br>Direccion RED <br>";
	echo $DireccionRed;

//DIRECCION DE RED
	
	
	

	
	
	
	
//Direccion de RED
	
	echo "<br><br>";
	
	echo "<b>MASCARA:16</b><br>";
	echo "<b>Direccion de Red: 192.168.0.0</b> <br>";

	
//Primera direccion de HOST
	
	echo "<br><br>";
	
	echo "<b>Primera direccion IP: 192.168.0.1</b> <br>";
	
// Ultima direccion de HOST



//Broadcast








			
	//array_chunk () Divide una matriz en trozos de matrices
	//array_splice () Elimina y reemplaza elementos especificados de una matriz
	//array_fill () Rellena una matriz con valores
	//array_fill_keys () Rellena una matriz con valores, especificando claves
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
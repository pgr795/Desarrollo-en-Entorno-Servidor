<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php

	$ip="192.168.16.100";
	$mascara=16;
	$bits=32;
	$binario="";
	$ipbinario;
	$direccion = explode(".",$ip);
	
	echo "<b>IP:</b>".$direccion[0].".".$direccion[1].".".$direccion[2].".".$direccion[3];

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
	for($i=0;$i<=$bits;$i++){
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
		if($i<=31){
			$tar4 = $tar4.$mascaraBinario[$i];
		}
	}
	
	echo "<br><b>Mascara</b><br>";
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
		if($i<=31){
			$bar4 = $bar4.$red[$i];
		}
	}
	
	$DireccionRed= bindec($bar).".".bindec($bar2).".".bindec($bar3).".".bindec($bar4);
	echo "<br><b>Direccion red</b><br>";
	echo $DireccionRed;

//DIRECCION DE RED
	
	

	
//PRIMERA DIRECCION HOST
	
	echo "<br>";
	echo "<b>Primer host:</b><br>";
	
	$xar="";
	$xar2="";
	$xar3="";
	$xar4="";
	
	
	for($i=0;$i<strlen($red);$i++){
		if($i<=7){
			$xar = $xar.$red[$i];
		}
	}
	for($i=8;$i<strlen($red);$i++){
		if($i<=15){
			$xar2 = $xar2.$red[$i];
		}
	}
	for($i=16;$i<strlen($red);$i++){
		if($i<=23){
			$xar3 = $xar3.$red[$i];
		}
	}
	for($i=24;$i<strlen($red);$i++){
		if($i==31){
			$xar4 = $xar4.($red[$i]=1);
		}
		elseif($i<=31){
			$xar4 = $xar4.$red[$i];
		}
	}
	
	$primerHost=bindec($xar).".".bindec($xar2).".".bindec($xar3).".".bindec($xar4);
	echo $primerHost;
	
//PRIMERA DIRECCION HOST	
	
	
// ULTIMA DIRECCION DE HOST

echo "<br>";
	echo "<b>Primer host:</b><br>";
	
	$zar="";
	$zar2="";
	$zar3="";
	$zar4="";
	
	
	for($i=0;$i<strlen($red);$i++){
		if($i<=7){
			$zar = $zar.$red[$i];
		}
	}
	for($i=8;$i<strlen($red);$i++){
		if($i<=15){
			$zar2 = $zar2.$red[$i];
		}
	}
	for($i=16;$i<strlen($red);$i++){
		if($i<=23){
			$zar3 = $zar3.($red[$i]="1");
		}
	}
	for($i=24;$i<strlen($red);$i++){
		if($i<=30){
			$zar4 = $zar4.($red[$i]="1");
		}
		elseif($i==31){
			$zar4 = $zar4.($red[$i]="0");
		}
	}
	$ultimoHost=bindec($zar).".".bindec($zar2).".".bindec($zar3).".".bindec($zar4);
	echo $ultimoHost;



// ULTIMA DIRECCION DE HOST

//BROADCAST

echo "<br>";
	echo "<b>Primer host:</b><br>";
	
	$zar="";
	$zar2="";
	$zar3="";
	$zar4="";
	
	
	for($i=0;$i<strlen($red);$i++){
		if($i<=7){
			$zar = $zar.$red[$i];
		}
	}
	for($i=8;$i<strlen($red);$i++){
		if($i<=15){
			$zar2 = $zar2.$red[$i];
		}
	}
	for($i=16;$i<strlen($red);$i++){
		if($i<=23){
			$zar3 = $zar3.($red[$i]="1");
		}
	}
	for($i=24;$i<strlen($red);$i++){
		if($i<=31){
			$zar4 = $zar4.($red[$i]="1");
		}
	}
	$ultimoHost=bindec($zar).".".bindec($zar2).".".bindec($zar3).".".bindec($zar4);
	echo $ultimoHost;


//BROADCAST



?>
</BODY>
</HTML>
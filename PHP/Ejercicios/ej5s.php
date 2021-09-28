<HTML> 
	<HEAD>
		<TITLE> EJ1B – Conversor decimal a binario</TITLE>
	</HEAD>  
	<BODY> 
<?php  
	$num="48"; 
	$base="8";
	for($i=0;$i<=4;$i++){
	echo "En $num en $base = ". base_convert($num, 10,$base)."<br>";
	$base=$base-2;
		if($base==0){
			break;
		}
	}
?>
	</BODY> 
</HTML> 

<HTML> 
	<HEAD>
		<TITLE> EJ1B – Conversor decimal a binario</TITLE>
	</HEAD>  
	<BODY> 
<?php  
	$num=10;  
	
		echo "$num en binario es:";
		for( $i=1;$i<=8;$i++) {
			$operacion=$num%2;
			$ip[$i] = $operacion;
			$num=$num/2;
		}
		echo "<br>$ip[8]";
		echo "$ip[7]";
		echo "$ip[6]";
		echo "$ip[5]";
		echo "$ip[4]";
		echo "$ip[3]";
		echo "$ip[2]";
		echo "$ip[1]";		
?> 
	</BODY> 
</HTML> 

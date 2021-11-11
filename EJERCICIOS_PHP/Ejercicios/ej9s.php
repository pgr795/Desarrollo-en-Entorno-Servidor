<HTML> 
	<HEAD>
		<TITLE> EJ1B – Conversor decimal a binario</TITLE>
	</HEAD>  
	<BODY> 
		<?php  
			$num=5; 
			$factorial=$num;
		
			for($i=1;$i<$num;$i++){
				$factorial=$factorial*$i;
			}
			echo "El factorial de $num es: ".$factorial;
		?>
	</BODY> 
</HTML> 
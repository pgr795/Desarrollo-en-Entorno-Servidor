<HTML> 
	<HEAD>
		<TITLE> EJ1B – Conversor decimal a binario</TITLE>
	</HEAD>  
	<BODY> 
		<?php  
			$num="8"; 
			$cont="1";
			for($i=1;$i<=10;$i++){
				echo "<table border=1px> ";
				echo "<td>En $num x $cont = ";
				echo "<td>".$num*$cont."</td>";
				echo "</table>";
				$cont++;
			}
		?>
	</BODY> 
</HTML> 
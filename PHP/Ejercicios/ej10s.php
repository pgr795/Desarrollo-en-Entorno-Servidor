<HTML> 
	<HEAD>
		<TITLE> EJ1B – Conversor decimal a binario</TITLE>
	</HEAD>  
	<BODY> 
		<?php  
			$var=array();
			$numero=1;
			$resultado=0;
				echo "<table border=1px>";
				echo "<tr></tr>";
				echo "<td>Indice</td>
					  <td>Valor</td>
					  <td>Suma</td>";
				for($i=1;$i<20;$i++){
					if($numero%2==0){
						$i++;	
					}
					else{
						$resultado=$resultado+$numero;
						$numero=$i;
						$var[$i]=$resultado;
						$numero++;
						
						echo "<tr></tr>";
							echo "<td>$i</td>
								  <td>$numero</td>
								  <td>$var[$i]</td>";
					}	
				}
			echo "</table>";
		?>
	</BODY> 
</HTML> 
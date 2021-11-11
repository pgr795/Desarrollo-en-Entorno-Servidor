<HTML> 
	<HEAD>
		<TITLE> EJ10</TITLE>
	</HEAD>  
	<BODY> 
		<?php  
			$var=array();
			$numero=1;
			$valor=0;
				echo "<table border=1px>";
				echo "<tr></tr>";
				echo "<td>Indice</td>
					  <td>Valor</td>
					  <td>Suma</td>";
					  

			for($i=0;$i<20;$i++)
			{
				$var[$i]=$numero;
				$valor+=$numero;
				echo "<tr>
						<td>$i</td>
						<td>$numero</td>
						<td>$valor</td>
					  </tr>";
				$numero=$numero+2;
			}	
					
			/* //print_r($var);	
			var_dump($var);	 */   

		?>
	</BODY> 
</HTML> 
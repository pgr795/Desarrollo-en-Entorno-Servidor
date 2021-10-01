<HTML> 
	<HEAD>
		<TITLE> EJ10</TITLE>
	</HEAD>  
	<BODY> 
		<?php  
			$var=array();
			$numero=1;
				/* echo "<table border=1px>";
				echo "<tr></tr>";
				echo "<td>Indice</td>
					  <td>Valor</td>
					  <td>Suma</td>";
					   */

			for($i=0;$i<20;$i++)
			{
				$var[$i]=$numero;
				$numero=$numero+2;	
				echo "$i";
				if($var[$i]%2==0){
					
					
				}
			}	
					
			//print_r($var);	
			var_dump($var);	   
					   
					   
					   
					   
				/* for($i=0;$i<20;$i++){
					$var[$i]=;
		
					if($numero%2==0){
						$numero++;
					}
					else{
						$resultado=$resultado+$numero;
						$numero++;
						
						echo "<tr></tr>";
							echo "<td>$i</td>
								  <td>$var[$i]</td>
								  <td>$numero</td>";
					}	 */				
				
			/* echo "</table>"; */
		?>
	</BODY> 
</HTML> 
window.onload=inicio;

function inicio(){
	document.Formulario.comprobar.onclick= comprobar;
}

function comprobar(){
	
var texto = document.Formulario.caja1.value;
var minusculas = "abcdefghijklmnñopqrstuvwxyz";
var mayusculas = minusculas.toUpperCase();
let adicionales="-ºª/ ";
var validaPrimeraLetra=false;
var validaUltimaLetra=false;
var validoTexto=true;
var letras="";
var minuscula;
var mayuscula;
var longitud;


//Longitud
	longitud = texto.length;
	if(longitud<3 || longitud>27){
		validaPrimeraLetra=false;
		validaUltimaLetra=false;
		validoTexto=true;
	}
	else{
		//EMPIEZA Y TERMINA POR UNA LETRA
			var caracterInicial = texto[0]; //PRIMERA LETRA
			var caracterFinal = texto.slice(-1); //ULTIMA LETRA
			console.log(caracterInicial);
			console.log(caracterFinal);
			
			//PRIMERA LETRA
			for(m=0; m<minusculas.length; m++){
				minuscula=minusculas[m];
					if(caracterInicial == minuscula){
						validaPrimeraLetra=true;
					}
					else if(validaPrimeraLetra){
						break;
					}
					else{
						validaPrimeraLetra=false;
						for(y=0;y<mayusculas.length;y++){
							mayuscula=mayusculas[y];
								if(caracterInicial == mayuscula){
									validaPrimeraLetra=true;										
								}
								else if(validaPrimeraLetra){
									break;
								}
								else{
									validaPrimeraLetra=false;																		
								}
						}			
					}
			}
			
			//ULTIMA LETRA
			for(m=0; m<minusculas.length; m++){
				minuscula=minusculas[m];
					if(caracterFinal == minuscula){
						validaUltimaLetra=true;
					}
					else if(validaUltimaLetra){
						break;
					}
					else{
						validaUltimaLetra=false;
						for(y=0;y<mayusculas.length;y++){
							mayuscula=mayusculas[y];
								if(caracterFinal == mayuscula){
									validaUltimaLetra=true;										
								}
								else if(validaUltimaLetra){
									break;
								}
								else{
									validaUltimaLetra=false;																		
								}
						}			
					}
			}
			
			
		// AQUI ESTA EL FALLO 
/* 		for(i=1;i<=texto.length-1;i++){	
			letras=texto[i];
			console.log(letras);
			if(!(letras == "º" || letras == "ª" || letras == "-" || letras == " ") ||
				(letras < "a" || letras > "z") )
			{
				validoTexto=false;
			}
			else{
				validoTexto=true;
			}
		}	
	}		
 */
/* 
	for(i=1;i<=texto.length-1;i++){	
			letras=texto[i];
			console.log(letras);
			if((texto.charAt(i) < 'a' || texto.charAt(i) > 'z'))
			{
				validoTexto=true;
				console.log(validoTexto);
			}
			else{
				validoTexto=false;
				console.log(validoTexto);
			}
		}	
	}		
 */

	/* for(i=1;i<=texto.length-1;i++){	
			letras=texto[i];
			console.log(letras);
			if(!texto[i] < "a" || texto[i] > "z")
			{
				validoTexto=true;
			}
			else{
				validoTexto=false;
			}
		}	
	}	
 */


			for(i=0;i<texto.length;i++) {
			letras=texto[i];
			if(!minusculas.includes(letras) && !mayusculas.includes(letras) && 
			letras != "º" && letras != "ª" && letras != "-" && letras != " ")
				validoTexto=false;
		}	
	}
	
				


	console.log(validaPrimeraLetra);
	console.log(validaUltimaLetra);
	console.log(validoTexto);
	
	//VALIDA LOS TRES BOOLEAN 
	//TE VA A DAR SIEMPRE INCORRECTO PORQUE LA PRIMERA Y LA ULTIMA LETRA TE DARA TRUE, EN CAMBIO VALIDOTEXTO SIEMPRE 
	//TE DARA NEGATIVO PORQUE ESE BUCLE FOR NO RECONOCE NINGUN CARACTER. SI QUITAS EN IF DE ABAJO VALIDO TEXTO FUNCIONA
	
	if(validaPrimeraLetra && validaUltimaLetra && validoTexto){
			document.Formulario.caja2.value="Correcto";
	}
	else{
			document.Formulario.caja2.value="Incorrecto";
	}
} 

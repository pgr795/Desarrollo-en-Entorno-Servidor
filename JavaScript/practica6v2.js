window.onload=inicio;

function inicio(){
	document.Formulario.comprobar.onclick= comprobar;
}

function comprobar(){
	
var texto = document.Formulario.caja1.value;
var minusculas = "abcdefghijklmnñopqrstuvwxyz";
var mayusculas = minusculas.toUpperCase();
var validaLetra=false;
var validoTexto=false;
var caracterInicial;
var letras;
var minuscula;
var mayuscula;
var longitud;


//Longitud
	longitud = texto.length;
	if(longitud<3 || longitud>27){
		validaLetra=false;
		validoTexto=false;
	}
	else{
		//EMPIEZA Y TERMINA POR UNA LETRA
			caracterInicial = texto[0]; //PRIMERA LETRA
			
			//MINUSCULAS
			for(m=0; m<=minusculas.length; m++){
				minuscula=minusculas[m];
					if(caracterInicial == minuscula){
						validaLetra=true;
					}
					else if(validaLetra){
						break;
					}
					else{
						validaLetra=false;
						//MAYUSCULAS
						for(y=0;y<=mayusculas.length;y++){
							mayuscula=mayusculas[y];
								if(caracterInicial == mayuscula){
									validaLetra=true;										
								}
								else if(validaLetra){
									break;
								}
								else{
									validaLetra=false;																		
								}
						}			
					}
				
			}
			
		for(i=0;i<=texto.length;i++){	
			letras=texto[i];
			console.log(letras);
			if(letras == "º" || letras == "ª" || letras == "-" || letras == ""|| 
			letras == minuscula || letras == mayuscula )
			{
				validoTexto=true;
			}
			else{
				validoTexto=false;
			}
		}	
	}				

	console.log(validaLetra);
	console.log(validoTexto);
	if(validoTexto && validaLetra ){
			document.Formulario.caja2.value="Correcto";
	}
	else{
			document.Formulario.caja2.value="Incorrecto";
	}
} 

window.onload=inicio;

function inicio(){
	document.Formulario.comprobar.onclick= comprobar;
}

function comprobar(){
//valor=pepe	
var texto = document.Formulario.caja1.value;
var minusculas = "abcdefghijklmnñopqrstuvwxyz";
var mayusculas = minusculas.toUpperCase();
var valido=false;
var caracterInicial;
var caracterFinal;
var minuscula;
var mayuscula;
var longitud;


//Longitud
	longitud = texto.length;

	if(longitud<3 || longitud>27){
		valido=false;
	}
	else{
		//EMPIEZA Y TERMINA POR UNA LETRA
		for(i=0;i<=texto.length;i++){
			caracterInicial = texto[0]; //PRIMERA LETRA
			caracterFinal = texto[i];// ULTIMA LETRA
			
			//MINUSCULAS
				for(m=0; m<=minusculas.length; m++){
					minuscula=minusculas[m];
						if(caracterInicial == minuscula){
							valido=true;
						}
						else if(valido){
								break;
							}
						else{
						//MAYUSCULAS
							for(y=0;y<=mayusculas.length;y++){
								var mayuscula=mayusculas[y];
									if(caracterInicial == mayuscula){
										valido=true;										
									}
									else if(valido){
										break;
									}
									else{
										//CARACTERESESPECIALES
											if(caracterInicial == "º" || caracterInicial == "ª" || caracterInicial == "-" || caracterInicial == " ") {
												valido=true;
				
											}
											else if(valido){
												break;
											}
											else{					
													valido=false;
											}
								
									}
							}			
						}	
			  }
		}
	}
			
	
	if(valido){
			document.Formulario.caja2.value="Correcto";
	}
	else{
			document.Formulario.caja2.value="Incorrecto";
	}
} 


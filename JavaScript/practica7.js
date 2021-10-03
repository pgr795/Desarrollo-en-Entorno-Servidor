window.onload=inicio;

function inicio(){
	document.Formulario.comprobar.onclick=comprobar;
}

function comprobar(){
	
var texto = document.Formulario.caja1.value;
var numeros = "0123456789";
var valido=true;
var longitud=texto.length;
var posicion="";
var fecha="";

	for(i=0;i<texto.length;i++){
		fecha=fecha+texto[i];
		posicion=parseInt(i);
		/* console.log(longitud); */
	/* 	console.log(posicion);
		console.log(fecha); */
		if(!numeros.includes(texto[i]) && texto[i] !="/"){
			valido=false;
		}
		if(posicion==1){	
			var dia=parseInt(fecha);
			/* console.log(dia); */
			if(dia>31){
				valido=false;
			}			
		}
		if(posicion==4){
			var aux=fecha.slice(3,5);			
			var mes=parseInt(aux);
		/* 	console.log(mes);
			console.log(aux);
			console.log(fecha); */
			if(mes>12){
				valido=false;
			}			
		}
		if(longitud>10){
			/* console.log(fecha);
			console.log(año);
			console.log(aux2); */
			valido=false;
		}
	}
	
			
	console.log(valido);	

	
	if(valido){
			document.Formulario.caja2.value="Correcto";
	}
	else{
			document.Formulario.caja2.value="Incorrecto";
	}
} 



// valor con los caracteres especiales
//cadena.chatAt>"a"
//cadena.charAt<"z"
//includes
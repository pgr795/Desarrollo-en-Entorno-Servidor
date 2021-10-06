window.onload=inicio;

function inicio(){
	document.Formulario.comprobar.onclick=comprobar;
}

function comprobar(){
	
var texto = document.Formulario.caja1.value;
var numeros = "0123456789";
var minusculas = "abcdefghijklmnñopqrstuvwxyz";
var mayusculas = minusculas.toUpperCase();
var especiales="-."
var especial="@";
var valido=true;
var longitud=texto.length;
var posicion;
var desparroba;
var posicion;

//Empezar con letra
//Va a tener letras,digitos, - y .
// a continuacion @
// luego una letra 
// resto digitos,letras,-
// .
// letras entre 2 y 4
	
/* var texto= "juanpablo";
var correcto= true;
if(!texto.includes("@"))
    correcto= false;
if(correcto) {
    alert("bien");
} else {
    alert("mal");
} */
	if(!texto.includes("@")){
		valido=false;
	}
	else{
		for(i=1;i<texto.length;i++){
			var primeraLetra=texto[0];
			var letras=texto[i];
			posicion=i;
			if(!minusculas.includes(primeraLetra) && !mayusculas.includes(primeraLetra))
			{
				valido=false;
			}
			if(!minusculas.includes(letras) && !mayusculas.includes(letras) 
				&& !numeros.includes(letras) && !especiales.includes(letras))
			{
				valido=false;
			}
			if(!letras.includes(especial)){
				posicion=texto.indexOf(especial);
				desparroba=texto[posicion+1];
			}
			if(!(desparroba=="a")){
					valido=false;
			}
		}
	}
	
	console.log(desparroba);
	console.log(valido);
	
	if(valido){
			document.Formulario.caja2.value="Correcto";
	}
	else{
			document.Formulario.caja2.value="Incorrecto";
	}
} 


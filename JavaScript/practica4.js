window.onload=inicio;

function inicio(){
	document.Formulario.comprobar.onclick= comprobar;
}

function comprobar(){	
var valor1 = document.Formulario.caja1.value;

var vocales=0;
var consonantes=0;
for(i=0;i<valor1.length;i++){
var caracter= valor1[i];
		if(caracter=="a"||caracter=="e"|| caracter=="i"|| caracter=="o" || caracter=="u"){
			vocales++;	
		}
		else{
			consonantes++;
		}
	}
	document.Formulario.caja2.value+=vocales;
	document.Formulario.caja3.value+=consonantes;
} 
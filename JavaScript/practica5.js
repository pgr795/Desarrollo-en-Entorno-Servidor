window.onload=inicio;

function inicio(){
	document.Formulario.comprobar.onclick= comprobar;
}

function comprobar(){	
var valor1 = document.Formulario.caja1.value;
var valor2 = document.Formulario.caja2.value;
var cantidad=0;

for(i=0;i<valor1.length;i++){
var caracter= valor1[i];
		if(caracter==valor2){
			cantidad++;	
		}
	}
	document.Formulario.caja3.value+=cantidad;
} 
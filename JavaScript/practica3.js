window.onload=inicio;

function inicio(){
	document.Formulario.convertir.onclick= convertir;
}

function convertir(){	
var valor1 = parseInt(document.Formulario.caja1.value);
var valor2 = valor1.toString(2);
var valor3 = valor1.toString(8);
var valor4 = valor1.toString(16);

document.Formulario.caja2.value+=valor2;
document.Formulario.caja3.value+=valor3;
document.Formulario.caja4.value+=valor4;
} 
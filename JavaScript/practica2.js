window.onload=inicio;

function inicio(){
	document.Formulario.calcular.onclick= esPrimo;
}

function esPrimo(){	
var valor1 = document.forms.Formulario.caja1.value;
var valor2 = document.forms.Formulario.caja2.value;

for (var m=valor1; m<=valor2;m++){
		var primo=true;
			for(var i=2; i<=m/2 && primo; i++){
				if(m%i==0){
					primo=false;
				}
			}
		if(primo){
			document.forms.Formulario.texto.value+=m + " |";
			m++;
		}	
	}
}
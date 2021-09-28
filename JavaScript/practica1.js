window.onload= esPrimo;

var cont=1;
var numero=2;
function esPrimo(){
		while(cont<=100){
			var primo=true;
			for(var i=2;i<=numero/2 && primo;i++){	
				if(numero%i==0){
					primo=false;
				}
			}
			if(primo){
				document.forms.Formulario.texto.value+=numero+" |";
				cont++;	
			}
		numero++;	
	}
}
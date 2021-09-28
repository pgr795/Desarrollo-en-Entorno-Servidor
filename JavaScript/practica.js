window.onload= primos;

function primos(){
	for (var m=1; m<=100;m++){
		var primo=true;
			for(var i=2; i<=m/2 && primo; i++){
				if(m%i==0){
					primo=false;
				}
			}
		if(primo){
			document.forms.Formulario.texto.value+=m + " |";
		}
	}
}
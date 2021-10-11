var provincias =[
"Araba/Álava",
"Albacete",
"Alicante/Alacant",
"Almería",
"Ávila",
"Badajoz",
"Baleares",
"Barcelona",
"Burgos",
"Cáceres",
"Cádiz",
"Castellón/Castelló",
"Ciudad Real",
"Córdoba",
"A Coruña",
"Cuenca",
"Gerona",
"Granada",
"Guadalajara",
"Guipúzcoa",
"Huelva",
"Huesca",
"Jaén",
"León",
"Lérida",
"La Rioja",
"Lugo",
"Madrid",
"Málaga",
"Murcia",
"Navarra",
"Orense",
"Asturias",
"Palencia",
"Las Palmas",
"Pontevedra",
"Salamanca",
"Santa Cruz de Tenerife",
"Cantabria",
"Segovia",
"Sevilla",
"Soria",
"Tarragona",
"Teruel",
"Toledo",
"Valencia/València",
"Valladolid",
"Vizcaya",
"Zamora",
"Zaragoza",
"Ceuta",
"Melilla"];

	function fondoRojo(){
		this.style.backgroundColor="red";
	}
	
	function fondoBlanco(){
		this.style.backgroundColor="white";
	}


document.primero.nif.onfocus = fondoRojo;
document.primero.nombre.onfocus = fondoRojo;
document.primero.apellidos.onfocus = fondoRojo;
document.primero.domicilio.onfocus = fondoRojo;
document.primero.localidad.onfocus = fondoRojo;
document.primero.cp.onfocus = fondoRojo;
document.primero.provincia.onfocus = fondoRojo;

document.primero.nif.onblur = fondoBlanco;
document.primero.nombre.onblur = fondoBlanco;
document.primero.apellidos.onblur = fondoBlanco;
document.primero.domicilio.onblur = fondoBlanco;
document.primero.localidad.onblur = fondoBlanco;
document.primero.cp.onblur = fondoBlanco
document.primero.provincia.onblur = fondoBlanco;


window.onload=inicio;

function inicio(){
	document.primero.style
	onmouseover;
}


/*
var menu = {
	index : "index.php",
	categorias : "",
	crearEntradas : "nuevaEntrada.php",
	login : "login.php",
	perfil : "perfil.php",
	cerrarSesion : "serrarSesion.php"
}*/
//Regocemos los elementos li
var lis = document.querySelectorAll(".menuPrincipal");

for(var i = 0; i < lis.length; i++){
	//Anadimos el evento a todos los li de la lista
	document.getElementById(lis[i].id).addEventListener("click", redireccionar);
}
//Si estamos en la pagina de perfil, anadimos eventos a los botones para redirecionar a la entrada
if(window.location == 'perfil.php'){
	var irEntrada = document.getElementsByClassName('ver');
	for(var i = 0; i < irEntrada.length; i++){
		//Anadimos el evento a todos los li de la lista
		irEntrada[i].addEventListener('click', verEntrada);
		console.log(irEntrada[i].id);
	}
}
//Si estamos en la pagina de perfil, anadimos eventos a los botones para eliminar a la entrada
if(window.location == 'perfil.php'){
	var irEntrada = document.getElementsByClassName('eliminar');
	for(var i = 0; i < irEntrada.length; i++){
		//Anadimos el evento a todos los li de la lista
		irEntrada[i].addEventListener('click', eliminarEntrada);
		console.log(irEntrada[i].id);
	}
}
//Funcion para redirecionar a una entrada
function verEntrada(e){
	console.log('redireccionando...');
	almacenarGalleta(e.target.id);
	location.href= 'entrada.php';
}
//Funcion para liminar un registro de la tabla
function eliminarEntrada(e){
	var result = confirm('Se eliminara el usuario de forma permanente\nEstas seguro?');
	if (result == true){
		alert('Entrada eliminado');
		var elemento = 'fila'+ e.target.id;
		console.log(elemento);
		console.log(e.target.id);
		var fila = document.getElementById(elemento);
		console.log(fila);
		var padre = fila.parentNode;
		console.log(padre);
		var hijoRemovido = padre.removeChild(fila);
		console.log(hijoRemovido);
	}
}

function redireccionar(e){
	var rutaDestino = e.target.id + '.php';
	//Se comprueba si la pagina a la que se quiere acceder es diferente a la acutal
	if(window.location != rutaDestino){
		console.log('redireccionando...');
		//Redireccionamos a la pagina de destino
		location.href=rutaDestino.toString();
	}
}

function almacenarGalleta(idEntrada){
	var id= idEntrada;
	console.log(idEntrada);
	document.cookie = 'idEntrada='+id;
	var x = document.cookie;
	console.log(x);
	var y = getCookie('idEntrada');
	console.log(y);
	//document.cookie = 'sconName=changedName; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
}

function getCookie(nombreGalleta) {
    var name = nombreGalleta + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
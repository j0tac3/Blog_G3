//document.getElementById("nuevaEntrada").addEventListener("click", redireccionar);
document.getElementById("perfil").addEventListener("click", verPerfil);
document.getElementById("inicio").addEventListener("click", verInicio);
document.getElementById("nEntrada").addEventListener("click", verNuevaEntrada);
document.getElementById("cerrarSesion").addEventListener("click", verCerrarSesion);


var URLactual = window.location;
//if(URLactual == 'http://localhost/Proyectos/Blog_G3/login.php'){
//	document.getElementById("login").addEventListener("click", verLogin);
//}
//alert(URLactual);

function verNuevaEntrada() 
{
	if(window.location != 'http://localhost/Proyectos/Blog_G3/nuevaEntrada.php')
	location.href='nuevaEntrada.php';
} 
function verPerfil(){
	if(window.location != 'http://localhost/Proyectos/Blog_G3/perfil.php')
		location.href='perfil.php';
}
function verInicio(){
	if(window.location != 'http://localhost/Proyectos/Blog_G3/index.php')
		location.href='index.php';
}
function verLogin(){
	if(window.location != 'http://localhost/Proyectos/Blog_G3/login.php')
		location.href='login.php';
}
function verCerrarSesion(){
	if(window.location != 'http://localhost/Proyectos/Blog_G3/cerrarSesion.php')
		location.href='cerrarSesion.php';
}
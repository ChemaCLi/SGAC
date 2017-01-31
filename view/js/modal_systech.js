
//Alias del objeto super global jquery
//$(document).ready(inicializar);

//Añadir listenner para el botón que lanza el modal box
/*function inicializar(){
	//CREAR LISTENERS DE LOS BOTONES OK, INDEPENDIENTEMENTE. CADA UNO CON SU EL SIGUIENTE CONJUNTO DE CONFIGURACIONES
	var btn_eliminar;
	btn_eliminar = $("button#btn_eliminar_ok");
	btn_eliminar.click(modal_eliminar);
}*/

//La plantilla del modal box. No alterar
var string_modal_box = '<div id="modal_fondo"></div><div id="modal_systech"><form id="modal_form" onsubmit="return false;"><div id="modal_header"></div><div id="modal_mensaje"></div><div id="modal_botones"></div></form></div>';

//Crea el modal box dentro de un div con id "modal", si no lo encuentra no lo creará. Recibe un objeto como parámetro para configurar las propiedades.
function crear_modal_box(objeto_config){
	titulo_modal = objeto_config.titulo_modal;
	mensaje_modal = objeto_config.mensaje_modal;
	btn_txt_ok = objeto_config.btn_txt_ok;
	btn_txt_no = objeto_config.btn_txt_no;
	str_funcion_ok = objeto_config.str_funcion_ok;

	modal_btn_ok = '<button id="modal_btn_ok" onclick="' + str_funcion_ok + '">' + btn_txt_ok + '</button>';
	modal_btn_no = '<button id="modal_btn_no" onclick="borrar_modal_box()">' + btn_txt_no + '</button>';//No ALterar
	string_botones = modal_btn_ok + modal_btn_no;
	$("div#modal").html(string_modal_box);
	$("div#modal_header").html(titulo_modal);
	$("div#modal_mensaje").html(mensaje_modal);
	$("div#modal_botones").html(string_botones);
}

function borrar_modal_box(){
	$("div#modal").html("");
}

//Esta es la manera de crear la modal box.
/*function modal_ejemplo(){
	var config = {
		titulo_modal: 'ATENCIÓN',
		mensaje_modal: 'Estás a punto de ELIMINAR una Actividad Complementaria PERMANENTEMENTE <br> <p style="font-weight: bold;">¿Deseas Continuar?</p>',
		btn_txt_ok: 'continuar',//Texto del botón OK
		btn_txt_no: 'caNceLar',//Texto del botón NO
		str_funcion_ok: "saca_alert('holaaaaa desde el botón ok');"//Es la función a ejecutar por el botón OK
	};
	crear_modal_box(config);//Pide la creación  de la modal box
}
*/

//Función de prueba
/*function saca_alert(str){
	alert(str);
	borrar_modal_box();
}*/


/*
 * Insertar una animación gif
 */

var string_loading = '<div id="loading_animation"> <div class="loader_1"></div> Cargando... </div>';
var string_miniloading = '<div id="loading_animation"> <div class="mini_loader">';

function crear_loading_contenido(){
	$("#contenido").html(string_loading);
}

function crear_loading_subcontenido(){
	$("#sub_contenido").html(string_loading);
}

function crear_loading_boton(){
	$("#boton").html(string_miniloading);
}





/*
* Mensajes del servidor
*/











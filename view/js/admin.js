/*
 * Cuando se cargue la pagina inicial
 */

$(document).ready(function(){
    inicio();
});//END FUNCTION

/*
 * Carga pagina con la pantalla inicial de opciones de administrador
 */
function inicio (){
    $("#contenido").load("view/Administradores/inicio_administrador");
}//END FUNCTION

/*
 * Después de que la pantalla anterior sea añadida al DOM, se crean las funciones click de los elementos del DOM actualizado
 */
$(inicio).ajaxStop(function(){
    //Botones navbar
    $("#btn_inicio").click(function(){
        crear_loading_contenido();
        //$("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/inicio_administrador");
    });//END FUNCTION
    $("#btn_reportes").click(function(){
        crear_loading_contenido();
        //$("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/inicio_administrador");
    });//END FUNCTION
    $("#btn_comunicado").click(function(){
        crear_loading_contenido();
        //$("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/inicio_administrador");
    });//END FUNCTION
    $("#btn_ayuda").click(function(){
        crear_loading_contenido();
        //$("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/inicio_administrador");
    });//END FUNCTION
    $("#btn_salir").click(function(){
        crear_loading_contenido();
        objParametros = {tipo_consulta: 'logout'};
        $.ajax({
            type: 'POST',
            url: 'view/Administradores/scp_validaciones',
            data: objParametros,
            success: function(respuesta){
                $('body').html(respuesta);
            }
        });
        //$("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>MEDIDA DE ESTABILIZACIÓN DEL SISTEMA. <br><br>El proceso de sesiones aún no está listo,<br>por favor recargue la página para detener esta pausa...</figurecaption></figure></center>");
        //$(document).load("../");
    });//END FUNCTION
    
    //Botones de página inicial
    $("#gestionar_actividades").click(function(){
        crear_loading_contenido();
        //$("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_actividades");
    });//END FUNCTION
    $("#gestionar_alumnos").click(function(){
        crear_loading_contenido();
        //$("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_alumnos");
    });//END FUNCTION
    $("#gestionar_instructores").click(function(){
        crear_loading_contenido();
        //$("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_instructores");
    });//END FUNCTION
    
    //Botones de la barra lateral
    $("#menulateral1").click(function(){
        crear_loading_contenido();
        //$("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_actividades");
    });//END FUNCTION
    $("#menulateral2").click(function(){
        crear_loading_subcontenido();
        //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_alumnos");
    });//END FUNCTION
    $("#menulateral3").click(function(){
        crear_loading_subcontenido();
        //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_instructores");
    });//END FUNCTION
    
    /*
     * Para el botón btn_nueva_actividad
     */
    $("#btn_nueva_actividad").click(function(){
        crear_loading_subcontenido();
        //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_registrar_actividad");
    });//END FUNCTION
    
    /*
     * Para el botón btn_nuevo_lugar
     */
    $("#btn_nuevo_lugar").click(function(){
        crear_loading_subcontenido();
        $("#contenido").load("view/Administradores/itz_registrar_lugar");
    });//END FUNCTION
    
    /*
     * Para el botón btn_gestionar_lugares
     */
    $("#btn_gestionar_lugares").click(function(){
        crear_loading_subcontenido();
        //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_lugares");
    });//END FUNCTION
    
    /*
     * Para el botón btn_actividades_inactivas
     */
    $("#btn_actividades_inactivas").click(function(){
        crear_loading_subcontenido();
        //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_actividades_inactivas");
    });//END FUNCTION
    
    /*
     * Para el botón btn_actividades_activas
     */
    $("#btn_actividades_activas").click(function(){
        crear_loading_subcontenido();
        $("#contenido").load("view/Administradores/itz_gestionar_actividades");
    });//END FUNCTION
    
    /*
     * Para la pantalla de modificar actividad, registrar actividad el botón de enviar
     */ 
    $("#enviar_datos").click(function(){
        
        tipo_consulta = "";
        url = "";
        objParametros = {};
        
        switch($("#enviar_datos").attr("name")){
            case "modificar_actividad":
                //EL ID de la actividad complementaria a modificar. No es tocada por el usuario
                s_id_actividad = $("#frm_modificar_actividad #s_id_actividad").val();

                ///Datos originales tomados de la base de datos y recuperados de un input hidden
                s_nombre_actividad = $("#frm_modificar_actividad #s_nombre_actividad").val();
                s_categoria_actividad = $("#frm_modificar_actividad #s_categoria_actividad").val();
                s_descripcion_actividad = $("#frm_modificar_actividad #s_descripcion_actividad").val();
                s_horas_actividad = $("#frm_modificar_actividad #s_horas_actividad").val();
                s_creditos_actividad = $("#frm_modificar_actividad #s_creditos_actividad").val();
                s_disponibilidad_actividad = $("#frm_modificar_actividad #s_bandera_disponibilidad_actividad").val();
                s_status = $("#frm_modificar_actividad #s_bandera_activa_actividad").val();
                s_cupo_actividad = $("#frm_modificar_actividad #s_cupo_actividad").val();
                s_campus_actividad = $("#frm_modificar_actividad #s_campus_actividad").val();

                ///Nuevos valores introducidos por el usuario
                nombre_actividad = $("#nombre_actividad").val();
                categoria_actividad = $("#categoria_actividad").val();
                descripcion_actividad = $("#descripcion_actividad").val();
                total_horas_actividad = $("#total_horas_actividad").val();
                creditos_actividad = $("#creditos_actividad").val();
                disponibilidad = $("#disponibilidad").val();
                status = $("#status").val();
                cupo_actividad = $("#cupo_actividad").val();
                campus_actividad = $("#campus_actividad").val();

                ///Variables que se mandarán al servidor
                d_nombre_actividad = "";
                d_categoria_actividad = "";
                d_descripcion_actividad = "";
                d_total_horas_actividad = "";
                d_creditos_actividad = "";
                d_disponibilidad = "";
                d_status = "";
                d_cupo_actividad = "";
                d_campus_actividad = "";


                if((nombre_actividad === "" )||(nombre_actividad === null))
                    d_nombre_actividad = s_nombre_actividad;
                else
                    d_nombre_actividad = nombre_actividad;

                if((categoria_actividad === "") || (categoria_actividad === null))
                    d_categoria_actividad = s_categoria_actividad;
                else
                    d_categoria_actividad = categoria_actividad;

                if((descripcion_actividad === "") || (descripcion_actividad === null))
                    d_descripcion_actividad = s_descripcion_actividad;
                else
                    d_descripcion_actividad = descripcion_actividad;

                if((total_horas_actividad === "") || (total_horas_actividad === null))
                    d_total_horas_actividad = s_horas_actividad;
                else
                    d_total_horas_actividad = total_horas_actividad;

                if((creditos_actividad === "") || (creditos_actividad === null))
                    d_creditos_actividad = s_creditos_actividad;
                else
                    d_creditos_actividad = creditos_actividad;

                if((disponibilidad === "") || (disponibilidad === null))
                    d_disponibilidad = s_disponibilidad_actividad;
                else
                    d_disponibilidad = disponibilidad;

                if((status === "") || (status === null))
                    d_status = s_status;
                else
                    d_status = status;

                if((cupo_actividad === "") || (cupo_actividad === null))
                    d_cupo_actividad = s_cupo_actividad;
                else
                    d_cupo_actividad = cupo_actividad;

                if((campus_actividad === "") || (campus_actividad === null))
                    d_campus_actividad = s_campus_actividad;
                else
                    d_campus_actividad = campus_actividad;

                    console.log(
                        d_nombre_actividad + " - " +
                        d_categoria_actividad + " - " +
                        d_descripcion_actividad + " - " +
                        d_total_horas_actividad + " - " +
                        d_creditos_actividad + " - " +
                        d_disponibilidad + " - " +
                        d_status + " - " +
                        d_cupo_actividad + " - " +
                        d_campus_actividad                       
                    );

                actividad = s_id_actividad;
                tipo_consulta = "modificar_actividad";
                url = "view/Administradores/scp_validaciones";
                objParametros = {
                    'tipo_consulta' : tipo_consulta,
                    'id' : actividad,
                    'nombre_actividad' : d_nombre_actividad,
                    'categoria' : d_categoria_actividad,
                    'descripcion' : d_descripcion_actividad,
                    'horas' : d_total_horas_actividad,
                    'creditos' : d_creditos_actividad,
                    'disponibilidad' : d_disponibilidad,
                    'status' : d_status,
                    'cupo' : d_cupo_actividad,
                    'id_campus' : d_campus_actividad
                };
            break;//END CASE
            case "registrar_actividad": 
                //nombre_actividad = $("#nombre_actividad");
                //categoria = $("#categoria_actividad");
                
                tipo_consulta = "registrar_actividad";
                url = "view/Administradores/scp_validaciones";
                objParametros = {
                    'tipo_consulta' : tipo_consulta,
                    'nombre_actividad' : $("#nombre_actividad").val(),
                    'categoria' : $("#categoria_actividad").val(),
                    'descripcion' : $("#descripcion_actividad").val(),
                    'horas' : $("#total_horas_actividad").val(),
                    'creditos' : $("#creditos_actividad").val(),
                    'disponibilidad' : $("#disponibilidad").val(),
                    'cupo' : $("#cupo_actividad").val(),
                    'id_campus' : $("#campus_actividad").val(),
                    'lugar_actividad' : $("#lugar_actividad").val()
                };
            break;//END CASE
        case "registrar_lugar":
            tipo_consulta = "registrar_lugar";
            url = "view/Administradores/scp_validaciones";
            objParametros = {
                    'tipo_consulta' : tipo_consulta,
                    'nombre' : $("#nombre").val(),
                    'direccion' : $("#direccion").val(),
                    'url' : $("#url").val()
                };
            break;//END CASE
        }//END SWITCH
            crear_loading_subcontenido();
            //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
            $.ajax({
                type: 'POST',
                url: url,
                data: objParametros,
                success: function(respuesta){//Respuesta es lo que pone PHP en pantalla, prácticamente es traer al PHP si la consulta fue successfuly
                    $("#sub_contenido").html(respuesta);
                }//END SUCCESS
            });//END AJAX
    });//END FUNCTION
    
    //BOTONES GENERALES ACEPTAR-CANCELAR
    $("button#btn_aceptar_gestionar_actividades").click(function(){
        crear_loading_subcontenido();
        //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_actividades");
    });//END FUNCTION
    $("button#btn_cancelar_gestionar_actividades").click(function(){
        crear_loading_subcontenido();
        //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_actividades");
    });//END FUNCTION
    
    //PARA LOS BOTONES DE LA CAJA MODAL VEX
    $("button.vex-dialog-button-primary vex-dialog-button vex-first").click(function(){
        console.log("Botón continuar de la caja modal");
    });//END FUNCTION
});//END FUNCTION AJAX STOP

/*
 * Listeners de los botones de operaciones de la actividad complementaria
 */
//Para desactivar una actividad
function confirmar_desactivar_actividad(actividad){ 
    
    var config = {
		titulo_modal: 'ATENCIÓN',
		mensaje_modal: '<p>Estás a punto de DESACTIVAR una Actividad Complementaria. Esto significa que ya no estará diponible pero no será borrada.</p> <br> <p style="font-weight: bold;">¿Deseas Continuar?</p>',
		btn_txt_ok: 'continuar',//Texto del botón OK
		btn_txt_no: 'cancelar',//Texto del botón NO
		str_funcion_ok: "desactivar_actividad(" + actividad + ");"//Es la función a ejecutar por el botón OK
	};
	crear_modal_box(config);
    console.log(config.str_funcion_ok);//eso es para ver cómo se está comp
}
function desactivar_actividad(actividad){
    objParametros = {
        tipo_consulta: "desactivar_actividad",
        actividad: actividad
    };
    crear_loading_subcontenido();
    //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
    $.ajax({
        type: 'POST',
        url: 'view/Administradores/scp_validaciones',
        data: objParametros,//Obtenida de la que está a nivel de función
        success: function(respuesta){//Respuesta es lo que pone PHP en pantalla, prácticamente es traer al PHP si la consulta fue successfuly
            $("#sub_contenido").html(respuesta);
        }//END SUCCESS
    });//END AJAX
}//END FUNCTION


/*
 * Listeners de los botones de operaciones de la actividad complementaria
 */
//Para reactivar una actividad
function confirmar_activar_actividad(actividad){ 
    
    var config = {
		titulo_modal: 'ATENCIÓN',
		mensaje_modal: '<p>Estás a punto de REACTIVAR una Actividad Complementaria. Esto significa que volverá a estar disponible para su inscripción.</p> <br> <p style="font-weight: bold;">¿Deseas Continuar?</p>',
		btn_txt_ok: 'continuar',//Texto del botón OK
		btn_txt_no: 'cancelar',//Texto del botón NO
		str_funcion_ok: "activar_actividad(" + actividad + ");"//Es la función a ejecutar por el botón OK
	};
	crear_modal_box(config);
    console.log(config.str_funcion_ok);
}
function activar_actividad(actividad){
    objParametros = {
        tipo_consulta: "activar_actividad",
        actividad: actividad
    };
    crear_loading_subcontenido();
    //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
    $.ajax({
        type: 'POST',
        url: 'view/Administradores/scp_validaciones',
        data: objParametros,//Obtenida de la que está a nivel de función
        success: function(respuesta){//Respuesta es lo que pone PHP en pantalla, prácticamente es traer al PHP si la consulta fue successfuly
            $("#sub_contenido").html(respuesta);
        }//END SUCCESS
    });//END AJAX
}//END FUNCTION

//Para las otras tres operaciones
function gestion_actividades(objetoDOM){
    //Este bucle determina el nombre del formulario actual (padre del elemento al que se ha dado click)
    do
        obj = objetoDOM.parentNode;//Se recorren los padres del elemento clickeado
    while(obj.tagName !== "FORM");//Se detiene hasta que encuentra un FORM, esto por medio de las propiedades del DOM directamente
    
    //Variable anónima que guarda el nombre del formulario como un string
    nombreFormularioActual = "";
    nombreFormularioActual = obj.name;
    
    //variable que guarda el value del hidden actividad del form actual en forma de string
    actividad = "";
    tipo_consulta = "";
    url = "";
    objParametros = {};
    
    actividad = $('#' + nombreFormularioActual + ' #actividad').val();//Primero se busca dentro del formulario que haga match con el id del form actual cualquier elemento con id #actividad, después se le saca el value con jQuey
    boton = $(objetoDOM).attr('id');//Se obtiene el id del botón pulsado por medio jQuery. Para que funcione, el elemento debe mandar su contexto (this) como parametro en la invocación del evento onclick.
    
    console.log(actividad);
    console.log(boton);
    
    //Dependiedo del botón pulsado será el tipo de consulta 
    switch(boton){
        case "btn_detalles_actividad":{//Si es el de detalles
            url =  'view/Administradores/itz_detalles_actividad';
            tipo_consulta = "detalles_actividad";
            objParametros = {
                'actividad' : actividad,//Ya fue declarada y asignadaanteriormente
                'tipo_consulta' : tipo_consulta//Es necesario este parámetro porque en el servidor hay un switch que decide qué hacer de acuerdo al tipo de consulta
            };
            break;
        }//END CASE
        case "btn_alumnos_inscritos":{
        	url =  'view/Administradores/itz_alumnos_inscritos_actividad';
            tipo_consulta = "alumnos_actividad";
            objParametros = {
                'actividad' : actividad,
                'tipo_consulta' : tipo_consulta
            };
            break;
        }//END CASE
        case "btn_modificar_actividad":{
            url =  "view/Administradores/itz_modificar_actividad";
            tipo_consulta = "modificar_actividad";
            objParametros = {
                'actividad' : actividad,
                'tipo_consulta' : tipo_consulta
            };
            break;
        }//END CASE
        case "btn_confirmar_eliminar":{
            url = "view/Administradores/itz_eliminar_actividad";
            tipo_consulta = "eliminar_actividad";
            objParametros = {
                'actividad' : actividad,
                'tipo_consulta' : tipo_consulta
            };
            
            //cadena = "<script> vex.defaultOptions.className = 'vex-theme-wireframe'; vex.dialog.open({ message: " + "'Estás a punto de ELIMINAR esta Actividad Complementaria ¿Deseas Continuar?', input: " + '"<input name=' + "'user'" + "type='hidden'" + "placeholder='Pon El usuario acá'" + 'required/><input name=' + "'pass' type='hidden'" + "placeholder='Pon la contraseña acá' required/>" + '",' + 'buttons: [$.extend({}, vex.dialog.buttons.YES, {text: "Continuar"}), $.extend({}, vex.dialog.buttons.NO, {text: "Cancelar"})] }); </script>';
            console.log(cadena);
            $("#sub_contenido").html(cadena);
            /*
            url = "view/Administradores/itz_eliminar_actividad";
            tipo_consulta = "eliminar_actividad";
            objParametros = {
                'actividad' : actividad,
                'tipo_consulta' : tipo_consulta
            };*/
            break;
        }//END CASE
    }//END SWITCH
    
    //Se pone un gif mientras se realizan las operaciones AJAX
            crear_loading_subcontenido();
            //$("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
            
            $.ajax({
                type: 'POST',
                url: url,//Obtenida de la que está a nivel de función
                data: objParametros,//Obtenida de la que está a nivel de función
                success: function(respuesta){//Respuesta es lo que pone PHP en pantalla, prácticamente es traer al PHP si la consulta fue successfuly
                    $("#contenido").html(respuesta);
                }//END SUCCESS
            });//END AJAX
}//END FUNCTION


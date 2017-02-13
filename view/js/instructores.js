$(document).ready(function(){
    inicio();
});//END FUNCTION

function inicio (){
	crear_loading_contenido();
    $("#contenido").load("view/Instructores/itz_inicio_instructor.php");
}//END FUNCTION

$(inicio).ajaxStop(function(){
    //Botones navbar
    $("#btn_inicio").click(function(){
        crear_loading_subcontenido();
        $("#contenido").load("view/Alumnos/itz_inicio_alumno.php");
    });
    $(".contenedor").click(function(){
        tipo_consulta = "";
        url = "";
        objParametros = {};
        
        switch($(".contenedor").attr("id")){
            case "btn_salir":
                tipo_consulta = "logout";
                url = "view/Alumnos/scp_validaciones.php";
                objParametros = {'tipo_consulta': tipo_consulta };
            break;//END CASE
        }//END SWITCH
        crear_loading_contenido();
        $.ajax({
                type: 'POST',
                url: url,
                data: objParametros,
                success: function(respuesta){
                    $('body').html(respuesta);
                }//END SUCCESS
            });//END AJAX
    });//END FUNCTION
    
    //Botones de página inicial
    $("#gestionar_actividades").click(function(){
        $("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
    });//END FUNCTION
    $("#gestionar_alumnos").click(function(){
        $("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
    });//END FUNCTION
    $("#gestionar_instructores").click(function(){
        $("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
    });//END FUNCTION
    
    //Botones de la barra lateral
    $("#menulateral1").click(function(){
        $("#contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
    });//END FUNCTION
    $("#menulateral2").click(function(){
        $("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
    });//END FUNCTION
    $("#menulateral3").click(function(){
        $("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
    });//END FUNCTION
    
    //BOTONES GENERALES ACEPTAR-CANCELAR
    $("button#btn_aceptar_gestionar_actividades").click(function(){
        $("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_actividades");
    });//END FUNCTION
    $("button#btn_cancelar_gestionar_actividades").click(function(){
        $("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
        $("#contenido").load("view/Administradores/itz_gestionar_actividades");
    });//END FUNCTION
    
    //PARA LOS BOTONES DE LA CAJA MODAL VEX
    $("button.vex-dialog-button-primary vex-dialog-button vex-first").click(function(){
        console.log("Botón continuar de la caja modal");
    });//END FUNCTION
});//END FUNCTION AJAX STOP

/*
 * Obtiene el nombre del formulario actual
 */
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
            $("#sub_contenido").html("<center><figure><img src='view/img/loading.gif' width='30%' height='30%'/><figurecaption>Espere por favor...</figurecaption></figure></center>");
            
            $.ajax({
                type: 'POST',
                url: url,//Obtenida de la que está a nivel de función
                data: objParametros,//Obtenida de la que está a nivel de función
                success: function(respuesta){//Respuesta es lo que pone PHP en pantalla, prácticamente es traer al PHP si la consulta fue successfuly
                    $("#contenido").html(respuesta);
                }//END SUCCESS
            });//END AJAX
}//END FUNCTION

function confirmar_eliminar(){ 
    cadena = '<script> vex.defaultOptions.className = "vex-theme-wireframe"; vex.dialog.open({ message: ' + '"Estás a punto de ELIMINAR esta Actividad Complementaria ¿Deseas Continuar?", input: ' + '"<input name=' + "'actividad'" + " id='actividad'" + " type='hidden' value='" + actividad + "'/>" + "<button id='btn_confirmar_eliminar' name='btn_confirmar_eliminar' class='vex-dialog-button-primary vex-dialog-button vex-first' value='true' onclick='(gestion_actividades(this);)'>Confirmar</button>" + "<button id='btn_confirmar_eliminar' class='vex-dialog-button-secondary vex-dialog-button vex-last' value='false'>Cancelar</button>" + '"' + '}); </script>';
    console.log(cadena);
    console.log(actividad);
    $("#modal").html(cadena);
}
function confirmar_eliminar(){ 
    cadena = '<script> vex.defaultOptions.className = "vex-theme-wireframe"; vex.dialog.open({ message: ' + '"Estás a punto de ELIMINAR esta Actividad Complementaria ¿Deseas Continuar?", input: ' + '"<input name=' + "'actividad'" + " id='actividad'" + " type='hidden' value='" + actividad + "'/>" + "<button id='btn_confirmar_eliminar' name='btn_confirmar_eliminar' class='vex-dialog-button-primary vex-dialog-button vex-first' value='true' onclick='(gestion_actividades(this);)'>Confirmar</button>" + "<button id='btn_confirmar_eliminar' class='vex-dialog-button-secondary vex-dialog-button vex-last' value='false'>Cancelar</button>" + '"' + '}); </script>';
    console.log(cadena);
    console.log(actividad);
    $("#modal").html(cadena);
}


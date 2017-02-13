$(document).ready(function(){
    inicio();
});//END FUNCTION

function inicio (){
    crear_loading_contenido();
    $("#contenido").load("view/Alumnos/itz_inicio_alumno.php");
}//END FUNCTION

$(inicio).ajaxStop(function(){
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
    
    $("#btn_actividades_disponibles").click(function(){
        crear_loading_subcontenido();
        $("#sub_contenido").load("view/Alumnos/itz_actividades_disponibles.php");
    });//END FUNCTION
});//END AJAX STOP

function ver_detalles_actividad(objetoDOM){
         //Este bucle determina el nombre del formulario actual (padre del elemento al que se ha dado click)
        do
            obj = objetoDOM.parentNode;//Se recorren los padres del elemento clickeado
        while(obj.tagName !== "FORM");//Se detiene hasta que encuentra un FORM, esto por medio de las propiedades del DOM directamente
        
        //Variable anónima que guarda el nombre del formulario como un string
        nombreFormularioActual = "";
        nombreFormularioActual = obj.name;
        
        actividad = "";
        tipo_consulta = "";
        url = "";
        objParametros = {};
        
        actividad = $('#' + nombreFormularioActual + ' #actividad').val();//Primero se busca dentro del formulario que haga match con el id del form actual cualquier elemento con id #actividad, después se le saca el value con jQuey
        boton = $(objetoDOM).attr('id');//Se obtiene el id del botón pulsado por medio jQuery. Para que funcione, el elemento debe mandar su contexto (this) como parametro en la invocación del evento onclick.
        
        console.log(actividad);
        console.log(boton);
        
        
}//END FUNCTION
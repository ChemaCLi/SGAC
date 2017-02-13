$(document).ready(function(){
    inicio();            
});

function inicio(){
    crear_loading_contenido();
  $("#contenido").load("bienvenida.php");  
}

$(inicio).ajaxStop(function(){
    // carga el login de administrador
    $("#opcion1").click(function(){
        console.log("hola");
        crear_loading_contenido();
        $("#contenido").load("admin_login.php");
    });//END FUNCTION
    // carga login de alumnos
    $("#opcion2").click(function(){
        crear_loading_contenido();
        $("#contenido").load("alumnos_login.php");
    });//END FUNCTION
    // carga login de instructores
    $("#opcion3").click(function(){
        crear_loading_contenido();
        $("#contenido").load("instructores_login.php");
    });//END FUNCTION
    // para los botones de cancelar login
    $("#btn_cancelar_login").click(function(){
        crear_loading_contenido();
        $("#contenido").load("bienvenida.php");
    });//END FUNCTION
    
    /*
     * Para los input text del login
     */
    $("#usuario").keyup(function(){
        this.value = this.value.toUpperCase();
    });
    $(".capitals").keyup(function(){
        this.value = this.value.toUpperCase();
    });
    /*
     * Para el botón de ingresar del login
     */
    $('#btn_login').click(function(){
        div_id_boton = "";
        
        url = "";
        objParametros = {};
        tipo_consulta = "login";
        
        switch($('#btn_login').attr("name")){                
            case "alumno":
                div_id_boton = '<input type="submit" value="Ingresar" class="boton" id="btn_login" name="alumno">';
                
                url = "view/Alumnos/scp_validaciones.php"; 
                usuario = $("#usuario").val();
                clave = $("#clave").val(); 
                objParametros = {
                    'tipo_consulta' : tipo_consulta,
                    'usuario' : usuario,
                    'clave' : clave
                };
                console.log("Ya entramos al case alumno");
            break;//END CASE
            case "admin":
                div_id_boton = '<input type="submit" value="Ingresar" class="boton" id="btn_login" name="admin">';
                
                url = "view/Administradores/scp_validaciones.php"; 
                usuario = $("#usuario").val();
                clave = $("#clave").val(); 
                objParametros = {
                    'tipo_consulta' : tipo_consulta,
                    'usuario' : usuario,
                    'clave' : clave
                };
                console.log("Ya entramos al case admin");
            break;//END CASE
            case "instructor":
                div_id_boton = '<input type="submit" value="Ingresar" class="boton" id="btn_login" name="instructor">';
                
                url = "view/Instructores/scp_validaciones.php";
                usuario = $("#usuario").val();
                clave = $("#clave").val();
                objParametros = {
                    'tipo_consulta' : tipo_consulta,
                    'usuario' : usuario,
                    'clave' : clave
                };
                console.log("Ya entramos al case de instructor");
                break;//END CASE
            default:
                $("#mensaje").html("<script>window.location='index'</script>");
                console.log("DEFAULT");
            break;
        }//END SIWTCH
        crear_loading_boton();
        $("#cancelar").html("");
        $.ajax({
                type: 'POST',
                url: url,
                data: objParametros,
                success: function(respuesta){//Respuesta es lo que pone PHP en pantalla, prácticamente es traer al PHP si la consulta fue successfuly
                    res = respuesta.toString();
                    r = parseInt(res);
                    
                    switch(r){
                        case 2:
                            $("#mensaje").html("El Usuario y/o el NIP son incorrectos");
                            $("#boton").html(div_id_boton);
                            $("#cancelar").html('<button href="#" class="cancelar" id="btn_cancelar_login">Cancelar</button>');
                        break;//END CASE
                        case 1:
                            $("#mensaje").html("Uno o ambos campos están vacíos");
                                $("#boton").html(div_id_boton);
                                $("#cancelar").html('<button href="#" class="cancelar" id="btn_cancelar_login">Cancelar</button>');
                        break;
                        default:
                            $('body').html(respuesta);
                        break;//END CASE
                    }//END SWITCH                        
                }//END SUCCESS
            });//END AJAX
    });//END FUNCTION
    
    $("#link_postularse_instructor").click(function(){
        $("#contenido").load("frm_solicitud_instructor.php");
    });//END FUNCTION
    
    $("#btn_aceptar").click(function(){
        $("#contenido").load("bienvenida.php");
    });
});//END AJAX STOP

function solicitud_alta_instructor(){
    url = "view/Instructores/scp_validaciones.php";
    tipo_consulta = "solicitud_alta_instructor";
    objParametros = {};

    curp = $("#curp").val();
    nombre = $("#nombre").val();
    apellido_paterno = $("#apellido_paterno").val();
    apellido_materno = $("#apellido_materno").val();
    genero = $("#genero").val();
    fecha_nacimiento = $("#fecha_nacimiento").val();
    direccion = $("#direccion").val();
    telefono =$("#telefono").val();
    actividad = $("#actividad").val();
    
    objParametros = {
        'tipo_consulta' : tipo_consulta,
        'curp' : curp,
        'nombre' : nombre,
        'apellido_paterno' : apellido_paterno,
        'apellido_mateno' : apellido_materno,
        'genero' : genero,
        'fecha_nacimiento' : fecha_nacimiento,
        'direccion' : direccion,
        'telefono' : telefono,
        'actividad' : actividad
    };
    crear_loading_contenido();
    $.ajax({
        type: 'POST',
        url: url,
        data: objParametros,
        success: function(respuesta){
            //$("#contenido").slideUp();
            $("#contenido").html(respuesta);
            subir_mensaje_servidor();
        }//END SUCCESS
    });//END AJAX
}//END AJAX

function subir_mensaje_servidor(){
    $("html, body").animate({scrollTop: 0}, "slow");
    return false;
}//END FUNCTION

function cancelar(){
    var conexion;
    if(window.XMLHttpRequest){
        conexion = new XMLHttpRequest();
    }
    else{
        conexion = new ActiveXObject("Microsoft.XMLHTTP");
    }
    conexion.onreadystatechange = function(){
        if(conexion.readyState == 4 && conexion.status == 200){
            document.getElementById("contenido").innerHTML = conexion.responseText;
        }
    };
    
    conexion.open("GET", "bienvenida.php", true);
    conexion.send();
}//END FUNCTION
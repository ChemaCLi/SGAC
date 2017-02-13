<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Instructores/cls_Ctrl_Instructor.php";
    
    $tipo_consulta = $_POST['tipo_consulta'];
    
    switch($tipo_consulta){
        case "logout":
            session_start();//Tomar el contexto de la sesion la cual deberia estar en estado SET
            session_destroy();//Elimina la sesion y destruye cualquier dato de sesion
        break;//END CASE
        case "login":
            $strCURP = "";
            $intNIP = "";
            $strCURP = $_POST['usuario'];
            $intNIP = $_POST['clave'];
            if((empty($strCURP) && empty($intNIP)) || empty($strCURP) || empty($intNIP))//DETERMINAR SI LAS VARRIABLES ESTÁN VACÍAS
                echo "1";
            elseif((!isset($strCURP) && !isset($intNIP)) || !isset($strCURP) || !isset($intNIP))//DETERMINAR SI LAS VARIABLES ESTÁN NULAS
                echo "1";
            else{
                $objControl = new cls_Ctrl_Instructor();
                $objResult = $objControl->mtdValidarInstructor($strCURP, $intNIP);
                if($objResult > 0){
                    //Iniciar una sesión
                    session_start();
                    //Crear variables de sesión
                    $_SESSION['TIPO_USUARIO'];
                    $_SESSION['strCURP'];
                    $_SESSION['intNIP'];
                    $_SESSION['strNombre'];
                    $_SESSION['strApPaterno'];
                    $_SESSION['strApMaterno'];
                    $_SESSION['chrGenero'];
                    $_SESSION['dtmFechaNacimiento'];
                    $_SESSION['strDireccion'];
                    $_SESSION['strTelefono'];
                    $_SESSION['strEmail'];
                    $_SESSION['intBanderaActivo'];
                    $_SESSION['intBanderaNIPCambiado'];
                    //Asignar los valores desde la base de datos
                    $_SESSION['TIPO_USUARIO'] = "INSTRUCTOR";
                    $_SESSION['strCURP'] = $objResult[0]['strCURP'];
                    $_SESSION['intNIP'] = $objResult[0]['intNIP'];
                    $_SESSION['strNombre'] = $objResult[0]['strNombre'];
                    $_SESSION['strApPaterno'] = $objResult[0]['strApPaterno'];
                    $_SESSION['strApMaterno'] = $objResult[0]['strApMaterno'];
                    $_SESSION['chrGenero'] = $objResult[0]['chrGenero'];
                    $_SESSION['dtmFechaNacimiento'] = $objResult[0]['dtmFechaNacimiento'];
                    $_SESSION['strDireccion'] = $objResult[0]['strDireccion'];
                    $_SESSION['strTelefono'] = $objResult[0]['strTelefono'];
                    $_SESSION['intBanderaNIPCambiado'] = $objResult[0]['intBanderaNIPCambiado'];
                    //Redirigir a la página de alumnos
                    echo '<script>window.location="instructores"</script>';
                }
                else
                    echo "2";//CONSULTA SIN RESULTADOS
            }
        break;//END CASE
        case "solicitud_alta_instructor":
            if(isset($_POST['curp'])){
            $objControl = new cls_Ctrl_Instructor();
            
            $strCURP = $_POST['curp'];
            $strNombre = $_POST['nombre'];
            $strApPaterno = $_POST['apellido_paterno'];
            $strApMaterno = $_POST['apellido_materno'];
            $chrGenero = $_POST['genero'];
            $dtmFechaNacimiento = $_POST['fecha_nacimiento'];
            $strDireccion = $_POST['direccion'];
            $strTelefono = $_POST['telefono'];
            $strEmail = $_POST['mail'];
            $strNombreActividad = $_POST['actividad'];
            
            $result = $objControl->mtdSolicitarAltaInstructor($strCURP, $strNombre, $strApPaterno, $strApMaterno, $chrGenero, $dtmFechaNacimiento, $strDireccion, $strTelefono, $strEmail, $strNombreActividad);
            if($result === true)
                    echo '
                        <div id="mensaje_servidor_alta_instructor">
                            <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                                <div id="titulo">OPERACIÓN EXITOSA</div>
                                <div id="mensaje">Se ha mandado la solicitud. Pronto recibirás una respuesta en el correo o número telefónico.</div>
                                <button id="btn_aceptar" style="margin:auto;">Aceptar</button>
                            </div>
                        </div>';
                    //Operacion exitosa
                elseif($result === false)
                    echo '
                        <div id="mensaje_servidor_alta_instructor">
                            <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                                <div id="titulo">OPERACIÓN FALLIDA</div>
                                <div id="mensaje">No se ha conseguido realizar la solicitud. Esto puede deberse a que ya estés en el registro o que exista un error interno. Por favor, comunícalo con el administrador para pedir información al respecto.</div>
                                <button id="btn_aceptar" style="margin:auto;">Aceptar</button>
                            </div>
                        </div>';//Operación Fallida
                else
                    echo '
                        <div id="mensaje_servidor_alta_instructor">
                            <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                                <div id="titulo">ERROR</div>
                                <div id="mensaje">Ha ocurrido un error inesperado. Por favor, informa al administrador.</div>
                                <button id="btn_aceptar" margin="auto">Aceptar</button>
                            </div>
                        </div>'; //Error inesperado
            
	}
        break;// END CASE
    }//END SWITCH
?>
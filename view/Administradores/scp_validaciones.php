<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php"; 
    require_once "$root/SGAC_v1.0/trunk/controllers/Lugares/cls_Ctrl_Lugar.php";
    require_once "$root/SGAC_v1.0/trunk/controllers/Administradores/cls_Ctrl_Administrador.php";
    $tipo_consulta = $_POST['tipo_consulta'];
    
    switch($tipo_consulta){
        case "logout":
            session_start();
            session_destroy();
            echo '<script>window.location="index.php"</script>';
            break;//END CASE
        case "login":
            $strCURP = "";
            $intNIP = "";
            $strCURP = $_POST['usuario'];
            $intNIP = $_POST['clave'];
            if((empty($strCURP) && empty($intNIP)) || empty($strCURP) || empty($intNIP))//DETERMINAR SI LAS VARRIABLES ESTÁN VACÍAS
                 printf("1");
            elseif((!isset($strCURP) && !isset($intNIP)) || !isset($strCURP) || !isset($intNIP))//DETERMINAR SI LAS VARIABLES ESTÁN NULAS
                 printf("1");
            else{
                $objControl = new cls_Ctrl_Administrador();
                $objResult = $objControl->mtdValidarAdministrador($strCURP, $intNIP);
                if($objResult > 0){
                    //Iniciar una sesión
                    session_start();
                    //Crear variables de sesión
                    $_SESSION['TIPO_USUARIO'];
                    $_SESSION['strCURP'];
                    $_SESSION['strNombre'];
                    $_SESSION['strApPaterno'];
                    $_SESSION['strApMaterno'];
                    $_SESSION['dtmFechaNacimiento'];
                    $_SESSION['strDireccion'];
                    $_SESSION['strTelefono'];
                    $_SESSION['intNIP'];
                    $_SESSION['intBanderaNIPCambiado'];  
                    //Asignar los valores desde la base de datos
                    $_SESSION['TIPO_USUARIO'] = "ADMINISTRADOR";
                    $_SESSION['strCURP'] = $objResult[0]['strCURP'];
                    $_SESSION['strNombre'] = $objResult[0]['strNombre'];
                    $_SESSION['strApPaterno'] = $objResult[0]['strApPaterno'];
                    $_SESSION['strApMaterno'] = $objResult[0]['strApMaterno'];
                    $_SESSION['dtmFechaNacimiento'] = $objResult[0]['dtmFechaNacimiento'];
                    $_SESSION['strDireccion'] = $objResult[0]['strDireccion'];
                    $_SESSION['strTelefono'] = $objResult[0]['strTelefono'];
                    $_SESSION['intNIP'] = $objResult[0]['intNIP'];
                    $_SESSION['intBanderaNIPCambiado'] = $objResult[0]['intBanderaNIPCambiado'];  
                    //Redirigir a la página de alumnos
                    echo '<script>window.location="admin"</script>';
                }
                else
                    echo "2"; 
            }
            break;//END CASE
        case "registrar_actividad":
            $objControl = new cls_Ctrl_Actividad(); 
            $objResult = $objControl->mtdRegistrarActividad();
            if($objResult === true)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN EXITOSA</div>
                            <div id="mensaje">La actividad complementaria se ha registrado correctamente.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>';
                //Operacion exitosa
            elseif($objResult === false)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN FALLIDA</div>
                            <div id="mensaje">No se ha conseguido registrar la actividad complementaria.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>';//Operación Fallida
            else
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">ERROR</div>
                            <div id="mensaje">Ha ocurrido un error inesperado.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //Error inesperado
            break;//END CASE
        case "modificar_actividad":
            $objControl = new cls_Ctrl_Actividad();
            $objResult = $objControl->mtdModificarActividades();
            if($objResult === true)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN EXITOSA</div>
                            <div id="mensaje">La actividad complementaria se ha modificado correctamente.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>';//"Operación exitosa
            elseif($objResult === false)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN FALLIDA</div>
                            <div id="mensaje">No se ha conseguido modificar la actividad complementaria.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>';//Operación Fallida
            else
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">ERROR</div>
                            <div id="mensaje">Ha ocurrido un error inesperado.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //Error inesperado
            break;//END CASE
        case "desactivar_actividad":
            $objControl = new cls_Ctrl_Actividad(); 
            $objResult = $objControl->mtdDesactivarActividad();
            if($objResult === true)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN EXITOSA</div>
                            <div id="mensaje">La actividad complementaria ha sido desactivada.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //"La actividad complementaria ha sido desactivada, no se mostrará más.<br><button id=".'"'."btn_aceptar_gestionar_actividades".'"'.">Aceptar</button>";
            elseif($objResult === false)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN FALLIDA</div>
                            <div id="mensaje">No se ha conseguido desactivar la actividad complementaria.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //"Operación Fallida";
            else
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">ERROR</div>
                            <div id="mensaje">Ha ocurrido un error inesperado.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //"HA SUCEDIDO UN ERROR";
            break;//END CASE
        case "activar_actividad":
            $objControl = new cls_Ctrl_Actividad();
            $objResult = $objControl->mtdActivarActividad();
            if($objResult === true)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN EXITOSA</div>
                            <div id="mensaje">La actividad complementaria ha sido reactivada.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //"La actividad complementaria ha sido Reactivada.<br><button id=".'"'."btn_aceptar_gestionar_actividades".'"'.">Aceptar</button>";
            elseif($objResult === false)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN FALLIDA</div>
                            <div id="mensaje">No se ha conseguido reactivar la actividad complementaria.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //"Operación Fallida";
            else
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">ERROR</div>
                            <div id="mensaje">Ha ocurrido un error inesperado.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //"HA SUCEDIDO UN ERROR";
            break;//END CASE
        case "registrar_lugar":
            $objControl = new cls_Ctrl_Lugar();
            $objResult = $objControl->mtdRegistrarLugar();
            if($objResult === true)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN EXITOSA</div>
                            <div id="mensaje">Se ha registrado un nuevo lugar</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //
            elseif($objResult === false)
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN FALLIDA</div>
                            <div id="mensaje">No se ha conseguido registrar el nuevo lugar</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //"Operación Fallida";
            else
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">ERROR</div>
                            <div id="mensaje">Ha ocurrido un error inesperado.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //"HA SUCEDIDO UN ERROR";
            break;//END CASE
    }//END SWITCH
?>
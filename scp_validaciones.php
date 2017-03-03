<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Administradores/cls_Ctrl_Administrador.php";
    require_once "$root/SGAC_v1.0/trunk/controllers/Instructores/cls_Ctrl_Instructor.php"; 
    session_start();//CONTINUAR LA SESSION
    
    //DETERMINAR QUÉ TIPO DE USUARIO HACE CREA EL AVISO
    $tipo_consulta = "";
    
    if(isset($_GET['tipo_consulta']))
        $tipo_consulta = $_GET['tipo_consulta'];
    if(isset($_POST['tipo_consulta']))
        $tipo_consulta = $_POST['tipo_consulta'];
    
    if($tipo_consulta == 'generar_aviso'){
        switch($_SESSION['TIPO_USUARIO']){
            case "ADMINISTRADOR":
                $id_administrador = $_SESSION['strCURP'];
                //CHECAR LO DEL AVISO GENERAL
                //$id_actividad =$_GET['actividad'];
                $id_actividad = $_GET['actividad'];
                $fecha_emision = "0000-00-00";
                $titulo_mensaje = $_POST['titulo'];
                $contenido_mensaje = $_POST['mensaje'];
                trim($id_actividad);
                trim($fecha_emision);
                trim($titulo_mensaje);
                trim($contenido_mensaje);
                
                if((count($tipo_consulta) < 1)||(count($id_administrador ) < 1)||(count_chars($id_actividad) < 1)
                   ||(count($fecha_emision) < 1)||(count($titulo_mensaje) < 1)
                   ||(count($contenido_mensaje) < 1)){
                    echo'
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">OPERACIÓN FALLIDA</div>
                            <div id="mensaje">El aviso no se logró emitir debido a que se enviaron valores incorrectos. Esto puede ser a causa de saturación de la red o a que la conexión sea lenta. Intenta refrescar la página.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>';//Operación Fallida
                    //MOSTRAR MENSAJE DE ERROR DEBIDO A VALORES INCORRECTOS
                }elseif((isset($tipo_consulta)) && (isset($id_administrador ))&&(isset($id_actividad))
                   &&(isset($fecha_emision))&&(isset($titulo_mensaje))
                   &&(isset($contenido_mensaje))){
                    echo "bien, los parámetros son correctos";
                    //realizar la petición
                }else{
                    echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">ERROR</div>
                            <div id="mensaje">Ha ocurrido un error inesperado.</div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>'; //Error inesperado
                    //MOSTRAR MENSAJE DE ERROR DEBIDO A VALORES INCORRECTOS
                }
                break;//END CASE
            case "INSTRUCTOR":
                break;//END CASE
            default://ACCESO NO AUTORIZADO
                //MOSTRAR MENSAJE DE ERROR
                break;//END DEFAULT
    }//END SWITCH   
    }
?>
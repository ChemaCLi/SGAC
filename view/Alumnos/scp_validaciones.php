<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Alumnos/cls_Ctrl_Alumno.php";
    
    $tipo_consulta = $_POST['tipo_consulta'];
    
    switch($tipo_consulta){
        case "logout":
            session_start();
            session_destroy();
            echo '<script>window.location="index"</script>';
        break;
        case "login":
            $strNoControl = "";
            $intNIP = "";
            $strNoControl = $_POST['usuario'];
            $intNIP = $_POST['clave'];
            if((empty($strNoControl) && empty($intNIP)) || empty($strNoControl) || empty($intNIP))//DETERMINAR SI LAS VARRIABLES ESTÁN VACÍAS
                echo "1";
            elseif((!isset($strNoControl) && !isset($intNIP)) || !isset($strNoControl) || !isset($intNIP))//DETERMINAR SI LAS VARIABLES ESTÁN NULAS
                echo "1";
            else{
                $objControl = new cls_Ctrl_Alumno();
                $objResult = $objControl->mtdValidarAlumno($strNoControl, $intNIP);
                if($objResult > 0){
                    //Iniciar una sesión
                    session_start();
                    //Crear variables de sesión
                    $_SESSION['TIPO_USUARIO'];
                    $_SESSION['strNoControl'];
                    $_SESSION['intNIP'];
                    $_SESSION['strNombre'];
                    $_SESSION['strApPaterno'];
                    $_SESSION['strApMaterno'];
                    $_SESSION['strDireccion'];
                    $_SESSION['intSemestre'];
                    $_SESSION['strNumEmergencia'];
                    $_SESSION['strLimitaciones'];
                    $_SESSION['intBanderaNIPCambiado'];
                    $_SESSION['_intIdCampus'];
                    $_SESSION['_intIdCarrera']; 
                    //Asignar los valores desde la base de datos
                    $_SESSION['TIPO_USUARIO'] = "ALUMNO";
                    $_SESSION['strNoControl'] = $objResult[0]['strNoControl'];
                    $_SESSION['intNIP'] = $objResult[0]['intNIP'];
                    $_SESSION['strNombre'] = $objResult[0]['strNombre'];
                    $_SESSION['strApPaterno'] = $objResult[0]['strApPaterno'];
                    $_SESSION['strApMaterno'] = $objResult[0]['strApMaterno'];
                    $_SESSION['strDireccion'] = $objResult[0]['strDireccion'];
                    $_SESSION['intSemestre'] = $objResult[0]['intSemestre'];
                    $_SESSION['strNumEmergencia'] = $objResult[0]['strNumEmergencia'];
                    $_SESSION['strLimitaciones'] = $objResult[0]['strLimitaciones'];
                    $_SESSION['intBanderaNIPCambiado'] = $objResult[0]['intBanderaNIPCambiado'];
                    $_SESSION['_intIdCampus'] = $objResult[0]['_intIdCampus'];
                    $_SESSION['_intIdCarrera'] = $objResult[0]['_intIdCarrera']; 
                    //Redirigir a la página de alumnos
                    echo '<script>window.location="alumnos"</script>';
                }
                else
                    echo "2";//CONSULTA SIN RESULTADOS
            }
        break;//END CASE
    }//END SWITCH
?>
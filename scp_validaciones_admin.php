<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/SGAC_v1.0/trunk/controllers/Administradores/cls_Ctrl_Administrador.php";
require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php";

$tipo_consulta = $_POST['tipo_consulta'];


 
switch($tipo_consulta){
    case "detalles_actividad":{
        $objControlActividad = new cls_Ctrl_Actividad();
        $actividad = $_POST['actividad'];
        $objResult = $objControlActividad->mtdObtenerActividadPorId($actividad);
    }
}



if($tipo_consulta == "registro") {
    $objControlAdmin = new cls_Ctrl_Administrador(); 
    $objControl->mtdInsertarAdministradores();
    
}

?>
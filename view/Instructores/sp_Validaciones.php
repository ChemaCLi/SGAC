<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Instructores/cls_Ctrl_Instructores.php";
    
    $operacion = $_POST['operacion'];
    $objControl = new cls_Ctrl_Instructores();
    
    if($operacion == "registrar"){
        $objControl->mtdRegistrarUnInstructor();
    }
    if($operacion == "consultar1"){
        $intId=$_POST['lista'];
        $result = $objControl->mtdObtenerInstrutorPorId($intId);
        foreach($result as $item){
            echo "ID: $item[0] <br>";
            echo "Nombre: $item[1] <br>";
            echo "Apellido Paterno: $item[2] <br>";
            echo "Apellido Materno: $item[3] <br>";
            echo "Fecha de Nacimiento: $item[4] <br>";
            echo "Dirección: $item[5] <br>";
            echo "Telefono: $item[6] <br>";
        }
    }
?>
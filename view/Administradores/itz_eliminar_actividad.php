<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php";
    require "lateral_administrador.php";

    $ID = $_POST['actividad'];
	
    $objControl = new cls_Ctrl_Actividad();
?>
<section id="sub_contenido">
	<?php
		$objResult = $objControl->mtdEliminarRegistroPorId($ID);
	?>
    holaaaa
</section>
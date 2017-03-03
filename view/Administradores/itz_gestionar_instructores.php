<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Instructores/cls_Ctrl_Instructor.php";
    require "lateral_administrador.php";
?>
<section id="sub_contenido">
    <div id="btn_nuevo_instructor">
		<a href="#" title="Añadir Nuevo Instructor"><img src="view/img/icons/add.png"/></a>
	</div>
    
    <div id="titulo_pantalla">
		<h2>Gestión de Instructores</h2>
		<img src="view/img/icons/open-book.png">
	</div>
    <div id="opcion_1">
        <div id="opcion_label"> <h1>Buscador Avanzado</h1></div>
        <div id="opcion_img"> <img src="view/img/icons/busqueda_avanzada.png" width="50%"/> </div>
	</div>
	<div id="opcion_2">
        <div id="opcion_label"> <h1>Aspirantes</h1></div>
        <div id="opcion_img"> <img src="view/img/icons/aspirante.jpg" width="50%"/> </div>
    </div>
	<div id="opcion_3">
        <div id="opcion_label"> <h1>Historial</h1></div>
        <div id="opcion_img"> <img src="view/img/icons/historial.png" width="50%"/> </div>
    </div>
</section>
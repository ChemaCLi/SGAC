<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Lugares/cls_Ctrl_Lugar.php";
    require "lateral_administrador.php";
?>
<section id="sub_contenido">	 
	<div id="btn_nuevo_lugar">
		<a href="#" title="Registrar Lugar"><img src="view/img/icons/add.png"></a>
	</div> 
	<div id="confirmacion_eliminar"></div> 
	<div id="titulo_pantalla">
		<h2>Gestionar Lugares</h2>
		<img src="view/img/icons/lugar.png">
	</div>	
	<div id="busqueda">
		<?php
			$objControl = new cls_Ctrl_Lugar();
			$objResult = $objControl->mtdObtenerTodosLugares();
			foreach($objResult as $r){
		?>
		<div id="listado_lugares" style="color: #f00;";>
			<ul id="datos_actividad">
				<h3><?php echo $r['strNombreLugar']; ?></h3>
				<li>Dirección: <?php echo $r['strDireccion']; ?></li>
			</ul>
			<div id="operaciones_actividades">
				<div id="res"></div>
				<form name="frm_detalles_actividad_<?php echo $r['intId']; ?>" id="frm_detalles_actividad_<?php echo $r['intId']; ?>" method="post" onsubmit="return false;">
					<input name="actividad" id="actividad" type="hidden" value="<?php echo $r['intId']; ?>"/>
					<button name="btn_detalles_actividad" id="btn_detalles_actividad" onclick="gestion_lugares(this);">Detalles</button>
					<button name="btn_alumnos_inscritos" id="btn_alumnos_inscritos" onclick="gestion_lugares(this);">Alumnos Inscritos</button>
					<button name="btn_modificar_actividad" id="btn_modificar_actividad" onclick="gestion_lugares(this);">Modificar</button>
					<button name="btn_eliminar_actividad" id="btn_desactivar_actividad" onclick="confirmar_desactivar_actividad(<?php echo "'".$r['intId']."'"; ?>);">Desactivar</button>
				</form>
			</div>
		</div>
		<?php
			}
		?>
	</div>
	<div id="modal"></div>
</section>




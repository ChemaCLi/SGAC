<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php";
    require "lateral_administrador.php";
?>
<section id="sub_contenido">
	<div id="titulo_pantalla">
	<h2>Actividades Complementarias Inactivas</h2>
		<img src="view/img/icons/OPEn-BOOK.png">
	</div>	
	<div id="btn_actividades_activas">
		<a href="#" title="Ver Actividades Activas"><img src="view/img/icons/ver.png"></a>
	</div>
	<div id="btn_gestionar_lugares">
		<a href="#" title="Gestionar Lugares"><img src="view/img/icons/lugar.png"></a>
	</div>
	<div id="confirmacion_eliminar"></div>  		
	<div id="busqueda">
		<?php
			$objControl = new cls_Ctrl_Actividad();
			$objResult = $objControl->mtdObtenerActividadesInactivas();
			foreach($objResult as $r){
				$disponibilidad = $r['intBanderaDisponibilidadInscripcion'];
				if($disponibilidad < 1)
					$disponibilidad = "Inscripciones Cerradas";
				else
					$disponibilidad = "Inscripciones Abiertas";
		?>
		<div id="listado_actividades">
			<ul id="datos_actividad">
				<h3><?php echo $r['strNombreActividad']; ?></h3>
				<li>Tipo: <?php echo $r['strCategoria']; ?></li>
				<li>Descripción: <?php echo $r['strDescripcion']; ?></li>
				<li>Disponibilidad: <?php echo $disponibilidad; ?></li>
			</ul>
			<div id="operaciones_actividades">
				<div id="res"></div>
				<!--form name="frm_detalles_actividad" id="frm_detalles_actividad" action="view/Administradores/itz_detalles_actividad" method="post"-->
				<form name="frm_detalles_actividad_<?php echo $r['intId']; ?>" id="frm_detalles_actividad_<?php echo $r['intId']; ?>" method="post" onsubmit="return false;"><!--onsubmit="return detalles_actividad(this)"-->
					<!--input name="actividad" id="actividad" type="hidden" value="//echo $r[0]; ?>"/-->
					<input name="actividad" id="actividad" type="hidden" value="<?php echo $r['intId']; ?>"/>
					<button name="btn_detalles_actividad" id="btn_detalles_actividad" onclick="gestion_actividades(this);">Detalles</button>
					<button name="btn_alumnos_inscritos" id="btn_alumnos_inscritos" onclick="gestion_actividades(this);">Alumnos Inscritos</button>
					<button name="btn_activar_actividad" id="btn_activar_actividad" onclick="confirmar_activar_actividad(<?php echo "'".$r['intId']."'"; ?>);">Reactivar</button>
				</form>
			</div>
		</div>
		<?php
			}
		?>
	</div>
	<div id="modal"></div>
</section>




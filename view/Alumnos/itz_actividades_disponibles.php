<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php";
?>
<div id="btn_ver_avisos">
		<a href="#" title="Avisos"><img src="view/img/icons/mail4.png"/></a>
</div>
<?php
	$objControl = new cls_Ctrl_Actividad();
	$objResult = $objControl->mtdObtenerActividadesDisponibles($_SESSION['strNoControl']);
	
	if($objResult > 0){//Hay datos
		foreach($objResult as $r){
		?>
			<div id="listado_actividades">
				<ul id="datos_actividad">
					<h3><?php echo $r['strNombreActividad']; ?></h3>
					<br>
					<li><p  style="font-weight: bold; display: inline;">Descripción:</p> <?php echo $r['strDescripcion']; ?></li>
					<li><p style="font-weight: bold; display: inline;">Lugar</p>: <?php echo $r['strNombreLugar']; ?></li>
				</ul>
				<div id="operaciones_actividades">
					<form name="frm_detalles_actividad_<?php echo $r['intId']; ?>" id="frm_detalles_actividad_<?php echo $r['intId']; ?>" method="post" onsubmit="return false;">
						<input name="actividad" id="actividad" type="hidden" value="<?php echo $r['intId']; ?>"/>
						<button name="btn_detalles_actividad" id="btn_detalles_actividad" onclick="ver_detalles_actividad(this);">Detalles</button>
					</form>
				</div>
			</div>
		<?php
		}//END FOREACH
	}elseif($objResult < 1){
		echo '
			<div id="mensaje_servidor">
				<div id="mensaje_resultado_operacion" class="animated fadeInDown">
					<div id="titulo">NO HAY RESULTADOS</div>
					<div id="mensaje">De momento no hay actividades complementarias disponibles para inscribirse</div>
				</div>
			</div>';
	}else{
		echo '
			<div id="mensaje_servidor">
				<div id="mensaje_resultado_operacion" class="animated fadeInDown">
					<div id="titulo">ERROR</div>
					<div id="mensaje">Ha ocurrido un error inesperado</div>
				</div>
			</div>';
	}
?>

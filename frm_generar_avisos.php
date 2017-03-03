<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php";
	require_once "$root/SGAC_v1.0/trunk/view/Administradores/lateral_administrador.php";
	$objControl =  new cls_Ctrl_Actividad();
	$objResult = $objControl->mtdObtenerTodasActividades();
?>


<section id="sub_contenido">
	<h2 style="text-align: center;">GENERAR AVISOS</h2>
	
	<p style="width: 80%; text-align: center; margin: 15px auto;">
		INGRESA LOS DATOS DEL COMUNICADO. PROCURA REALIZARLO CON LA MAYOR CLARIDAD POSIBLE PARA EVITAR CONFUSIONES.
	</p>
	<form id="formulario_generar_aviso" onsubmit="emitir_aviso();">
		<select name="actividad" id="actividad">
			<?php
				foreach($objResult as $r)
					echo '<option value="'.$r['intId'].'">'.$r['strNombreActividad'].'</option>';
			?>
		</select>
		<input type="text" placeholder="MOTIVO" required="true" id="titulo" class="capitals"/>
		<label>Mensaje:</label>
		<textarea name="mensaje" id="mensaje" required="true"></textarea>
		<input type="submit" value="Emitir Comunicado"/>
		<input type="button" value="Cancelar" id="btn_cancelar_login"/>
	</form>
</section>
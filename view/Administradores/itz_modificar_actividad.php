<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php";
	require_once "$root/SGAC_v1.0/trunk/controllers/Lugares/cls_Ctrl_Lugar.php";
	require "lateral_administrador.php";

    $ID = $_POST['actividad'];
    $tipo_consulta = $_POST['tipo_consulta'];
	
    $objControl = new cls_Ctrl_Actividad();
    $objResult = $objControl->mtdObtenerDetallesActividad($ID);
	$objLugar = new cls_Ctrl_Lugar();
	$objResultLugar = $objLugar->mtdObtenerTodosLugares();
	echo $objResultLugar;
	/*if($tipo_consulta == "modificar_actividad"){
		$objControl->mtdModificarActividades();
	}*/
	$intId = $objResult['intId'];
	$strNombreActividad;
	$strCategoria;
	$strDescripcion;
	$intTotalHoras;
	$intCreditos;
	$intBanderaDisponibilidadInscripcion;
	$intBanderaActiva;
	$intCupo;
	$intIdCampus;
	
	$intDisponibilidad;
	$strDisponibilidad;
	$intStatus;
	$strStatus;
	$idCampus;
	$nombreCampus;

    foreach($objResult as $r){
        $intId = $r['intId'];
        $strNombreActividad = $r['strNombreActividad'];
        $strCategoria = $r['strCategoria'];
        $strDescripcion = $r['strDescripcion'];
        $intTotalHoras = $r['intTotalHoras'];
        $intCreditos = $r['intCreditos'];
        $intBanderaDisponibilidadInscripcion = $r['intBanderaDisponibilidadInscripcion'];
        $intBanderaActiva = $r['intBanderaActiva'];
        $intCupo = $r['intCupo'];
		$intIdCampus = $r['_intIdCampus'];
        
        $intDisponibilidad = $intBanderaDisponibilidadInscripcion;
        $intStatus = $intBanderaActiva;
		$idCampus = $intIdCampus;
            
        if($intDisponibilidad < 1)
            $strDisponibilidad = "Inscripciones Cerradas";
        else
            $strDisponibilidad = "Inscripciones Abiertas";
            
        if($intStatus < 1)
            $strStatus = "No Activa";
        else
            $strStatus = "Activa";
		switch($idCampus){
			case 1:
				$nombreCampus = "Orizaba";
				break;	
			case 2:
				$nombreCampus = "Zongolica";
				break;
		} 
	}
?>
<section id="sub_contenido">
	
	<div id="titulo_pantalla">
		<h2>Modificar Datos de la Actividad</h2>
	</div>	
	<div id="pantalla_modificar_actividad">
		<p>Los campos vacíos conservarán los datos originales</p>
		<br>
		<h2><?php echo $strNombreActividad; ?></h2>
		<br>
		<form name="frm_modificar_actividad" id="frm_modificar_actividad" method="POST" action="">
			<input type="hidden" id ="s_id_actividad" value="<?php echo $intId; ?>" />
			<input type="hidden" id ="s_nombre_actividad" value="<?php echo $strNombreActividad; ?>"/>
			<input type="hidden" id ="s_categoria_actividad" value="<?php echo $strCategoria; ?>"/>
			<input type="hidden" id ="s_descripcion_actividad" value="<?php echo $strDescripcion; ?>"/>
			<input type="hidden" id ="s_horas_actividad" value="<?php echo $intTotalHoras; ?>"/>
			<input type="hidden" id ="s_creditos_actividad" value="<?php echo $intCreditos; ?>"/>
			<input type="hidden" id ="s_bandera_disponibilidad_actividad" value="<?php echo $intBanderaDisponibilidadInscripcion; ?>"/>
			<input type="hidden" id ="s_bandera_activa_actividad" value="<?php echo $intBanderaActiva; ?>"/>
			<input type="hidden" id ="s_cupo_actividad" value="<?php echo $intCupo; ?>"/>
			<input type="hidden" id ="s_campus_actividad" value="<?php echo $intIdCampus; ?>"/>
			<label>Ingrese el nombre de la Actividad Complementaria:</label>
			<input name="nombre_actividad" id="nombre_actividad" type="text" placeholder="<?php echo $strNombreActividad; ?>"/>
			<label>Categoría:</label>
			<select name="categoria_actividad" id="categoria_actividad">
				<option value="<?php echo $strCategoria; ?>"><?php echo $strCategoria; ?></option>
				<option value="Cultural">Cultural</option>
				<option value="Deportiva">Deportiva</option>
				<option value="Social">Social</option>
				<option value="Especial">Especial</option>
			</select>
			<label>Descripción:</label>
			<textarea name="descripcion_actividad" id="descripcion_actividad"><?php echo $strDescripcion;?></textarea>
			<label>Total de Horas:</label>
			<input name="total_horas_actividad" id="total_horas_actividad" type="number" placeholder="<?php echo $intTotalHoras; ?>" pattern="^[0-9]{2}"/>
			<label>Valor en créditos:</label>
			<input name="creditos_actividad" id="creditos_actividad" type="number" placeholder="<?php echo $intCreditos;?>"/>
			<label>Inscripciones:</label>
			<select name="disponibilidad" id="disponibilidad">
				<option value="<?php echo $intDisponibilidad; ?>"><?php echo $strDisponibilidad; ?></option>
				<option value="1">Incripciones Abiertas</option>
				<option value="0">Inscipciones Cerradas</option>
			</select>
			<label>Status:</label>
			<select name="status" id="status" >
				<option value="<?php echo $intStatus; ?>"><?php echo $strStatus; ?></option>
				<option value="1">Activa</option>
				<option value="0">No activa</option>
			</select>
			<label>Cupo:</label>
			<input name="cupo_actividad" id="cupo_actividad" type="number" placeholder="<?php echo $intCupo;?>"/>
			<label>Campus:</label>
			<select name="campus_actividad" id="campus_actividad">
				<option value="<?php echo $idCampus; ?>"><?php echo $nombreCampus; ?></option>
				<option value="1">Orizaba</option>
				<option value="2">Zongolica</option>
			</select>
			<label>Lugar:</label>
			<select name="lugar_actividad" id="lugar_actividad">
			<?php 
				foreach ($objResultLugar as $lugar){
					echo '<option value="'.$lugar['intId'].'">'.$lugar['strNombreLugar'].'</option>';
				}
			?>
			</select>
		</form>
		<div id="botones">
			<input type="button" name="modificar_actividad" id="enviar_datos" value="Modificar"/>	
			<button name="btn_cancelar_gestionar_actividades" id="btn_cancelar_gestionar_actividades">Cancelar</button>
		</div>	
	</div>
</section> 
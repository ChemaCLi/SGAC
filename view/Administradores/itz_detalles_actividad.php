<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php";
	require "lateral_administrador.php";

    $ID = $_POST['actividad'];
    $tipo_consulta = $_POST['tipo_consulta'];
   
    $objControl = new cls_Ctrl_Actividad();
    $objResult = $objControl->mtdObtenerDetallesActividad($ID);
    foreach ($objResult as $r){
		$disponibilidad = $r['intBanderaDisponibilidadInscripcion'];
		$status = $r['intBanderaActiva'];
		$int_campus = $r['_intIdCampus'];
		$str_campus = "";
		
		if($disponibilidad < 1)
			$disponibilidad = "Actualmente no disponible para inscripción";
		else
			$disponibilidad = "Disponible para inscripción";
			
		if($status < 1)
			$status = "Inactiva";
		else
			$status = "Activa";
			
		switch($int_campus){
			case 1:{
				$str_campus = "Orizaba";
				break;
			}
			case 2:{
				$str_campus = "Zongolica";
				break;
			}
		}
?>
<section id="sub_contenido">
	<div id="titulo_pantalla">
		<h2>Detalles de la Actividad</h2>
	</div>	
	<div id="detalles_actividad">
		<div id="datos_actividad">
			<h2><?php echo $r['strNombreActividad'];?></h2>
			<ul>
				<br>
				<li><p>ID:</p><?php echo " ".$r['intId']; ?></li> 
				<li><p>Categoría:</p><?php echo " ".$r['strCategoria']; ?></li> 
				<li><p>Descripción:</p><?php echo " ".$r['strDescripcion']; ?></li> 
				<li><p>Total de Horas:</p><?php echo " ".$r['intTotalHoras']." hrs"; ?></li> 
				<li><p>Valor:</p><?php echo " ".$r['intCreditos']." Créditos"; ?></li> 
				<li><p>Disponibilidad:</p><?php echo " ".$disponibilidad; ?></li> 
				<li><p>Status:</p><?php echo " ".$status; ?></li> 
				<li><p>Cupo:</p><?php echo " ".$r['intCupo']; ?></li> 
				<li><p>Campus:</p><?php echo " ".$str_campus; ?></li>
				<li><p>Lugar:</p><?php echo " ".$r['strNombreLugar']; ?></li>
				<li><p>Dirección:</p><?php echo " ".$r['strDireccion']; ?></li>
			</ul>
			<form id="detalles_actividad" name="detalles_actividad" method="post" onsubmit="return false;">
				<input type="hidden" name="actividad" id="actividad" value="<?php echo $r['intId']; ?>"/>
				<button id="btn_aceptar_gestionar_actividades">Aceptar</button>
				<button name="btn_modificar_actividad" id="btn_modificar_actividad" onclick="gestion_actividades(this);">Modificar</button>
			</form>
		</div>
		<iframe id="mapa_detalles" src="<?php echo $r['strUrlMapa']; ?> "></iframe>
	</div>
</section>
<?php
	}
?>

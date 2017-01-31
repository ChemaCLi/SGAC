<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Lugares/cls_Ctrl_Lugar.php";
	require "lateral_administrador.php";

    $ID = $_POST['lugar'];
    $tipo_consulta = $_POST['tipo_consulta'];
   
    $objControl = new cls_Ctrl_Lugar();
    $objResult = $objControl->mtdObtenerLugarPorId($ID);
	
    $intId = $objResult['intId'];
	$strNombreLugar = $objResult['strNombreLugar'];
	$strDireccion = $objResult['strDireccion'];
    $strUrlMapa = $objResult['strUrlMapa'];
	$str_campus = "";
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
				<li><p>:</p><?php echo " ".$intId; ?></li> 
				<li><p>Categoría:</p><?php echo " ".$r['strCategoria']; ?></li> 
				<li><p>Descripción:</p><?php echo " ".$r['strDescripcion']; ?></li> 
				<li><p>Total de Horas:</p><?php echo " ".$r['intTotalHoras']." hrs"; ?></li> 
				<li><p>Valor:</p><?php echo " ".$r['intCreditos']." Créditos"; ?></li> 
				<li><p>Disponibilidad:</p><?php echo " ".$disponibilidad; ?></li> 
				<li><p>Status:</p><?php echo " ".$status; ?></li> 
				<li><p>Cupo:</p><?php echo " ".$r['intCupo']; ?></li> 
				<li><p>Campus:</p><?php echo " ".$str_campus; ?></li>
				
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

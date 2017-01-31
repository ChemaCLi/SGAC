<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php";
    require "lateral_administrador.php";
?>
<section id="sub_contenido">
	<div id="btn_actividades_inactivas">
		<a href="#" title="Ver Actividades Inactivas"><img src="view/img/icons/ver.png"></a>
	</div>
	<div id="btn_gestionar_lugares">
		<a href="#" title="Gestionar Lugares"><img src="view/img/icons/lugar.png"></a>
	</div>
	<div id="btn_nueva_actividad">
		<a href="#" title="Crear Actividad"><img src="view/img/icons/add.png"></a>
	</div> 
	<div id="confirmacion_eliminar"></div>
	<div id="titulo_pantalla">
		<h2>Gestión de Actividades Complementarias Activas</h2>
		<img src="view/img/icons/open-book.png">
	</div>	
	<!--BUSQUEDA MANUAL-->
	<!--form action="frm_busqueda.php" method="post" name="search_form" id="search_form">
        <!--input type="text" name="search" id="search" id='b-query' maxlength='255' name='q' onblur='if(this.value==&quot;&quot;)this.value=&quot;&quot;;else;this.value=this.value' onfocus='if(this.value==&quot;Ingrese CODIGO de Producto Silko&quot;)this.value=&quot;&quot;;else;this.value=this.value' size='30' type='text' placeholder='Ingrese CODIGO de Producto Silko'/ ->
        <select name="search" id="search" maxlength='255'> 
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="B1214">B1214</option>
		</select>
    </form-->
	<div id="busqueda">
		<?php
			$objControl = new cls_Ctrl_Actividad();
			$objResult = $objControl->mtdObtenerActividadesActivas();
			
			if($objResult > 0){//Hay datos
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
							<br>
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
								<button name="btn_modificar_actividad" id="btn_modificar_actividad" onclick="gestion_actividades(this);">Modificar</button>
								<button name="btn_eliminar_actividad" id="btn_desactivar_actividad" onclick="confirmar_desactivar_actividad(<?php echo "'".$r['intId']."'"; ?>);">Desactivar</button>
							</form>
						</div>
					</div>
			<?php
				}
			}elseif($objResult < 1){
				echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">NO HAY RESULTADOS</div>
                            <div id="mensaje">De momento no hay actividades complementarias activas</div>
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
	</div>
	<div id="modal"></div>
</section>




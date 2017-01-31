<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Actividades/cls_Ctrl_Actividad.php";
	require "lateral_administrador.php";
    
    $tipo_consulta = $_POST['tipo_consulta'];
    
    if($tipo_consulta == "alumnos_actividad"){
            $objControl = new cls_Ctrl_Actividad();
            $objResult = $objControl->mtdObtenerAlumnosPorActividad();
            
            if($objResult == false){///Error, mensaje de eror
				echo '<section id="sub_contenido">';
                echo '
                    <div id="mensaje_servidor">
                        <div id="mensaje_resultado_operacion" class="animated fadeInDown">
                            <div id="titulo">AÚN NO HAY ALUMNOS INSCRITOS</div>
                            <div id="mensaje"></div>
                            <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                        </div>
                    </div>';
					echo '<section>';
            }
            else{///Consulta exitosa, imprimir tabla
                echo '<section id="sub_contenido">';
                
                echo '<table id = "tabla_resultados">';
                echo '<tr id="fila_header">
						<th id="indice"> </th>
                        <th id="columna1">Numero de Control</th>
                        <th id="columna2">Nombre del Alumno</th>
                        <button id="btn_aceptar_gestionar_actividades">Aceptar</button>
                     </tr>';
                     
                $cont = 1;//Contador para poner un índice en los resultados que se muestran por cada fila en la tabla
                foreach($objResult as $r)
                { 
?>
					<tr id="fila_res">
						<td><?php echo $cont.".-"; ?></td>
						<td id="columna1"><?php  echo $r['strNoControl']; ?></td>
						<td id="columna2"><?php  echo utf8_encode($r['strNombre'])." ".utf8_encode($r['strApPaterno'])." ".utf8_encode($r['strApMaterno']); ?></td>
					</tr>            
<?php
					$cont ++;//Incrementar el contador   
				}//END FOREACH
            echo '</table>';
            echo '<section>';
        }
    }
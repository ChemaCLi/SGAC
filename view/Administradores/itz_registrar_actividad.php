<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Lugares/cls_Ctrl_Lugar.php";
    require "lateral_administrador.php";
?>
<section id="sub_contenido">
    <div id="titulo_pantalla">
		<h2>Registrar Nueva Actividad</h2>
	</div>	
    <div id="pantalla_registrar_actividad">
        <form name="registrar_actividad" id="registrar_actividad" onsubmit="return false;">
            <label>Nombre de la Actividad Complementaria:</label>
            <input name="nombre_actividad" id="nombre_actividad" type="text"/>
            <label>Categoría:</label>
            <select name="categoria_actividad" id="categoria_actividad">
                <option value="Cultural">Cultural</option>
                <option value="Deportiva">Deportiva</option>
                <option value="Social">Social</option>
                <option value="Especial">Especial</option>
            </select>
            <label>Descripción:</label>
            <textarea name="descripcion_actividad" id="descripcion_actividad"></textarea>
            <label>Total de Horas:</label>
            <input name="total_horas_actividad" id="total_horas_actividad" type="number" pattern="^[0-9]{2}"/>
            <label>Valor en créditos:</label>
            <input name="creditos_actividad" id="creditos_actividad" type="number"/>
            <label>Inscripciones:</label>
            <select name="disponibilidad" id="disponibilidad">
                <option value="1">Incripciones Abiertas</option>
                <option value="0">Inscipciones Cerradas</option>
            </select>
            <label>Cupo:</label>
            <input name="cupo_actividad" id="cupo_actividad" type="number"/>
            <label>Campus:</label>
            <select name="campus_actividad" id="campus_actividad">
                <option value="1">Orizaba</option>
                <option value="2">Zongolica</option>
            </select>
            <label>Lugar en el que se llevará a cabo: </label>
            <select name="lugar_actividad" id="lugar_actividad">
                <?php
                    $objControl = new cls_Ctrl_Lugar();
                    $objResult = $objControl->mtdObtenerTodosLugares();
                    foreach($objResult as $r){
                 ?>
                    <option value="<?php echo $r['intId']; ?>"><?php echo $r['strNombreLugar']; ?></option>
                <?php
                    }
                ?>
            </select>		
        </form>
        <div id="botones">
            <input type="button" name="registrar_actividad" id="enviar_datos" value="Registrar"/>
            <button name="btn_cancelar_gestionar_actividades" id="btn_cancelar_gestionar_actividades">Cancelar</button>
        </div>
    </div>
</section>
<?php 
    require "lateral_administrador.php";
?>
<section id="sub_contenido">
    <div id="titulo_pantalla">
		<h2>Registrar Nuevo Lugar</h2>
	</div>	
    <div id="pantalla_registrar_lugar">
		<h3>Para completar esta operación necesitas ir a <a href="http://www.maps.google.com/" target="_blank">Google Maps</a></h3>
        <form name="registrar_lugar" id="registrar_lugar" onsubmit="return false;">
            <label>Nombre del Lugar:</label>
            <input name="nombre" id="nombre" type="text"/>
            <label>Direccion:</label>
            <input name="direccion" id="direccion" type="text"/>
            <label>URL:</label>
            <input name="url" id="url" type="text"/>         
            </select>		
        </form>
        <div id="botones">
            <input type="button" name="registrar_lugar" id="enviar_datos" value="Registrar Lugar"/>
            <button name="btn_cancelar_gestionar_actividades" id="btn_cancelar_gestionar_actividades">Cancelar</button>
        </div>
    </div>
</section>
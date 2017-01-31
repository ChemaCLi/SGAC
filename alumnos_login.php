<h4 id="titulo"> Actividades Complementarias ITSZ</h4>
<div id="mensaje"></div>
<div id="formulario">
	<form onsubmit="return false;">
		<label id="subtitulo">Ingresar como Alumno</label>
		<input type="text" name="usuario" id="usuario" name="usuario" placeholder="Numero de Control" class="input-text" required="true" title="Número de Control" pattern="^[1]{1}[1-9]{1}[6]{1}[W]{1}[0-9]{4}"/>
		<input type="password" name="clave" id="clave" name="clave" placeholder="Contraseña" class="input-text" required="true" title="NIP" pattern="^[0-9]{4}"/>
		<div id="boton">
			<input type="submit" value="Ingresar" class="boton" id="btn_login" name="alumno">
		</div>
	</form>
	<div id="cancelar">
		<button href="#" class="cancelar" id="btn_cancelar_login">Cancelar</button>
	</div>
</div>

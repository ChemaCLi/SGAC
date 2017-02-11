<h4 id="titulo">Administración de Actividades Complementarias ITSZ</h4>
<div id="mensaje"></div>
<div id="formulario">
	<form onsubmit="return false;">
		<label id="subtitulo">Ingresar como Administrador</label>
		<input type="text" title="USUARIO" id="usuario" name="usuario" placeholder="Usuario" class="input-text" required="true" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"/>
		<input type="password" title="CLAVE DE ACCESO" id="clave" name="clave" placeholder="Clave de Acceso" class="input-text" required="true" pattern="^[0-9]{4}">
		<div id="boton">
			<input type="submit" value="Ingresar" class="boton" id="btn_login" name="admin">
		</div>
	</form>
	<div id="cancelar">
		<button href="#" class="cancelar" id="btn_cancelar_login">Cancelar</button>
	</div>
</div>
  
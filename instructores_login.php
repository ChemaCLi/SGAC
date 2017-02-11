<h4 id="titulo">Instructores de Actividades Complementarias ITSZ</h4>
<div id="formulario">
	<form action="holas" method="post" id="inicio_sesion_admin" onsubmit="return false;">
		<label id="subtitulo">Ingresar como Instructor</label>
		<input title="USUARIO" type="text"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="usuario" name="usuario" placeholder="Usuario" class="input-text" required="true" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$"/>
		<input title="CLAVE DE ACCESO" type="password" id="pass" name="clave_acceso" placeholder="Clave de Acceso" class="input-text" required="true" pattern="^[0-9]{4}">
		<input type="submit" value="Ingresar" class="boton" id="btn_iniciar_admin">
	</form>
	<button href="#" class="cancelar" id="btn_cancelar_login">Cancelar</button>
</div>
<a style="color: #00f; text-align: center; cursor: pointer;">Postularse como Instructor</a>
  
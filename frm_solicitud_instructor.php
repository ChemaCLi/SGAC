<h2 style="text-align: center;">POSTULARSE COMO INSTRUCTOR</h2>
<p>
	Esta sección es para realizar una SOLICITUD para ser instructor de actividades complementarias.
	Deberás llenar el siguiente formulario y presentarte en persona en las oficinas correspondientes.
	Tanto la solicitud como los datos ingresados serán evaluados por un administrador que determinará si se concede el permiso.
	La respuesta a la solicitud se enviará al correo ingresado o un administrador se pondrá en contacto por medio del teléfono ingresado.
</p>
<form id="formulario_solicitud_instructor" method="post" onsubmit="solicitud_alta_instructor();">
	<input type="text" placeholder="CURP" required="true" id="curp" pattern="^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$" class="capitals"/>
	<input type="text" placeholder="NOMBRE" required="true" id="nombre" class="capitals"/>
	<input type="text" placeholder="APELLIDO PATERNO" required="true" id="apellido_paterno" class="capitals"/>
	<input type="text" placeholder="APELLIDO MATERNO" required="true" id="apellido_materno" class="capitals"/>
	<label id="subtitulo">Género:</label>
	<select name="genero" id="genero">
		<option value="H">HOMBRE</option>
		<option value="M">MUJER</option>
	</select>
	<label id="subtitulo">Fecha de Nacimiento:</label>
	<input type="date" id="fecha_nacimiento"/>
	<input type="text" placeholder="DIRECCIÓN ACTUAL" required="true" id="direccion" class="capitals"/>
	<input type="text" placeholder="NÚMERO TELEFÓNICO" id="telefono"/>
	<input type="text" placeholder="CORREO ELECTRÓNICO" required="true" id="mail"/>
	<input type="text" placeholder="ACTIVIDAD(ES) COMPLEMENTARIA(S)" required="true" id="actividad"/>
	<input type="submit" value="Enviar solicitud"/>
	<input type="button" value="Cancelar" id="btn_cancelar_login"/>
</form>
<?php
	
?>
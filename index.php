<?php
session_start();
	if(!$_SESSION){
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>SGAC :: Sistema de Gestión de Actividades Complementarias</title>
		<!--BAD_SYSTEM_CONFIG_INFO-->
		<link rel="icon" type="image/png" href="view/img/icon.png"/>
		<link rel="stylesheet" type="text/css" href="view/css/main.css"/>
		<link rel="stylesheet" type="text/css" href="view/css/inicio.css"/>
		<link rel="stylesheet" type="text/css" href="view/css/bienvenida.css"/>
		<link rel="stylesheet" type="text/css" href="view/css/log.css">
		<link rel="stylesheet" type="text/css" href="view/css/modal_systech.css"/>
		<script type="text/javascript" src="view/js/jquery/jquery.js"></script>
		<script type="text/javascript" src="view/js/inicio.js"></script>
		<script type="text/javascript" src="view/js/modal_systech.js"></script>
	</head>
	<body>
		<header class="encabezado">
			<div id="titulo-bar">
				<h2>Actividades Complementarias Online :: v. ALPHA</h2>
				<h4>Un servicio del Instituto Tecnológico Superior de Zongolica</h4>
			</div>
			<nav>
				<ul>
					<a href="#info" id="botones-nav"><li>Información</li></a>
				</ul>
			</nav>
		</header>
		<div id="contenido">
		</div>
		<footer id="info">
			<small>Instituto Tecnológico Superior de Zongolica &copy; 2016</small>
			<small>
				itszongolica.edu.mx
			</small>
			<small>
				itszongolica@itszongolica.edu.mx
			</small>
			<small>
				Teléfonos:
				<br>
				456789998765
				<br>
				923456709876
			</small>
			<img src="view/img/icons/itsz-logo.png" id="logo"/>
		</footer>
	</body>
</html>
<?php
	}
	else{
		switch($_SESSION['TIPO_USUARIO']){
			case "ALUMNO":
				echo '<script>window.location="alumnos"</script>';
			break;//END CASE
			case "ADMINISTRADOR":
				echo '<script>window.location="admin"</script>';
			break;//END CASE
		}//END SWITCH
	}
?>
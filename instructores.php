<?php
    session_start();
	if(!isset($_SESSION['TIPO_USUARIO']))
		echo '<script>window.location="index"</script>';
    elseif($_SESSION['TIPO_USUARIO'] == "INSTRUCTOR"){
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
		<title>SGAC :: INSTRUCTORES</title>
		<!--BAD_SYSTEM_CONFIG_INFO-->
		<link rel="icon" type="image/png" href="view/img/icon.png"/>
		<link rel="stylesheet" type="text/css" href="view/css/animate.css"/>
		<link rel="stylesheet" type="text/css" href="view/css/main.css"/>
        <link rel="stylesheet" type="text/css" href="view/css/navbar.css"/>
        <link rel="stylesheet" type="text/css" href="view/css/instructores.css"/>
		<link rel="stylesheet" type="text/css" href="view/css/modal_systech.css"/>
		<script type="text/javascript" src="view/js/jquery/jquery.js"></script>
		<script type="text/javascript" src="view/js/modal_systech.js"></script>
		<script type="text/javascript" src="view/js/instructores.js"></script>
    </head>
    <body>
        <?php
            include "view/itz_Navbar_Instructor.php";
        ?>
		<div id="contenido">
			
		</div>
    </body>
</html>
<?php
	}else{
		echo '<script>window.location="index"</script>';
	}
?>
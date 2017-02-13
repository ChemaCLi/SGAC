<?php
    session_start();
	if(!isset($_SESSION['TIPO_USUARIO']))
		echo '<script>window.location="index"</script>';
    elseif($_SESSION['TIPO_USUARIO'] == "ADMINISTRADOR"){
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
		<title>SGAC :: ADMINISTRADORES</title>
		<!--BAD_SYSTEM_CONFIG_INFO-->
		<link rel="icon" type="image/png" href="view/img/icon.png"/>
		<link rel="stylesheet" type="text/css" href="view/css/animate.css"/>
		<link rel="stylesheet" type="text/css" href="view/css/main.css"/>
        <link rel="stylesheet" type="text/css" href="view/css/navbar.css"/>
        <link rel="stylesheet" type="text/css" href="view/css/admin.css"/>
		<link rel="stylesheet" type="text/css" href="view/css/modal_systech.css"/>
		<!--link rel="stylesheet" type="text/css" href="view/css/jquery.fancybox.css"/-->
		<!--link rel="stylesheet" type="text/css" href="view/css/vex.css"/-->
		<!--link rel="stylesheet" type="text/css" href="view/css/vex-theme-wireframe.css"/-->
		<script type="text/javascript" src="view/js/jquery/jquery.js"></script>
		<!--script type="text/javascript" src="view/js/modal/modal.js"></script-->
		<script type="text/javascript" src="view/js/modal_systech.js"></script>
		<script type="text/javascript" src="view/js/admin.js"></script>
		<!--script type="text/javascript" src="view/js/jquery.fancybox.js"></script-->
		<!--script type="text/javascript" src="view/js/vex.combined.js"></script-->
    </head>
    <body>
        <?php
            include "view/itz_Navbar_Admin.php";
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
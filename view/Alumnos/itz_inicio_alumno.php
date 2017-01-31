<?php
	session_start();
	if($_SESSION['TIPO_USUARIO'] == "ALUMNO"){
		
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/controllers/Alumnos/cls_Ctrl_Alumno.php";
?>

<section id="sub_contenido">
	<div id="btn_actividades_disponibles">
		<a href="#" title="Actividades Disponibles"><img src="view/img/icons/ver.png"/></a>
	</div>
	<div id="btn_ver_avisos">
		<a href="#" title="Avisos"><img src="view/img/icons/mail4.png"/></a>
	</div>
	<div id="titulo_alumno">
		<h2><?php echo utf8_encode($_SESSION['strNombre']." ".$_SESSION['strApPaterno']." ".$_SESSION['strApMaterno']); ?></h2>
		<h3><?php echo $_SESSION['strNoControl']; ?> </h3>
		<br>
	</div>
	<div id="actividades_liberadas">
		<h4>Actividades Liberadas</h4>
	</div>
	<div id="actividades_cursando">
		<h4>Estás inscri@ a:</h4>
		<?php
			$objControl = new cls_Ctrl_Alumno();
			$objResult = $objControl->mtdObtenerActividadesCursando($_SESSION['strNoControl']);
			
			if($objResult > 0){
				foreach($objResult as $r){
		?>
				<p><?php echo $r['strNombreActividad']; ?></p>
		<?php
				}
			}elseif($objResult < 1){
				echo "<p>No estás cursando actividades complementarias.</p>";
			}else{
				echo "<p>Ha ocurrido un error. Por favor comunícalo con el admministrador.</p>";
			}
		?>
	</div>
	<div id="estadisticas">
		<h4>Estadísticas:	</h4>
	</div>
</section>
<?php
	}else{
		echo '<script>window.location="index"</script>';
	}
?>
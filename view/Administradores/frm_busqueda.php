<?php
    require_once('../conn/connect.php');
    sleep(1);
    $search ='';
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }
    
    $consulta = "SELECT * FROM productos, muestras WHERE productos.codigo_barras LIKE  '%".$search."%' AND muestras.codigo_barras_fk = productos.codigo_barras";
    $resultado = $connect->query($consulta);
    $fila = mysqli_fetch_assoc($resultado);
    $total = mysqli_num_rows($resultado);
?>

<table id="tabla_res">
<tr id="row_1">
<th>Código de Barras</th>
<th>Descripción</th>
<th>Muestra</th>
</tr>

<?php if ($total>0 && $search!='') { ?>

<h2>Resultados de la Busqueda</h2>

<?php do {?>

<tr>
<td id="row_2"><?php echo $fila['codigo_barras'] ?> </td>
<td id="row_2"><?php echo $fila['nombre_producto'] ?></td> 
<td id="row_2"><img src=<?php echo '"'.$fila['ruta'].'"' ?> width="100%" height="50px"/></td>
</tr>

<?php } while ($fila=mysqli_fetch_assoc($resultado));?>

<?php }
    elseif ($total>0 && $search=='')  
    echo '<h2>Ingresa un parametro de Busqueda</h2><p>Ingresa palabras clave relacionadas</p>';
    else echo '<h2>No se han encontrado resultados</h2><p>Ingresa palabras clave relacionadas</p>';
?>
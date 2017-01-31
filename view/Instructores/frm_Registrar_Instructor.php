<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form action= "sp_Validaciones.php" method= "POST" name="registro">
            <input type="hidden" name="operacion" value="registrar"/>
            <label>Ingresa tu nombre: </label><br>
            <input type= "text" name= "Nombre" required="true"/><br>
            <br> 
            <label>Ingresa tu ap paterno: </label><br>
            <input type= "text" name= "Ap_Paterno" required="true"/><br>
            <label>Ingresa tu ap materno: </label><br>
            <input type="text" name="Ap_Materno" required="true"><br>
            <label>Ingresa tu fecha de nac: </label><br>
            <input type= "date" name= "Fecha_Nacimiento" /><br>
            <label>Dirección:</label><br>
            <input type="text" name="Direccion" required="true"><br>
            <label>Teléfono:</label><br>
            <input type="text" name="Telefono" required="true"><br>
            <input type= "submit" value= "Enviar"/>
        </form>
        <form action= "sp_Validaciones.php" method= "POST" name="consultaruno">
            <input type="hidden" name="operacion" value="consultar1"/>
            <label>Consultar un Instructor: </label>
            <?php
            $root = realpath($_SERVER["DOCUMENT_ROOT"]);
            require_once "$root/SGAC_v1.0/trunk/controllers/Instructores/cls_Ctrl_Instructores.php";
            $objControl = new cls_Ctrl_Instructores();
            
            $result=$objControl->mtdObtenerTodosLosInstructores();
            ?>
            <select name="lista">
                <?php
                    foreach($result as $item){
                        
                ?>
                <option value="<?php echo "$item[0]"; ?>"><?php echo "$item[1] $item[2] $item[3]"; ?></option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" name="enviar" value="Consultar">
        </form>
    </body>
</html>
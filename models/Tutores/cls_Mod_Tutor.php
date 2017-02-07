<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    //require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
    require_once "187.217.117.12/MySQL.php"
    require_once "$root/SGAC_v1.0/trunk/models/General/cls_Mod_General.php";
    
    class cls_Mod_Tutor extends cls_Mod_General{
        
        # CONSTRUCTOR
        public function __construct(){
            define("TABLA_TUTORES", "tutores");
            $this->objMySQL = new MySQL();
        }
        
        # METODOS
        
        /*
         * Author: JMCL
         * Date: 22/10/2016
         * Description: Método para crear un registro en la tabla Tutores.
         * Parameters: $strNombre, $strApPaterno, $strApMaterno, $strNoTelefono, $strDireccion, $strIdAlumno
         * Return: $objResult
         */
        public function mtdRegistrarTutor($strNombre, $strApPaterno, $strApMaterno, $strNoTelefono, $strDireccion, $strIdAlumno){
            $strSQL = "INSERT INTO ".TABLA_TUTORES." (strNombre, strApPaterno, strApMaterno, strNoTelefono, strDireccion, strIdAlumno) VALUES ('{$intId}', '{$strNombre}', '{$strApPaterno}', '{$strApMaterno}', '{$strNoTelefono}', '{$strDireccion}', '{$strIdAlumno}');";
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 22/10/2016
         * Description: Método para modificar los datos de un registro de la tabla Tutores.
         * Parameters: $intId, $strNombre, $strApPaterno, $strApMaterno, $strNoTelefono, $strDireccion, $strIdAlumno
         * Return: $objResult
         */
        public function mtdModificarTutor($intId, $strNombre, $strApPaterno, $strApMaterno, $strNoTelefono, $strDireccion, $strIdAlumno){
            $strSQL = "UPDATE ".TABLA_TUTORES." SET strNombre = '{$strNombre}', strApPaterno = '{$strApPaterno}', strApMaterno = '{$strApMaterno}', strNoTelefono = '{$strNoTelefono}', strDireccion = '{$strDireccion}', strIdAlumno = '{$strIdAlumno}' WHERE intId = '{$intId}';";
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        }
    }
?>
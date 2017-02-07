<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    //require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
    require_once "187.217.117.12/MySQL.php"
    require_once "$root/SGAC_v1.0/trunk/models/General/cls_Mod_General.php";
    
    class cls_Mod_Campus extends cls_Mod_General{
        
        # CONSTRUCTOR
        public function __construct(){
            define("TABLA_CAMPUS", "campus");
            $this->objMySQL = new MySQL();
        }
        
        # METODOS
        
        /*
         * Author: JMCL
         * Date: 12/09/2016
         * Description: Método para hacer una inserción. El return devolverá un valor booleano en función al resultado de la consulta.
         * Parameters: $strNombreCampus, $strDireccion, $strNoTelefono
         * Return: $objResult
         */
        public function mtdRegistrarCampus($strNombreCampus, $strDireccion, $strNoTelefono){
            $strSQL = "INSERT INTO ".TABLA_CAMPUS." (strNombreCampus, strDireccion, strNoTelefono) VALUES ('{$strNombreCampus}', '{$strDireccion}', '{$strNoTelefono}');";
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 13/09/2016
         * Description: Método para actualizar la información de un registro específico. El return devolverá un valor booleano en función al resultado de la consulta.
         * Parameters: $intId, $strNombreCampus, $strDireccion, $strNoTelefono
         * Return: $objResult
         */
        public function mtdModificarCampus($intId, $strNombreCampus, $strDireccion, $strNoTelefono){
            $strSQL = "UPDATE ".TABLA_CAMPUS." SET strNombreCampus = '{$strNombreCampus}', strDireccion = '{$strDireccion}', strNoTelefono = '{$strNoTelefono}' WHERE intId = '{$intId}';";
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        } 
    }
?>
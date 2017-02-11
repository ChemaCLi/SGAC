<?php
    $root = realpath($_SERVER['DOCUMENT_ROOT']);
    require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
    require_once "$root/SGAC_v1.0/trunk/models/General/cls_Mod_General.php";
    
    class cls_Mod_Aviso extends cls_Mod_General{
        
        # CONSTRUCTOR
        public function __construct(){
            define ("TABLA_AVISOS", "avisos");
            $this->objMySQL = new MySQL();
        }
        
        # MÉTODOS
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para crear un nuevo registro en la tabla Avisos.
         * Parameters: $strTitulo, $strDescripcion, $dtmFechaEmision, $bolBanderaGeneral, $intIdActividad
         * Return: objResult
         */
        public function mtdRegistrarAviso($strTitulo, $strDescripcion, $dtmFechaEmision, $bolBanderaGeneral, $intIdActividad){
            $strSQL = "INSERT INTO ".TABLA_AVISOS." (strTitulo, strDescripcion, dtmFechaEmision, bolBanderaGeneral, _intIdActividad) VALUES ('{$strTitulo}', '{$strDescripcion}', '{$dtmFechaEmision}', '{$bolBanderaGeneral}', '{$intIdActividad}');";
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para modificar los datos de un registro de la tabla Avisos por medio de su ID.
         * Parameters: $intId, $strTitulo, $strDescripcion, $dtmFechaEmision, $bolBanderaGeneral, $intIdActividad
         * Return: $objResult
         */
        public function mtdModificarAviso($intId, $strTitulo, $strDescripcion, $dtmFechaEmision, $bolBanderaGeneral, $intIdActividad){
            $strSQL = "UPDATE ".TABLA_AVISOS." SET strTitulo = '{$strTitulo}', strDescripcion = '{$strDescripcion}', dtmFechaEmision = '{$dtmFechaEmision}', bolBanderaGeneral = '{$bolBanderaGeneral}', _intIdActividad = '{$intIdActividad}' WHERE intId = '{$intId}';";
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        }
    }
?>
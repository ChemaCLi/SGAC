<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    //require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
    require_once "187.217.117.12/MySQL.php"
    require_once "$root/SGAC_v1.0/trunk/models/General/cls_Mod_General.php";
    
    class cls_Mod_Lugar extends cls_Mod_General{
        
        # CONSTRUCTOR
        public function __construct(){
            define("TABLA_LUGARES", "lugares");
            $this->objMySQL = new MySQL();
        }
        
        # METODOS
        
        /*
         * Author: JMAG
         * Date: 19/09/2016
         * Description: Método para hacer una inserción en la tabla Lugares.
         * Parameters: $strNombreLugar, $strDireccion, $strUrlMapa
         * Return: $objResult
         */
        public function mtdRegistrarLugar($strNombreLugar, $strDireccion, $strUrlMapa){
            $strSQL = "INSERT INTO ".TABLA_LUGARES." (strNombreLugar, strDireccion, strUrlMapa) VALUES ('{$strNombreLugar}', '{$strDireccion}', '{$strUrlMapa}');";
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        }

        /*
        * Author: JMAG
        * Date: 19/09/2016
        * Description: Método para modificar lugares.
        * Parameters: $intId, $strNombreLugar, $strDireccion, $strUrlMapa
        * Return: $objResult
        */
        public function mtdModificarLugar($intId, $strNombreLugar, $strDireccion, $strUrlMapa){
            $strSQL = "UPDATE ".TABLA_LUGARES." SET strNombreLugar = '{$strNombreLugar}' , strDireccion = '{$strDireccion}', strUrlMapa = '{$strUrlMapa}' WHERE intId = '{$intId}';";
            echo $strSQL;
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        }
    } 
?>
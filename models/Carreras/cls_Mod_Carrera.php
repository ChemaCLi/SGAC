<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    //require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
    require_once "187.217.117.12/MySQL.php"
    require_once "$root/SGAC_v1.0/trunk/models/General/cls_Mod_General.php";
    
    class cls_Mod_Carrera extends cls_Mod_General{
        
        #CONSTRUCTOR
        public function __construct(){
          define("TABLA_CARRERAS","carreras");
          $this->objMySQL = new MySQL();
        }
        #METODOS
        
       /*
        * Author: SAC
        * Date: 12/09/2016
        * Description: Método para Insertar las carreras en la base de datos.
        * Parameters: $strNombreCarrera
        * Return: $objResult
        */
        public function mtdRegistrarCarrera($strNombreCarrera){
        $strSQL = "INSERT INTO ".TABLA_CARRERAS." (strNombreCarrera) VALUES ('{$strNombreCarrera}');";
        $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
        return $this->objResult;
        $this->objResult = null;
        
        }
        
       /*
        * Author: SAC
        * Date: 19/09/2016
        * Description: Método para actualizar los registros de las carreras en la base de datos.
        * Parameters: $intId, $strNombreCarrera
        * Return: $objResult
        */
         public function mtdModificarCarrera($intId, $strNombreCarrera){
                $strSQL = "UPDATE ".TABLA_CARRERAS." SET strNombreCarrera = '{$strNombreCarrera}' WHERE intId = '{$intId}';";
                $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
                return $this->objResult;
                $this->objResult = null;
         }
    } 
?>
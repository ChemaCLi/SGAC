<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
    
    class cls_Mod_General {
        #VARIABLES GLOBALES
        protected $objMySQL;
        protected $objResult; 
        
        #CONSTRUCTOR
        public  function __construct(){
            $this->objMySQL = new MySQL();        
        }
        
        #MÉTODOS
        
        /*
         * Author: JMCL
         * Date: 17/10/2016
         * Description: Método que obtiene todos los registros de una tabla específica. Recibe como parámetro el nombre de la tabla. El return puede contener un array asociativo o venir nulo. En caso de que la operación no pueda ser efectuada contendrá false.
         * Parameters: $strNombreTabla
         * Return: $objResult 
         */
        public function mtdObtenerTodosRegistros($strNombreTabla){
            $this->objResult = $this->objMySQL->mtdObtenerTodosRegistros($strNombreTabla);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 17/10/2016
         * Description: Método para obtener un registro específico por medio de su id. Recibe como parámetros el nombre de la tabla, el nombre de la columna con llave primaria y el valor del ID del registro. El return puede devolver un array asociativo o venir nulo. En caso de que la operación no pueda ser efectuada contendrá false.
         * Parameters: $strNombreTabla, $strColumnaId, $Id
         * Return: $objResult
         */
        public function mtdObtenerRegistroPorId($strNombreTabla, $strColumnaId, $Id){
            $this->objResult = $this->objMySQL->mtdObtenerRegistroPorId($strNombreTabla, $strColumnaId, $Id);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 17/10/2016
         * Description: Método para eliminar todos los registros de una tabla. El return devolverá un valor booleano en función al resultado de la consulta.
         * Parameters: $strNombreTabla
         * Return: $objResult
         */
        public function mtdEliminarTodosRegistros($strNombreTabla){
            $this->objResult = $this->objMySQL->mtdEliminarTodosRegistros($strNombreTabla);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCl
         * Date: 17/10/2016
         * Description: Método para eliminar un registro específico por medio del id. El return devolverá un valor booleano en función al resultado de la consulta.
         * Parameters: $strNombreTabla, $strColumnaId, $intId
         * Return: $objResult
         */
        public function mtdEliminarRegistroPorId($strNombreTabla, $strColumnaId, $ID){
            $this->objResult = $this->objMySQL->mtdEliminarRegistroPorId($strNombreTabla, $strColumnaId, $ID);
            return $this->objResult;
            $this->objResult = null;
        }
    }
?>
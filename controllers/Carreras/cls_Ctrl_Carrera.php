<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/models/Carreras/cls_Mod_Carrera.php";
    
    class cls_Ctrl_Carrera{
        # VARIABLES GLOBALES
        private $intId;
        private $strNombreCarrera;
        private $objModel;
        private $objResult;
                
        # CONSTRUCTOR
        public function __construct(){
            $this->objModel = new cls_Mod_Carrera();
        }
        
        # METODOS
        
        /*
         * Author: SAC
         * Date: 19/09/2016
         * Description: Método para obtener todos los registros desde la base de datos. El return devuelve un array bidimensional si la operación fue exitosa, de lo contrario viene vacío.
         * Parameters: none
         * Return $objResult
         */
        public function mtdObtenerTodasCarreras(){
            $this->objResult = $this->objModel->mtdObtenerTodosRegistros(TABLA_CARRERAS);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * DEBBUG
         * Author: SAC
         * Date: 19/09/2016
         * Description: Método para obtener los datos de un campus específico por medio de su id.
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdObtenerCarreraPorId($intId){
            $this->setIntId($intId);
            $this->objResult = $this->objModel->mtdObtenerRegistroPorId(TABLA_CARRERAS, "intId", $this->getIntId());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: SAC
         * Date: 15/09/2016
         * Description: Método para insertar un registro en la tabla carrera. No recibe parámetros pero toma los valores mandados del método POST desde las vistas.
         * Parameters: none
         * Return: $objResult
         */
        public function mtdRegistrarCarrera(){
            $this->setStrNombreCarrera($_POST['nombre_carrera']);
            $this->objResult = $this->objModel->mtdRegistrarCarrera($this->getStrNombreCarrera());
            return $this->objResult;
            $this->objResult = null;
           
            
        }
        
        /*
         * Author: SAC
         * Date: 15/09/2016
         * Description: Método para insertar un registro en la tabla carrera. No recibe parámetros pero toma los valores mandados del método POST desde las vistas.
         * Parameters: $_POST
         * Return: $objResult
         */
        public function mtdModificarCarrera(){
            $this->setIntId($_POST['id']);
            $this->setStrNombreCarrera($_POST['nombre_carrera']);
            $this->objResult = $this->objModel->mtdModificarCarrera($this->getIntId(), $this->getStrNombreCarrera());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 20/10/2016
         * Description: Este método elimina todos los registros de la tabla Carreras. No se recomienda eliminar estos registros debido a que otras entidades dependen de esos datos.
         * Parameters: none
         * Return: $objResult
         */
        public function mtdEliminarTodasCarreras(){
            $this->objResult = $this->objModel->mtdEliminarTodosRegistros(TABLA_CARRERAS);
            return $this->objResult;
            $this->objResult;
        }
        
        
        /*
         * Author: JMCL
         * Date: 20/10/2016
         * Description: Método que elimina un registro de la tabla Carreras por medio de su ID. No se recomienda eliminar estos registros debido a que otras entidades dependen de esos datos.
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdEliminarCarreraPorId($intId){
            $this->setIntId($intId);
            $this->objResult = $this->objModel->mtdEliminarRegistroPorId(TABLA_CARRERAS, "intId", $this->getIntId());
            return $this->objResult;
            $this->objResult = null;
        }
        
        # GETTERS&SETTER
        public function getIntId(){ return $this->intId; }
        public function setIntId($intId){ $this->intId = $intId; }
        public function getStrNombreCarrera(){ return $this->strNombreCarrera; }
        public function setStrNombreCarrera($strNombreCarrera){ $this->strNombreCarrera = $strNombreCarrera; }
        
    }
?>
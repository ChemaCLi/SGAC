<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/models/Campus/cls_Mod_Campus.php";
    
    class cls_Ctrl_Campus{
        
        # VARIABLES GLOBALES
        private $intId;
        private $strNombreCampus;
        private $strDireccion;
        private $strNoTelefono;
        private $objModel;
        private $objResult;
                
        # CONSTRUCTOR
        public function __construct(){
            $this->objModel = new cls_Mod_Campus();
        }
        
        # METODOS
        
        /*
         * Author: JMCL
         * Date: 14/09/2016
         * Description: Método para obtener todos los registros desde la base de datos. El return devuelve un array bidimensional si la operación fue exitosa, de lo contrario viene vacío.
         * Parameters: none
         * Return $objResult
         */
        public function mtdObtenerTodosCampus(){
            $this->objResult = $this->objModel->mtdObtenerTodosRegistros(TABLA_CAMPUS);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * DEBBUG
         * Author: JMCL
         * Date: 15/09/2016
         * Description: Método para obtener los datos de un campus específico por medio de su id.
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdObtenerCampusPorId($intId){
            $this->setIntId($intId);
            $this->objResult = $this->objModel->mtdObtenerRegistroPorId(TABLA_CAMPUS, "intId", $this->getIntId());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 15/09/2016
         * Description: Método para insertar un registro en la tabla campus. No recibe parámetros pero toma los valores mandados del método POST desde las vistas.
         * Parameters: $_POST
         * Return: $objResult
         */
        public function mtdRegistrarCampus(){
            $this->setStrNombreCampus($_POST['nombre_campus']);
            $this->setStrDireccion($_POST['direccion']);
            $this->setStrNoTelefono($_POST['telefono']);
            $this->objResult = $this->objModel->mtdRegistrarCampus($this->getStrNombreCampus(), $this->getStrDireccion(), $this->getStrNoTelefono());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 19/10/2016
         * Description: Método para modificar los datos de un registro de la tabla Campus.
         * Parameters: $_POST
         * Return: $objResult
         */
        public function mtdModificarCampus(){
            $this->setIntId($_POST['id']);
            $this->setStrNombreCampus($_POST['nombre_campus']);
            $this->setStrDireccion($_POST['direccion']);
            $this->setStrNoTelefono($_POST['telefono']);
            $this->objResult = $this->objModel->mtdModificarCampus($this->getIntId(), $this->getStrNombreCampus(), $this->getStrDireccion(), $this->getStrNoTelefono());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 18/10/2016
         * Description: Método para eliminar todos los registros de la tabla Campus
         * Parameters: none
         * Return: $objResult
         */
        public function mtdEliminarTodosCampus(){
            $this->objResult = $this->objModel->mtdEliminarTodosRegistros(TABLA_CAMPUS);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 19/10/2016
         * Desccription: Método para eliminar un sólo registro de la tabla Campus por medio del ID
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdEliminarCampusPorId($intId){
            $this->objResult = $this->objModel->mtdEliminarRegistroPorId(TABLA_CAMPUS, "intId", $intId);
            return $this->objResult;
            $this->objResult = null;
        }
        
        # GETTERS&SETTER
        public function getIntId(){ return $this->intId; }
        public function setIntId($intId){ $this->intId = $intId; }
        public function getStrNombreCampus(){ return $this->strNombreCampus; }
        public function setStrNombreCampus($strNombreCampus){ $this->strNombreCampus = $strNombreCampus; }
        public function getStrDireccion(){ return $this->strDireccion; }
        public function setStrDireccion($strDireccion){ $this->strDireccion = $strDireccion; }
        public function getStrNoTelefono(){ return $this->strNoTelefono; }
        public function setStrNoTelefono($strNoTelefono){ $this->strNoTelefono = $strNoTelefono; }
    }
?>
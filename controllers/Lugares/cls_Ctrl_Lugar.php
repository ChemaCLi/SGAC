<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/models/Lugares/cls_Mod_Lugar.php";
    
    class cls_Ctrl_Lugar{
        
        # VARIABLES GLOBALES
        private $intId;
        private $strNombreLugar;
        private $strDireccion;
        private $strUrlMapa;
        private $objResult;
        private $objModel;
        
        # CONSTRUCTOR
        public function __construct(){
            $this->objModel = new cls_Mod_Lugar();
        }
        
        # MÉTODOS
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método que obtiene todos los registros de la tabla Lugares;
         * Parameters: none
         * Return: $objResult
         */
        public function mtdObtenerTodosLugares(){
            $this->objResult = $this->objModel->mtdObtenerTodosRegistros(TABLA_LUGARES);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método que obtiene un registro de la tabla Lugares por medio del Id
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdObtenerLugarPorId($intId){
            $this->setIntId($intId);
            $this->objResult = $this->objModel->mtdObtenerRegistroPorId(TABLA_LUGARES, "intId", $this->getIntId());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para insertar un nuevo registro en la tabla Lugares.
         * Parameters: $_POST
         * Return: $objResult
         */
        public function mtdRegistrarLugar(){
            $this->setStrNombreLugar($_POST['nombre']);
            $this->setStrDireccion($_POST['direccion']);
            $this->setStrUrlMapa($_POST['url']);
            $this->objResult = $this->objModel->mtdRegistrarLugar($this->getStrNombreLugar(), $this->getStrDireccion(), $this->getStrUrlMapa());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Métodp para modificar los datos de un registro de la tabla Lugares.
         * Parameters: $_POST
         * Return: $objResult
         */
        public function mtdModificarLugar(){
            $this->setIntId($_POST['id']);
            $this->setStrNombreLugar($_POST['nombre']);
            $this->setStrDireccion($_POST['direccion']);
            $this->setStrUrlMapa($_POST['url']);
            $this->objResult = $this->objModel->mtdModificarLugar($this->setIntId(), $this->getStrNombreLugar(), $this->getStrDireccion(), $this->getStrUrlMapa());
            return $this->objResult;
            $this->objResult = null;
        }
        
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Métoto para eliminar todos los registros de la tabla Lugares.
         * Parameters: none
         * Return: $objResult
         */
        public function mtdEliminarTodosLugares(){
            $this->objResult = $this->objModel->mtdEliminarTodosRegistros(TABLA_LUGARES);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para eliminar un registro de la tabla Lugares por medio del Id.
         * Parameters: $intId
         * Return: $objReturn
         */
        public function mtdEliminarLugarPorId($intId){
            $this->setIntId($_POST['id']);
            $this->objResult = $this->objModel->mtdEliminarRegistroPorId(TABLA_LUGARES, "intId", $this->getIntId());
            return $this->objResult;
            $this->objResult = null;
        }
        
        # GETTERS&SETTERS
        
        function getIntId(){ return $this->intId; }
        function setIntId($intId){ $this->intId=$intId; }
        function getStrNombreLugar(){ return $this->strNombreLugar; }
        function setStrNombreLugar($strNombreLugar){ $this->strNombreLugar=$strNombreLugar; }
        function getStrDireccion(){ return $this->strDireccion; }
        function setStrDireccion($strDireccion){ $this->strDireccion=$strDireccion; }
        function getStrUrlMapa(){ return $this->strUrlMapa; }
        function setStrUrlMapa($strUrlMapa){ $this->strUrlMapa=$strUrlMapa; }
    }
?>
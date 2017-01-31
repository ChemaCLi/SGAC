<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/models/Avisos/cls_Mod_Aviso.php";
    
    class cls_Ctrl_Aviso{
        # VARIABLES GLOBALES
        private $intId;
        private $strTitulo;
        private $strDescripcion;
        private $dtmFechaEmision;
        private $bolBanderaGeneral;
        private $intIdActividad;
        private $objModel;
        private $objResult;
        
        # CONSTRUCTOR
        public function __construct(){
            $this->objModel = new cls_Mod_Aviso();
        }
        
        # METODOS
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para obtener todos los registros de la tabla Avisos.
         * Parameters: none
         * Return: $objResult
         */
        public function mtdObtenerTodosAvisos(){
            $this->objResult = $this->objModel->mtdObtenerTodosRegistros(TABLA_AVISOS);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para obtener un registro de la tabla Avisos por medio de su ID.
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdObtenerAvisoPorId($intId){
            $this->setIntId($intId);
            $this->objResult = $this->objModel->mtdObtenerRegistroPorId(TABLA_AVISOS, "intId", $this->getIntId());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para crear un registro en la tabla Avisos.
         * Parameters: $_POST
         * Return: $objResult
         */
        public function mtdRegistrarAviso(){
            $this->setStrTitulo($_POST['titulo']);
            $this->setStrDescripcion($_POST['descripcion']);
            $this->setDtmFechaEmision($_POST['fecha']);
            $this->setBolBanderaGeneral($_POST['es_general']);
            $this->setIntIdActividad($_POST['actividad']);
            $this->objResult = $this->objModel->mtdRegistrarAviso($this->getStrTitulo(), $this->getStrDescripcion(), $this->getDtmFechaEmision(), $this->getBolBanderaGeneral(), $this->getIntIdActividad());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para modificar los datos de un registro en la tabla Avisos.
         * Parameters: $_POST
         * Return: $objResult
         */
        public function mtdModificarAviso(){
            $this->setIntId($_POST['id']);
            $this->setStrTitulo($_POST['titulo']);
            $this->setStrDescripcion($_POST['descripcion']);
            $this->setDtmFechaEmision($_POST['fecha']);
            $this->setBolBanderaGeneral($_POST['es_general']);
            $this->setIntIdActividad($_POST['actividad']);
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para eliminar todos los registros de la tabla Avisos.
         * Parameters: none
         * Return: $objResult
         */
        public function mtdEliminarTodosAvisos(){
            $this->objResult = $this->objModel->mtdEliminarTodosRegistros(TABLA_AVISOS);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 21/10/2016
         * Description: Método para eliminar un registro de la tabla avisos por medio de su Id.
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdEliminarAvisoPorId($intId){
            $this->setIntId($intId);
            $this->objResult = $this->objModel->mtdEliminarRegistroPorId($this->getIntId());
            return $this->objResult;
            $this->objResult = null;
        }
        
        # GETTERS&SETTERS
        
        function getIntId(){ return $this->intId; }
        function setIntId($intId){ $this->intId=$intId; }
        function getStrTitulo(){ return $this->strTitulo; }
        function setStrTitulo($strTitulo){ $this->strTitulo=$strTitulo; }
        function getStrDescripcion(){ return $this->strDescripcion; }
        function setStrDescripcion($strDescripcion){ $this->strDescripcion=$strDescripcion; }
        function getDtmFechaEmision(){ return $this->dtmFechaEmision; }
        function setDtmFechaEmision($dtmFechaEmision){ $this->dtmFechaEmision=$dtmFechaEmision; }
        function getBolBanderaGeneral(){ return $this->bolBanderaGeneral; }
        function setBolBanderaGeneral($bolBanderaGeneral){ $this->bolBanderaGeneral=$bolBanderaGeneral; }
        function getIntIdActividad(){ return $this->intIdActividad; }
        function setIntIdActividad($intIdActividad){ $this->intIdActividad=$intIdActividad; }
    }
?>
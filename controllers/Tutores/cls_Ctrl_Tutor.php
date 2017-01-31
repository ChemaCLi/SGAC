<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/models/Tutores/cls_Mod_Tutor.php";
    
    class cls_Ctrl_Tutor{
        
        # VARIABLES GLOBALES
        
        private $intId;
        private $strNombre;
        private $strApPaterno;
        private $strApMaterno;
        private $strNoTelefono;
        private $strDireccion;
        private $strIdAlumno;
        private $objResult;
        private $objModel;
        
        # CONSTRUCTOR
        public function __construct(){
            $this->objModel = new cls_Mod_Tutor();
        }
        
        # METODOS
        
        /*
         * Author: JMCL
         * Date: 22/10/2016
         * Description: Método para obtener todos los registros de la tabla Tutores.
         * Parameters: none
         * Return: $objResult
         */
        public function mtdObtenerTodosTutores(){
            $this->objResult = $this->objModel->mtdObtenerTodosRegistros(TABLA_TUTORES);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 22/10/2016
         * Description: Método para obtener un registro de la tabla Tutores por medio del Id.
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdObtenerTutorPorId($intId){
            $this->setIntId($_POST['id']);
            $this->objResult = $this->objModel->mtdObtenerRegistroPorId(TABLA_TUTORES, "intId", $this->getIntId());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 22/10/2016
         * Description: Método para crear un registro en la tabla Tutores.
         * Parameters: $_POST
         * Return: $objResult
         */
        public function mtdRegistrarTutor(){
            $this->setStrNombre($_POST['nombre']);
            $this->setStrApPaterno($_POST['ap_paterno']);
            $this->setStrApMaterno($_POST['ap_materno']);
            $this->setStrNoTelefono($_POST['telefono']);
            $this->setStrDireccion($_POST['direccion']);
            $this->setStrIdAlumno($_POST['id_alumno']);
            $this->objResult = $this->objModel->mtdRegistrarTutor($this->getStrNombre(), $this->getStrApPaterno(), $this->getStrApMaterno(), $this->getStrNoTelefono(), $this->getStrDireccion(), $this->getStrIdAlumno());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 22/10/2016
         * Description: Método para modificar los datos de un registro en la tabla Tutores.
         * Parameters: $_POST
         * Return: $objResult
         */
        public function mtdModificarTutor(){
            $this->setIntId($_POST['id']);
            $this->setStrNombre($_POST['nombre']);
            $this->setStrApPaterno($_POST['ap_paterno']);
            $this->setStrApMaterno($_POST['ap_materno']);
            $this->setStrNoTelefono($_POST['telefono']);
            $this->setStrDireccion($_POST['direccion']);
            $this->setStrIdAlumno($_POST['id_alumno']);
            $this->objResult = $this->objModel->mtdModificarTutor($this->getIntId(), $this->getStrNombre(), $this->getStrApPaterno(), $this->getStrApMaterno(), $this->getStrNoTelefono(), $this->getStrDireccion(), $this->getStrIdAlumno());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 22/10/2016
         * Description: Método para eliminar todos los registros de la tabla Tutores.
         * Parameters: none
         * Return: $objResult
         */
        public function mtdEliminarTodosTutores(){
            $this->objResult = $this->objModel->mtdEliminarTodosRegistros(TABLA_TUTORES);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: JMCL
         * Date: 22/10/2016
         * Description: Método para eliminar un registro de la tabla Tutores por medio de su ID.
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdEliminarTutorPorId($intId){
            $this->setIntId($intId);
            $this->objResult = $this->objModel->mtdEliminarRegistroPorId($this->getIntId);
            return $this->objResult;
            $this->objResult = null;
        }
        
        
        # GETERS&SETTERS
        
        function getIntId(){ return $this->intId; }
        function setIntId($intId){ $this->intId=$intId; }
        function getStrNombre(){ return $this->strNombre; }
        function setStrNombre($strNombre){ $this->strNombre=$strNombre; }
        function getStrApPaterno(){ return $this->strApPaterno; }
        function setStrApPaterno($strApPaterno){ $this->strApPaterno=$strApPaterno; }
        function getStrApMaterno(){ return $this->strApMaterno; }
        function setStrApMaterno($strApMaterno){ $this->strApMaterno=$strApMaterno; }
        function getStrNoTelefono(){ return $this->strNoTelefono; }
        function setStrNoTelefono($strNoTelefono){ $this->strNoTelefono=$strNoTelefono; }
        function getStrDireccion(){ return $this->strDireccion; }
        function setStrDireccion($strDireccion){ $this->strDireccion=$strDireccion; }
        function getStrIdAlumno(){ return $this->strIdAlumno; }
        function setStrIdAlumno($strIdAlumno){ $this->strIdAlumno=$strIdAlumno; }
    }
?>
<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);  
    require_once "$root/SGAC_v1.0/trunk/models/Instructores/cls_Mod_Instructor.php";
    
    class cls_Ctrl_Instructor{
        
        # VARIABLES GLOBALES
        private $strCURP;
        private $strNombre;
        private $strApPaterno;
        private $strApMaterno;
        private $dtmFechaNacimiento;
        private $strDireccion;
        private $strTelefono;
        private $intNIP;
        private $intBanderaNIPCambiado; //Puede ser que no se deba usar esto aqui, sino en la bd con un trigger
        private $objModel;
        private $objResult;
        
        # CONSTRUCTOR
        public function __construct (){
            $this->objModel = new cls_Mod_Instructor(); //objeto clsmondins cualquier metodo se tiene q obtener de la clase cldmodins... 
        }
        
        # METODOS
        
        /*
         * Author: RCS
         * Date: 04/10/2016
         * Description: Método para obtener todos los registros desde la base de datos. El return devuelve un array bidimensional si la operación fue exitosa, de lo contrario viene vacío.
         * Parameters: none
         * Return $objResult
         */
        public function mtdObtenerTodosInstructores(){
            $this->objResult = $this->objModel->mtdObtenerTodosRegistros(TABLA_INSTRUCTORES);
            return $this->objResult;
            $this->objResult = null;  
        }
        
        /*
         * Author: RCS
         * Date: 04/10/2016
         * Description: Método para obtener los datos de un instructor específico por medio de su id.
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdObtenerInstrutorPorId($strCURP){
            $this->setStrCURP($strCURP);
            $this->objResult = $this->objModel->mtdObtenerRegistroPorId(TABLA_INSTRUCTORES, "strCURP", $this->getStrCURP());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: RCS
         * Date: 04/10/2016
         * Description: Método para registrar un instructor. No recibe parámetros pero toma los valores mandados del método POST desde las vistas.
         * Parameters: none
         * Return: $objModel
         */
        public function mtdRegistrarInstructor(){
            $this->setStrCURP($_POST['curp']);
            $this->setStrNombre($_POST['Nombre']);
            $this->setStrApPaterno($_POST['Ap_Paterno']);
            $this->setStrApMaterno($_POST['Ap_Materno']);
            $this->setDtmFechaNacimiento($_POST['Fecha_Nacimiento']);
            $this->setStrDireccion($_POST['Direccion']);
            $this->setStrTelefono($_POST['Telefono']);
            $this->setIntNIP($_POST['nip']);
            $this->setIntBanderaNIPCambiado($_POST['bandera_nip']);
            $this->objResult = $this->objModel->mtdRegistrarInstructor($this->getStrCURP(), $this->getIntNIP(), $this->getStrNombre(), $this->getStrApPaterno(), $this->getStrApMaterno(), $this->getDtmFechaNacimiento(), $this->getStrDireccion(), $this->getStrTelefono(), $this->StrEmail(), $this->getIntBanderaActivo());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: RCS
         * Date: 01/10/2016
         * Description: Método para actualizar los datos de un instructor. No recibe parámetros pero toma los valores mandados del método POST desde las vistas.
         * Parameters: none
         * Return: $objModel
         */
        public function mtdModificarInstructorPorId(){
            $this->setStrCURP($_POST['curp']);
            $this->setStrNombre($_POST['Nombre']);
            $this->setStrApPaterno($_POST['Ap_Paterno']);
            $this->setStrApMaterno($_POST['Ap_Materno']);
            $this->setDtmFechaNacimiento($_POST['Fecha_Nacimiento']);
            $this->setStrDireccion($_POST['Direccion']);
            $this->setStrTelefono($_POST['Telefono']);
            $this->setIntNIP($_POST['nip']);
            $this->setIntBanderaNIPCambiado($_POST['bandera_nip']);//Esto puede estar por demás
            $this ->objResult = $this->objModel->mtdModificarInstructor($this->getStrCURP(), $this->getIntNIP(), $this->getStrNombre(), $this->getStrApPaterno(), $this->getStrApMaterno(), $this->getDtmFechaNacimiento(), $this->getStrDireccion(), $this->getStrTelefono(), $this->StrEmail(), $this->getIntBanderaActivo());
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: RCS
         * Date: 04/10/2016
         * Description: Método para eliminar todos los datos de los instructores.
         * Parameters: none
         * Return: $objResult
         */
        public function mtdEliminarTodosInstructores(){
            $this->objResult = $this->objModel->mtdEliminarTodosRegistros(TABLA_INSTRUCTORES);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: RCS
         * Date: 04/10/2016
         * Description: Método para eliminar los datos de un instructor específico por medio de su id.
         * Parameters: $intId
         * Return: $objResult
         */
        public function mtdEliminarInstructorPorId($intId){
            $this->setIntId($intId);
            $this->objResult = $this->objModel->mtdEliminarInstructorPorId(TABLA_INSTRUCTORES, "strCURP", $this->getStrCURP());
            return $this->objResult;
            $this->objResult = null;
        }
        
       # GETTERS&SETTER
       
        function getStrCURP(){ return $this->strCURP; }
        function setStrCURP($strCURP){ $this->strCURP=$strCURP; }
        function getStrNombre(){ return $this->strNombre; }
        function setStrNombre($strNombre){ $this->strNombre=$strNombre; }
        function getStrApPaterno(){ return $this->strApPaterno; }
        function setStrApPaterno($strApPaterno){ $this->strApPaterno=$strApPaterno; }
        function getStrApMaterno(){ return $this->strApMaterno; }
        function setStrApMaterno($strApMaterno){ $this->strApMaterno=$strApMaterno; }
        function getDtmFechaNacimiento(){ return $this->dtmFechaNacimiento; }
        function setDtmFechaNacimiento($dtmFechaNacimiento){ $this->dtmFechaNacimiento=$dtmFechaNacimiento; }
        function getStrDireccion(){ return $this->strDireccion; }
        function setStrDireccion($strDireccion){ $this->strDireccion=$strDireccion; }
        function getStrTelefono(){ return $this->strTelefono; }
        function setStrTelefono($strTelefono){ $this->strTelefono=$strTelefono; }
        function getIntNIP(){ return $this->intNIP; }
        function setIntNIP($intNIP){ $this->intNIP=$intNIP; }
        function getIntBanderaNIPCambiado(){ return $this->intBanderaNIPCambiado; }
        function setIntBanderaNIPCambiado($intBanderaNIPCambiado){ $this->intBanderaNIPCambiado=$intBanderaNIPCambiado; }
    }
?>
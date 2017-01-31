<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$root/SGAC_v1.0/trunk/models/Administradores/cls_Mod_Administrador.php";
    
    class cls_Ctrl_Administrador{
        # VARIABLES GLOBALES
        private $strCURP;
        private $strNombre;
        private $strApPaterno;
        private $strApMaterno;
        private $dtmFechaNacimiento;
        private $strDireccion;
        private $strTelefono;
        private $intNIP;
        private $intBanderaNIPCambiado; //Esto no debería estar porque el NIP cambiado se debe activar (1) cuando se modifique la BD, para lo cual es conveniente implementar un trigger
        private $objModel;
        private $objResult;
        
        # CONSTRUCTOR
        public function __construct(){
            $this->objModel = new cls_Mod_Administrador();
        }
    
        # METODOS
        
        /*
         * Author: DSF
         * Date: 19/09/2016
         * Description: Método para obtener todos los registros desde la base de datos. El return devuelve un array bidimensional si la operación fue exitosa, de lo contrario viene vacío.
         * Parameters: none
         * Return $objResult
         */
        //public function mtdObtenerTodosAdministradores(){
        //    $this->objResult = $this->objModel->mtdObtenerTodosRegistros(TABLA_ADMINISTRADORES);
        //    return $this->objResult;
        //    $this->objResult = null;
        //}
        
         /*
         * Author: DSF
         * Date: 15/09/2016
         * Description: Método para obtener los datos de un campus específico por medio de su id.
         * Parameters: $strCURP
         * Return: $objResult
         */
        // public function mtdObtenerAdministradorPorId($strCURP){
        //    $this->setStrCURP($strCURP);
        //    $this->objResult = $this->objModel->mtdObtenerRegistroPorId(TABLA_ADMINISTRADORES, "strCURP", $this->getStrCURP());
        //    return $this->objResult;
        //    $this->objResult = null;
        //}
        
         /*
         * Author: DSF
         * Date: 19/09/2016
         * Description: Método para insertar un registro en la tabla Administradores. No recibe parámetros pero toma los valores mandados del método POST desde las vistas.
         * Parameters: $_POST
         * Return: $objResult
         */
         //public function mtdRegistrarAdministrador(){
         //   $this->setStrCURP($_POST('curp'));
         //   $this->setStrNombre($_POST['nombre']);
         //   $this->setStrApPaterno($_POST['ap_paterno']);
         //   $this->setStrApMaterno($_POST['ap_materno']);
         //   $this->setDtmFechaNacimiento($_POST['fecha_nacimiento']);
         //   $this->setStrDireccion($_POST['direccion']);
         //   $this->setStrTelefono($_POST['telefono']);
         //   $this->setIntNIP($_POST['nip']);
         //   $this->setIntBanderaNIPCambiado($_POST['nip_cambiado']);//Esto no debería estar aquí porque se debe manejar con triggers pero lo dejo por si algo
         //   $this->objResult = $this->objModel->mtdRegistrarAdministrador($this->getStrCURP(), $this->getStrNombre(),$this->getStrApPaterno(),$this->getStrApMaterno(),$this->getDtmFechaNacimiento(),$this->getStrDireccion(),$this->getStrTelefono(), $this->getIntNIP(), $this->getIntBanderaNIPCambiado());
         //   return $this->objResult;
         //   $this->objResult= null;
         //}
         
         /*
          * Author: JMCL
          * Date: 19/10/2016
          * Description: Método que se encarga de eliminar todos los registros de la tabla Administradores.
          * Parameters: none
          * Return: $objResult
          */
         //public function mtdEliminarTodosAdministradores(){
         //   $this->objResult = $this->objModel->mtdEliminarTodosRegistros(TABLA_ADMINISTRADORES);
         //   return $this->objResult;
         //   $this->objResult = null;
         //}
         
         /*
          * Author: JMCL
          * Date: 19/10/2016
          * Description: Método encargado de eliminar una registro de la tabla Administradores por medio de su ID
          * Parameters: $strCURP
          * Return: $objResult
          */
         //public function mtdEliminarAdministradorPorId($strCURP){
         //   $this->setStrCURP($strCURP);
         //   $this->objResult = $this->objModel->mtdEliminarRegistroPorId(TABLA_ADMINISTRADORES, "strCURP", $this->getStrCURP());
         //   return $this->objResult;
         //   $this->objResult = null;
         //}
         
         /*
         * Author: JMCL
         * Date: 16/12/2016
         * Description: Obtiene los datos de un registro en donde coincidan la CURP y el NIP
         * Parameters: $strCURP, $intNIP
         * Return: $objResult
         */
        public function mtdValidarAdministrador($strCURP, $intNIP){
            $this->setStrCURP($strCURP);
            $this->setIntNIP($intNIP);
            $this->objResult = $this->objModel->mtdValidarAdministrador($this->getStrCURP(), $this->getIntNIP());
            return $this->objResult;
            $this->objResult = null;
        }
         
        # GETTER&SETTERS
        
        public function getStrCURP(){ return $this->strCURP; }
        public function setStrCURP($strCURP){ $this->strCURP = $strCURP; }
        public function getStrNombre(){ return $this->strNombre; }
        public function setStrNombre($strNombre){ $this->strNombre = $strNombre; }    
        public function getStrApPaterno(){ return $this->strApPaterno;}
        public function setStrApPaterno($strApPaterno){ $this->strApPaterno = $strApPaterno; }   
        public function getStrApMaterno(){ return $this->strApMaterno;}
        public function setStrApMaterno($strApMaterno){ $this->strApMaterno = $strApMaterno; }      
        public function getDtmFechaNacimiento(){ return $this->dtmFechaNacimiento;}
        public function setDtmFechaNacimiento($dtmFechaNacimiento){ $this->dtmFechaNacimiento = $dtmFechaNacimiento ;}       
        public function getStrDireccion(){ return $this->strDireccion;}
        public function setStrDireccion($strDireccion){ $this->strDireccion = $strDireccion; }       
        public function getStrTelefono(){ return $this->strTelefono;}
        public function setStrTelefono($strTelefono){ $this->strTelefono = $strTelefono; }        
        public function getIntNIP(){ return $this->intNIP; }
        public function setIntNIP($intNIP){ $this->intNIP = $intNIP; }        
        public function getIntBanderaNIPCambiado(){ return $this->intBanderaNIPCambiado; }
        public function setIntBanderaNIPCambiado($intBanderaNIPCambiado){ $this->intBanderaNIPCambiado = $intBanderaNIPCambiado; }
    }
?>


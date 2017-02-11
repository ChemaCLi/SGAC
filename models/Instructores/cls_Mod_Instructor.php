<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);  //root directorio de la raiz
    require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
    require_once "$root/SGAC_v1.0/trunk/models/General/cls_Mod_General.php";
    
    class cls_Mod_Instructor extends cls_Mod_General{
        
        #CONSTRUCTOR
        public function __construct (){
            define ("TABLA_INSTRUCTORES", "instructores");
            $this->objMySQL = new MySQL(); 
        }
        
        #METODOS
        
        /*
         * Author: RCS
         * Date: 04/10/2016
         * Description: Método para registrar un instructor. El return devolverá un valor booleano en función al resultado de la consulta.
         * Parameters: $strCURP, $intNIP, $strNombre, $strApPaterno, $strApMaterno, $dtmFechaNacimiento, $strDireccion, $strTelefono, $strEmail, $intBanderaActivo
         * Return: $objResult
         */
        public function mtdRegistrarInstructor($strCURP, $intNIP, $strNombre, $strApPaterno, $strApMaterno, $dtmFechaNacimiento, $strDireccion, $strTelefono, $strEmail, $intBanderaActivo){
            $strSQL = "INSERT INTO ".TABLA_INSTRUCTORES." (strCURP, intNIP, strNombre, strApPaterno, strApMaterno, dtmFechaNacimiento, strDireccion, strTelefono, strEmail, intBanderaActivo) VALUES ('{$strCURP}', '{$intNIP}', '{$strNombre}', '{$strApPaterno}', '{$strApMaterno}', '{$dtmFechaNacimiento}', '{$strDireccion}', '{$strTelefono}', '{$strEmail}', '{$intBanderaActivo}');";
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        }
        
        /*
         * Author: RCS
         * Date: 04/10/2016
         * Description: Método para actualizar la información de un registro específico. El return devolverá un valor booleano en función al resultado de la consulta.
         * Parameters: $strCURP, $intNIP, $strNombre, $strApPaterno, $strApMaterno, $dtmFechaNacimiento, $strDireccion, $strTelefono, $strEmail, $intBanderaActivo
         * Return: $objResult
         */
        public function mtdModificarInstructor($strCURP, $intNIP, $strNombre, $strApPaterno, $strApMaterno, $dtmFechaNacimiento, $strDireccion, $strTelefono, $strEmail, $intBanderaActivo){
            $strSQL = "UPDATE  ".TABLA_INSTRUCTORES." SET intNIP = '{$intNIP}', strNombre = '{$strNombre}', strApPaterno = '{$strApPaterno}', strApMaterno = '{$strApMaterno}', dtmFechaNacimiento = '{$dtmFechaNacimiento}', strDireccion = '{$strDireccion}', strTelefono = '{$strTelefono}', strEmail = '{$strEmail}', intBanderaActivo = '{$intBanderaActivo}' WHERE strCURP = '{$strCURP}';";
            $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
            return $this->objResult;
            $this->objResult = null;
        }
    } 
    ?>
<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
  require_once "$root/SGAC_v1.0/trunk/models/General/cls_Mod_General.php";
  
  class cls_Mod_Alumno extends cls_Mod_General{
    
    #CONSTRUCTOR
    public function __construct(){
     define("TABLA_ALUMNOS","alumnos");
     $this->objMySQL = new MySQL();
    }
    
    #METODOS
    /*
     * Author: AMJ
     * Date: 14/09/2016
     * Description: Método para insertar datos  de los alumnos en la base de datos.
     * Parameters: $strNoControl, $intNIP, $strNombre, $strApPaterno, $strApMaterno, $strDireccion, $intSemestre, $intFaltasAcumuladas, $strNumEmergencia, $strLimitaciones, $strNoTelefono, $intBanderaNIPCambiado, $intIdCampus, $intIdCarrera
     * Return: $objResult
     */
     public function mtdRegistrarAlumno($strNoControl, $intNIP, $strNombre, $strApPaterno, $strApMaterno, $strDireccion, $intSemestre, $intFaltasAcumuladas, $strNumEmergencia, $strLimitaciones, $strNoTelefono, $intBanderaNIPCambiado, $intIdCampus, $intIdCarrera){
      $strSQL = "INSERT INTO ".TABLA_ALUMNOS." (strNoControl, intNIP, strNombre, strApPaterno, strApMaterno, strDireccion, intSemestre, intFaltasAcumuladas, strNumEmergencia, strLimitaciones, strNoTelefono, intBanderaNIPCambiado, _intIdCampus, _intIdCarrera) VALUES ('{$strNoControl}', '{$intNIP}', '{$strNombre}', '{$strApPaterno}', '{$strApMaterno}', '{$strDireccion}', '{$intSemestre}', '{$intFaltasAcumuladas}', '{$strNumEmergencia}', '{$strLimitaciones}', '{$strNoTelefono}', '{$intBanderaNIPCambiado}', '{$intIdCampus}', '{$intIdCarrera}');";
      $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
      return $this->objResult;
      $this->objResult = null;
     }
     
    /*
     * Author: AMJ
     * Date: 14/09/2016
     * Description: Método para modificar los registros de los alumnos en la base de datos.
     * Parameters: $intId,$strNombre,$strApPaterno,$strApMaterno,$strNoControl,$strDireccion,$intIdCampus,$intIdCarrera
     * Return: $objResult
     */
     public function mtdModificarAlumno($strNoControl, $intNIP, $strNombre, $strApPaterno, $strApMaterno, $strDireccion, $intSemestre, $intFaltasAcumuladas, $strNumEmergencia, $strLimitaciones, $strNoTelefono, $intBanderaNIPCambiado, $intIdCampus, $intIdCarrera){
      $strSQL = "UPDATE ".TABLA_ALUMNOS." SET intNIP = '{$intNIP}', strNombre = '{$strNombre}', strApPaterno = '{$strApPaterno}', strApMaterno = '{$strApMaterno}', strDireccion ='{$strDireccion}', intSemestre = '{$intSemestre}', intFaltasAcumuladas = '{$intFaltasAcumuladas}', strNumEmergencia = '{$strNumEmergencia}', strLimitaciones = '{$strLimitaciones}', strNoTelefono = '{$strNoTelefono}', intBanderaNIPCambiado = '{$intBanderaNIPCambiado}', _intIdCampus = '{$intIdCampus}', _intIdCarrera = '{$intIdCarrera}' WHERE strNoControl = '{$strNoControl}';";
      $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
      return $this->objResult;
      $this->objResult = null;
     }
     
     /*
     * Author: JMCL
     * Date: 14/12/2016
     * Description: Obtiene los datos de un registro en donde coincidan la CURP y el NIP
     * Parameters: $strNoControl, $intNIP
     * Return: $objResult
     */
     public function mtdValidarAlumno($strNoControl, $intNIP){
        $strSQL = "SELECT * FROM ".TABLA_ALUMNOS." WHERE strNoControl = '{$strNoControl}' AND intNIP = '{$intNIP}'";
        $this->objResult =$this->objMySQL->mtdConsultaGenerica($strSQL);
        return $this->objResult;
        $this->objResult = null;
     }
     
     /*
      * Author: JMCL
      * Date: 30/01/2017
      * Description: Selecciona las actividades en las que un alumno se encuentra inscrito pero no han sido liberadas
      * Parameters: $strNoControl
      * Return: $objResult
      */ 
     public function mtdObtenerActividadesCursando($strNoControl){
        $strSQL = "SELECT actividades.intId, actividades.strNombreActividad FROM actividades, alumnos_actividades WHERE actividades.intId = alumnos_actividades._intIdActividad AND alumnos_actividades._strIdAlumno = '{$strNoControl}' AND intBanderaInscrito = 1 AND intBanderaAcredita = 0";
        $this->objResult =$this->objMySQL->mtdConsultaGenerica($strSQL);
        if($this->objResult > 0)
          return $this->objResult;//hay datos
        elseif($this->objResult < 1)
          return 0;//no hay datos
        else
          return false;//error inesperado
        
        $this->objResult = null;
     }
  }
 ?>
<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  require_once "$root/SGAC_v1.0/trunk/models/Alumnos/cls_Mod_Alumno.php";
  
  class cls_Ctrl_Alumno{
    
    # VARIABLES GLOBALES
    private $strNoControl;
    private $intNIP;
    private $strNombre;
    private $strApPaterno;
    private $strApMaterno;
    private $strDireccion;
    private $intSemestre;
    private $intFaltasAcumuladas;
    private $strNumEmergencia;
    private $strLimitaciones;
    private $strNoTelefono;
    private $intBanderaNIPCambiado;
    private $intIdCampus;
    private $intIdCarrera;
    private $objModel;
    private $objResult;
    
    # CONSTRUCTOR
    public function __construct(){
      $this->objModel = new cls_Mod_Alumno();
    }
    
    # MÉTODOS
    
    /*
    * Author: AMJ
    * Date: 14/09/2016
    * Description: se conecta con el método del modelo cls_Mod_Alumno para obtener todos los registros
    * Parameters: none
    * Return: $objResult
    */
    public function mtdObtenerTodosAlumnos(){
      $this->objResult = $this->objModel->mtdObtenerTodosRegistros(TABLA_ALUMNOS);
      return $this->objResult;
      $this->objResult = null;
    }
    
    /*
    * Author: AMJ
    * Date: 14/09/2016
    * Description: Se conecta con el método del modelo cls_Mod_Alumno para obtener  los registros por Id
    * Parameters: $strNoControl
    * Return: $objResult
    */
    public function mtdObtenerAlumnoPorId($strNoControl){
      $this->setStrNoControl($strNoControl);
      $this->objResult = $this->objModel->mtdObtenerRegistroPorId(TABLA_ALUMNOS, "strNoControl", $strNoControl);
      return $this->objResult;
      $this->objResult = null;
    }
    
    /*
     *
     */
    public function mtdValidarAlumno($strNoControl, $intNIP){
      $this->setStrNoControl($strNoControl);
      $this->setIntNIP($intNIP);
      $this->objResult = $this->objModel->mtdValidarAlumno($this->getStrNoControl(), $this->getIntNIP());
      return $this->objResult;
      $this->objResult = null;
    }
    
     /*
      * Author: AMJ
      * Date: 14/09/2016
      * Description: Se conecta con el método del modelo cls_Mod_Alumno para insertar todos los registros
      * Parameters: $_POST
      * Return: $objResult
      */
    public function mtdRegistrarAlumno(){
      $this->setStrNoControl($_POST['numero_control']);
      $this->setIntNIP($_POST['nip']);
      $this->setStrNombre($_POST['nombre']);
      $this->setStrApPaterno($_POST['ap_paterno']);
      $this->setStrApMaterno($_POST['ap_materno']);
      $this->setStrDireccion($_POST['direccion']);
      $this->setIntSemestre($_POST['semestre']);
      $this->setIntFaltasAcumuladas($_POST['faltas']);
      $this->setStrNumEmergencia($_POST['numero_emergencia']);
      $this->setStrLimitaciones($_POST['limitaciones']);
      $this->setStrNoTelefono($_POST['telefono']);
      $this->setIntBanderaNIPCambiado($_POST['nip_cambiado']);
      $this->setIntIdCampus($_POST['campus']);
      $this->setIntIdCarrera($_POST['carrera']);
      $this->objResult = $this->objModel->mtdRegistrarAlumno($this->getStrNoControl(), $this->getIntNIP(), $this->getStrNombre(),$this->getStrApPaterno(), $this->getStrApMaterno(), $this->getStrDireccion(), $this->getIntSemestre(), $this->getIntFaltasAcumuladas(), $this->getStrNumEmergencia(), $this->getStrLimitaciones(), $this->getStrNoTelefono(), $this->getIntBanderaNIPCambiado(), $this->getIntIdCampus(), $this->getIntIdCarrera());
      return $this->objResult;
      $this->objResult = null; 
    }
    
    /*
    * Author: AMJ
    * Date: 14/09/2016
    * Description: se conecta con el método del modelo cls_Mod_Alumno para modificar los registros
    * Parameters: $_POST
    * Return: $objResult
    */
    public function mtdModificarAlumno(){
      $this->setStrNoControl($_POST['numero_control']);
      $this->setIntNIP($_POST['nip']);
      $this->setStrNombre($_POST['nombre']);
      $this->setStrApPaterno($_POST['ap_paterno']);
      $this->setStrApMaterno($_POST['ap_materno']);
      $this->setStrDireccion($_POST['direccion']);
      $this->setIntSemestre($_POST['semestre']);
      $this->setIntFaltasAcumuladas($_POST['faltas']);
      $this->setStrNumEmergencia($_POST['numero_emergencia']);
      $this->setStrLimitaciones($_POST['limitaciones']);
      $this->setStrNoTelefono($_POST['telefono']);
      $this->setIntBanderaNIPCambiado($_POST['nip_cambiado']);
      $this->setIntIdCampus($_POST['campus']);
      $this->setIntIdCarrera($_POST['carrera']);
      $this->objResult = $this->objModel->mtdModificarAlumno($this->getStrNoControl(), $this->getIntNIP(), $this->getStrNombre(),$this->getStrApPaterno(), $this->getStrApMaterno(), $this->getStrDireccion(), $this->getIntSemestre(), $this->getIntFaltasAcumuladas(), $this->getStrNumEmergencia(), $this->getStrLimitaciones(), $this->getStrNoTelefono(), $this->getIntBanderaNIPCambiado(), $this->getIntIdCampus(), $this->getIntIdCarrera());
      return $this->objResult;
      $this->objResult = null;
    }
    
    /*
    * Author: AMJ
    * Date: 14/09/2016
    * Description: se conecta con el método del modelo cls_Mod_Alumno para eliminar todos los registros
    * Parameters: none
    * Return: $objResult
    */
    public function mtdEliminarTodosAlumnos(){
      $this->objResult = $this->objModel->mtdEliminarTodosRegistros(TABLA_ALUMNOS);
      return $this->objResult;
      $this->objResult = null;
    }
    
    /*
    * Author:AMJ
    * Date:14/09/2016
    * Description:se conecta con el método del modelo cls_Mod_Alumno para eliminar los registros por Id
    * Parameters: none
    * Return: $objResult
    */
    public function mtdEliminarAlumnoPorId($strNoControl){
      $this->objResult = $this->objModel->mtdEliminarRegistroPorId(TABLA_ALUMNOS, "strNoControl", $strNoControl);
      return $this->objResult;
      $this->objResult = null;
    }
    
    /*
     * Author: JMCL
     * Date: 30/01/2017
     * Description: Obtiene las actividades en las que se encuentra inscrito un alumno pero no ha liberado
     * Parameters: $strNoControl
     * Return: $objResult
     */
    public function mtdObtenerActividadesCursando($strNoControl){
      $this->objResult = $this->objModel->mtdObtenerActividadesCursando($strNoControl);
      return $this->objResult;
      $this->objResult = null;
    }
    
     public function mtdObtenerActividadesLiberadas($strNoControl){
      $this->objResult = $this->objModel->mtdObtenerActividadesLiberadas($strNoControl);
      return $this->objResult;
      $this->objResult = null;
     }
     


    #GETTERS&SETTER     
    
    public function getStrNoControl(){ return $this->strNoControl; }
    public function setStrNoControl($strNoControl){ $this->strNoControl = $strNoControl; }
    public function getIntNIP(){ return $this->intNIP; }
    public function setIntNIP($intNIP){ $this->intNIP = $intNIP; }
    public function getStrNombre(){ return $this->strNombre; }
    public function setStrNombre($strApPaterno){ $this->strNombre = $strNombre; }
    public function getStrApPaterno(){ return $this->strApPaterno; }
    public function setStrApPaterno($strApPaterno){ $this->strApPaterno = $strApPaterno; }
    public function getStrApMaterno(){ return $this->strApMaterno; }
    public function setStrApMaterno($strApMaterno){ $this->strApMaterno = $strApMaterno; }
    public function getStrDireccion(){ return $this->strDireccion; }
    public function setStrDireccion($strDireccion){ $this->strDireccion = $strDireccion; }
    public function getIntSemestre(){ return $this->intSemestre; }
    public function setIntSemestre($intSemestre){ $this->intSemestre = $intSemestre; }
    public function getIntFaltasAcumuladas(){ return $this->intFaltasAcumuladas; }
    public function setIntFaltasAcumuladas($intFaltasAcumuladas){ $this->intFaltasAcumuladas = $intFaltasAcumuladas; }
    public function getStrNumEmergencia(){ return $this->strNumEmergencia; }
    public function setStrNumEmergencia($strNumEmergencia){ $this->strNumEmergencia = $strNumEmergencia; }
    public function getStrLimitaciones(){ return $this->strLimitaciones; }
    public function setStrLimitaciones($strLimitaciones){ $this->strLimitaciones = $strLimitaciones; }
    public function getStrNoTelefono(){ return $this->strNoTelefono; }
    public function setStrNoTelefono($strNoTelefono){ $this->strNoTelefono = $strNoTelefono; }
    public function getIntBanderaNIPCambiado(){ return $this->intBanderaNIPCambiado; }
    public function setIntBanderaNIPCambiado($intBanderaNIPCambiado){ $this->intBanderaNIPCambiado = $intBanderaNIPCambiado; }
    public function getIntIdCampus(){ return $this->intIdCampus; }
    public function setIntIdCampus($intIdCampus){ $this->intIdCampus = $intIdCampus; }
    public function getIntIdCarrera(){ return $this->intIdCarrera; }
    public function setIntIdCarrera($intIdCarrera){ $this->intIdCarrera = $intIdCarrera; }
  }
?>
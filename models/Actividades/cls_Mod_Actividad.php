<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  //require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
	require_once "complementarias.itszongolica.edu.mx/MySQL.php";
  require_once "$root/SGAC_v1.0/trunk/models/General/cls_Mod_General.php";
  
  class cls_Mod_Actividad extends cls_Mod_General{
    
    #CONSTRUCTOR
    public function __construct(){
      define("TABLA_ACTIVIDADES","actividades");
      $this->objMySQL = new MySQL();
      
    }
    
    #METODOS
    /*
     * Author: SAC
     * Date: 28/11/2016
     * Description: Método para insertar datos  de las actividades en la base de datos.Debido a que la relacion de las estidades Actividades y Lugares es de muchos a muchos, existe una tabla intermedia, por lo cual se debe insertar un registro en esta última.
     * Parameters: $strNombreActividad, $strCategoria, $strDescripcion, $intTotalHoras, $intCreditos, $intBanderaDisponibilidadInscripcion, $intBanderaActiva, $intCupo, $_intIdCampus, $_intIdLugar
     * Return: $objResult
     */
     public function mtdRegistrarActividad($strNombreActividad, $strCategoria, $strDescripcion, $intTotalHoras, $intCreditos, $intBanderaDisponibilidadInscripcion, $intBanderaActiva, $intCupo, $_intIdCampus,$_intIdLugar){
      $strSQL = "INSERT INTO ".TABLA_ACTIVIDADES." (strNombreActividad, strCategoria, strDescripcion, intTotalHoras, intCreditos, intBanderaDisponibilidadInscripcion, intBanderaActiva, intCupo, _intIdCampus) VALUES ('{$strNombreActividad}', '{$strCategoria}', '{$strDescripcion}', '{$intTotalHoras}', '{$intCreditos}', '{$intBanderaDisponibilidadInscripcion}', '{$intBanderaActiva}', '{$intCupo}', '{$_intIdCampus}');";
      $actividadId = $this->objMySQL->mtdLastIdRegistro($strSQL);
      if($actividadId < 1)
        return false;
      else{
        $this->objMySQL = null;
        $this->objMySQL = new MySQL();
        $strSQL = "INSERT INTO actividades_lugares (_intIdActividad, _intIdLugar) VALUES ('{$actividadId}', '{$_intIdLugar}');";
        $result = $this->objMySQL->mtdConsultaGenerica($strSQL);
        if($result === true)
          return true;
        elseif($result === false)
          return false;
        else
          return false;
      }
     }
     
     /*
      * Author: JMCL
      * Date: 28/11/2016
      * Description: Obtiene sólo las actividades que se encuentran activas
      * Parameters: $intId
      * Return: $objResult
      */
     public function mtdObtenerActividadesActivas(){
        $strSQL = "SELECT * FROM ".TABLA_ACTIVIDADES." WHERE intBanderaActiva = 1";
        $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
        if($this->objResult > 0)
          return $this->objResult;//hay datos
        elseif($this->objResult < 1)
          return 0;//no hay datos
        else
          return false;//error inesperado
        
        $this->objResult = null;
     }
     
     /*
       * Author: JMCL
       * Date: 30/01/2017
       * Description: Obtiene aquella actividades que están disponibles para incripción, además de los datos que relacionan al alumno con la actividad
       * Parameters: $strNoControl
       * Return $objResult
       */
      public function mtdObtenerActividadesDisponiblesInscripcion(){
        $strSQL = "SELECT actividades.intId, actividades.strNombreActividad, actividades.strDescripcion, lugares.strNombreLugar FROM actividades, actividades_lugares, lugares WHERE actividades.intBanderaDisponibilidadInscripcion = 1 AND actividades_lugares._intIdActividad = actividades.intId AND actividades_lugares._intIdLugar = lugares.intId;";
        $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
        if($this->objResult > 0)
          return $this->objResult;//hay datos
        elseif($this->objResult < 1)
          return 0;//no hay datos
        else
          return false;//error inesperado
        
        $this->objResult = null;
      }
      
     public function mtdObtenerDetallesActividad($intId){
      $strSQL = "SELECT lugares.*, actividades.* FROM actividades, actividades_lugares, lugares WHERE actividades.intId = '{$intId}' AND actividades_lugares._intIdActividad = actividades.intId AND actividades_lugares._intIdLugar = lugares.intId GROUP BY lugares.strUrlMapa";
      $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
        if($this->objResult > 0)
          return $this->objResult;//hay datos
        elseif($this->objResult < 1)
          return 0;//no hay datos
        else
          return false;//error inesperado
        
        $this->objResult = null;
     }
     
    /*
     * Author: AMJ
     * Date: 14/09/2016
     * Description: Método para modificar datos  de las actividades en la base de datos.
     * Parameters: $intId, $strNombreActividad, $strCategoria, $strDescripcion, $intTotalHoras, $intCreditos, $intBanderaDisponibilidadInscripcion, $intBanderaActiva, $intCupo, $_intIdCampus
     * Return:$objResult
     */
     public function mtdModificarActividad($intId, $strNombreActividad, $strCategoria, $strDescripcion, $intTotalHoras, $intCreditos, $intBanderaDisponibilidadInscripcion, $intBanderaActiva, $intCupo, $_intIdCampus){
      $strSQL = "UPDATE ".TABLA_ACTIVIDADES." SET strNombreActividad = '{$strNombreActividad}', strCategoria = '{$strCategoria}', strDescripcion = '{$strDescripcion}', intTotalHoras = '{$intTotalHoras}', intCreditos = '{$intCreditos}', intBanderaDisponibilidadInscripcion = '{$intBanderaDisponibilidadInscripcion}', intBanderaActiva = '{$intBanderaActiva}', intCupo = '{$intCupo}', _intIdCampus = '{$_intIdCampus}' WHERE intId = '{$intId}';";
      $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
      return $this->objResult;
      $this->objResult = null;
     }
     
      /*
     * Author: SAC
     * Date: 21/11/2016
     * Description: Método para obtener los alumnos inscritos en las actividades correspondientes.
     * Parameters: $intId, $strNombreActividad, $strCategoria, $strDescripcion, $intTotalHoras, $intCreditos, $intBanderaDisponibilidadInscripcion, $intBanderaActiva, $intCupo, $_intIdCampus
     * Return:$objResult
     */
      public function mtdObtenerAlumnosPorActividad($intId){
        $strSQL = "SELECT alumnos_actividades._intIdActividad, alumnos.strNombre, alumnos.strApPaterno, alumnos.strApMaterno, alumnos.strNoControl FROM alumnos_actividades INNER JOIN alumnos ON  alumnos.strNoControl = alumnos_actividades._strIdAlumno AND   alumnos_actividades._intIdActividad = '{$intId}'";
        $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
        return $this->objResult;
        $this->objResult = null;
      }
      
      /*
       * Author: JMCL
       * Date: 27/11/2016
       * Description: Método para cambiar el estado de la actividad como inactiva.
       * Parameters: $intId
       * Return: $objResult
       */
      public function mtdDesactivarActividad($intId){
        $strSQL = "UPDATE ".TABLA_ACTIVIDADES." SET intBanderaActiva = 0, intBanderaDisponibilidadInscripcion = 0 WHERE intId = '{$intId}'";
        //echo $strSQL;
        $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
        return $this->objResult;
        $this->objResult = null;
      }
      
      /*
      * Author: JMCL & SAC 
      * Date: 29/11/2016
      * Description: Obtiene sólo las actividades que se encuentran inactivas
      * Parameters: $intId
      * Return: $objResult
      */
     public function mtdObtenerActividadesInactivas(){
        $strSQL = "SELECT * FROM ".TABLA_ACTIVIDADES." WHERE intBanderaActiva = 0";
        $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
        return $this->objResult;
        $this->objResult = null;
     }
     
     /*
       * Author: JMCL
       * Date: 27/11/2016
       * Description: Método para cambiar el estado de la actividad como inactiva.
       * Parameters: $intId
       * Return: $objResult
       */
      public function mtdActivarActividad($intId){
        $strSQL = "UPDATE ".TABLA_ACTIVIDADES." SET intBanderaActiva = 1, intBanderaDisponibilidadInscripcion = 1 WHERE intId = '{$intId}'";
        //echo $strSQL;
        $this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
        return $this->objResult;
        $this->objResult = null;
      }
}
 ?>
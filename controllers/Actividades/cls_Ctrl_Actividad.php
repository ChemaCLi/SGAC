<?php
   $root = realpath($_SERVER["DOCUMENT_ROOT"]);
   require_once "$root/SGAC_v1.0/trunk/models/Actividades/cls_Mod_Actividad.php";
   
   class cls_Ctrl_Actividad{
      
      # VARIABLES GLOBALES
      private $intId;
      private $strNombreActividad;
      private $strCategoria;
      private $strDescripcion;
      private $intTotalHoras;
      private $intCreditos;
      private $intBanderaDisponibilidadInscripcion;
      private $intBanderaActiva;
      private $intCupo;
      //private $intAlumnosInscritos; Este dato se debe obtener como una consulta especial, no debe existir como un dato de registro de esta tabla pues cambia dinamicamente
      private $_intIdCampus;
      private $_strIdAlumno;
      private $_intIdLugar;
      private $objModel;
      private $objResult;
      
      # CONSTRUCTOR
      public function __construct(){
        $this->objModel = new cls_Mod_Actividad();
      }
      
      # METODOS
      
      /*
       * Author :AMJ
       * Date: 14/09/2016
       * Description: Se conecta con el metodo del modelo cls_Mod_Actividad para obtener todos los registros
       * Parameters: none
       * Return: $objResult
       */
       public function mtdObtenerTodasActividades(){
        $this->objResult = $this->objModel->mtdObtenerTodosRegistros(TABLA_ACTIVIDADES);
        return $this->objResult;
        $this->objResult = null;
       }
       
      /*
       * Author: AMJ
       * Date: 14/09/2016
       * Description: se conecta con el metodo del modelo cls_Mod_Actividad para obtener  los registros por Id
       * Parameters: $intId
       * Return: $objResult
       */
       public function mtdObtenerActividadPorId($intId){
        $this->setIntId($intId);
        $this->objResult = $this->objModel->mtdObtenerRegistroPorId(TABLA_ACTIVIDADES, "intId", $this->getIntId());
        return $this->objResult;
        $this->objResult = null;
       }
       
       public function mtdObtenerDetallesActividad($intId){
         $this->setIntId($intId);
         $this->objResult = $this->objModel->mtdObtenerDetallesActividad($this->getIntId());
         return $this->objResult;
         $this->objResult = null;         
       }
      
      /*
       * Author: JMCL
       * Date: 12/11/2016
       * Description:Obtiene sólo las actividades que se encuentran activas
       * Parameters: #intId
       * Return: $objResult
       */
      public function mtdObtenerActividadesActivas(){
         $this->objResult = $this->objModel->mtdObtenerActividadesActivas();
        return $this->objResult;
        $this->objResult = null;
      }
      
      /*
       * Author: JMCL& SAC
       * Date: 12/11/2016
       * Description:Obtiene sólo las actividades que se encuentran inactivas
       * Parameters: #intId
       * Return: $objResult
       */
      public function mtdObtenerActividadesInactivas(){
         $this->objResult = $this->objModel->mtdObtenerActividadesInactivas();
         return $this->objResult;
         $this->objResult = null;
      }
      
      /*
       * Author: JMCL
       * Date: 30/01/2017
       * Description: Obtiene aquella actividades que están disponibles para un alumno determinado
       * Parameters: $strNoControl
       * Return $objResult
       */
      public function mtdObtenerActividadesDisponiblesInscripcion(){
         $this->objResult = $this->objModel->mtdObtenerActividadesDisponiblesInscripcion();
         return $this->objResult;
         $this->objResult = null;
      }
      
      /*
       * Author: AMJ
       * Date: 14/09/2016
       * Description: se conecta con el metodo del modelo cls_Mod_Actividad para insertar nuevos registros
       * Parameters: $_POST
       * Return: $objResult
       */
      public function mtdRegistrarActividad(){
        $this->setStrNombreActividad($_POST['nombre_actividad']);
        $this->setStrCategoria($_POST['categoria']);
        $this->setStrDescripcion($_POST['descripcion']);
        $this->setIntTotalHoras($_POST['horas']);
        $this->setIntCreditos($_POST['creditos']);
        $this->setIntBanderaDisponibilidadInscripcion($_POST['disponibilidad']);
        $this->setIntBanderaActiva('1');//Por defecto, al crear una actividad ésta se registra como activa
        $this->setIntCupo($_POST['cupo']);
        $this->set_IntIdCampus($_POST['id_campus']);
        $this->set_IntIdLugar($_POST['lugar_actividad']);
        
        
        
        //$this->setAlumnosInscritos($_POST['inscritos']);//Esto es mejor maejarlo desde la base de datos como un trigger
        //Para realizar una correcta inserción tomando en cuenta que existen llaves foráneas,
        //hay que crear otro método o modificar éste para que la inserción ocurra en todas las tablas necesarias
        $this->objResult = $this->objModel->mtdRegistrarActividad($this->getStrNombreActividad(), $this->getStrCategoria(), $this->getStrDescripcion(), $this->getIntTotalHoras(), $this->getIntCreditos(), $this->getIntBanderaDisponibilidadInscripcion(), $this->getIntBanderaActiva(), $this->getIntCupo(), /*$this->getIntAlumnosInscritos(),*/ $this->get_IntIdCampus(),$this->get_IntIdLugar());
        return $this->objResult;
        $this->objResult = null;
        
     }
     
      /*
       * Author: AMJ
       * Date: 14/09/2016
       * Description: se conecta con el metodo del modelo cls_Mod_Actividad para modificar registros
       * Parameters: $_POST
       * Return: objResult
       */
       public function mtdModificarActividades(){
        $this->setIntId($_POST['id']);
        $this->setStrNombreActividad($_POST['nombre_actividad']);
        $this->setStrCategoria($_POST['categoria']);
        $this->setStrDescripcion($_POST['descripcion']);
        $this->setIntTotalHoras($_POST['horas']);
        $this->setIntCreditos($_POST['creditos']);
        $this->setIntBanderaDisponibilidadInscripcion($_POST['disponibilidad']);
        $this->setIntBanderaActiva($_POST['status']);
        $this->setIntCupo($_POST['cupo']);
        $this->set_IntIdCampus($_POST['id_campus']);
        
        //$this->setAlumnosInscritos($_POST['inscritos']);//Esto es mejor maejarlo desde la base de datos como un trigger
        //Para realizar una correcta inserción tomando en cuenta que existen llaves foráneas,
        //hay que crear otro método o modificar éste para que la inserción ocurra en todas las tablas necesarias
        $this->objResult = $this->objModel->mtdModificarActividad($this->getIntId(), $this->getStrNombreActividad(), $this->getStrCategoria(), $this->getStrDescripcion(), $this->getIntTotalHoras(), $this->getIntCreditos(), $this->getIntBanderaDisponibilidadInscripcion(), $this->getIntBanderaActiva(), $this->getIntCupo(), /*$this->getIntAlumnosInscritos(),*/$this->get_IntIdCampus());
        return $this->objResult;
        $this->objResult = null;
      }
       
       /*
       * Author: AMJ
       * Date: 14/09/2016
       * Description: se conecta con el metodo del modelo cls_Mod_Actividad para eliminar  registros
       * Parameters: none
       * Return: $objResult
       */
       public function mtdEliminarTodosRegistros(){
           $this->objResult = $this->objModel->mtdEliminarTodosRegistros(TABLA_ACTIVIDADES);
           return $this->objResult;
           $this->objResult = null;
       }
       
      /*
       * Author: AMJ
       * Date: 14/09/2016
       * Description:se conecta con el metodo del modelo cls_Mod_Actividad para eliminar registros por el ID
       * Parameters: $intId
       * Return: $objResult
       */
       public function mtdEliminarRegistroPorId($intId){
        $this->setIntId($intId);
        $this->objResult = $this->objModel->mtdEliminarRegistroPorId(TABLA, "intId", $this->getIntId());
        return $this->objResult;
        $this->objResult = null;
       }
       
       /*
        * Author: SAC
        * Date: 21/11/2016
        * Description: Obtiene aquellos alumnos que están inscritos en una actividad complementaria específica
        * Parameters: $_POST
        * Return: $objResult
        */
       public function mtdObtenerAlumnosPorActividad(){
         $this->setIntId($_POST['actividad']);       
         $this->objResult = $this->objModel->mtdObtenerAlumnosPorActividad($this->getIntId());
         return $this->objResult;
         $this->objResult = null;
       }
       
       /*
        * Author: JMCL
        * Date: 27/11/2016
        * Description: Método que pone cambia el status de la actividad como inactiva.
        * Parameters: $_POST
        * Return: $objResult
        */
       public function mtdDesactivarActividad(){
         $this->setIntId($_POST['actividad']);
         $this->objResult = $this->objModel->mtdDesactivarActividad($this->getIntId());
         return $this->objResult;
         $this->objResult = null;
       }
     /*
        * Author: JMCL
        * Date: 27/11/2016
        * Description: Método que pone cambia el status de la actividad como inactiva.
        * Parameters: $_POST
        * Return: $objResult
        */
       public function mtdActivarActividad(){
         $this->setIntId($_POST['actividad']);
         $this->objResult = $this->objModel->mtdActivarActividad($this->getIntId());
         return $this->objResult;
         $this->objResult = null;
       }
     
     #GETTERS&SETTER
    
      public function getIntId (){ return $this->intId; }
      public function setIntId($intId){ $this->intId = $intId; }
      public function getStrNombreActividad(){ return $this->strNombreActividad; }
      public function setStrNombreActividad($strNombreActividad){ $this->strNombreActividad  = $strNombreActividad; }      
      public function getStrCategoria(){ return $this->strCategoria; }
      public function setStrCategoria($strCategoria){ $this->strCategoria =$strCategoria; }      
      public function getStrDescripcion(){ return $this->strDescripcion; }
      public function setStrDescripcion($strDescripcion){ $this->strDescripcion = $strDescripcion; }      
      public function getIntTotalHoras(){ return $this->intTotalHoras; }
      public function setIntTotalHoras($intTotalHoras){ $this->intTotalHoras = $intTotalHoras; }      
      public function getIntCreditos(){ return $this->intCreditos; }
      public function setIntCreditos($intCreditos){ $this->intCreditos = $intCreditos; }      
      public function getIntBanderaDisponibilidadInscripcion(){ return $this->intBanderaDisponibilidadInscripcion; }
      public function setIntBanderaDisponibilidadInscripcion($intBanderaDisponibilidadInscripcion){ $this->intBanderaDisponibilidadInscripcion = $intBanderaDisponibilidadInscripcion; }   
      public function getIntBanderaActiva(){ return $this->intBanderaActiva; }
      public function setIntBanderaActiva($intBanderaActiva){ $this->intBanderaActiva = $intBanderaActiva; }      
      public function getIntCupo(){ return $this->intCupo; }
      public function setIntCupo($intCupo){ $this->intCupo = $intCupo; }      
      //public function getIntAlumnosInscritos(){ return $this->intAlumnosInscritos; }
      //public function setIntAlumnosInscritos($intAlumnosInscritos){ $this->intAlumnosInscritos = $intAlumnosInscritos; }
      public function get_IntIdCampus(){ return $this->_intIdCampus; }
      public function set_IntIdCampus($_intIdCampus){ $this->_intIdCampus = $_intIdCampus; }
      public function get_StrIdAlumno() {return $this->_strIdAlumno;}
      public function set_StrIdAlumno($_strIdAlumno){ $this->_strIdAlumno = $_strIdAlumno;}
      public function get_IntIdLugar(){ return $this->_intIdLugar;}
      public function set_IntIdLugar ($_intIdLugar) { $this->_intIdLugar = $_intIdLugar; }
      
   }
?>
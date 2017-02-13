<?php
	error_reporting(E_ERROR);
	
	class MySQL{
		# VARIABLES GLOBALES
		private $connection;//Almacena la conexión con la base de datos
		private $objResult;//Almacena los registros u objetos de retorno 
		
		
		# CONSTRUCTOR::CONFIGURACIONES
		public function __construct(){			
			define("SERVER", "localhost");
			define("DATABASE", "sgac");
			define("USER", "root");
			define("PASSWORD", ""); 
		}
		
		# METODOS

		/*
		 * Author: JMCL
		 * Date: 07/09/2016
		 * Description: Método para crear una conexión con la base de datos definida. Dicha conexión se asigna a la variable global $connection.
		 * Parameters: none
		 * Return: none
		 */
		public function mtdConectar(){
			if(!isset($this->connection)){//Verifica la existencia de una conexión activa
				$this->connection = new mysqli(SERVER, USER, PASSWORD, DATABASE);//Crea un objeto mysql de conexión
				
				if($this->connection->connect_error)//Si existe un error relacionado con la conectividad a la base de datos
					die('<div id="mensaje_servidor"><div id="mensaje_resultado_operacion" class="animated fadeInDown"><div id="titulo">ERROR DEL SERVIDOR</div><div id="mensaje">El servicio no se encuentra disponible debido a un error interno del servidor. Por favor, comunícalo con el administrador o escribe un correo a gestion_complementarias@systech.com</div><center><a href="index" style="margin: auto;">Aceptar</a></div></div>');//Sólo para pruebas. Borrar para despliegue.
					//die(utf8_encode("INTERNAL SERVER ERROR: Conexion Fallida. ".$this->connection->connect_error));//Sólo para pruebas. Borrar para despliegue.
				else
					echo "";//SERVER REQUEST: Conexion Exitosa. ";//Sólo para pruebas. Borrar para despliegue.				
			}
			else{//Si ya existe una conexión, la cierra y luego se vuelve a ejecutar éste método para abrir una nueva.
				$this->mtdDesconectar();
				$this->connection = new mysqli(SERVER, USER, PASSWORD, DATABASE);//Crea un objeto mysql de conexión
			}
		}
		
		/*
		 * Author: JMCL
		 * Date: 07/09/2016
		 * Description: Método para cerrar la conexión con la base de datos definida, liberando a la variable global $connection.
		 * Parameters: none
		 * Return: none
		 */
		public function mtdDesconectar(){
			if(isset($this->connection))
				$this->connection->close();				
			else
				echo "SERVER REQUEST: No existe conexion alguna. ";//Sólo para pruebas. Borrar para despliegue.
		}
		
		/*
		 * Author: JMCL
		 * Date: 12/09/2016
		 * Description: Método que obtiene todos los registros de una tabla específica.
		 * Parameters: $strNombreTabla
		 * Return: $objResult || null
		 */
		public function mtdObtenerTodosRegistros($strNombreTabla){
			$strSQL = "SELECT * FROM $strNombreTabla;";
			$this->mtdConectar();
			$objMySQL = $this->connection->query($strSQL);
			$this->mtdDesconectar();
			if(is_bool($objMySQL) === false){
				while($objArrayAssoc = $objMySQL->fetch_array(MYSQLI_BOTH))
					$this->objResult[] = $objArrayAssoc;
				if(!isset($this->objResult)){
					echo "";//NOT FOUND: no hay resultados.";//Sólo para pruebas. Borrar para despliegue.
					return null;
				}
				else{
					echo "";//STATUS OK: se devolverán los resultados encontrados. ";//Sólo para pruebas. Borrar para despliegue.
					return $this->objResult;
				}
				$this->objResult = null;
			}
			elseif($objMySQL === false){
					echo "";//Operación Fallida; es posible que existan errores en el Modelo o bien en el Controlador. Por favor, revisa que los parámetros se estén capturando y enviando correctamente así como las constantes del Constructor.";
					return false;	
			}
		}
		
		/*
		 * Author: JMCL
		 * Date: 08/09/2016
		 * Description: Método que obtiene todos los datos de un registro por medio del ID.
		 * Parameters: $strNombreTabla, $strColumnaId, $intId
		 * Return: $objResult || null
		 */
		public function mtdObtenerRegistroPorId($strNombreTabla, $strColumnaId, $Id){
			$strSQL = "SELECT * FROM  $strNombreTabla WHERE $strColumnaId = '{$Id}';";
			$this->mtdConectar();
			$objMySQL = $this->connection->query($strSQL);//Usa la conexión para realizar una consulta. Si los parámetros son incorrectos, el programa caerá a partir de aquí. UNSUPPORT MEDIA TYPE.
			$this->mtdDesconectar();
			if(is_bool($objMySQL) === false){
				while ($objArrayAssoc = $objMySQL->fetch_array(MYSQLI_BOTH))//convierte el objeto mysql devuelto a un array con indice (bidimencional).
					$this->objResult[] = $objArrayAssoc;//Asigna el array a la variable $objResult
				if(!isset($this->objResult)){//Si resultado viene nulo.
					echo "";//NOT FOUND: no hay resultados. ";//Sólo para pruebas. Borrar para despliegue.
					return null;
				}
				else{
					echo "";//STATUS OK: se devolverá el resultado encontrado. ";//Sólo para pruebas. Borrar para despliegue.
					return $this->objResult;//Array con los registros
				}
				$this->objResult = null;	
			}
			elseif($objMySQL === false){
				echo "";//Operación Fallida; es posible que existan errores en el Modelo o bien en el Controlador. Por favor, revisa que los parámetros se estén capturando y enviando correctamente así como las constantes del Constructor.";
				return false;
			}
		}
		
		/*
		 * Author: JMCL 
		 * Date: 12/09/2016
		 * Description: Método para eliminar todos los registros de una tabla.
		 * Parameters: $strNombreTabla
		 * Return: true || false
		 */
		public function mtdEliminarTodosRegistros($strNombreTabla){
			$strSQL = "DELETE * FROM $strNombreTabla; ";
			$this->mtdConectar();
			$objMySQL = $this->connection->query($strSQL);
			$this->mtdDesconectar();
			if($objMySQL === false){
				echo "";//Eliminación fallida. ";
				return false;
			}
			else{
				echo "";//Eliminación completa. ";//Sólo para pruebas, eliminar en despliegue.
				return true;
			}
		}
		
		/*
		 * Author: JMCL 
		 * Date: 12/09/2016
		 * Description: Método para eliminar un registro de una tabla por medio de su id.
		 * Parameters: $strNombreTabla, $strColumnaId, $intId
		 * Return: true || false
		 */
		public function mtdEliminarRegistroPorId($strNombreTabla, $strColumnaId, $ID){
			$strSQL = "DELETE FROM $strNombreTabla WHERE $strColumnaId = '{$ID}';";
			$this->mtdConectar();
			$objMySQL = $this->connection->query($strSQL);
			$this->mtdDesconectar();
			if($objMySQL === false){
				echo "";//Eliminación fallida. "; //Sólo para pruebas, eliminar en despliegue.
				return false;
			}
			else{
				echo "";//Eliminación completa. ";//Sólo para pruebas, eliminar en despliegue.
				return true;
			}
		}
		
		/*
		 * Author: JMCL
		 * Date: 13/09/2016
		 * Description: Método que soporta todos los tipo de consultas. Depende totalmente de los models para su correcto funcionamiento.
		 * 				Si se obtienen datos devuelve un array asociativo obtenido de un objeto de retorno de MySQL.
		 * 				Si es una eliminación o actualización devuelve valores booleanos que dependen del resultado de la operación.
		 * Parameters: $strSQL
		 * Return: $objResult || null || true || false
		 */
		public function mtdConsultaGenerica($strSQL){
			$this->mtdConectar();
			$objMySQL = $this->connection->query($strSQL);
			$this->mtdDesconectar();
			if(is_bool($objMySQL) === false){//Se valida si el resultado es un valor booleano 
				while($objArrayAssoc = $objMySQL->fetch_array(MYSQLI_BOTH))//Si la cadena viene mal, el programa caerá a partir de aquí. UNSUPPORT MEDIA TYPE.
					$this->objResult[] = $objArrayAssoc;
				if(!isset($this->objResult))
					return null;
				else
					return $this->objResult;
				$this->objResult = null;//Libera la variable global.
			}
			else{//Si es un booleano como resultado, debería entrar en esta parte				
				if($objMySQL === false)
					return false;
				elseif($objMySQL === true)
					return true;
				else
					return false;//Error inesperado
			}
		}
		
		/*
		 * Author: JMCL
		 * Date: 29/11/2016
		 * Description: Puede realizar cualquier consulta, pero su uso debe estar reservado para insertar un registro.
		 * 				Además retorna el id del registro recién creado o actualizado.
		 * Parameters: $strSQL
		 * Return: $lastID || false
		 */
		public function mtdLastIdRegistro($strSQL){
			$this->mtdConectar();
			$objMySQL = $this->connection->query($strSQL);
			$lastID = $this->connection->insert_id;
			$this->mtdDesconectar();
			if(is_bool($objMySQL) === false){
				while($objArrayAssoc = $objMySQL->fetch_array(MYSQLI_BOTH))
					$this->objResult[] = $objArrayAssoc;
				if(!isset($this->objResult)){
					echo "";//NOT FOUND: no hay resultados. ";
					return null;
				}
				else{
					echo "";//OK: se devolverán los resultados encontrados. ";
					return $this->objResult;
				}
				$this->objResult = null;
			}
			else{
				if($objMySQL === false){
					echo "";//Operacion fallida. ";
					return false;
				}
				else{
					echo "";//Operacion exitosa ".$lastID;
					return $lastID;
				}
			}
		}
		
		/*
		 * Author: JMCL
		 * Date: 13/09/2016
		 * Description: Método para truncar una tabla.
		 * Parameters: $strNombeTabla
		 * Return: true || false
		 */
		public function mtdTruncarTabla($strNombeTabla){
			$strSQL = "TRUNCATE TABLE $strNombeTabla;";
			$this->mtdConectar();
			$objMySQL = $this->connection->query($strSQL);
			$this->mtdDesconectar();
			if($objMySQL === false){
				echo "";//Operacion fallida.";
				return false;
			}
			else{
				echo "";//Operacion exitosa.";
				return true;
			}
		}
		
		/*
		 * Author: JMCL
		 * Date: 13/9/2016
		 * Description: ¡¡ATENCIÓN!! Éste método está maldito. Sirve para eliminar la base de datos de la faz de la existencia.
		 * 				Una vez ejecutado no habrá vuelta atrás. Aquel que por error lo invoque podrá morir misteriosamente o ser aporreado.
		 * Parameters: null
		 * Return: true || false
		 */
		public function mtdEliminarDB(){
			$strSQL = "DROP DATABASE sgac";
			$this->mtdConectar();
			$objMySQL = $this->connection->query($strSQL);
			$this->mtdDesconectar();
			if($objMySQL === false){
				echo "Operacion fallida. ";
				return false;
			}
			else{
				echo "Operacion exitosa. ";
				return true;
			}
		}
		
		/*
		 * DEBUG
		 * Author: JMCL
		 * Date: 13/09/2016
		 * Description: Método para crear la base de datos a partir de un script externo.
		 * Parameters: null
		 * Return: true || false
		 */
		public function mtdCrearDB(){
			$root = realpath($_SERVER["DOCUMENT_ROOT"]);
			include_once "$root/SGAC_v1.0/trunk/models/MySQL/sgac.php";
			$objSCRIPT = new SCRIPT();
			$strSQL = $objSCRIPT->getStrSQL();
			$this->connection = new mysqli(SERVER, USER);
			$this->objResult = $this->connection->query($strSQL);
			$this->mtdDesconectar();
			if($this->objResult === false){
				echo "LOGICAL ERROR: No se pudo";
				return false;
			}				
			else{
				echo "CREATION SUCCESSFUL: Si se pudo";
				return true;
			}
		}
	}
	
	//$objPrueba = new MySQL();
	//$objPrueba->mtdTruncarTabla("AVISOS");
	//$objPrueba->mtdConsultaGenerica("INSERT INTO CAMPUS (strNombreCampus, strDireccion, strNoTelefono) VALUES ('Zongolica', 'Pueees... en Zongolica, no?', '01 - 800- 20401134');");
	//$res = $objPrueba->mtdConsultaGenerica("SELECT (strNombreCampus, strNoTelefono) FROM campus WHERE intId = 1;");
	//$res = $objPrueba->mtdObtenerTodosRegistros("ALUMNOS");
	//foreach($res as $r){
	//	echo "<br> ID = $r[0]";
	//	echo "<br> CAMPUS = $r[1]";
	//	echo "<br> DIRECCIÓN = $r[2]";
	//	echo "<br> TELÉFONO = $r[3]";
	//	echo "<br>============================================";
	//}
	//$objPrueba->mtdVaciarDB();
	//$objPrueba->mtdEliminarDB()
	//$objPrueba->mtdEliminarRegistroPorId("campus", 2);
	//$objPrueba->mtdEliminarTodosRegistros("campus");
	//$objPrueba->mtdTruncarTabla("campus");
?>
<?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	//require_once "$root/SGAC_v1.0/trunk/models/MySQL/MySQL.php";
	require_once "187.217.117.12/MySQL.php";
	require_once "$root/SGAC_v1.0/trunk/models/General/cls_Mod_General.php";
	
	class cls_Mod_Administrador extends cls_Mod_General{
		
		#CONSTRUCTOR
		public function __construct(){
			define("TABLA_ADMINISTRADORES", "administradores");
			$this->objMySQL = new MySQL();
		}
		
		/*
		 * 
		 */
		public function mtdValidarAdministrador($strCURP, $intNIP){
			$strSQL = "SELECT * FROM ".TABLA_ADMINISTRADORES." WHERE strCURP = '{$strCURP}' AND intNIP = '{$intNIP}'";
			$this->objResult = $this->objMySQL->mtdConsultaGenerica($strSQL);
			return $this->objResult;
			$this->objResult = null;
		}
	}
?>
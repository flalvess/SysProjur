<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Procurador extends ObjectDB
 { 
	private $idUsuario;
	private $nome;
	
	function __construct()
	{
		parent::__construct();
	 } 
	
	public static function getInfoTable()
	 { 
			$table['tbprocurador'][] = "idUsuario";		
			$table['tbprocurador'][] = "nome";		
			return $table;		
	 } 
	
	public static function getAttributesKey()
	 { 
									$key[] = "idUsuario";	
					
							
						
		return $key;
	 } 
	
	final public static function getAttributeInc()
	 { 
									return "idUsuario";	
					
							
			 } 
	
	
		function setIdUsuario($idUsuario)
	 { 
				$this->checkForUpdateHashKey();
				self::checkModify( __FUNCTION__ );
		
		$this->idUsuario = $idUsuario;
	 } 
	
	public function getIdUsuario()
	 { 
		return $this->idUsuario;
	 } 
		function setNome($nome)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->nome = $nome;
	 } 
	
	public function getNome()
	 { 
		return $this->nome;
	 } 
	}

?>
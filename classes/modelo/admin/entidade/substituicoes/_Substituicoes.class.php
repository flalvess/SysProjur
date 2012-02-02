<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Impetrado extends ObjectDB
 { 
	private $idImpetrado;
	private $nome;
	private $sigla;
	private $status;
	
	function __construct()
	{
		parent::__construct();
	 } 
	
	public static function getInfoTable()
	 { 
			$table['tbimpetrado'][] = "idImpetrado";		
			$table['tbimpetrado'][] = "nome";		
			$table['tbimpetrado'][] = "sigla";		
			$table['tbimpetrado'][] = "status";		
			return $table;		
	 } 
	
	public static function getAttributesKey()
	 { 
									$key[] = "idImpetrado";	
					
							
							
							
						
		return $key;
	 } 
	
	final public static function getAttributeInc()
	 { 
									return "idImpetrado";	
					
							
							
							
			 } 
	
	
		function setIdImpetrado($idImpetrado)
	 { 
				$this->checkForUpdateHashKey();
				self::checkModify( __FUNCTION__ );
		
		$this->idImpetrado = $idImpetrado;
	 } 
	
	public function getIdImpetrado()
	 { 
		return $this->idImpetrado;
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
		function setSigla($sigla)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->sigla = $sigla;
	 } 
	
	public function getSigla()
	 { 
		return $this->sigla;
	 } 
		function setStatus($status)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->status = $status;
	 } 
	
	public function getStatus()
	 { 
		return $this->status;
	 } 
	}

?>
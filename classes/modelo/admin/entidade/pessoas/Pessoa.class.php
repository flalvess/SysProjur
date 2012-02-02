<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Pessoa extends ObjectDB
 { 
	private $idPessoa;
	private $nome;
	private $parte;
	private $status;
	
	function __construct()
	{
		parent::__construct();
	 } 
	
	public static function getInfoTable()
	 { 
			$table['tbpessoa'][] = "idPessoa";		
			$table['tbpessoa'][] = "nome";		
			$table['tbpessoa'][] = "parte";		
			$table['tbpessoa'][] = "status";		
			return $table;		
	 } 
	
	public static function getAttributesKey()
	 { 
									$key[] = "idPessoa";	
					
							
							
							
						
		return $key;
	 } 
	
	final public static function getAttributeInc()
	 { 
									return "idPessoa";	
					
							
							
							
			 } 
	
	
		function setIdPessoa($idPessoa)
	 { 
				$this->checkForUpdateHashKey();
				self::checkModify( __FUNCTION__ );
		
		$this->idPessoa = $idPessoa;
	 } 
	
	public function getIdPessoa()
	 { 
		return $this->idPessoa;
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
		function setParte($parte)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->parte = $parte;
	 } 
	
	public function getParte()
	 { 
		return $this->parte;
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
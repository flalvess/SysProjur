<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Substituicoes extends ObjectDB
 { 
	private $idSubstituicaoProcurador;
	private $processo;
	private $procuradorSubstituto;
       private $procuradorOriginal;
	private $temporaria;
	private $motivoSubstituicao;
	private $observacao;
	private $status;
	
	function __construct()
	{
		parent::__construct();
	 } 
	
	public static function getInfoTable()
	 { 
			$table['tbsubstituicao_procurador'][] = "idSubstituicaoProcurador";		
			$table['tbsubstituicao_procurador'][] = "processo";		
			$table['tbsubstituicao_procurador'][] = "procuradorSubstituto";
                     $table['tbsubstituicao_procurador'][] = "procuradorOriginal";		
			$table['tbsubstituicao_procurador'][] = "temporaria";		
			$table['tbsubstituicao_procurador'][] = "motivoSubstituicao";		
			$table['tbsubstituicao_procurador'][] = "observacao";		
			$table['tbsubstituicao_procurador'][] = "status";		
			return $table;		
	 } 
	
	public static function getAttributesKey()
	 { 
									$key[] = "idSubstituicaoProcurador";	
					
							
							
							
							
							
							
						
		return $key;
	 } 
	
	final public static function getAttributeInc()
	 { 
									return "idSubstituicaoProcurador";	
					
							
							
							
							
							
							
			 } 
	
	
		function setIdSubstituicaoProcurador($idSubstituicaoProcurador)
	 { 
				$this->checkForUpdateHashKey();
				self::checkModify( __FUNCTION__ );
		
		$this->idSubstituicaoProcurador = $idSubstituicaoProcurador;
	 } 
	
	public function getIdSubstituicaoProcurador()
	 { 
		return $this->idSubstituicaoProcurador;
	 } 
		function setProcesso($processo)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->processo = $processo;
	 } 
	
	public function getProcesso()
	 { 
		return $this->processo;
	 } 
		
        function setProcuradorSubstituto($procuradorSubstituto)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->procuradorSubstituto = $procuradorSubstituto;
	 } 
	
	public function getProcuradorSubstituto()
	 { 
		return $this->procuradorSubstituto;
	 } 
	
        
        function setProcuradorOriginal($procuradorOriginal)
	 { 
	       self::checkModify( __FUNCTION__ );
		
		$this->procuradorOriginal = $procuradorOriginal;
	 } 
	
	 public function getProcuradorOriginal()
	 { 
		return $this->procuradorOriginal;
	 } 
		
        function setTemporaria($temporaria)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->temporaria = $temporaria;
	 }

	public function getTemporaria()
	 { 
		return $this->temporaria;
	 } 
		function setMotivoSubstituicao($motivoSubstituicao)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->motivoSubstituicao = $motivoSubstituicao;
	 } 
	
	public function getMotivoSubstituicao()
	 { 
		return $this->motivoSubstituicao;
	 } 
		function setObservacao($observacao)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->observacao = $observacao;
	 } 
	
	public function getObservacao()
	 { 
		return $this->observacao;
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
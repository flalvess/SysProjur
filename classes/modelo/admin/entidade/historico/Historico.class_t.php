<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Historico extends ObjectDB
 { 
	private $idHistorico;
	private $numeroProcesso;
	private $procurador;
	private $dataHora;
	private $usuario;
	private $tipo;
	private $operacao;

	function __construct()
	{
		parent::__construct();
	 } 

	public static function getInfoTable()
	 { 
			$table['tbhistorico'][] = "idHistorico";		
			$table['tbhistorico'][] = "numeroProcesso";		
			$table['tbhistorico'][] = "procurador";		
			$table['tbhistorico'][] = "dataHora";		
			$table['tbhistorico'][] = "usuario";		
			$table['tbhistorico'][] = "tipo";
			$table['tbhistorico'][] = "operacao";
			return $table;
	 } 
	
	public static function getAttributesKey()
	 { 
									$key[] = "idHistorico";	
					
							
							
							
							
							
						
		return $key;
	 } 
	
	final public static function getAttributeInc()
	 { 
									return "idHistorico";	
					
							
							
							
							
							
			 } 
	
	
		function setIdHistorico($idHistorico)
	 { 
				$this->checkForUpdateHashKey();
				self::checkModify( __FUNCTION__ );
		
		$this->idHistorico = $idHistorico;
	 } 
	
	public function getIdHistorico()
	 { 
		return $this->idHistorico;
	 } 
		function setNumeroProcesso($numeroProcesso)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->numeroProcesso = $numeroProcesso;
	 } 
	
	public function getNumeroProcesso()
	 { 
		return $this->numeroProcesso;
	 } 
		function setProcurador($procurador)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->procurador = $procurador;
	 } 
	
	public function getProcurador()
	 { 
		return $this->procurador;
	 } 
		function setDataHora($dataHora)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->dataHora = $dataHora;
	 } 
	
	public function getDataHora()
	 { 
		return $this->dataHora;
	 } 
		function setUsuario($usuario)
	 { 
				self::checkModify( __FUNCTION__ );
		
		$this->usuario = $usuario;
	 } 
	
	public function getUsuario()
	 { 
		return $this->usuario;
	 } 
		function setTipo($tipo)
	 {
				self::checkModify( __FUNCTION__ );

		$this->tipo = $tipo;
	 }

	public function getTipo()
	 {
		return $this->tipo;
	 }
	}


    	function setOperacao($operacao)
	 {
				self::checkModify( __FUNCTION__ );

		$this->operacao = $operacao;
	 }

	public function getOperacao()
	 {
		return $operacao->operacao;
	 }
	}

?>
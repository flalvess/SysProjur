<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOPessoa extends DAOObjectDB
{
	function save(&$pessoa)
	{
		$pessoa->setStatus(1);
		
		parent::save($pessoa);
	}
	
	function update(&$pessoa)
	{
		parent::update($pessoa);
	}
	
	public function countTotal()
	{
		return DBUtil::countTable("tbpessoa");
	}

	public function mudaStatus($idPessoa, $novoStatus)
	{
		$dbCon = $this->getDbConn();

		$tabela = "tbpessoa";
		$records ['status'] = $novoStatus;
		$sql = DBUtil::getSqlUpdate($tabela, $records, "idPessoa = '{$idPessoa}'");

		try
		{
			$dbCon->query($sql);
			return true;
		} catch ( Exception $e )
		{
			return false;
		}
	}
	
	public function deleteFunc($idPessoa)
	{
		$dbCon = $this->getDbConn();
		
		$tabela = "tbpessoa";
		$records ['status'] = -1;
		
		$sql = DBUtil::getSqlUpdate($tabela, $records, "idPessoa = '{$idPessoa}'");
		
		try
		{
			$dbCon->query($sql);
			return true;
		} catch ( Exception $e )
		{
			return false;
		}
	}

	public static function getMapAutoComplete($nome)
	{
		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

		$sql = "SELECT distinct parte FROM tbpessoa WHERE parte LIKE '{$nome}%' ";
		//$sql = "SELECT distinct parte FROM tbpessoa ";

		$dbResult = $dbConn->query ( $sql );

		if ($dbResult->rowCount () > 0)
		{
			$array = $dbResult->getAllResult ();

			return $array;
		} else
		{
			return array ();
		}
	}

        public static function getMapAutoCompletePessoa($nome)
	{
		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

		$sql = "SELECT nome FROM tbpessoa WHERE nome LIKE '{$nome}%' and status = 1 ";
		//$sql = "SELECT distinct parte FROM tbpessoa ";

		$dbResult = $dbConn->query ( $sql );

		if ($dbResult->rowCount () > 0)
		{
			$array = $dbResult->getAllResult ();

			return $array;
		} else
		{
			return array ();
		}
	}



        public static function getPessoaId($pessoa)
	{
		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

		$sql = "SELECT tbpessoa.idPessoa FROM tbpessoa WHERE nome ='{$pessoa}'";

		$dbResult = $dbConn->query ( $sql );

		if ($dbResult->rowCount () > 0)
		{
			$array = $dbResult->getOneResult ();

			return $array['idPessoa'];
		} else
		{
			return array ();
		}
	}

	public static function getNomePessoaById($idPessoa)
	{
		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

		$sql = "SELECT * FROM tbpessoa WHERE idPessoa = {$idPessoa}";

		$dbResult = $dbConn->query ( $sql );

		if ($dbResult->rowCount () > 0)
		{
			$array = $dbResult->getOneResult ();

			return $array;
		} else
		{
			return array ();
		}
	}

     


}

?>

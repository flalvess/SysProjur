<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOHistorico extends DAOObjectDB
{
	function save(&$Historico)
	{
		//$Historico->setStatus(1);

		parent::save($Historico);
	}

	function update(&$Historico)
	{
		parent::update($Historico);
	}

	public function countTotal()
	{
		return DBUtil::countTable("tbHistorico");
	}

	public static function getNomeHistoricoById($idHistorico)
	{
		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

		$sql = "SELECT * FROM tbHistorico WHERE idHistorico = {$idHistorico}";

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
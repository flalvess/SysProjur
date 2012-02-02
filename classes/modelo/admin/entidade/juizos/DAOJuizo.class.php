<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOJuizo extends DAOObjectDB
{
	function save(&$juizo)
	{	
		parent::save($juizo);
	}
	
	function update(&$juizo)
	{
		parent::update($juizo);
	}
	
	public function countTotal()
	{
		return DBUtil::countTable("tbjuizo");
	}

        public static function getMapCidade()
	{

		$sql = "select tbcidade.* from tbcidade";

		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

		$dbResult = $dbConn->query ( $sql );

		if ($dbResult->rowCount () > 0)
		{
			$itens = $dbResult->getAllResult ();
			$result = array ();

			foreach ( $itens as $tmp )
			{
				$result [$tmp ['idCidade']] = $tmp ['nome'];
			}

			return $result;

		} else
		{
			return false;
		}
	}


	public static function getNomeJuizoById($idJuizo)
	{
		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

		$sql = "SELECT * FROM tbjuizo WHERE idJuizo = {$idJuizo}";

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

        public static function buscarCidade($idJuizo) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection();
        $sql = "select tbcidade.idCidade, tbcidade.nome
                from tbcidade inner join tbjuizo on tbcidade.idCidade = tbjuizo.fkCidade
                where tbjuizo.idJuizo = '{$idJuizo}'";
        $dbResult = $dbConn->query($sql);
        if ($dbResult->rowCount() > 0) {
            $array = $dbResult->getAllResult ();

            return $array;

        } else {
            return array();
        }
    }
	
}

?>

<?php
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';

class JuizoCidadeUtil
{
	public function validateRequest($rawRequest)
	{
		$controlValidation = new ValidationFacade ( );

		$controlValidation->addValidator ( new NoValidator ( "idCidade", "Falta informar a juizo." ) );
		$controlValidation->addValidator ( new StringNotEmptyValidator ( "idSelect", "Falta informar o select dos juizos" ) );
		$controlValidation->addValidator ( new StringNotEmptyValidator ( "arrayName", "Falta informar o nome do array." ) );

		$controlValidation->validate ( $rawRequest );

		return $controlValidation;
	}

	function getMapJuizos($idCidade)
	{
		$sql = "select tbjuizo.idJuizo, tbjuizo.nome from tbjuizo where tbjuizo.fkCidade='{$idCidade}' order by nome asc";

		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();
		$dbResult = $dbConn->query ( $sql );
		$itens = $dbResult->getAllResult ();

		$array = array ();

		if (count ( $itens ) > 0)
		{
			foreach ( $itens as $tmp )
			{
				$array [$tmp ['idJuizo']] = $tmp ['nome'];
			}
		}

		return $array;
	}

	function getMapCidade($value = "idCidade")
	{
		$sql = "select * from tbcidade order by tbcidade.nome asc";

		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();
		$dbResult = $dbConn->query ( $sql );
		$itens = $dbResult->getAllResult ();

		$array = array ();

		 foreach ( $itens as $tmp )
		{
			$array [$tmp [$value]] = $tmp ['nome'];
		}

		return $array;
	}

	function getInfoJuizoCidade($idJuizo)
	{
		$sql = "select tbjuizo.idJuizo, tbjuizo.fkCidade, tbjuizo.nome as nomeJuizo, tbcidade.nome as nomeCidade from tbjuizo
		inner join tbcidade on tbjuizo.fkCidade = tbcidade.idCidade
		where idCidade='{$idJuizo}'";

		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();
		$dbResult = $dbConn->query ( $sql );
		
		return $dbResult->getOneResult ();
	}
}

?>

<?php
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';

class CidadeEstadoUtil
{
	public function validateRequest($rawRequest)
	{
		$controlValidation = new ValidationFacade ( );
		
		$controlValidation->addValidator ( new NoValidator ( "idEstado", "Falta informar o Estado." ) );
		$controlValidation->addValidator ( new StringNotEmptyValidator ( "idSelect", "Falta informar o select das cidades" ) );
		$controlValidation->addValidator ( new StringNotEmptyValidator ( "arrayName", "Falta informar o nome do array." ) );

		$controlValidation->validate ( $rawRequest );

		return $controlValidation;
	}

	function getMapCidade($idEstado)
	{
		$sql = "select tbcidade.idCidade, tbcidade.nome from tbcidade where tbcidade.fkEstado='{$idEstado}' order by nome asc";

		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();
		$dbResult = $dbConn->query ( $sql );
		$itens = $dbResult->getAllResult ();

		$array = array ();

		if (count ( $itens ) > 0)
		{
			foreach ( $itens as $tmp )
			{
				$array [$tmp ['idCidade']] = $tmp ['nome'];
			}
		}

		return $array;
	}

	function getMapEstado($value = "idEstado")
	{
		$sql = "select * from tbestado order by tbestado.nome asc";

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
	
	function getInfoCidadeEstado($idCidade)
	{
		$sql = "select tbcidade.idCidade, tbcidade.idEstado, tbcidade.nome as nomeCidade, tbestado.nome as nomeEstado, tbestado.sigla from tbcidade
		inner join tbestado on tbcidade.fkEstado = tbestado.idEstado
		where idCidade='{$idCidade}'";
		
		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();
		$dbResult = $dbConn->query ( $sql );
		
		return $dbResult->getOneResult ();
	}
}

?>

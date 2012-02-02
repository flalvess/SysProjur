<?php
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/modelo/admin/entidade/procurador/DAOProcurador.class.php';

class GestaoProcurador
{

	public static function validateReqCompProcurador($rawRequest)
	{
		$controlValidation = new ValidationFacade ( );

		$controlValidation->addValidator ( new StringNotEmptyValidator ( "q", "" ) );

		$controlValidation->validate ( $rawRequest );

		return $controlValidation;
	}

}

?>

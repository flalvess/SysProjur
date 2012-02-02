<?php
require_once 'classes/modelo/admin/entidade/procurador/DAOProcurador.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/procurador/GestaoProcurador.class.php';
require_once 'classes/base/controle/AjaxTextResponse.class.php';

class AutoCompleteProcuradorAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxTextResponse ( );

		$rawRequest = $this->getRequest ();

		$controlValidation = GestaoProcurador::validateReqCompProcurador ( $rawRequest );

		if ($controlValidation->isValid ())
		{
			$cleanRequest = $controlValidation->getCleanRequest ();

			$lista = DAOProcurador::getMapAutoComplete ( $cleanRequest->get ( 'q' ) );

			if (count ( $lista ) > 0)
			{
				foreach ( $lista as $id => $nome )
				{
					$response->addTxt ( "{$nome['nome']}|{$nome['idUsuario']}" );
				}
			}
		}

		$this->setResponse ( $response );
	}
}

?>

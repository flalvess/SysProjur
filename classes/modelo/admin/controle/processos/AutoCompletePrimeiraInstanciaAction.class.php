<?php
require_once 'classes/modelo/admin/entidade/processos/DAOPrimeiraInstancia.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoPrimeiraInstancia.class.php';
require_once 'classes/base/controle/AjaxTextResponse.class.php';

class AutoCompletePrimeiraInstanciaAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxTextResponse ( );

		$rawRequest = $this->getRequest ();

		$controlValidation = GestaoPrimeiraInstancia::validateReqCompPrimeiraInstancia ( $rawRequest );

		if ($controlValidation->isValid ())
		{
			$cleanRequest = $controlValidation->getCleanRequest ();

			$lista = DAOPrimeiraInstancia::getMapAutoComplete ( $cleanRequest->get ( 'q' ) );

			if (count ( $lista ) > 0)
			{
				foreach ( $lista as $id => $numero )
				{
					$response->addTxt ( "{$numero['numeroProcesso']}|{$numero['idPrimeiraInstancia']}" );
				}
			}
		}

		$this->setResponse ( $response );
	}
}

?>

<?php
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';
require_once 'classes/base/controle/AjaxTextResponse.class.php';

class AutoCompleteProcessosAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxTextResponse ( );

		$rawRequest = $this->getRequest ();

		$controlValidation = GestaoProcessos::validateReqCompProcessos( $rawRequest );

		if ($controlValidation->isValid ())
		{
			$cleanRequest = $controlValidation->getCleanRequest ();

			$lista = DAOProcesso::getMapAutoComplete ( $cleanRequest->get ( 'q' ) );

			if (count ( $lista ) > 0)
			{
				foreach ( $lista as $id => $numero )
				{
					$response->addTxt ( "{$numero['numeroProcesso']} | {$numero['idProcesso']}" );
				}
			}
		}

		$this->setResponse ( $response );
	}
}

?>

<?php
require_once 'classes/modelo/admin/entidade/assunto/DAOAssunto.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/assunto/GestaoAssunto.class.php';
require_once 'classes/base/controle/AjaxTextResponse.class.php';

class AutoCompleteAssuntoAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxTextResponse ( );

		$rawRequest = $this->getRequest ();

		$controlValidation = GestaoAssunto::validateReqCompAssunto ( $rawRequest );

		if ($controlValidation->isValid ())
		{
			$cleanRequest = $controlValidation->getCleanRequest ();

			$lista = DAOAssunto::getMapAutoComplete ( $cleanRequest->get ( 'q' ) );

			if (count ( $lista ) > 0)
			{
				foreach ( $lista as $id => $nome )
				{
					$response->addTxt ( "{$nome['assunto']}|{$nome['assunto']}" );
					//$response->addTxt ( "{$nome['assunto']}|1" );
				}
			}
		}

		$this->setResponse ( $response );
	}
}

?>

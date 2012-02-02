<?php
require_once 'classes/modelo/admin/entidade/impetrados/DAOImpetrado.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/impetrados/GestaoImpetrados.class.php';
require_once 'classes/base/controle/AjaxTextResponse.class.php';

class AutoCompleteImpetradosAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxTextResponse ( );

		$rawRequest = $this->getRequest ();

		$controlValidation = GestaoImpetrados::validateReqCompImpetrados( $rawRequest );

		if ($controlValidation->isValid ())
		{
			$cleanRequest = $controlValidation->getCleanRequest ();

			$lista = DAOImpetrado::getMapAutoComplete ( $cleanRequest->get ( 'q' ) );

			if (count ( $lista ) > 0)
			{
				foreach ( $lista as $id => $numero )
				{
					$response->addTxt ( "{$numero['nome']} | {$numero['idImpetrado']}" );
				}
			}
		}

		$this->setResponse ( $response );
	}
}

?>

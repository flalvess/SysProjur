<?php
require_once 'classes/modelo/admin/interface/impetrados/TelaCadCarregarImpetrado.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';

class InitCadCarregamentoAction extends AbstractAction
{
	public function execute()
	{
		$response	= new AjaxResponse();

		$tela = new TelaCadCarregarImpetrado();
		$tela->processAssign();
				
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Carregar impetrados");

		$this->setResponse($response);
	}
}

?>
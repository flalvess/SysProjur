<?php
require_once 'classes/modelo/admin/interface/cidades/TelaCadCidade.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';

class InitCadCidadeAction extends AbstractAction
{
	public function execute()
	{
		$response	= new AjaxResponse();

		$tela = new TelaCadCidade();
		$tela->processAssign();
				
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Cadastro de Cidades");
		$response->addScript("FormUtil.initForm('formSaveCidade')");

		$this->setResponse($response);
	}
}

?>
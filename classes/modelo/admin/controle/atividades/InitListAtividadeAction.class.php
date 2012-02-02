<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/atividades/TelaListAtividade.class.php';

class InitListAtividadeAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$tela = new TelaListAtividade();
		$tela->processAssign();
		
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Listagem de Atividades");
		$response->addScript("FormUtil.initForm('formListAtividade')");
		$response->addScript("GestaoAtividade.execList()");

		$this->setResponse($response);
	}
}

?>
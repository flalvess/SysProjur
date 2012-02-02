<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/atividades/TelaListAtividadeEnv.class.php';

class InitListEnvAtividadeAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$tela = new TelaListAtividadeEnv();
		$tela->processAssign();
		
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Atividades Enviadas");
		$response->addScript("FormUtil.initForm('formListAtividade')");
		$response->addScript("GestaoAtividadeEnv.execListEnv()");

		$this->setResponse($response);
	}
}

?>
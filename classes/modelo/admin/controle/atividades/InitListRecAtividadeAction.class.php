<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/atividades/TelaListAtividadeRec.class.php';

class InitListRecAtividadeAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();

		$tela = new TelaListAtividadeRec();
		$tela->processAssign();
		
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Atividades Recebidas");
		$response->addScript("FormUtil.initForm('formListAtividade')");
		$response->addScript("GestaoAtividadeRec.execListRec()");

		$this->setResponse($response);
	}
}

?>
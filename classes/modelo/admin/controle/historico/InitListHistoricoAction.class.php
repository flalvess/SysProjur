<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/Historico/TelaListHistorico.class.php';

class InitListHistoricoAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$tela = new TelaListHistorico();
		$tela->processAssign();
		
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Listagem de Historicos");
		$response->addScript("FormUtil.initForm('formListHistorico')");
		$response->addScript("GestaoHistorico.execList()");
		
		$this->setResponse($response);
	}
}

?>
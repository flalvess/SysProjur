<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/pessoas/TelaListPessoas.class.php';

class InitListPessoaAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$tela = new TelaListPessoas();
		$tela->processAssign();
		
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Listagem de Pessoas");
		$response->addScript("FormUtil.initForm('formListPessoa')");
		$response->addScript("GestaoPessoas.execList()");
		
		$this->setResponse($response);
	}
}

?>
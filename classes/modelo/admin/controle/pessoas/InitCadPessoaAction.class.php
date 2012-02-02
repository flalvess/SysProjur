<?php
require_once 'classes/modelo/admin/interface/pessoas/TelaCadPessoa.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';

class InitCadPessoaAction extends AbstractAction
{
	public function execute()
	{
		$response	= new AjaxResponse();

		$tela = new TelaCadPessoa();
		$tela->processAssign();
				
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Cadastro de Pessoas");
		$response->addScript("FormUtil.initForm('formSavePessoa')");
                $response->addScript("GestaoPessoas.initAutoCompletePartes('#formSavePessoa_pessoa','#formSavePessoa_parte')" );

		$this->setResponse($response);
	}
}

?>
<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/substituicoes/TelaListSubstituicoes.class.php';

class InitListSubstituicoesAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$tela = new TelaListSubstituicoes();
		$tela->processAssign();
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Listagem de Substituições");
		$response->addScript("FormUtil.initForm('formListSubstituicoes')");
		$response->addScript("GestaoSubstituicoes.execList()");
              $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios('#formListSubstituicoes_substituicaoId','#formListSubstituicoes_substituicao')" );
		
		$this->setResponse($response);
	}
}

?>
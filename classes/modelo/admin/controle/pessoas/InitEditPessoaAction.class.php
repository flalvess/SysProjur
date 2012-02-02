<?php
require_once 'classes/modelo/admin/entidade/pessoas/Pessoa.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/pessoas/GestaoPessoas.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/pessoas/TelaCadPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';

class InitEditPessoaAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoPessoas::validateRequestInitAlt($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			$idPessoa = $cleanRequest->get("idPessoa");
			
			$dao = new DAOPessoa();
			$pessoa = new Pessoa();
			
			$pessoa->setIdPessoa($idPessoa);

			$dao->load($pessoa);
			
			if ($pessoa->isLoaded())
			{
				$tela = new TelaCadPessoa();
				$tela->setDados($dao->toArray($pessoa));
				$tela->processAssign();
				
				$response->addAssign("tela", "innerHTML", $tela->getHTML());
				$response->addAssign("tituloTela", "innerHTML", "Ediчуo de Pessoas");
				$response->addScript("FormUtil.initForm('formSavePessoa')");
                                $response->addScript("GestaoPessoas.initAutoCompletePartes('#formSavePessoa_pessoa','#formSavePessoa_parte')" );
			} else
			{
				$msg = "O funcionсrio informado para alteraчуo nуo foi encontrado. Recomece do inicio.";
				$response->addScript( "js.promptMenssage('Alteraчуo de Pessoas','{$msg}',true)");
			}
		} else
		{
			$msg = "Algumas informaчѕes necessсrias para alterar um usuсrio foram informadas incorretamente. Recomece do inicio.";
			$response->addScript( "js.promptMenssage('Alteraчуo de Pessoas','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
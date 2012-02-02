<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/controle/pessoas/GestaoPessoas.class.php';

class MudaStatusPessoaAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoPessoas::validateRequestMudaStatus($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			$id = $cleanRequest->get("idPessoa");
			$status = $cleanRequest->get("status");
			$result = GestaoPessoas::mudaStatus($id, $status);
			if ($result ['ok'])
			{
				$response->addScript("GestaoPessoas.refreshLinkStatus({$id}, {$status})");
			} else
			{
				$msg = "Falha ao alterar o status deste usu�rios.";
				$response->addScript( "js.promptMenssage('Mudan�a de Status dos Pessoas','{$msg}',true)");
			}
		} else
		{
			$msg = "Algumas informa��es necess�rias para alterar este status n�o foram informadas corretamente.";
			$response->addScript( "js.promptMenssage('Mudan�a de Status dos Pessoas','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>

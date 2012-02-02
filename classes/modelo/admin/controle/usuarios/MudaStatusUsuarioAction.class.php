<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/controle/usuarios/GestaoUsuarios.class.php';

class MudaStatusUsuarioAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoUsuarios::validateRequestMudaStatus($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			$id = $cleanRequest->get("idUsuario");
			$status = $cleanRequest->get("status");
			$result = GestaoUsuarios::mudaStatus($id, $status);
			if ($result ['ok'])
			{
				$response->addScript("GestaoUsuarios.refreshLinkStatus({$id}, {$status})");
			} else
			{
				$msg = "Falha ao alterar o status deste usu�rios.";
				$response->addScript("TelaPrincipal.showMsgAlerta({titulo:'Mudan�a de Status dos Usu�rios', texto:'{$msg}'})");
			}
		} else
		{
			$msg = "Algumas informa��es necess�rias para alterar este status n�o foram informadas corretamente.";
			$response->addScript("TelaPrincipal.showMsgAlerta({titulo:'Mudan�a de Status dos Usu�rios', texto:'{$msg}'})");
		}
		
		$this->setResponse($response);
	}
}

?>

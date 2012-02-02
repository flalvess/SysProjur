<?php
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/controle/usuarios/GestaoUsuarios.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/entidade/controle_acesso/DAOCasoDeUso.class.php';

class UpdateFluxosAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoUsuarios::validateRequestPermissoes($rawRequest, "fluxos");
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			$idUsuario = $cleanRequest->get("idUsuario");
			$fluxos = $cleanRequest->get("fluxos");
			
			try
			{
				DAOCasoDeUso::updateFluxos($idUsuario, $fluxos);
				$response->addScript ( "js.promptMenssage('Permiss�es de Usuarios','Atualiza��o conclu�da com sucesso',false)");
			} catch ( Exception $e )
			{
				$response->addScript ( "js.promptMenssage('Permiss�es de Usuarios','Falha ao atualizar os m�dulos para este usu�rio. Tente mais tarde',true)");
			}
		} else
		{
			$msg = $controlValidation->getErrosAsString();
			$response->addScript ( "js.promptMenssage('Permiss�es de Usuarios','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
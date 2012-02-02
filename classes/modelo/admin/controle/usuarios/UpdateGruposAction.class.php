<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/controle/usuarios/GestaoUsuarios.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/DAOTipoDistribuicao.class.php';

class UpdateGruposAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoUsuarios::validateRequestPermissoes($rawRequest, "grupos");
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			$idUsuario = $cleanRequest->get("idUsuario");
			$grupos = $cleanRequest->get("grupos");
			
			try
			{
				DAOGrupo::updateGrupos($idUsuario, $grupos);
                                if($grupos == 1 || $grupos == 3 ){
                                    DAOTipoDistribuicao::InsertAssuntoDefault($idUsuario);
                                }
				$response->addScript ( "js.promptMenssage('Permissões de Usuarios','Atualização concluída com sucesso',false)");
				
			} catch ( Exception $e )
			{
				$response->addScript ( "js.promptMenssage('Permissões de Usuarios','Falha ao atualizar os grupos para este usuário. Tente mais tarde',true)");
			}
		} else
		{
			$msg = $controlValidation->getErrosAsString();
			$response->addScript ( "js.promptMenssage('Permissões de Usuarios','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
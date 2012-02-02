<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/usuarios/GestaoUsuarios.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecDelUsuariosAction extends AbstractAction
{
	public function execute()
	{
		$response = new FormErrorResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoUsuarios::validateRequestDel($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			
			$idUsuarios = $cleanRequest->get("idUsuarios");
			$idUsuarios = (count($idUsuarios) > 0) ? $idUsuarios : array ( );
			
			try
			{
				foreach ( $idUsuarios as $id )
				{
					GestaoUsuarios::deleteUser($id);
				}
				$msg = "Usu�rio(s) deletado(s) com sucesso.";
				$response->addScript( "js.promptMenssage('Exclus�o de Usu�rios','{$msg}',false)");
				$response->addScript("GestaoUsuarios.initList()");
			} catch ( Exception $e )
			{
				$msg = "Falha ao excluir alguns usu�rios. Recomece do Inicio.";
				$response->addScript( "js.promptMenssage('Exclus�o de Usu�rios','{$msg}',true)");
			}
		} else
		{
			$msg = "Algumas informa��es necess�rias para excluir usu�rios n�o foram informadas corretamente. Recomece do inicio.";
			$response->addScript( "js.promptMenssage('Exclus�o de Usu�rios','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
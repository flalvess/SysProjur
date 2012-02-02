<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/atividades/GestaoAtividade.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecDelAtividadeAction extends AbstractAction
{
	public function execute()
	{
		$response = new FormErrorResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoAtividade::validateRequestDel($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			
			$idAtividade = $cleanRequest->get("idAtividade");
			$idAtividade = (count($idAtividade) > 0) ? $idAtividade : array ( );
			
			try
			{
				foreach ( $idAtividade as $id )
				{
					GestaoAtividade::deleteAtividade($id);
				}
				$msg = "Usuário(s) deletado(s) com sucesso.";
				$response->addScript( "js.promptMenssage('Exclusão de Atividade','{$msg}',false)");
				$response->addScript( "GestaoAtividade.initList()");
			} catch ( Exception $e )
			{
				$msg = "Falha ao excluir alguns usuários. Recomece do Inicio.";
				$response->addScript( "js.promptMenssage('Exclusão de Atividade','{$msg}',true)");
			}
		} else
		{
			$msg = "Algumas informações necessárias para excluir usuários não foram informadas corretamente. Recomece do inicio.";
			$response->addScript( "js.promptMenssage('Exclusão de Atividade','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
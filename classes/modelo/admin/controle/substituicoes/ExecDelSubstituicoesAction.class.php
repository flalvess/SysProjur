<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/Substituicoes/GestaoSubstituicoes.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecDelSubstituicoesAction extends AbstractAction
{
	public function execute()
	{
		$response = new FormErrorResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoSubstituicoes::validateRequestDel($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			
			$idSubstituicoes = $cleanRequest->get("idSubstituicoes");
			$idSubstituicoes = (count($idSubstituicoes) > 0) ? $idSubstituicoes : array ( );
			
			try
			{
				foreach ( $idSubstituicoes as $id )
				{
					GestaoSubstituicoes::deleteFunc($id);
				}
				$msg = "Substituição(ões) deletado(s) com sucesso.";
				$response->addScript( "js.promptMenssage('Exclusão de Substituições','{$msg}',false)");
				$response->addScript( "GestaoSubstituicoes.initList()");
			} catch ( Exception $e )
			{
				$msg = "Falha ao excluir alguns usuários. Recomece do Inicio.";
				$response->addScript( "js.promptMenssage('Exclusão de Substituições','{$msg}',true)");
			}
		} else
		{
			$msg = "Algumas informações necessárias para excluir usuários não foram informadas corretamente. Recomece do inicio.";
			$response->addScript( "js.promptMenssage('Exclusão de Substituições','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
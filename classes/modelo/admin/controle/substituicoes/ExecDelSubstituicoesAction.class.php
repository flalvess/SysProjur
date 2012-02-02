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
				$msg = "Substitui��o(�es) deletado(s) com sucesso.";
				$response->addScript( "js.promptMenssage('Exclus�o de Substitui��es','{$msg}',false)");
				$response->addScript( "GestaoSubstituicoes.initList()");
			} catch ( Exception $e )
			{
				$msg = "Falha ao excluir alguns usu�rios. Recomece do Inicio.";
				$response->addScript( "js.promptMenssage('Exclus�o de Substitui��es','{$msg}',true)");
			}
		} else
		{
			$msg = "Algumas informa��es necess�rias para excluir usu�rios n�o foram informadas corretamente. Recomece do inicio.";
			$response->addScript( "js.promptMenssage('Exclus�o de Substitui��es','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
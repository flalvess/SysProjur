<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/movimentacoes/GestaoMovimentacao.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecDelMovimentacaoAction extends AbstractAction
{
	public function execute()
	{
		$response = new FormErrorResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoMovimentacao::validateRequestDel($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			
			$idMovimentacao = $cleanRequest->get("idMovimentacao");
                        $idProcesso = DAOMovimentacao::buscarFkProcesso($idMovimentacao[0]);
			$idMovimentacao = (count($idMovimentacao) > 0) ? $idMovimentacao : array ( );
			
			try
			{
				foreach ( $idMovimentacao as $id )
				{
					GestaoMovimentacao::deleteMovimentacao($id);
				}
				$msg = "Usu�rio(s) deletado(s) com sucesso.";
				$response->addScript( "js.promptMenssage('Exclus�o de Movimentacao','{$msg}',false)");
                                $response->addScript( "GestaoProcessos.openProcesso($idProcesso)");
			} catch ( Exception $e )
			{
				$msg = "Falha ao excluir alguns usu�rios. Recomece do Inicio.";
				$response->addScript( "js.promptMenssage('Exclus�o de Movimentacao','{$msg}',true)");
			}
		} else
		{
			$msg = "Algumas informa��es necess�rias para excluir usu�rios n�o foram informadas corretamente. Recomece do inicio.";
			$response->addScript( "js.promptMenssage('Exclus�o de Movimentacao','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
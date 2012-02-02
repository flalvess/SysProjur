<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/pessoas/GestaoPessoas.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecDelPessoasAction extends AbstractAction
{
	public function execute()
	{
		$response = new FormErrorResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoPessoas::validateRequestDel($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			
			$idPessoas = $cleanRequest->get("idPessoas");
			$idPessoas = (count($idPessoas) > 0) ? $idPessoas : array ( );
			
			try
			{
				foreach ( $idPessoas as $id )
				{
					GestaoPessoas::deleteFunc($id);
				}
				$msg = "Usu�rio(s) deletado(s) com sucesso.";
				$response->addScript( "js.promptMenssage('Exclus�o de Funcion�rios','{$msg}',false)");
				$response->addScript( "GestaoPessoas.initList()");
			} catch ( Exception $e )
			{
				$msg = "Falha ao excluir alguns usu�rios. Recomece do Inicio.";
				$response->addScript( "js.promptMenssage('Exclus�o de Funcion�rios','{$msg}',true)");
			}
		} else
		{
			$msg = "Algumas informa��es necess�rias para excluir usu�rios n�o foram informadas corretamente. Recomece do inicio.";
			$response->addScript( "js.promptMenssage('Exclus�o de Funcion�rios','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
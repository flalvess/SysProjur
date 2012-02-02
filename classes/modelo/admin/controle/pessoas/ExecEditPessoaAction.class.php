<?php
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/controle/pessoas/GestaoPessoas.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/Pessoa.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';

class ExecEditPessoaAction extends AbstractAction
{
	public function execute()
	{
		$response = new FormErrorResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoPessoas::validateRequestCad($rawRequest,true);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
						
			$pessoa = new Pessoa();
			
			$pessoa->setIdPessoa($cleanRequest->get('idPessoa'));
			$pessoa->setNome($cleanRequest->get('nome'));
			//$pessoa->setParte($cleanRequest->get('parte'));


			try
			{
				$daoPessoa = new DAOPessoa();
				$daoPessoa->update($pessoa);								
											
				$response->addScript("FormUtil.resetErrors('{$rawRequest->getFormId()}')");
				$msg = "Altera��o conclu�da com sucesso.";
				$response->addScript( "js.promptMenssage('Altera��o de Funcion�rios','{$msg}',false)");
				$response->addScript( "GestaoPessoas.initList()");
			} catch ( Exception $e )
			{
				$msg = "A altera��o deste usu�rio n�o p�de ser conclu�da. Recomece do inicio.";
				$response->addScript( "js.promptMenssage('Altera��o de Funcion�rios','{$msg}',true)");
			}
		} else
		{
			$response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
		}
		
		$this->setResponse($response);
	}
}

?>
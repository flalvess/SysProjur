<?php
require_once 'classes/modelo/admin/controle/pessoas/GestaoPessoas.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/Pessoa.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';

class ExecCadPessoaAction extends AbstractAction
{
	public function execute()
	{
		$response = new FormErrorResponse();

		$rawRequest = $this->getRequest();

		$controlValidation = GestaoPessoas::validateRequestCad($rawRequest);

		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();

			$pessoa = new Pessoa();

			$pessoa->setNome($cleanRequest->get('nome'));
			//$pessoa->setParte($cleanRequest->get('parte'));

			$daoPessoa = new DAOPessoa();

			try
			{
				$dbConn = $daoPessoa->getDbConn();
				$dbConn->beginTrans();

				$daoPessoa->save($pessoa);

				$dbConn->commitTrans();

				$msg = "Cadastro concluído com sucesso.";
				$response->addScript( "FormUtil.resetErrors('{$rawRequest->getFormId()}')");
				$response->addScript( "js.promptMenssage('Cadastro de Pessoas','{$msg}',false)");
				$response->addScript( "GestaoPessoas.initList()");

			} catch ( Exception $e )
			{
				$dbConn->rollBackTrans();
				$msg = "O cadastro deste usuário não pôde ser concluído. Recomece do inicio.";
				$response->addScript( "js.promptMenssage('Cadastro de Pessoas','{$msg}',true)");
			}
		} else
		{
			$response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
		}

		$this->setResponse($response);
	}
}

?>
<?php
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/controle/substituicoes/GestaoSubstituicoes.class.php';
require_once 'classes/modelo/admin/entidade/substituicoes/Substituicoes.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/substituicoes/DAOSubstituicoes.class.php';
require_once 'classes/modelo/admin/entidade/processos/Processo.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';

class ExecEditSubstituicoesAction extends AbstractAction
{
	public function execute()
	{
		$response = new FormErrorResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoSubstituicoes::validateRequestCad($rawRequest,true);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
						
			$substituicoes = new Substituicoes();
			
			$substituicoes->setIdSubstituicaoProcurador($cleanRequest->get('idSubstituicoes'));
			//$substituicoes->setNome($cleanRequest->get('nome'));
			//$substituicoes->setSigla($cleanRequest->get('sigla'));
                     $substituicoes->setProcuradorSubstituto($cleanRequest->get('fkUsuario'));
                     $substituicoes->setProcuradorOriginal($cleanRequest->get('fkUsuarioOriginal'));
            		$substituicoes->setTemporaria($cleanRequest->get('temporaria'));
            		if($cleanRequest->get('temporaria')=="s") {
                		$substituicoes->setMotivoSubstituicao($cleanRequest->get('motivo'));
                		$substituicoes->setObservacao($cleanRequest->get('obs'));
            		}
            		else if($cleanRequest->get('temporaria')=="n") {
                		$substituicoes->setMotivoSubstituicao("");
                		$substituicoes->setObservacao("");
            		}
           
            		$substituicoes->setStatus(1);


			try
			{
				$daoSubstituicoes = new DAOSubstituicoes();
				$daoSubstituicoes->update($substituicoes);

                            $processo = new Processo();
                		$daoProcesso = new DAOProcesso();

                		$processo->setIdProcesso($cleanRequest->get('processo'));
                		$processo->setFkUsuario($cleanRequest->get('fkUsuario'));
          
                		$daoProcesso->update($processo); 
											
				$response->addScript("FormUtil.resetErrors('{$rawRequest->getFormId()}')");
				$msg = "Altera��o conclu�da com sucesso.";
				$response->addScript( "js.promptMenssage('Altera��o de Funcion�rios','{$msg}',false)");
				$response->addScript( "GestaoSubstituicoes.initList()");
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
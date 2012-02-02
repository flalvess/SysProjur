<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/atividades/GestaoAtividade.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/atividades/TelaCadAtividade.class.php';
require_once 'classes/modelo/admin/entidade/atividades/DAOAtividade.class.php';
require_once 'classes/modelo/admin/entidade/atividades/Atividade.class.php';

class InitEditAtividadeAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoAtividade::validateRequestInitAlt($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			$idAtividade = $cleanRequest->get("idAtividade");
			
			$dao = new DAOAtividade();
			$atividade = new Atividade();

			$atividade->setIdAtividade($idAtividade);

			$dao->load($atividade);
			
			if ($atividade->isLoaded())
			{
				
				$tela = new TelaCadAtividade();
				$tela->setDados($dao->toArray($atividade));
				$tela->processAssign();

				$response->addAssign("tela", "innerHTML", $tela->getHTML());
				$response->addAssign("tituloTela", "innerHTML", "Atividade Aberta");
				$response->addScript("FormUtil.initForm('formSaveAtividade')");
                                $response->addScript("GestaoAtividade.reset()" );
                                $response->addScript("GestaoAtividade.uploadAtividade()" );
	
			} else
			{
				$msg = "O processo informado para alteraчуo nуo foi encontrado. Recomece do inicio.";
				$response->addScript( "js.promptMenssage('Alteraчуo de Atividade','{$msg}',true)");
			}
		} else
		{
			$msg = "Algumas informaчѕes necessсrias para alterar um usuсrio foram informadas incorretamente. Recomece do inicio.";
			$response->addScript( "js.promptMenssage('Alteraчуo de Atividade','{$msg}',true)");
		}
		
		$this->setResponse($response);
	}
}

?>
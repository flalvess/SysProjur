<?php
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/base/controle/validacao/LoginValidator.class.php';
require_once 'classes/base/controle/validacao/SenhaValidator.class.php';
require_once 'classes/base/controle/validacao/NoValidator.class.php';

class FazerLoginAction extends AbstractAction
{
	public function execute()
	{
		$response	= new AjaxResponse();
		$rawRequest	= $this->getRequest();

		$controlValidation = new ValidationFacade();

		$controlValidation->addValidator(new LoginValidator("login", "Este login � inv�lido"));
		$controlValidation->addValidator(new SenhaValidator("senha", "Esta senha � inv�lida"));
		$controlValidation->addValidator(new NoValidator("lembrar"));

		$controlValidation->validate($rawRequest);

		if ($controlValidation->isValid())
		{
			$cleanRequest	= $controlValidation->getCleanRequest();

			$lembrar = false;
			if ($cleanRequest->get('lembrar') == "1") {
				$lembrar = true;
			}

			$resultado		= ControleAcesso::entrarSistema($cleanRequest->get('login'), $cleanRequest->get('senha'), $lembrar);
                      
                     //$response->addAlert("teste"); 
			
                     switch ($resultado)
			{
				case ControleAcesso::ENTRADA_OK:
					$response->addRedirect("admin.php");
					//$response->addScript ( "ControleAcesso.iniIndex()" );
					break;
				case ControleAcesso::SEM_FLUXOS:
					$response->addScript ( "js.promptMenssage('Controle de Acesso','Voc� foi autenticado mas n�o lhe foi dado nenhum privil�gio dentro do sistema. Entre em contato com o administrador.',true)");
					break;
				case ControleAcesso::LOGIN_ERRO:
					$response->addScript ( "js.promptMenssage('Controle de Acesso','Acoteceu um erro inesperado durante a autentica��o. Tente novamente mais tarde.',true)");
					break;
				default:
					$response->addScript ( "js.promptMenssage('Controle de Acesso','Acoteceu um erro inesperado durante a autentica��o. Tente novamente mais tarde.',true)");
					break;
			}
		}
		else
		{
			$response->addScript ( "js.promptMenssage('Controle de Acesso','Voc� n�o foi autenticado.',true)");
		}

		$this->setResponse($response);
	}
}

?>
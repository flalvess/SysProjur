<?php
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';
require_once 'classes/modelo/admin/controle/usuarios/GestaoUsuarios.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOUsuario.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/Usuario.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';

class ExecCadUsuarioAction extends AbstractAction
{
	public function execute()
	{
		$response = new FormErrorResponse();
		
		$rawRequest = $this->getRequest();
		
		$controlValidation = GestaoUsuarios::validateRequestCad($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			
			$usuario = new Usuario();
			$usuarioInfo = new UsuarioInfo();
			
			$usuario->setLogin($cleanRequest->get('login'));
			$usuario->setSenha($cleanRequest->get('senha'));
                         $usuario->setAfastamento("N�o");
			
			$usuarioInfo->setNome($cleanRequest->get('nome'));
			$usuarioInfo->setEmail($cleanRequest->get('email'));
			
			$daoUsuario = new DAOUsuario();
			$daoInfo = new DAOObjectDB();
			
			try
			{
				$dbConn = $daoUsuario->getDbConn();
				$dbConn->beginTrans();
				
				$daoUsuario->save($usuario);
				
				$usuarioInfo->setIdUsuario($usuario->getIdUsuario());
				
				$daoInfo->save($usuarioInfo);
				
				$dbConn->commitTrans();

				$msg = "Cadastro conclu�do com sucesso.";
				$response->addScript("FormUtil.resetErrors('{$rawRequest->getFormId()}')");
				$response->addScript( "js.promptMenssage('Cadastro de Usu�rios','{$msg}',false)");
				$response->addScript("GestaoUsuarios.initList()");
			} catch ( Exception $e )
			{
				$dbConn->rollBackTrans();
				$msg = "O cadastro deste usu�rio n�o p�de ser conclu�do. Recomece do inicio.";
				$response->addScript( "js.promptMenssage('Cadastro de Usu�rios','{$msg}',true)");
			}
		} else
		{
			$response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
		}
		
		$this->setResponse($response);
	}
}

?>
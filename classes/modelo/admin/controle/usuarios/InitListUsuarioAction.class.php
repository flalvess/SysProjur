<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/usuarios/TelaListUsuarios.class.php';

class InitListUsuarioAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		
		$tela = new TelaListUsuarios();
		$tela->processAssign();
		
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Listagem de Usu�rios");
		$response->addScript("FormUtil.initForm('formListUsuario')");
		$response->addScript("GestaoUsuarios.execList()");
		
		$this->setResponse($response);
	}
}

?>
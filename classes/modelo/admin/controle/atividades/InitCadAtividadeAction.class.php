<?php
require_once 'classes/modelo/admin/interface/atividades/TelaCadAtividade.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';

class InitCadAtividadeAction extends AbstractAction
{
	public function execute()
	{
		$response	= new AjaxResponse();

		$tela = new TelaCadAtividade();
		$tela->processAssign();
				
		$response->addAssign("tela", "innerHTML", $tela->getHTML());
		$response->addAssign("tituloTela", "innerHTML", "Cadastro de Atividade");
		$response->addScript("FormUtil.initForm('formSaveAtividade')");
                $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios('#formSaveAtividade_destinatario','#formSaveAtividade_para')" );
                //$response->addScript("GestaoAtividade.uploadAtividade()" );

                //$response->addScript("js.getEditor('formSaveAtividade_solicitacao')");
                //$response->addScript("CKEDITOR.replace( 'formSaveAtividade_solicitacao' )");
               

		$this->setResponse($response);
               
	}
}

?>
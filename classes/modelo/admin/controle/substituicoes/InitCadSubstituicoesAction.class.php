<?php
require_once 'classes/modelo/admin/interface/substituicoes/TelaCadSubstituicoes.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';

class InitCadSubstituicoesAction extends AbstractAction {
    public function execute() {
        $response	= new AjaxResponse();

        $tela = new TelaCadSubstituicoes();
        $tela->processAssign();

        $response->addAssign("tela", "innerHTML", $tela->getHTML());
        $response->addAssign("tituloTela", "innerHTML", "Cadastro de Substituicoes");
        $response->addScript("FormUtil.initForm('formSaveSubstituicoes')");
        
        $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios('#formSaveSubstituicoes_fkUsuario','#formSaveSubstituicoes_usuario')" );
        $response->addScript("GestaoProcessos.initAutoCompleteProcessos('#formSaveProcesso_fkProcesso','#formSaveProcesso_processo')" );

        $this->setResponse($response);
    }
}

?>
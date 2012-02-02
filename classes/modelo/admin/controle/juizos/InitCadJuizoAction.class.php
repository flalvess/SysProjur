<?php
require_once 'classes/modelo/admin/interface/juizos/TelaCadJuizo.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';

class InitCadJuizoAction extends AbstractAction {
    public function execute() {
        $response	= new AjaxResponse();

        $tela = new TelaCadJuizo();
        $tela->processAssign();

        $response->addAssign("tela", "innerHTML", $tela->getHTML());
        $response->addAssign("tituloTela", "innerHTML", "Cadastro de Juizos");
        $response->addScript("FormUtil.initForm('formSaveJuizo')");

        $this->setResponse($response);
    }
}

?>